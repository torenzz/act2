@extends('layouts.master')
@section('breadcrumbs')
<div class="d-flex align-items-center flex-wrap mr-2">
    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">CREATE ARTICLE</h5>
    <!--end::Page Title-->
    <!--begin::Actions-->
    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
    <span class="text-muted font-weight-bold mr-4">#XRS-45670</span>
    <a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>
    <!--end::Actions-->
</div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New Article</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{route('article.store')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Article</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Article Title    ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="content" id="descTextarea1" rows="4" placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-light" href="{{route('article.index')}}">Cancel</a>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection
@section('script')
@endsection
