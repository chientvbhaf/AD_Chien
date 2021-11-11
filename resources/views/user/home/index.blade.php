@extends('user.index')
@section('content')
    <main class="col-12 mt-4 mb-2 user_status">
        @include('user.home.component.newly')
        @include('user.home.component.popular')
    </main>
@endsection
@section('js')
    <script>
        $(function() {
            function send_request() {
                var url = $('.url_request_store').data('url');
                var id = $(this).data('id');
                var title = $('.request_title' + id).val();
                var message = $('.request_message' + id).val();
                $.ajax({
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    data: {
                        title: title,
                        id: id,
                        message: message
                    },
                    success: function() {
                        Swal.fire(
                            'Send request!',
                            'You have submitted a request',
                            'success'
                        )
                        $('.item'+id).remove()
                        /* location.reload() */
                    }
                });
            }
            function to_myclass(){
                
            }
            $(document).on('click', '.send_request', send_request)
            $(document).on('click', '.button_myclass', to_myclass)
        })
    </script>
@endsection
