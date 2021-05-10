@extends('layouts.app')

@section('content')
{{--    {{Auth::user()->first_name}}--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{($data??false)?"Edit":"Add"}} Store</h4>
                    {{--<p class="card-category">Add New Category</p>--}}
                </div>
                <div class="card-body">
                    <form method="post" action="{{url((($data??false)?'store/edit/'.$data->id:'store/add'))}}" enctype="multipart/form-data">
                        @csrf
                        @if($data??false)
                            <input type="hidden" name="id" value="{{$data->id}}"/>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group @error('name') has-danger @enderror">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" value="{{$data->name??old('name')}}" name="name" class="form-control">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" @if(($data??false)&&$data->active==1) checked @endif name="active" value="1">
                                        <span class="toggle"></span>
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--
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
                        </div>-->


                        <button type="submit" class="btn btn-primary pull-right">{{($data??false)?"Update":"Save"}}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
