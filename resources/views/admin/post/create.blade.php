@extends('admin.layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
        @endif

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @if ($Isposts)
            <h1 class="h3 mb-0 text-gray-800">Edit Post</h1>
            @else
            <h1 class="h3 mb-0 text-gray-800">Add Post</h1>
            @endif

        </div>

        @if ($Isposts)
            <form method="POST" action="{{ route('post.update', $post->id) }}">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupTitleInput">Title <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="title" required id="formGroupTitleInput" value="{{ $post->title }}" placeholder="Example input">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Category <span style="color: red">*</span></label>
                            <select class="form-control" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"  {{ isset($post->category_id) ? ($category->id == $post->category_id) ? 'selected' : null : null}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="formGroupDateInput">Date Time</label>
                            <input type="datetime-local" class="form-control" name="date" value="{{date('Y-m-d\TH:i', strtotime( $post->date )) }}" required id="formGroupDateInput">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupSubTitleInput">Sub Title <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="sub_title" value="{{ $post->sub_title }}" id="formGroupSubTitleInput" placeholder="Sub Title" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="formMedia">Media Type</label>
                        <div class="form-group">
                            @if (strpos($post->image, 'postimage') !== false)
                            <label for="mediaImage"><input id="mediaImage" type="radio" name="media" value="image" checked> Upload Image</label>
                            <label for="mediaVideo"><input id="mediaVideo" type="radio" name="media" value="video"> Upload Video</label>
                            @else
                            <label for="mediaImage"><input id="mediaImage" type="radio" name="media" value="image" > Upload Image</label>
                            <label for="mediaVideo"><input id="mediaVideo" type="radio" name="media" value="video" checked> Upload Video</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 mediaImage">
                        <div class="form-group">
                            <input type="file" class="form-control imageUpload" accept=".png, .jpg, .jpeg"  id="formGroupFileInput">
                            <input type="hidden" name="imageUpload" id="base64image">
                        </div>
                    </div>
                    <div class="col-md-12 mediaVideo d-none">
                        <div class="form-group">

                            <input class="form-control" name="videoUpload" placeholder="Please provide youtube video id" @if (strpos($post->image, 'postimage') === false) value="{{$post->image}}" required  @endif id="formGroupFileInput">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="formGroupDescription" >Description <span style="color: red">*</span></label>
                    <textarea class="form-control" name="description" id="formGroupDescription" rows="3" cols="150" required>{{ $post->description }}</textarea>
                </div>

                <label for="formGroupfeaturedInput" class="float-left"><input type="checkbox" name="featured" {{ ($post->featured == 1) ? 'checked' : '' }} id="formGroupfeaturedInput"> Featured Post </label>
                <button type="submit" class="btn btn-warning btn-sm float-right">Update</button>
            </form>
        @else
            <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupTitleInput">Title <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="title" required id="formGroupTitleInput" placeholder="Example input">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Category <span style="color: red">*</span></label>
                            <select class="form-control" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="formGroupDateInput">Date Time</label>
                            <input type="datetime-local" class="form-control" name="date" required id="formGroupDateInput">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupSubTitleInput">Sub Title <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="sub_title" id="formGroupSubTitleInput" placeholder="Sub Title" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="formMedia">Media Type</label>
                        <div class="form-group">
                            <label for="mediaImage"><input id="mediaImage" type="radio" name="media" value="image" checked> Upload Image</label>
                            <label for="mediaVideo"><input id="mediaVideo" type="radio" name="media" value="video"> Upload Video</label>
                        </div>
                    </div>
                    <div class="col-md-12 mediaImage">
                        <div class="form-group">
                            <input type="file" class="form-control imageUpload" accept=".png, .jpg, .jpeg"  id="formGroupFileInput">
                            <input type="hidden" name="imageUpload" id="base64image">
                        </div>
                    </div>
                    <div class="col-md-12 mediaVideo d-none">
                        <div class="form-group">
                            <input class="form-control" name="videoUpload" placeholder="Please provide youtube video id" id="formGroupFileInput">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="formGroupDescription" >Description <span style="color: red">*</span></label>
                    <textarea class="form-control" name="description" id="formGroupDescription" rows="3" cols="150" required></textarea>
                </div>

                <label for="formGroupfeaturedInput" class="float-left"><input type="checkbox" name="featured" id="formGroupfeaturedInput"> Featured Post </label>

                <button type="submit" class="btn btn-warning btn-sm float-right">Submit</button>
            </form>
        @endif
        <div class="modal fade bd-example-modal-lg imagecrop" id="model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-11">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary crop" id="crop">Crop</button>
                  </div>
              </div>
            </div>
          </div>
        </div>
    <!-- /.container-fluid -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

    <script>
        $(document).ready(function(){
            var $modal = $('.imagecrop');
            var image = document.getElementById('image');
            var cropper;
            $(".imageUpload").on("change", function(e){
                var files = e.target.files;
                var done = function(url) {
                    image.src = url;
                    $('.imagecrop').modal('show');
                };
                var reader;
                var file;
                var url;
                if (files && files.length > 0) {
                    file = files[0];
                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function(e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });
            $('.imagecrop').on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 1,
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });
            $("body").on("click", "#crop", function() {
                canvas = cropper.getCroppedCanvas({
                    width: 160,
                    height: 160,
                });
                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;
                        $('#base64image').val(base64data);
                        //  document.getElementById('imagePreview').style.backgroundImage = "url("+base64data+")";
                        $('.imagecrop').modal('hide');
                    }
                });
            })
        });
        $('input[name="media"]').on('click',function(){
            if($(this).val()=='image'){
                $('.mediaImage').removeClass('d-none');
                $('input[name="imageUpload"]').prop('required',true);
                $('.mediaVideo').addClass('d-none');
                $('textarea[name="videoUpload"]').prop('required',false);
            }else{
                $('.mediaImage').addClass('d-none');
                $('input[name="imageUpload"]').prop('required',false);
                $('.mediaVideo').removeClass('d-none');
                $('textarea[name="videoUpload"]').prop('required',true);
            }
        });
    </script>

@endsection
