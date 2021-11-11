@extends('admin.index')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('role.store') }}" enctype="multipart/form-data" method="post">
          @csrf
            <div class="form-group">
                <label for="role_name">Enter Name</label>
                <input type="text" class="form-control" name="role_name" id="role_name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="role_desc">Enter DESC</label>
                <input type="text" class="form-control" id="role_desc" name="role_desc" placeholder="Enter desc">
            </div>
            <div class="form-group">
                <label for="role_status">Enter status</label>
                <select class="form-control" name="role_status" id="role_status">
                    <option value="1">Open</option>
                    <option value="0">Lock</option>
                </select>
            </div>
            <div class="card bg-primary">
                <div class="card-body">
                    <h2 class="text-center text-white">Add Permission</h2>
                </div>
            </div>
            <div class="custom-control custom-checkbox mt-4 mb-4">
                <input type="checkbox" class="custom-control-input check_all" id="customControlAutosizing">
                <label class="custom-control-label" for="customControlAutosizing">Check All</label>
            </div>

            @foreach ($data_permission as $item_permission)
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="text-primary form-check-inline">
                            <h2>{{ $item_permission->name }}</h2>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input check_all_item" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">All</label>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($item_permission->permission as $item)
                            <div class="form-check form-check-inline col-2">
                                <input type="checkbox" class="form-check-input" name="role_permission[]" multiple
                                    id="exampleCheck2" value="{{ $item->id }}">
                                <label class="form-check-label" for="">{{ $item->name }}</label>
                            </div>

                        @endforeach
                    </div>
                </div>

            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('js')
    <script>
        function checkBoxAll() {
            $('input:checkbox').prop('checked', this.checked);
        }

        function checkBoxAllItem() {
            $(this).parent().parent().parent().find('input:checkbox').prop('checked', this.checked);
        }

        $(function() {
            // $(document).ready(checkBoxAll);
            $(document).on('click', '.check_all', checkBoxAll);
            $(document).on('click', '.check_all_item', checkBoxAllItem);
        })
    </script>
@endsection
