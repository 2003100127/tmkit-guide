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
            <h1 class="display-6 fw-bold lh-1"># Issue</h1>

            <div class="p-4 mb-3 bg-light rounded">
                <ul >
                    <li>
                        Any issues should be reported through: <a href="https://github.com/2003100127/tmkit/issues" target="_blank">
                            https://github.com/2003100127/tmkit/issues
                        </a>
                    </li>
                </ul>

            </div>



        </div>

    </div>
</div>

@include('layout.footer')
</body>

</html>
