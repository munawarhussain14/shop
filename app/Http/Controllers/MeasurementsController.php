<?php

namespace App\Http\Controllers;

use App\Measurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use DataTables;

class MeasurementsController extends Controller
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
        $this->model = new Measurement();
        $this->view_dir = "measurements";
        $this->singular = "measurement";
        $this->table = "measurement";
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
            'unit' => "required|max:255",
            'abbreviation' => "required|max:255",
            "active"=>"numeric"
        ]);

        $active = 0;
        if($request->has("active"))
        {
            $active = 1;
        }

        $data = $this->model::create([
            'unit'=>$validator['unit'],
            'abbreviation'=>$validator['abbreviation'],
            'active'=>$active
        ]);
        Session::flash('success', "Success!");
        return redirect($this->view_dir);
    }

    public function edit($id) {
        $data = $this->model::find($id);
        return view($this->view_dir.'.form',['data'=>$data]);
    }

    public function update(Request $request) {

        $validator = $request->validate([
            'unit' => "required|max:255",
            'abbreviation' => "required|max:255",
            "active"=>"numeric"
        ]);

        $row['unit']=$validator['unit'];
        $row['abbreviation']=$validator['abbreviation'];
        if($request->has("active"))
        {
            $row['active']= 1;
        }else
        {
            $row['active']= 0;
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
                ->addColumn('active', function($row){
                    if($row['active'])
                    {
                        return "Yes";
                    }
                    else
                    {
                        return "No";
                    }
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.url("/$this->singular/edit/".$row['id']).'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.url("/$this->singular/delete/".$row['id']).'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
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
