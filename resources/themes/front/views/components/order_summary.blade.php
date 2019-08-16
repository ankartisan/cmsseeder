<div class="border shadow-soft rounded p-5 mb-4">
    <!-- Title -->
    <div class="border-bottom pb-4 mb-4">
        <h2 class="h5 mb-0">Order summary</h2>
    </div>
    <!-- End Title -->
    <div class="border-bottom pb-4 mb-4">
        <div class="media align-items-center mb-3">
            <h3 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Item subtotal ( {{ count($cart->products) }} )</h3>
            <div class="media-body text-right">
                <span class="font-weight-medium">${{ $cart->price }}</span>
            </div>
        </div>

        <div class="media align-items-center mb-3">
            <h4 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Delivery</h4>
            <div class="media-body text-right">
                <span class="font-weight-medium">Free</span>
            </div>
        </div>

    </div>

    <div class="media align-items-center mb-3">
        <h4 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Estimated tax</h4>
        <div class="media-body text-right">
            <span class="font-weight-medium">--</span>
        </div>
    </div>

    <div class="media align-items-center mb-4">
        <h4 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Total</h4>
        <div class="media-body text-right">
            <span class="font-weight-medium">${{ $cart->price }}</span>
        </div>
    </div>

    <a class="btn btn-primary btn-pill transition-3d-hover" href="{{ route('checkout') }}">Checkout</a>
</div>
