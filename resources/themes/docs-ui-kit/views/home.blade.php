@extends('master')
@section('content')
    <!-- About -->
    <section class="pb-11">
        <div class="container">
            <div class="w-md-75 mx-auto">
                <h2 class="d-flex align-items-center justify-content-center text-uppercase font-weight-bold small text-space-1 mb-3">
                    <span class="text-dark">Product By</span>
                    <img class="rounded-circle mx-2 mb-1" src="themes/docs-ui-kit/assets/img/hs.png" width="40" alt="Htmlstream">
                    <a class="text-dark" href="https://htmlstream.com">Ankartisan</a>
                </h2>

                <p class="text-center mb-5">Docs UI Kit is beautiful Open Source Bootstrap 4 UI Kit under MIT license. <br> The UI Kit comes with 10 beautiful complete and functional pages  including lots of reusable and customizable UI Blocks. Every component crafted with love to speed up your workflow.</p>

                <!-- Social Networks -->
                <div class="d-flex justify-content-center">
                    <!-- Facebook Like -->
                    <div class="mr-2" style="margin-top: -4px !important;">
                        <div class="fb-like"
                             data-href="http://facebook.com/htmlstream"
                             data-layout="button_count"
                             data-action="like"
                             data-show-faces="false"
                             data-size="small">
                        </div>
                    </div>
                    <!-- End Facebook Like -->

                    <!-- Twitter Follow -->
                    <div class="mr-2">
                        <a href="https://twitter.com/htmlstream" class="twitter-follow-button" data-show-count="true">@htmlstream</a>
                    </div>
                    <!-- End Twitter Follow -->

                    <!-- Github Star -->
                    <div class="d-none d-sm-block mr-2">
                        <iframe src="https://ghbtns.com/github-btn.html?user=htmlstreamofficial&repo=docs-ui-kit&type=star&count=true" frameborder="0" scrolling="0" width="85px" height="20px"></iframe>
                    </div>
                    <!-- End Github Star -->
                </div>
                <!-- End Social Networks -->
            </div>
        </div>
    </section>
    <!-- End About -->
@stop
