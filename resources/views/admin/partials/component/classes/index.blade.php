@extends('admin.index')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('class.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Add Class</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Acction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_class as $item_class)
                                <tr>
                                    <td>{{ $item_class->clas_name }}</td>
                                    <td>{{ $item_class->clas_desc }}</td>
                                    <td>
                                        @if ($item_class->clas_image != null)
                                            <div style="height: 100px; width: 100px">
                                                <img src="{{ $item_class->clas_image }}" id="previewImg"
                                                    class="img-thumbnail h-100">

                                            </div>

                                        @else
                                            null
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item_class->clas_status == 1)
                                            <a href="#" class="btn btn-success btn-circle">
                                                <i class="fas fa-lock-open"></i>
                                            </a>
                                        @else($item_class->clas_status == 0)
                                            <a href="#" class="btn btn-secondary btn-circle">
                                                <i class="fas fa-lock"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-circle">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('class.edit_view',["id" => $item_class->id]) }}" class="btn btn-info btn-circle">
                                            <i class="fas fa-cog"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $data_class->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
