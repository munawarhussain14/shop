@extends('layouts.app')

@section('content')
{{--    {{Auth::user()->first_name}}--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{($data??false)?"Edit":"Add"}} Category</h4>
                    {{--<p class="card-category">Add New Category</p>--}}
                </div>
                <div class="card-body">
                    <form method="post" action="{{url((($data??false)?'category/edit/'.$data->id:'category/add'))}}" enctype="multipart/form-data">
                        @csrf
                        @if($data??false)
                            <input type="hidden" name="id" value="{{$data->id}}"/>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group @error('name') has-danger @enderror">
                                    <label class="bmd-label-floating">Name</label>
                                    <input {{($data??false)?"readonly":""}} type="text" value="{{$data->name??old('name')}}" name="name" class="form-control">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <div class="form-group bmd-form-group @error('desc') desc @enderror">
                                        <label class="bmd-label-floating"> Add some description about the Category.</label>
                                        <textarea name="desc" class="form-control" rows="5">{{$data->desc??old('desc')}}</textarea>
                                        @error('desc')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <h4 class="title">Image</h4>
                                <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset($data->image_url??'assets/img/image_placeholder.jpg')}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                    <div>
                                      <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">{{($data??false)?($data->image_url)?"Change":"Select image":"Select image"}}</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="hidden" value="" name="..."><input type="file" name="image">
                                      <div class="ripple-container"></div></span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 65.4063px; top: 15px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div></div></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary pull-right">{{($data??false)?"Update":"Save"}}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
