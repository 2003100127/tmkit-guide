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
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1">TMKit</h1>
            <p class="lead">
                <i class="fa-brands fa-battle-net"></i>
                <strong>TMKit</strong> an open-source, modular, and scalable Python programming interface that
                possesses currently nine modules for processing transmembrane protein data.
                <br><br><i class="fa-brands fa-battle-net"></i>
                <strong>TMKit</strong> offers quality control, I/O and collation of protein sequences/structures,
                sequence-predicted/structure-derived topologies, multiple sequence alignment generation,
                generation of canonical TM-specific features, visualization of protein structures and interfaces between
                TM proteins. Besides, other intriguing features of TMKit are the processing of functional (CATH),
                interactome, and mutational databases and more functionalities expected. It allows performance evaluation
                of residue-residue contact predictions.
                <br><br><i class="fa-brands fa-battle-net"></i>
                <strong>TMKit</strong> devotes itself to making TM protein-related research much easier
                and will accelerate the development and machine learning modelling of TM proteins.

            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <a href="{{ url('feature') }}" role="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Learn more</a>
                <a href="{{ url('doc/overview') }}" role="button" class="btn btn-outline-secondary btn-lg px-4">Explore</a>
            </div>
        </div>
        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
{{--            <img class="rounded-lg-3" src="{{ URL::asset('img/poster.png') }}" alt="" width="1020">--}}
            <img src="{{ URL::asset('img/all.png') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="1000"
                 height="800" loading="lazy">
        </div>
    </div>
</div>

@include('layout.footer')
</body>

</html>
