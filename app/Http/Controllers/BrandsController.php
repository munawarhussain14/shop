<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use DataTables;

class BrandsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $model;
    private $view_dir;
    private $singular;
    private $table;
    public function __construct()
    {
//        $this->middleware('auth');
        $this->model = new Brand();
        $this->view_dir = "brands";
        $this->singular = "brand";
        $this->table = "brand";
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view($this->view_dir.'.index');
    }

    public function add()
    {
        return view($this->view_dir.'.form');
    }

    public function store (Request $request) {
        $validator = $request->validate([
            'name' => "required|max:255",
            "desc"=>"",
            "active"=>"numeric",
            'image'=> 'required|mimes:jpeg,png|max:1014',
        ]);

        $active = 0;
        if($request->has("active"))
        {
            $active = 1;
        }

        $url = $this->save_image($request,$validator);

        $data = $this->model::create([
            'name'=>$validator['name'],
            'desc'=>$validator['desc'],
            'logo_url'=>$url,
            'active'=>$active
        ]);
        Session::flash('success', "Success!");
        return redirect($this->view_dir);
    }

    function save_image($request,$validator)
    {
        if($request->has('id'))
        {
            //$row = $this->model::find($request->input('id'));
            $id = $request->input("id");
        }
        else
        {
            $id = $this->model::max("id");
            $id++;
        }

        $extension = $request->image->extension();
        $file = $request->file('image');
        $destinationPath = "uploads/$this->view_dir";
        $file->move($destinationPath,$id.".".$extension);
        $url = "uploads/$this->view_dir/".$id.".".$extension;
        return $url;
    }

    public function edit($id) {
        $data = $this->model::find($id);
        return view($this->view_dir.'.form',['data'=>$data]);
    }

    public function update(Request $request) {

        $validator = $request->validate([
            'name' => "required|max:255",
            "desc"=>"",
            "active"=>"numeric",
            'image'=> 'mimes:jpeg,png|max:1014',
        ]);
        if($request->has("active"))
        {
            $row['active']= 1;
        }else
        {
            $row['active']= 0;
        }

        if($request->hasFile("image"))
        {
            $url = $this->save_image($request,$validator);
            $row['logo_url'] = $url;
        }

        $data = $this->model::find($request->input("id"))->update($row);
        return redirect("$this->singular/edit/".$request->input("id"));
        //return view($this->view_dir.'.add',['data'=>$data]);
    }

    function delete($id)
    {
        $data = $this->model::find($id);
        if($data->image_url)
        {
            //delete Image
        }

        return redirect('categories');
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->model::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('logo_url', function($row){
                    $img = '<img width="100" src="'.url($row['logo_url']).'"/>';
                    return $img;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.url("/$this->singular/edit/".$row['id']).'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.url("/$this->singular/delete/".$row['id']).'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action','logo_url'])
                ->make(true);
        }

        return view('index');
    }

    function all()
    {
        $data = $this->model::select("id","name","image_url")->get();
        return response()->json($data);
    }

}
