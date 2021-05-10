@extends('layouts.app')

@section('content')
{{--    {{Auth::user()->first_name}}--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{($data??false)?"Edit":"Add"}} Currency</h4>
                    {{--<p class="card-category">Add New Category</p>--}}
                </div>
                <div class="card-body">
                    <form method="post" action="{{url((($data??false)?'currency/edit/'.$data->id:'currency/add'))}}" enctype="multipart/form-data">
                        @csrf
                        @if($data??false)
                            <input type="hidden" name="id" value="{{$data->id}}"/>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group bmd-form-group @error('country') has-danger @enderror">
                                    <label class="bmd-label-floating">Country</label>
                                    <input type="text" value="{{$data->country??old('country')}}" name="country" class="form-control">
                                    @error('country')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group bmd-form-group @error('currency') has-danger @enderror">
                                    <label class="bmd-label-floating">Currency</label>
                                    <input type="text" value="{{$data->currency??old('currency')}}" name="currency" class="form-control">
                                    @error('currency')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group bmd-form-group @error('symbol') has-danger @enderror">
                                    <label class="bmd-label-floating">Symbol</label>
                                    <input type="text" value="{{$data->symbol??old('symbol')}}" name="symbol" class="form-control">
                                    @error('symbol')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
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
