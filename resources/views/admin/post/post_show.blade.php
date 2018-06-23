@extends('admin/master_admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                @if($post->id)
                    <h2>Post #{{ $post->id }}
                        {{--<a class="pull-right" href="{{ route('post',['slug'=>$post->slug]) }}">Preview</a>--}}
                    </h2>
                @else
                    <h2>New Post</h2>
                @endif
            </div>
            <form id="update-post" class="form-horizontal">
                @if($post->id)
                    <input type="hidden" name="id" value="{{ $post->id }}" >
                @endif
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group" data-error="title">
                            <label class="col-sm-12 text-muted">Title</label>
                            <div class="col-sm-12">
                                <input type="text" required name="title" class="form-control" value="{{ $post->title }}" />
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="form-group" data-error="content">
                            <label class="col-sm-12 text-muted">Slug</label>
                            <div class="col-sm-12">
                                <input type="text" name="slug" required class="form-control" value="{{ $post->slug }}" />
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="form-group" data-error="content">
                            <div class="col-sm-12">
                                <textarea name="content" class="content">{!! $post->content !!}</textarea>
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="form-group" data-error="summary">
                            <label class="col-sm-12 text-muted">Summary</label>
                            <div class="col-sm-12">
                                <textarea name="summary" rows="5" required class="form-control">{{ $post->summary }}</textarea>
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group" data-error="status">
                            <label class="col-sm-12 text-muted">Status</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="status_id">
                                    <option value="{{ \App\Models\Post::STATUS_DRAFT }}"
                                            @if($post->status_id == \App\Models\Post::STATUS_DRAFT) selected @endif>Draft</option>
                                    <option value="{{ \App\Models\Post::STATUS_PUBLISHED }}"
                                            @if($post->status_id == \App\Models\Post::STATUS_PUBLISHED) selected @endif>Published</option>
                                </select>
                            </div>
                            <p class="text-danger text-left error-content"></p>
                        </div>
                        <div class="form-group" data-error="published_at">
                            <label class="col-sm-12 text-muted">Published Date</label>
                            <div class="col-sm-12">
                                <input id="datepicker" class="form-control" value="{{ $post->published_at ? $post->published_at->format("Y-m-d") : '' }}" name="published_at" type="text">
                            </div>
                            <p class="text-danger text-left error-content"></p>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 text-muted">Author</label>
                            <div class="col-sm-12">
                                <select id="select-user" class="form-control" name="user_id">
                                    <option value=""></option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if($post->user_id == $user->id) selected @endif>{{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" data-error="category_id">
                            <label class="col-sm-12 text-muted">Category</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="category_id">
                                    <option value="">Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if($post->category_id == $category->id ) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 text-muted">Featured Image</label>
                            <div class="col-sm-10 animated fadeInRight">
                                <div class="row m-b-md">
                                    <div class="col-xs-12">
                                        @if($post->id)
                                            <a id="btn-photo-upload" class="btn btn-success" > Upload Photo</a>
                                        @else
                                            <a  class="btn btn-success" disabled="" > Upload Photo</a><br>
                                            <small class="text-warning">Save post to upload photos</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 post-image">
                                        @if($post->image)
                                            @include('admin/components/post_featured_image',['file' => $post->image])
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="form-group">
                    <div class="col-sm-9">
                        <h2>SEO</h2>
                        <div class="row">
                            @if($post->seo())
                                <input type="hidden" name="seo[0].id" value="{{ $post->seo()->id }}" />
                            @else
                                <input type="hidden" name="seo[0].id" value="new" />
                            @endif
                            <div class="col-xs-12 m-b-md">
                                <input type="text" class="form-control"  value="{{ $post->seo() ? $post->seo()->title : '' }}"
                                       placeholder="Title" name="seo[0].title" />
                            </div>
                            <div class="col-xs-12 m-b-md">
                                <textarea class="form-control seo-desc" rows="5" onchange="seoDescWordCount(this)" placeholder="Description" name="seo[0].description">{{ $post->seo() ? $post->seo()->description : '' }}</textarea>
                                <p class="help-block text-muted text-right"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        @if($post->id)
                            <a id="btn-delete-post" data-post-id="{{ $post->id }}" class="pull-left">Delete Post</a>
                            <button type="submit" class="btn btn-primary pull-right">Update Post</button>
                        @else
                            <button type="submit" class="btn btn-primary pull-left">Save Post</button>
                        @endif
                    </div>
                </div>
            </form>
            <form class="hidden" enctype="multipart/form-data">
                <input id="input-photo-upload" data-entity-id="@if($post->id){{$post->id}}@else{{ 'new' }}@endif" type="file" name="file" />
            </form>
        </div>
    </div>
@stop
@section('extrajavascript')
    <script>
        function seoDescWordCount(elem) {
            var value = $(elem).val();
            $(elem).next("p").html(value.length+" / 160");
        }

        $(".seo-desc").trigger("change");

        $(document).ready(function() {

            tinymce.init({
                selector: ".content",
                height: 450,
                plugins: [
                    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
                ],
                toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
                toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
                toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | visualchars visualblocks nonbreaking template pagebreak restoredraft",
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css'],
                menubar: false,
                toolbar_items_size: 'small',
                relative_urls : false,
                image_caption: true,
                image_advtab: true,
                style_formats: [{
                    title: 'Bold text',
                    inline: 'b'
                }, {
                    title: 'Red text',
                    inline: 'span',
                    styles: {
                        color: '#ff0000'
                    }
                }, {
                    title: 'Red header',
                    block: 'h1',
                    styles: {
                        color: '#ff0000'
                    }
                }, {
                    title: 'Example 1',
                    inline: 'span',
                    classes: 'example1'
                }, {
                    title: 'Example 2',
                    inline: 'span',
                    classes: 'example2'
                }, {
                    title: 'Table styles'
                }, {
                    title: 'Table row 1',
                    selector: 'tr',
                    classes: 'tablerow1'
                }],

                templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                }, {
                    title: 'Test template 2',
                    content: 'Test 2'
                }],

                init_instance_callback: function () {
                    window.setTimeout(function() {
                        $("#div").show();
                    }, 1000);
                },
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                },
                images_upload_handler: function (blobInfo, success, failure) {
                    var formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    var config = {
                        headers: {
                            'content-type': 'multipart/form-data'
                        }
                    };

                    $("#loader").removeClass("hidden");

                    window.axios.post(window.base_api + '/assets/upload', formData, config).then(response => {
                        $("#loader").addClass("hidden");
                        success(response.data.data);
                    }).catch(function (error) {

                        $("#loader").addClass("hidden");
                        console.log(error);
                        failure('Error');
                        return;
                    });
                }
            });

            $('#datepicker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });


        });



    </script>
@endsection