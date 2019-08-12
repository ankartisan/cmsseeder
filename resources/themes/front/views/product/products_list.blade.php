<div class="row mx-n2 mb-2">
    @foreach($products as $product)
        <div class="col-6 col-lg-4 px-2 mb-3">
            <!-- Product -->
            <div class="card text-center h-100">
                <div class="position-relative">
                    <img class="card-img-top" src="/themes/front/assets/img/300x180/img3.jpg" alt="Image Description">

                    <div class="position-absolute top-0 left-0 pt-3 pl-3">
                        <span class="badge badge-success badge-pill">New arrival</span>
                    </div>
                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                        <button type="button" class="btn btn-sm btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                            <span class="fas fa-heart btn-icon__inner"></span>
                        </button>
                    </div>
                </div>

                <div class="card-body pt-4 px-4 pb-0">
                    <div class="mb-2">
                        <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#">Category</a>
                        <h3 class="font-size-1 font-weight-normal">
                            <a class="text-secondary" href="single-product.html">{{ $product->description }}</a>
                        </h3>
                        <div class="d-block font-size-1">
                            <span class="font-weight-medium">${{ $product->price }}</span>
                        </div>
                    </div>
                </div>

                <div class="card-footer border-0 pt-0 pb-4 px-4">
                    <button type="button" data-product-id="{{ $product->id }}" class="btn btn-sm btn-outline-primary btn-sm-wide btn-pill transition-3d-hover btn-product-add">Add to Cart</button>
                </div>
            </div>
            <!-- End Product -->
        </div>
    @endforeach
</div>