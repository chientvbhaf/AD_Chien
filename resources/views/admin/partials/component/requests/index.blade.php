@extends('admin.index')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2>List request </h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Sender</th>
                                <th>Class required</th>
                                <th>Acction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_request as $item_request)
                                <tr class="item{{ $item_request->id }}">
                                    <td>{{ $item_request->title }}</td>
                                    <td>{{ $item_request->message }}</td>
                                    <?php
                                    $user = '';
                                    $class = '';
                                    $user = $item_request->user;
                                    $class = $item_request->class;
                                    ?>
                                    <td class="user_id{{ $item_request->id }}" data-id=" {{ $user->id }} ">Name:
                                        {{ $user->name }} | Id: {{ $user->id }}</td>
                                    <td class="class_id{{ $item_request->id }}" data-id=" {{ $class->id }} ">Name:
                                        {{ $class->clas_name }} | Id: {{ $class->id }}</td>
                                    <td>

                                        <button type="button" class="btn btn-success accept_request"
                                            data-id="{{ $item_request->id }}"
                                            data-url="{{ route('request.accept') }}">Accept</button>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $data_request->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
@section('js')
    <script>
        $(function() {
            function accept_request() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id = $(this).data('id');
                        var url = $(this).data('url');
                        var user_id = $('.user_id' + id).data('id');
                        var class_id = $('.class_id' + id).data('id');
                        $.ajax({
                            url: url,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            method: "POST",
                            data: {
                                id:id,
                                user: user_id,
                                class: class_id
                            },
                            success: function() {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                $('.item'+id).remove()

                            }
                        })

                    }
                })
            }



            $(document).on('click', '.accept_request', accept_request)
        })
    </script>
@endsection
