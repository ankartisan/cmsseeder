@extends('admin/master_admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                @if($entity->id)
                    <h2>{{ $entity->product->name }} | {{ $entity->variants }}</h2>
                @endif
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products') }}">Products</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product', ['id' => $entity->product->id]) }}">{{ $entity->product->name }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product.variants', ['id' => $entity->product->id]) }}">Variants</a>
                    </li>
                    <li class="active">
                        <strong>{{ $entity->id }}</strong>
                    </li>
                </ol>
            </div>
            <div class="m-b-md">
                <ul class="nav nav-tabs">
                    <li ><a href="{{ route('admin.product', ['id' => $entity->product->id]) }}">Overview</a></li>
                    <li class="active"><a href="{{ route('admin.product.variants', ['id' => $entity->product->id]) }}">Variants</a></li>
                </ul>
            </div>
            <form id="update-variant" class="form-horizontal">
                @if($entity->id)
                    <input type="hidden" name="id" value="{{ $entity->id }}" >
                @endif
                <div class="row">
                    <div class="col-sm-9">
                        @foreach($entity->product->attributes as $attribute)
                            <div class="row form-group">
                                <label class="col-sm-12 text-muted">{{ $attribute->name }}</label>
                                <div class="col-sm-3 col-xs-12">
                                    @foreach($entity->options as $option)
                                        @if(!$option->attributeOption) @continue @endif
                                        @if($option->attributeOption->product_attribute_id != $attribute->id) @continue @endif
                                        <input type="text" readonly class="form-control" value="{{  $option->attributeOption->name }}" />
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

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
                    </div>
                    <div class="col-sm-3">

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
                            <a id="btn-delete-entity" data-entity-id="{{ $entity->id }}" data-parent-id="{{$entity->product->id}}" class="pull-left">Delete Variant</a>
                            <button type="submit" class="btn btn-primary pull-right">Update Variant</button>
                        @else
                            <button type="submit" class="btn btn-primary pull-left">Save Variant</button>
                        @endif
                    </div>
                </div>
            </form>
            <form class="hidden" enctype="multipart/form-data">
                <input id="input-photo-upload" data-entity-id="{{$entity->id}}" type="file" name="file"
                       data-entity-type="{{ \App\Models\ProductVariant::class }}"/>
            </form>
        </div>
    </div>
@stop
@section('extrajavascript')

@endsection