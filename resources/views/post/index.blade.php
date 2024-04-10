@extends('layouts.master')
@section('breadcrumbs')
<div class="d-flex align-items-center flex-wrap mr-2">
    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">POST</h5>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form method="get" class="forms-sample m-0 p-0" action="{{ route('post.index') }}">
                                <input type="text" value="{{ $searchTerm }}"  class="form-control" name="search" placeholder="Search....">
                            </form>
                        </div>
                        <div class="col">
                            <div class="float-right">
                                <a type="button" class="btn btn-success" href="{{ route('post.create') }}">Add Post</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $num = 1; @endphp
                                @foreach ($items as $item)
                                    <tr id="row{{ $item->id }}">
                                        <td>{{ $item->title}}</td>
                                        <td>{{ $item->desc }}</td>
                                        <td>
                                            <a href="{{ route('post.edit', ['post' => $item->id]) }}">
                                                <button class="btn btn-sm btn-success"><i class="flaticon-edit"></i></button>
                                            </a>
                                            <button class="btn btn-sm btn-danger btndelete" data-url="{{ route('post.destroy', ['post' => $item->id]) }}" data-id="{{ $item->id }}">
                                                <i class="flaticon-delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @php $num++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                        {{ $items->links() }} <!-- Pagination links -->
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('css')
@endsection
@section('script')
    @if(session('function'))
        @if(session('function') == 'store')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Post successfully Added",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @else
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Post successfully Updated",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif

        <?php session()->forget('function'); ?>
    @endif
@endsection
