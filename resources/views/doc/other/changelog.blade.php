<!DOCTYPE html>
<html lang="zh">
@include('layout.head')

<body>
@include('layout.nav')

<div class="d-flex">
    @include('layout.sidebar')

    <div class="shadow-lg  p-10 m-2 documentation is-dark" :class="{'expanded': ! sidebar}">
        <div class="row">

            <div class="col-11">
                <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                    <div id="item-1">
                        <h2 class="blog-post-title mb-1">Change log</h2>
                        <div class="p-4 mb-3 bg-light rounded">

                        </div>
                    </div>

                    <div id="item-1-1">
                        <h2>Logs</h2>
                        <div class="alert alert-info" role="alert">
                            1. executable release - 07.11.2022 <br>
                            2. test - 07.15.2022 <br>
                            3. 1st doc - 08.04.2022 <br>
                        </div>

                    </div>

                    <div id="item-1-2">
                        <h2>Signature</h2>
                        <div class="p-4 mb-3 bg-light rounded">
                            Developer: Jianfeng Sun
                        </div>

                    </div>


                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Change log</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">Logs</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">Signature</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
