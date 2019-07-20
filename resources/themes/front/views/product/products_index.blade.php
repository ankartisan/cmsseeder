@extends('master')
@section('content')
    <!-- Title Section -->
    <div class="bg-light">
        <div class="container py-5">
            <div class="row align-items-sm-center">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <h1 class="h4 mb-0">Products grid</h1>
                </div>

                <div class="col-sm-6">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter justify-content-sm-end mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Grid</li>
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
                <form>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="h6 mb-3">Price</h4>

                        <!-- Range Slider -->
                        <input class="js-range-slider" type="text"
                               data-extra-classes="u-range-slider u-range-slider-indicator u-range-slider-grid"
                               data-type="double"
                               data-grid="true"
                               data-hide-from-to="false"
                               data-prefix="$"
                               data-min="0"
                               data-max="500"
                               data-from="25"
                               data-to="475"
                               data-result-min="#rangeSliderExample3MinResult"
                               data-result-max="#rangeSliderExample3MaxResult">
                        <div class="d-flex justify-content-between mt-4">
                            <input type="text" class="form-control form-control-sm max-width-10" id="rangeSliderExample3MinResult">
                            <input type="text" class="form-control form-control-sm max-width-10 mt-0" id="rangeSliderExample3MaxResult">
                        </div>
                        <!-- End Range Slider -->
                    </div>

                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="h6 mb-3">Gender</h4>

                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="genderMen" checked>
                                <label class="custom-control-label text-lh-md" for="genderMen">Men</label>
                            </div>
                            <small>73</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="genderWomen" checked>
                                <label class="custom-control-label text-lh-md" for="genderWomen">Women</label>
                            </div>
                            <small>51</small>
                        </div>
                        <!-- End Checkboxes -->
                    </div>

                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="h6 mb-3">Brand</h4>

                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brandAdidas">
                                <label class="custom-control-label" for="brandAdidas">Adidas</label>
                            </div>
                            <small>16</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brandNewBalance">
                                <label class="custom-control-label" for="brandNewBalance">New Balance</label>
                            </div>
                            <small>8</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brandNike">
                                <label class="custom-control-label" for="brandNike">Nike</label>
                            </div>
                            <small>35</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brandFredPerry">
                                <label class="custom-control-label" for="brandFredPerry">Fred Perry</label>
                            </div>
                            <small>5</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brandTnf">
                                <label class="custom-control-label" for="brandTnf">The North Face</label>
                            </div>
                            <small>1</small>
                        </div>
                        <!-- End Checkboxes -->

                        <!-- View More - Collapse -->
                        <div class="collapse" id="collapseBrand">
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="brandGucci">
                                    <label class="custom-control-label" for="brandGucci">Gucci</label>
                                </div>
                                <small>5</small>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="brandMango">
                                    <label class="custom-control-label" for="brandMango">Mango</label>
                                </div>
                                <small>1</small>
                            </div>
                        </div>
                        <!-- End View More - Collapse -->

                        <!-- Link -->
                        <a class="link link-collapse small font-size-1" data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false" aria-controls="collapseBrand">
                            <span class="link-collapse__default">View more</span>
                            <span class="link-collapse__active">View less</span>
                            <span class="link__icon ml-1">
                  <span class="link__icon-inner">+</span>
                </span>
                        </a>
                        <!-- End Link -->
                    </div>

                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="h6 mb-3">Size</h4>

                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sizeS" checked>
                                <label class="custom-control-label" for="sizeS">S</label>
                            </div>
                            <small>27</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sizeM">
                                <label class="custom-control-label" for="sizeM">M</label>
                            </div>
                            <small>18</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sizeL" checked>
                                <label class="custom-control-label" for="sizeL">L</label>
                            </div>
                            <small>0</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sizeXL">
                                <label class="custom-control-label" for="sizeXL">XL</label>
                            </div>
                            <small>1</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sizeXXL">
                                <label class="custom-control-label" for="sizeXXL">XXL</label>
                            </div>
                            <small>2</small>
                        </div>
                        <!-- End Checkboxes -->
                    </div>

                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="h6 mb-3">Category</h4>

                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="categoryTshirt" checked>
                                <label class="custom-control-label text-lh-md" for="categoryTshirt">T-shirt</label>
                            </div>
                            <small>73</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="categoryShoes">
                                <label class="custom-control-label text-lh-md" for="categoryShoes">Shoes</label>
                            </div>
                            <small>0</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="categoryAccessories" checked>
                                <label class="custom-control-label text-lh-md" for="categoryAccessories">Accessories</label>
                            </div>
                            <small>51</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="categoryTops" checked>
                                <label class="custom-control-label" for="categoryTops">Tops</label>
                            </div>
                            <small>5</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="categoryBottom">
                                <label class="custom-control-label" for="categoryBottom">Bottom</label>
                            </div>
                            <small>11</small>
                        </div>
                        <!-- End Checkboxes -->

                        <!-- View More - Collapse -->
                        <div class="collapse" id="collapseCategory">
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="categoryShorts">
                                    <label class="custom-control-label" for="categoryShorts">Shorts</label>
                                </div>
                                <small>5</small>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="categoryHats">
                                    <label class="custom-control-label" for="categoryHats">Hats</label>
                                </div>
                                <small>3</small>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="categorySocks">
                                    <label class="custom-control-label" for="categorySocks">Socks</label>
                                </div>
                                <small>8</small>
                            </div>
                        </div>
                        <!-- End View More - Collapse -->

                        <!-- Link -->
                        <a class="link link-collapse small font-size-1" data-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false" aria-controls="collapseCategory">
                            <span class="link-collapse__default">View more</span>
                            <span class="link-collapse__active">View less</span>
                            <span class="link__icon ml-1">
                  <span class="link__icon-inner">+</span>
                </span>
                        </a>
                        <!-- End Link -->
                    </div>

                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="h6 mb-3">Rating</h4>

                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rating1">
                                <label class="custom-control-label" for="rating1">
                    <span class="d-block text-warning">
                      <span class="fas fa-star"></span>
                      <span class="far fa-star text-muted"></span>
                      <span class="far fa-star text-muted"></span>
                      <span class="far fa-star text-muted"></span>
                      <span class="far fa-star text-muted"></span>
                    </span>
                                </label>
                            </div>
                            <small>3</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rating2">
                                <label class="custom-control-label" for="rating2">
                    <span class="d-block text-warning">
                      <span class="fas fa-star"></span>
                      <span class="fas fa-star"></span>
                      <span class="far fa-star text-muted"></span>
                      <span class="far fa-star text-muted"></span>
                      <span class="far fa-star text-muted"></span>
                    </span>
                                </label>
                            </div>
                            <small>10</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rating3">
                                <label class="custom-control-label" for="rating3">
                    <span class="d-block text-warning">
                      <span class="fas fa-star"></span>
                      <span class="fas fa-star"></span>
                      <span class="fas fa-star"></span>
                      <span class="far fa-star text-muted"></span>
                      <span class="far fa-star text-muted"></span>
                    </span>
                                </label>
                            </div>
                            <small>34</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rating4">
                                <label class="custom-control-label" for="rating4">
                    <span class="d-block text-warning">
                      <span class="fas fa-star"></span>
                      <span class="fas fa-star"></span>
                      <span class="fas fa-star"></span>
                      <span class="fas fa-star"></span>
                      <span class="far fa-star text-muted"></span>
                    </span>
                                </label>
                            </div>
                            <small>86</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rating5">
                                <label class="custom-control-label" for="rating5">
                    <span class="d-block text-warning">
                      <span class="fas fa-star"></span>
                      <span class="fas fa-star"></span>
                      <span class="fas fa-star"></span>
                      <span class="fas fa-star"></span>
                      <span class="fas fa-star"></span>
                    </span>
                                </label>
                            </div>
                            <small>102</small>
                        </div>
                        <!-- End Checkboxes -->
                    </div>

                    <button type="button" class="btn btn-sm btn-block btn-soft-secondary transition-3d-hover">Clear All</button>
                </form>
            </div>
            <!-- End Filters -->
            <div class="col-lg-9">
                <!-- Sorting -->
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <span class="text-secondary font-size-1 font-weight-normal ml-1">110 products</span>
                    </div>

                    <div class="col-lg-6 align-self-lg-end text-lg-right">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select"
                                        data-size="10"
                                        data-width="fit"
                                        data-style="btn-soft-secondary btn-xs">
                                    <option value="mostRecent" selected>Sort by</option>
                                    <option value="newest">Newest first</option>
                                    <option value="priceHighLow">Price (high - low)</option>
                                    <option value="priceLowHigh">Price (low - high)</option>
                                    <option value="topSellers">Top sellers</option>
                                </select>
                                <!-- End Select -->
                            </li>
                            <li class="list-inline-item">
                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select"
                                        data-width="fit"
                                        data-style="btn-soft-secondary btn-xs">
                                    <option value="alphabeticalOrderSelect1" selected>A-to-Z</option>
                                    <option value="alphabeticalOrderSelect2">Z-to-A</option>
                                </select>
                                <!-- End Select -->
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-xs btn-soft-secondary active" href="products-grid.html">
                                    <span class="fas fa-th-large"></span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-xs btn-soft-secondary" href="products-list.html">
                                    <span class="fas fa-list"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Sorting -->

                <!-- Products -->
                    @include('product/products_list')
                <!-- End Products -->

                <div class="py-3"></div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-between align-items-center">
                        <li class="page-item ml-0">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Prev</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <div class="d-flex align-items-center">
                                <span class="d-none d-sm-inline-block text-secondary">Page:</span>
                                <select class="custom-select custom-select-sm w-auto mx-2">
                                    <option value="quantity1">1</option>
                                    <option value="quantity2">2</option>
                                    <option value="quantity3">3</option>
                                    <option value="quantity4">4</option>
                                    <option value="quantity5">5</option>
                                    <option value="quantity6">6</option>
                                    <option value="quantity7">7</option>
                                    <option value="quantity8">8</option>
                                </select>
                                <span class="d-none d-sm-inline-block text-secondary">of 8</span>
                            </div>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Pagination -->

                <!-- Divider -->
                <div class="d-lg-none">
                    <hr class="my-11">
                </div>
                <!-- End Divider -->
            </div>
        </div>
    </div>
    <!-- End Products & Filters Section -->

    <!-- Subscribe Section -->
    <div class="bg-light">
        <div class="container space-2">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-6">
                    <!-- Title -->
                    <div class="text-center mb-4">
                        <h2 class="h1 font-weight-medium">Stay in the know</h2>
                        <p>Get special offers on the latest developments from Front.</p>
                    </div>
                    <!-- End Title -->

                    <!-- Subscribe Form -->
                    <form class="js-validate js-form-message w-lg-85 mx-lg-auto">
                        <label class="sr-only" for="subscribeSrEmail">Email address</label>
                        <div class="input-group input-group-pill">
                            <input type="email" class="form-control" name="email" id="subscribeSrEmail" placeholder="Email address" aria-label="Email address" aria-describedby="subscribeButton" required
                                   data-msg="Please enter a valid email address.">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary btn-sm-wide" id="subscribeButton">Join</button>
                            </div>
                        </div>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe Section -->

    <!-- Clients Section -->
    <div class="container space-2">
        <div class="row justify-content-between text-center">
            <div class="col-4 col-lg-2 mb-5 mb-lg-0">
                <div class="mx-4">
                    <img class="u-clients" src="/themes/front/assets/svg/clients-logo/hollister.svg" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2 mb-5 mb-lg-0">
                <div class="mx-4">
                    <img class="u-clients" src="/themes/front/assets/svg/clients-logo/levis.svg" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2 mb-5 mb-lg-0">
                <div class="mx-4">
                    <img class="u-clients" src="/themes/front/assets/svg/clients-logo/new-balance.svg" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="mx-4">
                    <img class="u-clients" src="/themes/front/assets/svg/clients-logo/puma.svg" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="mx-4">
                    <img class="u-clients" src="/themes/front/assets/svg/clients-logo/nike.svg" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="mx-4">
                    <img class="u-clients" src="/themes/front/assets/svg/clients-logo/tnf.svg" alt="Image Description">
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients Section -->
@stop