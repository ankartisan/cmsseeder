@extends('admin/master_admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                @if($entity->id)
                    <h2>{{ $entity->name }}</h2>
                @else
                    <h2>New Product</h2>
                @endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products') }}">Products</a>
                        </li>
                        <li class="active">
                            <a href="{{ route('admin.product', ['id' => $entity->id]) }}">{{ $entity->name }}</a>
                        </li>
                    </ol>
            </div>
            <div class="m-b-md">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="{{ route('admin.product', ['id' => $entity->id]) }}">Overview</a></li>
                    <li><a href="{{ route('admin.product.variants', ['id' => $entity->id]) }}">Variants</a></li>
                </ul>
            </div>
            <form id="update-product" class="form-horizontal">
                @if($entity->id)
                    <input type="hidden" name="id" value="{{ $entity->id }}" >
                @endif
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group" data-error="title">
                            <label class="col-sm-12 text-muted">Name</label>
                            <div class="col-sm-12">
                                <input type="text" required name="name" class="form-control" value="{{ $entity->name }}" />
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="form-group" data-error="description">
                            <label class="col-sm-12 text-muted">Description</label>
                            <div class="col-sm-12">
                                <textarea name="description" class="form-control" rows="10">{!! $entity->description !!}</textarea>
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="row form-group" data-error="price">
                            <label class="col-sm-12 text-muted">Price</label>
                            <div class="col-sm-3 col-xs-12">
                                <input type="number" required name="price" placeholder="100" class="form-control" value="{{ $entity->price }}" />
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="row form-group" data-error="internal_reference">
                            <label class="col-sm-12 text-muted">Internal reference</label>
                            <div class="col-sm-3 col-xs-12">
                                <input type="number" name="internal_reference" placeholder="" class="form-control" value="{{ $entity->internal_reference }}" />
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-12 text-muted">Flags</label>
                            <div class="col-sm-3 col-xs-12">
                                <input id="featured" type="checkbox" data-include-empty="1" name="featured" @if($entity->featured) checked @endif value="1" />
                                <label for="featured">Featured</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group" data-error="status">
                            <label class="col-sm-12 text-muted">Status</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="status_id">
                                    <option value="{{ \App\Models\Post::STATUS_DRAFT }}"
                                            @if($entity->status_id == \App\Models\Product::STATUS_DRAFT) selected @endif>Draft</option>
                                    <option value="{{ \App\Models\Post::STATUS_PUBLISHED }}"
                                            @if($entity->status_id == \App\Models\Product::STATUS_PUBLISHED) selected @endif>Published</option>
                                </select>
                            </div>
                            <p class="text-danger text-left error-content"></p>
                        </div>
                        <div class="form-group" data-error="category_id">
                            <label class="col-sm-12 text-muted">Category</label>
                             <div class="col-sm-12">
                                <ul class="list-style-none p-l-0">
                                @foreach($categories as $category)
                                    <li>
                                        <input id="category-{{ $category->id }}" value="{{ $category->id }}" @if($entity->hasCategory($category->id)) checked @endif type="checkbox" name="categories[]" />
                                        <label class="font-weight-600" for="category-{{ $category->id }}">{{ $category->name }}</label>
                                        @if($category->subcategories)
                                            <ul class="list-style-none">
                                            @foreach($category->subcategories as $subcategory)
                                                <li><input id="category-{{ $subcategory->id }}" type="checkbox" value="{{ $subcategory->id }}" @if($entity->hasCategory($subcategory->id)) checked @endif name="categories[]" />
                                                    <label class="font-weight-600" for="category-{{ $subcategory->id }}">{{ $subcategory->name }}</label></li>
                                            @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                </ul>
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Images</h2>
                        <div class="form-group">
                            <div class="col-sm-12 assets-container">
                                @include('admin/components/assets_container', ['assets' => $entity->assets])
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <a id="btn-photo-upload" class="btn btn-success" > Upload</a>
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
                            @if($entity->seo())
                                <input type="hidden" name="seo[0].id" value="{{ $entity->seo()->id }}" />
                            @else
                                <input type="hidden" name="seo[0].id" value="new" />
                            @endif
                            <div class="col-xs-12 m-b-md">
                                <input type="text" class="form-control"  value="{{ $entity->seo() ? $entity->seo()->title : '' }}"
                                       placeholder="Title" name="seo[0].title" />
                            </div>
                            <div class="col-xs-12 m-b-md">
                                <textarea class="form-control seo-desc" rows="5" onchange="seoDescWordCount(this)" placeholder="Description" name="seo[0].description">{{ $entity->seo() ? $entity->seo()->description : '' }}</textarea>
                                <p class="help-block text-muted text-right"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        @if($entity->id)
                            <a id="btn-delete-entity" data-entity-id="{{ $entity->id }}" class="pull-left">Delete Product</a>
                            <button type="submit" class="btn btn-primary pull-right">Update Product</button>
                        @else
                            <button type="submit" class="btn btn-primary pull-left">Save Product</button>
                        @endif
                    </div>
                </div>
            </form>
            <form class="hidden" enctype="multipart/form-data">
                <input id="input-photo-upload" data-entity-id="@if($entity->id){{$entity->id}}@else{{ 'new' }}@endif" type="file" name="file"
                       data-entity-type="{{ \App\Models\Product::class }}"/>
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

    </script>
@endsection