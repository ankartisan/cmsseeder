@extends('admin/master_admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                @if($entity->id)
                    <h2>Category #{{ $entity->id }}
                    </h2>
                @else
                    <h2>New Category</h2>
                @endif
            </div>
            <form id="update-category" class="form-horizontal">
                @if($entity->id)
                    <input type="hidden" name="id" value="{{ $entity->id }}" >
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" data-error="name">
                            <label class="col-sm-12 text-muted">Name</label>
                            <div class="col-sm-12">
                                <input type="text" required name="name" class="form-control" value="{{ $entity->name }}" />
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="form-group" data-error="slug">
                            <label class="col-sm-12 text-muted">Slug</label>
                            <div class="col-sm-12">
                                <input type="text" required name="slug" class="form-control" value="{{ $entity->slug }}" />
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
                        <div class="form-group" data-error="parent_id">
                            <label class="col-sm-12 text-muted">Parent</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="parent_id">
                                    <option value="" >Select Category</option>
                                    @foreach($categories as $category)
                                        @if($entity->id and $entity->id == $category->id) @continue @endif
                                         <option value="{{ $category->id }}"
                                                    @if($entity->parent_id == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="form-group" data-error="order">
                            <label class="col-sm-12 text-muted">Order</label>
                            <div class="col-sm-6">
                                <input type="number" name="order" class="form-control" value="{{ $entity->order }}" />
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
                <div class="row">
                    <div class="col-xs-12">
                        @if($entity->id)
                            <a id="btn-delete-entity" data-entity-id="{{ $entity->id }}" class="pull-left">Delete</a>
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        @else
                            <button type="submit" class="btn btn-primary pull-left">Save</button>
                        @endif
                    </div>
                </div>
            </form>
            <form class="hidden" enctype="multipart/form-data">
                <input id="input-photo-upload" data-entity-id="@if($entity->id){{$entity->id}}@else{{ 'new' }}@endif" type="file" name="file"
                       data-entity-type="{{ \App\Models\Category::class }}"/>
            </form>
        </div>
    </div>
@stop
@section('extrajavascript')

@endsection