@extends('admin/master_admin')

@section('content')
    <div class="row wrapper white-bg page-heading list-page-header">
        <div class="col-lg-8">
            <h2>{{ $entity->name }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('admin.products') }}">Products</a>
                </li>
                <li>
                    <a href="{{ route('admin.product', ['id' => $entity->id]) }}">{{ $entity->name }}</a>
                </li>
                <li class="active">
                    <strong>Variants</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4 pos-rel">

        </div>
    </div>
    <div class="m-b-md">
        <ul class="nav nav-tabs">
            <li><a href="{{ route('admin.product', ['id' => $entity->id]) }}">Overview</a></li>
            <li class="active"><a href="{{ route('admin.product.variants', ['id' => $entity->id]) }}">Variants</a></li>
        </ul>
    </div>

    @if(count($entity->variants))
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        @foreach($entity->attributes as $attribute)
                            <th> {{ $attribute->name }} </th>
                        @endforeach
                        <th> <span class="cursor-pointer sort" data-sort="internal_reference"> Internal Reference </span>  </th>
                        <th> <span class="cursor-pointer sort" data-sort="price"> Price </span> </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($entity->variants as $variant)
                        <tr class="entity-row">
                            <td>{{ $variant->id }}</td>
                            @foreach($entity->attributes as $attribute)
                                <td>
                                    @foreach($variant->options as $option)
                                        @if(!$option->attributeOption) @continue @endif
                                        @if($option->attributeOption->product_attribute_id != $attribute->id) @continue @endif
                                        {{  $option->attributeOption->name }}
                                    @endforeach
                                </td>
                            @endforeach
                            <td>{{ $variant->internal_reference }}</td>
                            <td>{{ $variant->price }}</td>
                            <td class="action">
                                <a href="{{ route('admin.product.variant', ['id' => $variant->id]) }}" class="btn btn-outline btn-sm btn-success">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <hr>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                <h3>Attributes</h3>
            </div>
            <form id="update-product-variants" class="form-horizontal">
                @if($entity->id)
                    <input type="hidden" name="id" value="{{ $entity->id }}" >
                @endif
                <div class="row">
                    <div class="col-sm-9">
                        @if(!count($entity->attributes))
                            <div id="product-variant-0" class="form-group variant-container">
                                <div class="col-sm-4">
                                    <input type="text" required placeholder="Name" name="variants[0].name" class="form-control name" value="" />
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" required placeholder="Options ( ex. separate them with comma )" name="variants[0].options" class="form-control options" value="" />
                                </div>
                                <div class="col-sm-1">
                                </div>
                            </div>
                        @else
                            @foreach($entity->attributes as $key => $attribute)
                                <div id="product-variant-{{ $key }}" class="form-group variant-container">
                                    <input type="hidden" name="variants[{{ $key }}].id" value="{{ $attribute->id }}" />
                                    <div class="col-sm-4">
                                        <input type="text" required placeholder="Name" name="variants[{{ $key }}].name" class="form-control name" value="{{ $attribute->name }}" />
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" required placeholder="Options ( ex. separate them with comma )" name="variants[{{ $key }}].options"
                                               class="form-control options" value="{{ $attribute->options_string }}" />
                                    </div>
                                    <div class="col-sm-1">
                                        <button role="button" type="button" data-index-id="{{$key}}" class="btn btn-warning btn-variant-remove">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="form-group">
                            <div class="col-sm-4">
                                <button role="button" type="button" class="btn btn-success btn-variant-add">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary pull-right">Update Variants</button>
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

@endsection