@extends('admin/master_admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                @if($entity->id)
                    <h2>Asset #{{ $entity->id }}
                        {{--<a class="pull-right" href="{{ route('post',['slug'=>$post->slug]) }}">Preview</a>--}}
                    </h2>
                @else
                    <h2>New File</h2>
                @endif
            </div>
            <form id="update-asset" class="form-horizontal">
                @if($entity->id)
                    <input type="hidden" name="id" value="{{ $entity->id }}" >
                @endif
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group" data-error="name">
                            <label class="col-sm-12 text-muted">Name</label>
                            <div class="col-sm-12">
                                <input type="text" required name="title" class="form-control" value="{{ $entity->name }}" />
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
                            <a id="btn-delete-post" data-entity-id="{{ $entity->id }}" class="pull-left">Delete File</a>
                            {{--<button type="submit" class="btn btn-primary pull-right">Update</button>--}}
                        @else
                            {{--<button type="submit" class="btn btn-primary pull-left">Save</button>--}}
                        @endif
                    </div>
                </div>
            </form>
            <form class="hidden" enctype="multipart/form-data">
                <input id="input-photo-upload" data-entity-id="@if($entity->id){{$entity->id}}@else{{ 'new' }}@endif" type="file" name="file" />
            </form>
        </div>
    </div>
@stop
@section('extrajavascript')

@endsection