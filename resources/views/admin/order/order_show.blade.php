@extends('admin/master_admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                @if($entity->id)
                    <h2>Order #{{ $entity->id }}</h2>
                @endif
            </div>
            <form id="update-order" class="form-horizontal">
                @if($entity->id)
                    <input type="hidden" name="id" value="{{ $entity->id }}" >
                @endif
                <div class="row">
                    <div class="col-sm-9">

                    </div>
                    <div class="col-sm-3">
                        <div class="form-group" data-error="status">
                            <label class="col-sm-12 text-muted">Status</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="status_id">
                                    <option value="{{ \App\Models\Order::STATUS_CREATED }}"
                                            @if($entity->status_id == \App\Models\Order::STATUS_CREATED) selected @endif>Draft</option>
                                </select>
                            </div>
                            <p class="text-danger text-left error-content"></p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        @if($entity->id)
                            <a id="btn-delete-entity" data-entity-id="{{ $entity->id }}" class="pull-left">Delete Order</a>
                            <button type="submit" class="btn btn-primary pull-right">Update Order</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('extrajavascript')
@endsection