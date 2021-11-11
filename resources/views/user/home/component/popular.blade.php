<div class="card col-12 course">
    <div class="card-title card_title">
        <div class="course_title">
            <p>Popular</p>
        </div>
    </div>
    <div class="card-body d-flex flex-wrap course_list">

        {{-- course_item --}}
        @foreach ($class_popular as $item_popular)
            <div class="course_item">
                <div class="course_name">
                    <h4>{{ $item_popular->clas_name }}</h4>
                </div>
                <div class="course_image">
                    @if ($item_popular->clas_image)
                        <img src="{{ $item_popular->clas_image }}" alt="python">
                    @else
                        <img src="https://lh3.googleusercontent.com/proxy/zf59jUN196WlyHkIwI9_5QUxsVYIhxV-1Uo69IVjpX7LoAIoI8ioYVZCC_cb1sd64x4ibN2EdXb9u7sIY6lY9I_e8zdAtKKs4HgqHsfIfoxpJPge"
                            alt="python">

                    @endif
                </div>
                <?php
                $lecturer = '';
                if ($item_popular->lecturer) {
                    $lecturer = $item_popular->lecturer;
                }
                ?>
                <div class="course_des">
                    <div class="course_author">
                        @if ($lecturer == '')
                            <span class="author_name"><a href="#">no update</a></span>

                        @else

                            <span class="author_name"><a href="#">{{ $lecturer->name }}</a></span>
                        @endif
                    </div>
                    <div class="course_joined">
                        <span class="course_joined_quantity">{{ $item_popular->clas_member }}</span> <span>people joined</span>
                    </div>
                </div>
                <div class="course_actions">
                    <a href="#"><button class="btn btn-danger">Join</button></a>
                    <a href="#"><button class="btn btn-primary">Save</button></a>
                </div>
            </div>
        @endforeach
        <div class="course_more">
            <a href="#"><span>more</span> <span>
                    <ion-icon name="chevron-forward-circle-outline"></ion-icon>
                </span></a>
        </div>
    </div>
</div>
