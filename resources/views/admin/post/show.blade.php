@extends('layouts.backend.app')

@section('title','Add Post')

@push('css')

@endpush

@section('content')

    <section class="content">
        <div class="container-fluid">
            <a class="btn bg-primary " href="{{ route('admin.post.index') }}">Back</a>
            @if($post->is_approved == false)
                <button type="button" class="btn btn-danger waves-effect pull-right" onclick="approvePost({{ $post->id }})">Approve Now !</button>
                <form id="approve-form" action="{{ route('admin.post.approve',$post->id) }}" method="POST" style="display: none">
                    @csrf
                    @method('PUT')
                </form>
            @else
                <button class="btn btn-success pull-right" disabled>
                    <i class="material-icons">done</i>Approved</button>

            @endif
            <br>
            <br>
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <a href="{{ route('admin.post.edit',$post->id) }}" class=" btn-outline-info pull-right" >
                                    <i class="material-icons">edit</i>
                                </a>
                                <h1 class="font-40">
                                    {{ $post->title }}
                                </h1>
                                <small>Created By <strong>{{ $post->user->name }}</strong>, On {{ $post->created_at->toFormattedDateString() }}</small>

                            </div>
                            <div class="body">
                                {!! $post->body !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card"><div class="header bg-cyan">
                                <h2>
                                    Categories
                                </h2>
                            </div>
                            <div class="body">
                                @foreach($post->categories as $categories)
                                    <span class="label bg-cyan">{{ $categories->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="card"><div class="header bg-blue">
                                <h2>
                                    Tags
                                </h2>
                            </div>
                            <div class="body">

                                @foreach($post->tags as $tag)
                                    <span class="label bg-blue">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="card"><div class="header bg-amber">
                                <h2>
                                    Featured Image
                                </h2>
                            </div>
                            <div class="body">
                                <img class="img-responsive thumbnail" src="{{ asset('storage/post').'/' }}{{ $post->image }}" alt="" >
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>


@endsection
@push('js')
<script src="{{ asset('assets/backend/js/sweetalert2.js') }}"></script>
<script type="text/javascript">
    function approvePost(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to Approve this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Approve it !',
            cancelButtonText: 'No, cancel !',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                event.preventDefault();
                document.getElementById('approve-form').submit();

                swalWithBootstrapButtons.fire(
                    'approved!',
                    'Your file has been approved.',
                    'success'
                )

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your file is Not approved :)',
                    'error'
                )
            }
        })
    }
</script>
@endpush
