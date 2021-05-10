<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Categories;
use App\Measurement;
use App\Product;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use DataTables;

class ProductsController extends Controller
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
        $this->model = new Product();
        $this->view_dir = "products";
        $this->singular = "product";
        $this->table = "product";
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
        $units = Measurement::all();
        $brands = Brand::all();
        $categories = Categories::all();
        $stores = Store::all();
        return view($this->view_dir.'.form',["units"=>$units,"brands"=>$brands,"stores"=>$stores,"categories"=>$categories]);
    }

    public function store (Request $request) {

        $rules = [
            'name' => "required|max:255",
            "desc"=>"",
            "price"=>"required|numeric",
            "sales_price"=>"required|numeric",
            "special_price"=>"numeric",
//            "special_price_from"=>"date",
//            "special_price_to"=>"date",
            "qty"=>"required|numeric",
            "size"=>"required|numeric",
            "measure_unit_id"=>"required|numeric",
            "cat_id"=>"required|numeric",
            "brand_id"=>"required|numeric",
            "store_id"=>"required|numeric",
            "inStock"=>"numeric",
            "active"=>"numeric",
            'image'=> 'required|mimes:jpeg,png|max:1014',
        ];
        $validator = $request->validate($rules);

        $inStock = 0;
        if($request->has("inStock"))
        {
            $inStock = 1;
        }

        $active = 0;
        if($request->has("active"))
        {
            $active = 1;
        }

        if($request->has("special_price_from"))
        {
            $validator['special_price_from'] = $this->getDate($request->input("special_price_from"));
        }

        if($request->has("special_price_to"))
        {
            $validator['special_price_to'] = $this->getDate($request->input("special_price_from"));
        }

        if($request->has("price_date"))
        {
            $validator['price_date'] = $this->getDate($request->input("special_price_from"));
        }

        if($request->has("available_from"))
        {
            $validator['available_from'] = $this->getDate($request->input("special_price_from"));
        }

        if($request->has("available_to"))
        {
            $validator['available_to'] = $this->getDate($request->input("special_price_from"));
        }
        $url = $this->save_image($request,$validator);
        unset($validator['image']);
        $validator['image_url'] = $url;

//        dd($validator);
        $data = $this->model::create($validator);
        Session::flash('success', "Success!");
        return redirect($this->view_dir);
    }

    function getDate($date)
    {
        $string = strtotime($date);
        return date ( 'Y-m-d H:m:s' ,$string );

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
        $units = Measurement::all();
        $brands = Brand::all();
        $categories = Categories::all();
        $stores = Store::all();
        return view($this->view_dir.'.form',["data"=>$data,"units"=>$units,"brands"=>$brands,"stores"=>$stores,"categories"=>$categories]);
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
                ->addColumn('image_url', function($row){
                    $img = '<img width="100" src="'.url($row['image_url']).'"/>';
                    return $img;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.url("/$this->singular/edit/".$row['id']).'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.url("/$this->singular/delete/".$row['id']).'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action','image_url'])
                ->make(true);
        }

        return view('index');
    }

    function all($search)
    {
        if($search=="all")
        $data = $this->model::select("id","name","sales_price","qty","size","measure_unit_id","image_url")->get();
        return response()->json($data);
    }


}
