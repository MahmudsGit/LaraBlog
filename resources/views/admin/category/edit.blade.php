@extends('layouts.backend.app')

@section('title','Edit Category')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Category
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}">
                                        <label class="form-label">Category Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" id="image" name="image" class="form-control" >
                                    </div>
                                </div>

                                <br>
                                <a href="{{ route('admin.category.index') }}"  class="btn btn-primary m-t-15 waves-effect">Back</a>
                                <input type="submit" class="btn btn-success m-t-15 waves-effect" value="Update Category">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@push('js')

@endpush
