<table>
    <tbody>
        <tr>
            <td>Number</td>
            <td>#{{ $order->number }}</td>
        </tr>
        <tr>
            <td>Date</td>
            <td>#{{ $order->created_at->toFormattedDateString() }}</td>
        </tr>
        <tr>
            <td>Customer</td>
            <td>
                <span>{{ $order->customer->name }}</span><br>
                <span>{{ $order->customer->email }}</span><br>
                <span>{{ $order->customer->phone }}</span>
            </td>
        </tr>
        @if($order->customer->is_delivery_billing_address)
            <tr>
                <td>Address</td>
                <td>
                    <span>{{ $order->customer->address()->address }} {{ $order->customer->address()->apt }}</span><br>
                    <span>{{ $order->customer->address()->city }} {{ $order->customer->address()->zip }}</span><br>
                    <span>{{ $order->customer->address()->country->name }}</span>
                </td>
            </tr>
        @else
            <tr>
                <td>Billing Address</td>
                <td>
                    <span>{{ $order->customer->billingAddress()->address }} {{ $order->customer->billingAddress()->apt }}</span><br>
                    <span>{{ $order->customer->billingAddress()->city }} {{ $order->customer->billingAddress()->zip }}</span><br>
                    <span>{{ $order->customer->billingAddress()->country->name }}</span>
                </td>
            </tr>
            <tr>
                <td>Delivery Address</td>
                <td>
                    <span>{{ $order->customer->deliveryAddress()->address }} {{ $order->customer->deliveryAddress()->apt }}</span><br>
                    <span>{{ $order->customer->deliveryAddress()->city }} {{ $order->customer->deliveryAddress()->zip }}</span><br>
                    <span>{{ $order->customer->deliveryAddress()->country->name }}</span>
                </td>
            </tr>
        @endif
        <tr>
            <td colspan="2">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Variants</th>
                        <th>Reference</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->cart->products as $key => $cartProduct)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $cartProduct->product->name }}</td>
                            <td>
                                @if($cartProduct->productVariant)
                                    @foreach($cartProduct->productVariant->options as $option)
                                        <span>{{ $option->attributeOption->productAttribute->name  }} : {{ $option->attributeOption->name }}</span><br>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $cartProduct->internal_reference }}</td>
                            <td>{{ $cartProduct->quantity }}</td>
                            <td>{{ format_price($cartProduct->total_price) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>Total</td>
            <td>{{ format_price($order->price) }}</td>
        </tr>
    </tbody>
</table>


