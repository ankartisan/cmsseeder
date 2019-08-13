<a id="sidebarNavToggler" class="btn btn-xs btn-icon btn-text-secondary ml-1" href="javascript:;" role="button"
   aria-controls="sidebarContent" aria-haspopup="true" aria-expanded="false"
   data-unfold-event="click"
   data-unfold-hide-on-scroll="false"
   data-unfold-target="#sidebarContent"
   data-unfold-type="css-animation"
   data-unfold-animation-in="fadeInRight"
   data-unfold-animation-out="fadeOutRight"
   data-unfold-duration="500">
    <span class="fas fa-shopping-cart btn-icon__inner"></span>
    @if($cart)
        <span class="badge badge-sm badge-primary badge-pos rounded-circle">{{ $cart->products()->count() }}</span>
    @endif
</a>

<aside id="sidebarContent" class="u-sidebar" aria-labelledby="sidebarNavToggler">
    <div class="u-sidebar__scroller">
        <div class="u-sidebar__container">
            <div class="u-sidebar__cart-footer-offset">
                <!-- Header -->
                <header class="card-header bg-light py-3 px-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="h6 mb-0">Your Shopping Cart</h3>

                        <button type="button" class="close"
                                aria-controls="sidebarContent"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInRight"
                                data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </header>
                <!-- End Header -->

                <div class="js-scrollbar u-sidebar__body">
                    <div class="u-sidebar__content">
                        <!-- Body -->
                        @if($cart)
                            <div class="card-body p-5">
                                @foreach($cart->products as $cartProduct)
                                    <div class="media">
                                        <div class="u-avatar mr-3">
                                            <img class="img-fluid rounded mCS_img_loaded" src="/themes/front/assets/img/100x100/img14.jpg" alt="Image Description">
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="d-block font-weight-semi-bold">{{ $cartProduct->product->name }}</span>
                                                <button type="button" class="close btn-product-remove" aria-label="Close" data-cart-product-id="{{ $cartProduct->id }}">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <span class="d-block font-size-1">{!! $cartProduct->product->description !!}</span>
                                            <span class="d-block text-primary font-weight-semi-bold">${{$cartProduct->product->price}}</span>
                                            <small class="d-block text-muted">Quantity: 1</small>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        @else
                            <div class="card-body p-5 text-center">
                                <span class="btn btn-icon btn-soft-primary rounded-circle mb-3">
                                     <span class="fas fa-shopping-basket btn-icon__inner"></span>
                                </span>
                                <span class="d-block">Your Cart is Empty</span>
                            </div>
                        @endif
                    <!-- End Body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Footer -->
    @if($cart)
    <footer class="u-sidebar__footer u-sidebar__footer--cart">
        <div class="card-footer text-center p-5">
            <div class="mb-3">
                <span class="d-block font-weight-semi-bold">Order Total</span>
                <span class="d-block">${{ $cart->price }}</span>
            </div>
            <div class="mb-2">
                <a class="btn btn-sm btn-soft-primary transition-3d-hover" href="{{ route('cart') }}">Review Bag and Checkout</a>
            </div>
            <p class="small mb-0"><a class="link-muted" href="javascript:;">Continue Shopping</a></p>
        </div>
    </footer>
    @endif
    <!-- End Footer -->
</aside>
<!-- End Account Sidebar Navigation -->

