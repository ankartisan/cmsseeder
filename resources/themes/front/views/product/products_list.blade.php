<!-- Sorting -->
<div class="row align-items-center mb-5">
    <div class="col-lg-6 mb-3 mb-lg-0">
        <span class="text-secondary font-size-1 font-weight-normal ml-1">{{ $products->total() }} products</span>
    </div>

    <div class="col-lg-6 align-self-lg-end text-lg-right">
        <ul class="list-inline mb-0">
            <li class="list-inline-item">
                <!-- Select -->
                <select class="js-select selectpicker dropdown-select product-sort"
                        data-size="10"
                        data-width="fit"
                        data-style="btn-soft-secondary btn-xs">
                    <option value="" selected>Sort by</option>
                    <option value="created_at|desc">Newest first</option>
                    <option value="price|desc">Price (high - low)</option>
                    <option value="price|asc">Price (low - high)</option>
                </select>
                <!-- End Select -->
            </li>
        </ul>
    </div>
</div>
<!-- End Sorting -->
<div class="row mx-n2 mb-2">
    @foreach($products as $product)
        <div class="col-6 col-lg-4 px-2 mb-3">
            <!-- Product -->
            <div class="card text-center h-100">
                <div class="position-relative">
                    <a href="{{ route('product', ['id' => $product->id]) }}" >
                    @if($product->image)
                        <div class="image product-image-container" style="background-image: url('{{ $product->image->url }}')"></div>
                    @else
                        <div class="image product-image-container" style="background-image: url('https://via.placeholder.com/200')"></div>
                    @endif
                    </a>
                    <div class="position-absolute top-0 left-0 pt-3 pl-3"></div>

                    <div class="position-absolute top-0 right-0 pt-3 pr-3"></div>
                </div>

                <div class="card-body pt-4 px-4 pb-0">
                    <div class="mb-2">
                        <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="{{ route('product', ['id' => $product->id]) }}">
                            {{ $product->category ? $product->category->name : "" }}
                        </a>
                        <h3 class="font-size-1 font-weight-normal">
                            <a class="text-secondary" href="{{ route('product', ['id' => $product->id]) }}">{{ $product->description }}</a>
                        </h3>
                        <div class="d-block font-size-1">
                            <span class="font-weight-medium">{{ format_price($product->price) }}</span>
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
<div class="py-3"></div>

{{-- PAGINATION --}}
@if($products->lastPage() > 1)
    <nav aria-label="...">
        <ul class="pagination">
            @if($products->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" data-page="1" href="#" tabindex="-1">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">First</span>
                    </a>
                </li>
            @endif
            @if($products->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" data-page="{{ $products->currentPage() - 1 }}" href="#">
                        <span aria-hidden="true">‹</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif
            @for($i = 1; $i <= $products->lastPage(); $i ++)
                <li class="page-item @if($products->currentPage() == $i) active @endif">
                    <a class="page-link" data-page="{{ $i }}" href>{{ $i }}</a>
                </li>
            @endfor
            @if($products->currentPage() < $products->lastPage())
                <li class="page-item">
                    <a class="page-link" data-page="{{ $products->currentPage() + 1 }}" href="#" aria-label="Next">
                        <span aria-hidden="true">›</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @endif
            <li class="page-item">
                <a class="page-link" data-page="{{ $products->lastPage() }}" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Last</span>
                </a>
            </li>
        </ul>
    </nav>
@endif
<!-- Divider -->
<div class="d-lg-none">
    <hr class="my-11">
</div>
<!-- End Divider -->