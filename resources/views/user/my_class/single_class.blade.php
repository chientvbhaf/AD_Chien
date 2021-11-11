@extends('user.index')
@section('content')
<h2 class="mb-3 ml-3">BHAF-2005</h2>
<main class="col-12 study d-flex align-items-center justify-content-center">
    <div class="d-block study_left">
        <video class="study_video" controls>
            <source src="asset/videos/programerInRealLife.mp4" type="video/mp4">
        </video>
    </div>
    <div class="study_right">
        <div class="card d-flex">
            <div class="card-title pt-2 pl-2 study_content_title">
                <p>Course contents</p>
            </div>
            <div class="card-group col-12">
                <button class="btn btn-light col-12 text-left study_section_btn d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#sec1" aria-expanded="false" aria-controls="sec1">
                    <p>Section 1: Getting started</p>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="collapse col-12 border-0" id="sec1">
                    <ul class="study_list">
                        <li class="study_item">
                            <i class="fas fa-check-circle"></i>
                            <a href="#">Lecture 1. Fun video about programer</a>
                        </li>
                        <li class="study_item">
                            <i class="far fa-check-circle"></i>
                            <a href="#">Lecture 2. Introduce to React</a>
                        </li>
                        <li class="study_item">
                            <i class="far fa-check-circle"></i>
                            <a href="#">Lecture 3. React setting up enviroment</a>
                        </li>
                        <li class="study_item">
                            <i class="far fa-check-circle"></i>
                            <a href="#">Lecture 4. JSX</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-group col-12">
                <button class="btn btn-light col-12 text-left study_section_btn d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#sec2" aria-expanded="false" aria-controls="sec2">
                    <p>Section 2. Javascrip fresher</p>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="collapse col-12 border-0" id="sec2">
                    <ul class="study_list">
                        <li class="study_item">
                            <i class="far fa-check-circle"></i>
                            <a href="#">Lecture 5. Why did we need Javascript?</a>
                        </li>
                        <li class="study_item">
                            <i class="far fa-check-circle"></i>
                            <a href="#">Lecture 6. Javascrip variables</a>
                        </li>
                        <li class="study_item">
                            <i class="far fa-check-circle"></i>
                            <a href="#">Lecture 7. Javascrip operator</a>
                        </li>
                        <li class="study_item">
                            <i class="far fa-check-circle"></i>
                            <a href="#">Lecture 8. Javascrip array destructures</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
    
@endsection