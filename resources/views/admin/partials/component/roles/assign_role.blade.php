@extends('admin.index')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables User</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>Assign roles</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date of Birth</th>
                                <th>Account name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Acction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_user as $item_user)
                                <td>{{ $item_user->name }}</td>
                                <td>{{ $item_user->DoB }}</td>
                                <td>{{ $item_user->account_name }}</td>
                                <td>{{ $item_user->email }}</td>
                                <td>
                                    @if ($item_user->role->count())
                                        @foreach ($item_user->role as $user_role)
                                            <p class="text-left"><i class="fas fa-circle fa-xs"></i>
                                                {{ $user_role->name }}</p>
                                        @endforeach
                                    @else
                                        User
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-success btn-circle" data-toggle="modal"
                                        data-target="#exampleModalCenter{{ $item_user->id }}">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade " id="exampleModalCenter{{ $item_user->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <form action="{{ route('role.assign.update',['id'=>$item_user->id]) }}" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Account name:
                                                            {{ $item_user->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Choose role for user</label>
                                                        <select
                                                            class="js-example-placeholder-multiple js-states form-control"
                                                            multiple="multiple" style="width: 100%" name="user_role[]">
                                                            @foreach ($data_role as $item_role)
                                                                <option {{ $item_user->role->contains('id', $item_role->id) ? 'selected' : '' }} value="{{ $item_role->id }}">
                                                                    {{ $item_role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @if ($item_user->status == 1)
                                        <a href="#" class="btn btn-primary btn-circle">
                                            <i class="fas fa-lock-open"></i>
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-warning btn-circle">
                                            <i class="fas fa-lock"></i>
                                        </a>
                                    @endif
                                    <a href="#" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $data_user->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
@section('js')
    <script>
        $(".js-example-placeholder-multiple").select2({
            placeholder: "Select a state",
            allowClear: true

        });
    </script>
@endsection
