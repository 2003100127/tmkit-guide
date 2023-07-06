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
                        <h2 class="blog-post-title mb-1">Topology</h2>

                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            Protein topologies are also very important features for residues in transmembrane proteins.
                            <ul class="list-group-flush">
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i>
                                    for PDBTM topologies, please see <a href="{{ url('doc/topo/pdbtm') }}" class="link-danger d-inline-flex text-decoration-none rounded">here</a>
                                </li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i>
                                    for Phobius topologies, please see <a href="{{ url('doc/topo/phobius') }}" class="link-danger d-inline-flex text-decoration-none rounded">here</a>
                                </li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i>
                                    for TMHMM topologies, please see <a href="{{ url('doc/topo/tmhmm') }}" class="link-danger d-inline-flex text-decoration-none rounded">here</a>
                                </li>
                            </ul>
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
                <a class="nav-link" href="#item-1">Topology</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">Features</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
