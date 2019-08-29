@extends('master')
@section('content')
    <!-- Title Section -->
    <div class="bg-light">
        <div class="container py-5">
            <div class="row align-items-sm-center">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <h1 class="h4 mb-0">Shop</h1>
                </div>

                <div class="col-sm-6">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter justify-content-sm-end mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('products') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Title Section -->

    <!-- Products & Filters Section -->
    <div class="container space-2 space-bottom-lg-3">
        <div class="row">
            <!-- Filters -->
            <div class="col-lg-3">
                <form id="product-search-form">
                    <input type="hidden" name="page" />
                    <input type="hidden" name="sort" />
                    <input type="hidden" name="order" />
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="h6 mb-3">Search</h4>
                        <input type="text" name="search" value="{{ app('request')->input('search') }}" class="form-control form-control-sm" placeholder="Product name"/>
                    </div>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="h6 mb-3">Price</h4>

                        <!-- Range Slider -->
                        <input class="js-range-slider" type="text"
                               data-extra-classes="u-range-slider u-range-slider-indicator u-range-slider-grid"
                               data-type="double"
                               data-grid="true"
                               data-hide-from-to="false"
                               data-prefix=""
                               data-min="0"
                               data-max="500"
                               data-from="{{ app('request')->has('price_from') ? app('request')->get('price_from') : 0 }}"
                               data-to="{{ app('request')->has('price_to') ? app('request')->get('price_to') : 500 }}"
                               data-result-min="#rangeSliderMinResult"
                               data-result-max="#rangeSliderMaxResult"
                               data-submit-on-change="1">
                        <div class="d-flex justify-content-between mt-4">
                            <input type="text" name="price_from" data-submit-on-change="1" class="form-control form-control-sm max-width-10" id="rangeSliderMinResult">
                            <input type="text" name="price_to" data-submit-on-change="1" class="form-control form-control-sm max-width-10 mt-0" id="rangeSliderMaxResult">
                        </div>
                        <!-- End Range Slider -->
                    </div>

                    <div class="pb-4 mb-4">
                        <h4 class="h6 mb-3">Category</h4>

                        <!-- Checkboxes -->
                        @foreach($categories as $category)
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" @if(in_array($category->id, explode(',',app('request')->input('categories')))) checked @endif
                                    value="{{ $category->id }}" class="custom-control-input" name="categories[]" data-submit-on-change="1" id="category-{{ $category->id }}">
                                    <label class="custom-control-label text-lh-md" for="category-{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                                <small></small>
                            </div>
                            @foreach($category->subcategories as $subcategory)
                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                                    <div class="custom-control custom-checkbox ml-3">
                                        <input type="checkbox" @if(in_array($subcategory->id, explode(',',app('request')->input('categories')))) checked @endif
                                        value="{{ $subcategory->id }}" class="custom-control-input" name="categories[]" data-submit-on-change="1" id="category-{{ $subcategory->id }}">
                                        <label class="custom-control-label text-lh-md" for="category-{{ $subcategory->id }}">{{ $subcategory->name }}</label>
                                    </div>
                                    <small></small>
                                </div>
                            @endforeach
                        @endforeach
                        <!-- End Checkboxes -->
                    </div>
                </form>
            </div>
            <!-- End Filters -->
            <div class="col-lg-9 list-container">
                    <!-- Products -->
                    @include('product/products_list')
                    <!-- End Products -->
            </div>
        </div>
    </div>
    <!-- End Products & Filters Section -->

@stop