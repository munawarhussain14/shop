@extends('layouts.app')

@section('content')
    {{--    {{Auth::user()->first_name}}--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{($data??false)?"Edit":"Add"}} Product</h4>
                    {{--<p class="card-category">Add New Category</p>--}}
                </div>
                <div class="card-body">
                    <form method="post" action="{{url((($data??false)?'product/edit/'.$data->id:'product/add'))}}"
                          enctype="multipart/form-data">
                        @csrf
                        @if($data??false)
                            <input type="hidden" name="id" value="{{$data->id}}"/>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group @error('name') has-danger @enderror">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" value="{{$data->name??old('name')}}" name="name"
                                           class="form-control">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <div class="form-group bmd-form-group @error('description') has-danger @enderror">
                                        <label class="bmd-label-floating"> Add some description about the
                                            Product.</label>
                                        <textarea name="description" class="form-control"
                                                  rows="5">{{$data->description??old('description')}}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group bmd-form-group @error('price') has-danger @enderror">
                                    <label class="bmd-label-floating">Purchase Price</label>
                                    <input type="number" value="{{$data->price??old('price')}}" name="price"
                                           class="form-control">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group bmd-form-group @error('sales_price') has-danger @enderror">
                                    <label class="bmd-label-floating">Sale Price</label>
                                    <input type="number" value="{{$data->sales_price??old('sales_price')}}" name="sales_price"
                                           class="form-control">
                                    @error('sales_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <label class="bmd-label-floating" style="margin: 0;">Special Price</label>
                                <div style="margin: 0;" class="form-group bmd-form-group @error('special_price') has-danger @enderror">
                                    <input type="number" value="{{$data->special_price??old('special_price')}}" name="special_price"
                                           class="form-control">
                                    @error('special_price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <label class="bmd-label-floating" style="margin: 0;">Special Price From</label>
                                <div style="margin: 0;" class="form-group bmd-form-group @error('special_price_from') has-danger @enderror">
                                    <input autocomplete="false" type="text" value="{{$data->special_price_from??old('special_price_from')}}" name="special_price_from"
                                           class="form-control datetimepicker">
                                    @error('special_price_from')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <label class="bmd-label-floating" style="margin: 0;">Special Price To</label>
                                <div style="margin: 0;" class="form-group bmd-form-group @error('special_price_to') has-danger @enderror">
                                    <input autocomplete="false" type="text" value="{{$data->special_price_to??old('special_price_to')}}" name="special_price_to"
                                           class="form-control datetimepicker">
                                    @error('special_price_to')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group bmd-form-group @error('qty') has-danger @enderror">
                                    <label class="bmd-label-floating">Quantity</label>
                                    <input type="number" value="{{$data->qty??old('qty')}}" name="qty"
                                           class="form-control">
                                    @error('qty')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group bmd-form-group @error('size') has-danger @enderror">
                                    <label class="bmd-label-floating">Weight</label>
                                    <input type="number" value="{{$data->size??old('size')}}" name="size"
                                           class="form-control">
                                    @error('size')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">

                                <div class="dropdown bootstrap-select">
                                    <label class="bmd-label-floating">Unit</label>
                                    <select name="measure_unit_id" class="selectpicker"
                                            data-style="btn btn-primary btn-round"
                                            title="Select Unit">
                                        <option disabled="" selected="">Select Unit</option>
                                        @foreach($units as $item)
                                        <option {{(($data??false)&&$data->measure_unit_id==$item->id)?"selected":(old('measure_unit_id')==$item->id)?"selected":""}} value="{{$item->id}}">{{$item->unit}}</option>
                                        @endforeach
                                    </select>
                                    @error('measure_unit_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="dropdown bootstrap-select">
                                    <label class="bmd-label-floating">Category</label>
                                    <select name="cat_id" class="selectpicker"
                                            data-style="btn btn-primary btn-round"
                                            title="Select Category"
                                            data-live-search="true">
                                        <option disabled="" selected="">Select Category</option>
                                        @foreach($categories as $item)
                                            <option {{(($data??false)&&$data->cat_id==$item->id)?"selected":(old('cat_id')==$item->id)?"selected":""}} value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('cat_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="dropdown bootstrap-select">
                                    <label class="bmd-label-floating">Brand</label>
                                    <select name="brand_id" class="selectpicker"
                                            data-style="btn btn-primary btn-round"
                                            title="Select Brand"
                                            data-live-search="true">
                                        <option disabled="" selected="">Select Brand</option>
                                        @foreach($brands as $item)
                                            <option {{(($data??false)&&$data->brand_id==$item->id)?"selected":(old('brand_id')==$item->id)?"selected":""}} value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('cat_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="dropdown bootstrap-select">
                                    <label class="bmd-label-floating">Store</label>
                                    <select name="store_id" class="selectpicker"
                                            data-style="btn btn-primary btn-round"
                                            title="Select Brand">
                                        <option disabled="" selected="">Select Store</option>
                                        @foreach($stores as $item)
                                            <option {{(($data??false)&&$data->store_id==$item->id)?"selected":(old('store_id')==$item->id)?"selected":""}} value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('store_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" @if(($data??false)&&$data->inStock==1) checked @endif name="inStock" value="1">
                                        <span class="toggle"></span>
                                        In Stock
                                    </label>
                                    @error('inStock')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" @if(($data??false)&&$data->active==1) checked
                                               @endif name="active" value="1">
                                        <span class="toggle"></span>
                                        Active
                                    </label>
                                    @error('active')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <h4 class="title">Image</h4>
                                <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset($data->image_url??'assets/img/image_placeholder.jpg')}}"
                                             alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                    <div>
                                      <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">{{($data??false)?($data->image_url)?"Change":"Select image":"Select image"}}</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="hidden" value="" name="...">
                                          <input value="{{old("image")}}" type="file" name="image">
                                      <div class="ripple-container"></div></span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                           data-dismiss="fileinput"><i class="fa fa-times"></i> Remove
                                            <div class="ripple-container">
                                                <div class="ripple-decorator ripple-on ripple-out"
                                                     style="left: 65.4063px; top: 15px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                                class="btn btn-primary pull-right">{{($data??false)?"Update":"Save"}}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $('.datetimepicker').datetimepicker({
            useCurrent:false,
            format: 'DD-MM-YYYY hh:mm:ss A',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
    </script>
    @endsection
