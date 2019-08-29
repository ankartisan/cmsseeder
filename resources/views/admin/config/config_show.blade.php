@extends('admin/master_admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                @if($entity->id)
                    <h2>Config #{{ $entity->id }}
                    </h2>
                @else
                    <h2>New Config</h2>
                @endif
            </div>
            <form id="update-config" class="form-horizontal">
                @if($entity->id)
                    <input type="hidden" name="id" value="{{ $entity->id }}" >
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" data-error="name">
                            <label class="col-sm-12 text-muted">Name</label>
                            <div class="col-sm-12">
                                @if($entity->id)
                                    <input type="text" readonly class="form-control" value="{{ $entity->name }}" />
                                @else
                                    <input type="text" required name="name" class="form-control" value="{{ $entity->name }}" />
                                @endif
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="form-group" data-error="value">
                            <label class="col-sm-12 text-muted">Value</label>
                            <div class="col-sm-12">
                                <input type="text" required name="value" class="form-control" value="{{ $entity->value }}" />
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        @if($entity->id)
                            @if($entity->deletable)
                                <a id="btn-delete-entity" data-entity-id="{{ $entity->id }}" class="pull-left">Delete</a>
                            @endif
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        @else
                            <button type="submit" class="btn btn-primary pull-left">Save</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('extrajavascript')

@endsection