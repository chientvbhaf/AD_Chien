@extends('admin.index')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('role.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">Add Role</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Desc</th>
                            <th>Status</th>
                            <th>Acction</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_role as $item_role)
                            <td>{{ $item_role->name }}</td>
                            <td>{{ $item_role->desc }}</td>
                            <td>
                                @if ($item_role->status == 1)
                                    <a href="#" class="btn btn-success btn-circle">
                                        <i class="fas fa-lock-open"></i>
                                    </a>
                                @else
                                    <a href="#" class="btn btn-danger btn-circle">
                                        <i class="fas fa-lock"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-success btn-circle">
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
                    {{ $data_role->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection