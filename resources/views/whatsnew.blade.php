<!DOCTYPE html>
<html lang="zh">
@include('layout.head')
@include('layout.script')

<body>
@include('layout.nav')

{{--<div class="container shadow w-75 h-100 col-md-12 p-3 mb-5 mt-2 bg-white">--}}
{{--    @yield('content')--}}

{{--</div>--}}

<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-12 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-6 fw-bold lh-1"># What's new</h1>

            <div class="d-flex align-items-center p-3 my-3 text-white bg-indigo-dark rounded shadow-sm">
                <div class="lh-1">
                    <h1 class="h6 mb-0 text-white lh-1">
                        <i class="fa-brands fa-battle-net"></i>&nbsp;TMKit
                    </h1>
                    <small>Since 2023</small>
                </div>
            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">
{{--                <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>--}}
                <div class="d-flex text-muted pt-3">

                    <p class="pb-3 mb-0 small lh-sm border-bottom">
                        {{--                        <strong class="d-block text-gray-dark">@fast speed</strong>--}}
                        <strong>The first Python inline tool to deal with multiple kinds of TM protein-specific features</strong>
                    </p>
                </div>
                <div class="d-flex text-muted pt-3">

                    <p class="pb-3 mb-0 small lh-sm border-bottom">
{{--                        <strong class="d-block text-gray-dark">@fast speed</strong>--}}
                        <strong>full-scale functionalities</strong>
                    </p>
                </div>
                <div class="d-flex text-muted pt-3">

                    <p class="pb-3 mb-0 small lh-sm border-bottom">
{{--                        <strong class="d-block text-gray-dark">@scalable and extendable</strong>--}}
                        <strong>highly scalable and extendable</strong>
                    </p>
                </div>

                <div class="d-flex text-muted pt-3">

                    <p class="pb-3 mb-0 small lh-sm border-bottom">
                        {{--                        <strong class="d-block text-gray-dark">@scalable and extendable</strong>--}}
                        <strong>High-performance computation</strong>
                    </p>
                </div>

                <div class="d-flex text-muted pt-3">

                    <p class="pb-3 mb-0 small lh-sm border-bottom">
                        {{--                        <strong class="d-block text-gray-dark">@scalable and extendable</strong>--}}
                        <strong>High-quality Python implementation</strong>
                    </p>
                </div>

                <div class="d-flex text-muted pt-3">

                    <p class="pb-3 mb-0 small lh-sm border-bottom">
                        {{--                        <strong class="d-block text-gray-dark">@scalable and extendable</strong>--}}
                        <strong>OOP and AOP</strong>
                    </p>
                </div>

                <small class="d-block text-end text-muted mt-3">
                    <strong class="d-block text-gray-dark">@jianfeng sun</strong>
                </small>
            </div>



        </div>

    </div>
</div>

@include('layout.footer')
</body>

</html>
