@extends('admin.index')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('class.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="class_name">Enter Name</label>
                <input type="text" class="form-control class_name" name="class_name" id="class_name"
                    placeholder="Enter name">
            </div>
            <input type="hidden" class="class_slug" name="class_slug" id="class_slug">
            <div class="form-group">
                <label for="class_desc">Enter DESC</label>
                <input type="text" class="form-control" id="class_desc" name="class_desc" placeholder="Enter desc">
            </div>
            <div class="form-group">
                <label for="class_desc">Enter Post</label>
            </div>
            <textarea name="class_post" id="editor1" cols="30" rows="10"></textarea>
            <div>
                <label for="class_lecturer">Choose lecturer</label>
                <select class="form-control js-example-placeholder-single" name="class_lecturer" id="class_lecturer">
                    <option>Select a Lecturer</option>
                    @foreach ($data_lecturer as $item_lecturer)
                        <option value="{{ $item_lecturer->id }}"> {{ $item_lecturer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="class_status ">Enter status</label>
                <select class="form-control" name="class_status" id="class_status">
                    <option value="1">Open</option>
                    <option value="0">Lock</option>
                </select>
            </div>
            <div class="form-group">
                <label for="class_image">Choose image</label>
                <input type="file" class="form-control-file class_image" name="class_image" id="class_image">
            </div>
            <div style="height: 200px; width: 200px">
                <img src="https://i.pinimg.com/236x/a6/bb/15/a6bb157641c55b3d8275802dd5a1dc30.jpg" id="previewImg"
                    class="img-thumbnail h-100">

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('js')
    <script>
        $(".js-example-placeholder-single").select2({
            placeholder: "Select a Lecturer",
            allowClear: true
        });

        function ckeditor() {
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
            CKEDITOR.replace('editor1', options)
        }

        function preview_image(event) {
            var file = $(".class_image").get(0).files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

        function create_slug() {
            var title, slug;

            //Lấy text từ thẻ input title 
            title = document.getElementById("class_name").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('class_slug').value = slug;
        }

        $(function() {
            $(document).ready(ckeditor);
            $(document).on('change', '.class_image', preview_image);
            $(document).on('change', '.class_name', create_slug);
        })
    </script>

@endsection
