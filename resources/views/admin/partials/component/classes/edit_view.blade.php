@extends('admin.index')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>Class information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <h5 class="text-primary mr-4"><strong>Name :</strong></h5>
                    <h5> {{ $data_class->clas_name }}</h5>
                </div>
                <div class="row">
                    <h5 class="text-primary mr-4"><strong>Description :</strong></h5>
                    <h5> {{ $data_class->clas_desc }}</h5>
                </div>
                <div class="row">
                    <h5 class="text-primary mr-4"><strong>Image :</strong></h5>
                    <div>
                        <img src="{{ $data_class->clas_image }}" style="height: 200px;" class="img-thumbnail">
                    </div>
                </div>
                <div class="row">
                    <h5 class="text-primary mr-4"><strong>Lecturer :</strong></h5>
                    <?php
                    $lecturer = '';
                    $lecturer = $data_class->lecturer;
                    ?>
                    @if ($lecturer != '')
                        <h5 class="mr-2">id: {{ $lecturer->id }} | </h5>
                        <h5> name: {{ $lecturer->name }}</h5>

                    @else
                        <h5 class="text-danger"> No update</h5>

                    @endif
                </div>
                <div class="row">
                    <h5 class="text-primary mr-4"><strong>Status :</strong></h5>
                    @if ($data_class->clas_status == 1)
                        <h5>Open</h5>
                    @else($item_class->clas_status == 0)
                        <h5 class="text-danger">Lock</h5>
                    @endif
                </div>
                <div class="row">
                    <h5 class="text-primary mr-4"><strong>Post :</strong></h5>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">View Post</button>
                </div>
                <div class="row">
                    <h5 class="text-primary mr-4"><strong>Member :</strong></h5>
                    <h5> {{ $data_class->clas_member }} Member</h5>
                    <button class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModalLong_listMember">View
                        list member</button>

                </div>
                {{-- modal post --}}
                <div class="modal fade bd-example-modal-lg " id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $data_class->clas_name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {!! $data_class->clas_post !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- modal member --}}
                <div class="modal fade bd-example-modal-lg " id="exampleModalLong_listMember" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">List member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- Begin Page Content -->
                            <div class="container-fluid">

                                <!-- Page Heading -->
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                @if ($data_class->member->count())
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>Name</th>
                                                            <th>Progress</th>
                                                            <th>Acction</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data_class->member as $item_member)
                                                            @if ($item_member->pivot->status == 1)
                                                                <tr>
                                                                    <td>{{ $item_member->id }}</td>
                                                                    <td>{{ $item_member->name }}</td>
                                                                    <?php
                                                                    $progress = $item_member->pivot->progress;
                                                                    $color_progress = '#FFBF00';
                                                                    if ($progress < 20) {
                                                                        $color_progress = '#FFBF00';
                                                                    } elseif ($progress < 40) {
                                                                        $color_progress = '#FFE51E';
                                                                    } elseif ($progress < 60) {
                                                                        $color_progress = '#BAFF49';
                                                                    } elseif ($progress < 80) {
                                                                        $color_progress = '#5DFF3E';
                                                                    } else {
                                                                        $color_progress = '#00FF40';
                                                                    }
                                                                    ?>
                                                                    <td>
                                                                        @if ($progress == 100)
                                                                            <h4 class="text-center text-success">Complete
                                                                            </h4>
                                                                        @endif
                                                                        <div class="progress mt-1">
                                                                            <div class="progress-bar"
                                                                                style="width:{{ $progress }}%; background-color:{{ $color_progress }};">
                                                                                {{ $progress }}%</div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-danger btn-circle">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>

                                                            @endif

                                                        @endforeach
                                                    </tbody>
                                                @else
                                                    <tbody>
                                                        <h2>No members have joined yet</h2>
                                                    </tbody>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
