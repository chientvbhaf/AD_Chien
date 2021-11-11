<div class="card col-12 course">
    <div class="card-title card_title">
        <div class="course_title">
            <p>Newly released</p>
        </div>
    </div>
    <div class="card-body d-flex flex-wrap course_list">

        {{-- course_item --}}
        <?php
        $user = '';
        $user = Auth::user();
        ?>
        @foreach ($class_newly as $item_newly)
            @if (Auth::check() && $user->classes->contains('id', $item_newly->id))
                
            @else
                <div class="course_item item{{ $item_newly->id }}">
                    <div class="course_name">
                        <h4>{{ $item_newly->clas_name }}</h4>
                    </div>
                    <div class="course_image">
                        <img src="{{ $item_newly->clas_image }}" alt="python">
                    </div>
                    <?php
                    $lecturer = '';
                    if ($item_newly->lecturer) {
                        $lecturer = $item_newly->lecturer;
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
                            <span class="course_joined_quantity">{{ $item_newly->clas_member }}</span> <span>people
                                joined</span>
                        </div>
                    </div>
                    <div class="course_actions">
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#exampleModal{{ $item_newly->id }}">Join</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".introduce{{ $item_newly->id }}">Introduce</button>
                        
                    </div>

                </div>
            @endif
           {{--  model send request --}}
            <div class="modal fade" id="exampleModal{{ $item_newly->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    @if (Auth::check())
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Send access request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label"> Purpose:</label>
                                        <input type="text" class="form-control request_title{{ $item_newly->id }}"
                                            id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea class="form-control request_message{{ $item_newly->id }}"
                                            id="message-text"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary url_request_store" data-dismiss="modal"
                                    data-url="{{ route('request.store') }}">Close</button>
                                <button type="button" class="btn btn-primary send_request"
                                    data-id="{{ $item_newly->id }}">Send Request</button>
                            </div>
                        </div>

                    @else
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sign in to use this feature</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary url_request_store"
                                    data-dismiss="modal">Close</button>
                                <a href="{{ route('login.form') }}" type="button"
                                    class="btn btn-primary send_request">Login</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            {{-- modal introduce --}}
            <div class="modal fade bd-example-modal-lg introduce{{ $item_newly->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $item_newly->clas_name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        {!! $item_newly->clas_post !!}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
                </div>
              </div>
        @endforeach
        <div class="course_more">
            <a href="#"><span>more</span> <span>
                    <ion-icon name="chevron-forward-circle-outline"></ion-icon>
                </span>
            </a>
        </div>
    </div>
</div>
