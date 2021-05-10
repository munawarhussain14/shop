<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use DataTables;

class CategoriesController extends Controller
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
        $this->model = new Categories();
        $this->view_dir = "categories";
        $this->singular = "category";
        $this->table = "categories";
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
            'name' => "required|unique:$this->table|max:255",
            'desc' => '',
            'image'=> 'required|mimes:jpeg,png|max:1014',
        ]);

        $url = $this->save_image($request,$validator);

        $data = $this->model::create([
            'name'=>$validator['name'],
            'desc'=>$validator['desc'],
            'image_url'=>$url,
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
//            'name' => "unique:$this->table|max:255",
            'name' => "max:255",
            'desc' => '',
            'image'=> 'mimes:jpeg,png|max:1014',
        ]);

        $row = [
            'desc'=>$validator['desc'],
        ];
        if($request->has("name"))
        {
            $row['name']=$validator['name'];
        }
        if($request->hasFile("image"))
        {
            $url = $this->save_image($request,$validator);
            $row['image_url'] = $url;
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
                ->addColumn('image', function($row){
                    $btn = '<img width="150" src="'.url($row['image_url']).'">';
                    return $btn;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.url("/$this->singular/edit/".$row['id']).'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.url("/$this->singular/delete/".$row['id']).'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['image','action'])
                ->make(true);
        }

        return view('index');
    }

    function all($search)
    {
        if($search=="all")
        {
            $data = $this->model::select("id","name","image_url")->get();
        }
        else
        {
            $data = $this->model::select("id","name","image_url")
                ->where("name","like","%$search%")
                ->get();
        }
        return response()->json($data);
    }

}
