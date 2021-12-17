@extends('layouts.backend.app')

@section('title','posts')

@push('css')

    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')

    <section class="content">
        <div class="container-fluid">


            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Subscribers Table
                                <span class="badge bg-blue-grey">{{ $subscribers->count() }}</span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Email</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subscribers as $key=>$subscriber)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $subscriber->email }}</td>
                                        <td>{{ $subscriber->created_at->toFormattedDateString() }}</td>
                                        <td>{{ $subscriber->updated_at->toFormattedDateString() }}</td>
                                        <td>

                                            <button type="button" class="btn btn-xs btn-danger waves-effect" onclick="deleteSubscriber({{ $subscriber->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{$subscriber->id}}" action="{{ route('admin.subscriber.destroy',$subscriber->id) }}" method="POST" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>


@endsection
@push('js')

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('assets/backend/js/sweetalert2.js') }}"></script>
    <script type="text/javascript">
        function deleteSubscriber(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it !',
                cancelButtonText: 'No, cancel !',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();

                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your file is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
