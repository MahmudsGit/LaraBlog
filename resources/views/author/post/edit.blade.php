@extends('layouts.backend.app')

@section('title','Add Post')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('author.post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Update Post
                                </h2>
                            </div>
                            <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}">
                                        <label class="form-label">Title</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="checkbox" name="status" id="basic_checkbox_1" value="1"
                                            {{ $post->status == true ? 'checked' : '' }} />
                                        <label for="basic_checkbox_1" ><span class="badge bg-blue-grey"> Publish </span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Categories & Tags
                                </h2>
                            </div>
                            <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                        <label for="categories">Select Category</label>
                                        <select class="form-control show-tick" name="categories[]"  multiple data-selected-text-format="count">
                                            @foreach($categories as $category)
                                                <option
                                                    @foreach($post->categories as $categoryPost)
                                                        {{ $categoryPost->id == $category->id ? 'selected' : '' }}
                                                    @endforeach
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line  {{ $errors->has('tags') ? 'focused error' : '' }}">
                                        <label for="tags">Select Tag</label>
                                        <select class="form-control show-tick" name="tags[]" multiple data-selected-text-format="count">
                                            @foreach($tags as $tag)
                                                <option
                                                    @foreach($post->tags as $postTag)
                                                        {{ $postTag->id == $tag->id ? 'selected' : '' }}
                                                    @endforeach
                                                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Body
                                </h2>
                            </div>
                            <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea id="tinymce" name="body" class="form-control">{{ $post->body }}</textarea>
                                    </div>
                                </div>
                                <a href="{{ route('author.post.index') }}"  class="btn btn-primary m-t-15 waves-effect">Back</a>
                                <input type="submit" class="btn btn-success m-t-15 waves-effect" value="Save Post">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>


@endsection
@push('js')

    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <!-- Custom Js -->
    <script>
        $(function () {

            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce')}}';
        });
    </script>

@endpush
