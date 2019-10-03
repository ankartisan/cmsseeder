@extends('admin/master_admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                <h2>{{ $entity->name }} Variants</h2>
            </div>
            <form id="update-product-variants" class="form-horizontal">
                @if($entity->id)
                    <input type="hidden" name="id" value="{{ $entity->id }}" >
                @endif
                <div class="row">
                    <div class="col-sm-9">
                        <div id="product-variant-0" class="form-group variant-container">
                            <div class="col-sm-4">
                                <input type="text" required placeholder="Name" name="variants[0].name" class="form-control name" value="" />
                            </div>
                            <div class="col-sm-8">
                                <input type="text" required placeholder="Options" name="variants[0].options" class="form-control options" value="" />
                            </div>
                        </div>
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