@extends('layouts.backend.app')

@section('title','Add Tag')

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
                                Create New Tag
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.tag.store') }}" method="post" >
                                @csrf
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control">
                                        <label class="form-label">Tag Name</label>
                                    </div>
                                </div>

                                <br>
                                <a href="{{ route('admin.tag.index') }}"  class="btn btn-primary m-t-15 waves-effect">Back</a>
                                <input type="submit" class="btn btn-success m-t-15 waves-effect" value="Save Tag">
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
