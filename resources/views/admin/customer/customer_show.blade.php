@extends('admin/master_admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md">
                @if($entity->id)
                    <h2>Customer #{{ $entity->id }}</h2>
                @else
                    <h2>New Customer</h2>
                @endif
            </div>
            <form id="update-customer" class="form-horizontal">
                <div class="row">
                    <div class="col-sm-9">
                        @if($entity->id)
                            <div class="form-group">
                                <label class="col-sm-2">ID</label>
                                <div class="col-sm-10">
                                    <p class="">{{ $entity->id }}</p>
                                    <input type="hidden" name="id" value="{{ $entity->id }}" >
                                </div>
                            </div>
                        @endif
                        @if($entity->id)
                            <div class="form-group">
                                <label class="col-sm-2">Created</label>
                                <div class="col-sm-8">
                                    <p class="">{{ $entity->created_at->toFormattedDateString() }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="col-sm-6" data-error="first_name">
                                <label>First name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="First name" required value="{{ $entity->first_name }}" />
                                <p class="text-danger text-left error-content"></p>
                            </div>
                            <div class="col-sm-6" data-error="last_name">
                                <label>Last name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last name" required value="{{ $entity->last_name }}" />
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        <div class="form-group" data-error="email">
                            <label class="col-sm-12">Email</label>
                            <div class="col-sm-6">
                                <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ $entity->email }}" />
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                        @if(!$entity->id)
                            <div class="form-group" data-error="password">
                                <label class="col-sm-12">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" required  name="password" placeholder="Choose a Password">
                                    <p class="text-danger text-left error-content"></p>
                                </div>
                            </div>
                            <div class="form-group" data-error="password_confirm">
                                <label class="col-sm-12">Password repeat</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" required  name="password_confirm" placeholder="Repeat Password">
                                    <p class="text-danger text-left error-content"></p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-9">
                        @if($entity->id)
                            <a id="btn-delete-entity" data-entity-id="{{ $entity->id }}" class=" pull-left">Delete Customer</a>
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        @else
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
