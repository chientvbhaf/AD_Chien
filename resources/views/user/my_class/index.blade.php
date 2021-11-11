@extends('user.index')
@section('content')
    <main class="class col-md-12">
        <div class="col-12">
            <div class="card col-12 course">
                <div class="card-title card_title">
                    <div class="course_title">
                        <p>Class list</p>
                    </div>
                </div>

                <div class="card-body d-flex flex-wrap course_list">
                    @foreach ($data_class as $item_class)
                        <div class="course_item course_class">
                            <?php
                            $result = 0;
                            $progress = 0;
                            ?>
                            <?php
                            foreach ($item_class->progress_class as $key => $value) {
                                if ($value->user_id == $user_id) {
                                    if ($value->status == 1) {
                                        $result = 1;
                                        $progress = $value->progress;

                                    } else {
                                        $result = 0;
                                    }
                                }
                            }
                            ?>
                            <div class="course_name">
                                <h4>{{ $item_class->clas_name }}</h4>
                            </div>
                            @if ($result == 1)
                                <a href="{{ route('home.single_class',['id'=>$item_class->id]) }}">
                                    <div class="course_image class_img">
                                        <img src="{{ $item_class->clas_image }}" alt="python">
                                    </div>
                                </a>

                            @else
                                <a>
                                    <div class="course_image class_img" style="pointer-events: none;">
                                        <img src="{{ $item_class->clas_image }}" alt="python">
                                    </div>
                                </a>
                            @endif

                            <div class="course_des">
                                <div class="course_author">
                                    <?php
                                    $data_lecturer = '';
                                    $data_lecturer = $item_class->lecturer;
                                    ?>
                                    @if ($data_lecturer != '')

                                        <span class="author_name"><a href="#">{{ $data_lecturer->name }}</a></span>
                                    @else
                                        <span class="author_name"><a href="#">No update</a></span>

                                    @endif
                                </div>
                            </div>
                            <?php
                                $color_progress = "#FFBF00";
                                if($progress < 20){
                                    $color_progress="#FFBF00";
                                }elseif($progress < 40){
                                    $color_progress="#FFE51E";
                                }elseif($progress < 60){
                                    $color_progress="#BAFF49";
                                }elseif($progress < 80){
                                    $color_progress="#5DFF3E";
                                }else{
                                    $color_progress="#00FF40";
                                }
                            ?>
                            @if ($result == 1)
                            <div class="progress mt-5">
                                <div class="progress-bar" style="width:{{ $progress }}%; background-color:{{ $color_progress }};">{{ $progress }}%</div>
                            </div>
                            @if ($progress == 100 )
                                <h4 class="text-center mt-2 text-success">Complete</h4>
                            @endif
                            @else
                                <div class="mt-1 ">
                                    <h4 class="text-center text-warning">Waiting for approval</h4>
                                </div>
                                <div class="mt-2 text-center">
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </main>
@endsection
