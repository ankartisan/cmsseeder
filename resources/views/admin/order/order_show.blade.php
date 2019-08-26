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
                        <div class="form-group">
                            <label class="col-sm-2">Order Number</label>
                            <div class="col-sm-3" >
                                <span>{{ $entity->number }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Date</label>
                            <div class="col-sm-3" >
                                <span>{{ $entity->created_at->toFormattedDateString() }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Customer</label>
                            <div class="col-sm-3" >
                                <span>{{ $entity->customer->name }}</span><br>
                                <span>{{ $entity->customer->email }}</span><br>
                                <span>{{ $entity->customer->phone }}</span>
                            </div>
                        </div>
                        @if($entity->customer->is_delivery_billing_address)
                            <div class="form-group">
                                <label class="col-sm-2">Billing & Delivery Address</label>
                                <div class="col-sm-3" >
                                    <span>{{ $entity->customer->address()->address }} {{ $entity->customer->address()->apt }}</span><br>
                                    <span>{{ $entity->customer->address()->city }} {{ $entity->customer->address()->zip }}</span><br>
                                    <span>{{ $entity->customer->address()->country->name }}</span>
                                </div>
                            </div>
                        @else
                            @if($entity->customer->billingAddress())
                            <div class="form-group">
                                <label class="col-sm-2">Billing Address</label>
                                <div class="col-sm-3" >
                                    <span>{{ $entity->customer->billingAddress()->address }} {{ $entity->customer->billingAddress()->apt }}</span><br>
                                    <span>{{ $entity->customer->billingAddress()->city }} {{ $entity->customer->billingAddress()->zip }}</span><br>
                                    <span>{{ $entity->customer->billingAddress()->country->name }}</span>
                                </div>
                            </div>
                            @endif
                            @if($entity->customer->deliveryAddress())
                            <div class="form-group">
                                <label class="col-sm-2">Delivery Address</label>
                                <div class="col-sm-3" >
                                    <span>{{ $entity->customer->deliveryAddress()->address }} {{ $entity->customer->deliveryAddress()->apt }}</span><br>
                                    <span>{{ $entity->customer->deliveryAddress()->city }} {{ $entity->customer->deliveryAddress()->zip }}</span><br>
                                    <span>{{ $entity->customer->deliveryAddress()->country->name }}</span>
                                </div>
                            </div>
                            @endif
                        @endif
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2">Summary</label>
                            <div class="col-sm-6" >
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($entity->cart->products as $key => $cartProduct)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $cartProduct->product->name }}</td>
                                        <td>{{ $cartProduct->quantity }}</td>
                                        <td>${{ $cartProduct->total_price }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Total</label>
                            <div class="col-sm-3" >
                                <span>${{ $entity->price }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group" data-error="status">
                            <label class="col-sm-2 text-muted">Status</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="status_id">
                                    <option value="{{ \App\Models\Order::STATUS_CREATED }}"
                                            @if($entity->status_id == \App\Models\Order::STATUS_CREATED) selected @endif>Created</option>
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