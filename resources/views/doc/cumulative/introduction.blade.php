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
                        <h2 class="blog-post-title mb-1">Introduction</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            We introduce a computational implementation of co-evolutionary strength
                            quantification by <strong>TMKit</strong> for individual residues. You may
                            find it interesting for engineering a residue's feature.
                            If you have a correlation matrix
                            for any kind of biological interaction system, you may apply this idea to it.
                        </div>
                    </div>

                    <div id="item-1-1">
                        <h2>1. What is cumuCCs?</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            <strong>cumuCCs</strong> is the abbreviation for cumulated
                            correlation coefficients, which is used to quantify co-evolutionary
                            strength for individual residues. It is different from globRRCs and
                            LocRRCs for pairwise residues in biological networks.

                            <br><br>
                            <i class="fa-sharp fa-solid fa-landmark"></i>
                            For a single <code>residue</code>, the
                            cumuCCs of its <code>k</code> prioritized
                            connections with other <code>residue</code> can
                            reflect its biological importance in a network. In evolutionary biology,
                            the sum of the highest evolutionary coupling scores of a residue can
                            help evaluate the extent to which the residue bears evolutionary
                            constraints (<a href="https://doi.org/10.1016/j.cell.2012.04.012" target="_blank" class="stretched-link text-success" style="position: relative;">
                                reference 1</a>). This has been used as an important feature
                            to gauge whether a residue is an interaction site in transmembrane
                            proteins (<a href="https://doi.org/https://doi.org/10.1016/j.jsb.2019.02.009" target="_blank" class="stretched-link text-success" style="position: relative;">
                                reference 2</a> and <a href="https://doi.org/https://doi.org/10.1016/j.csbj.2021.03.005" target="_blank" class="stretched-link text-success" style="position: relative;">
                                reference 3</a>).
                        </div>


                    </div>

                    <div id="item-1-2">
                        <h2>2. Equation</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            It is not problematic to generate cumuCCs at a fast speed for input proteins of any length.
                            It is calculated as <code>cumuCC=1/c×CC_R</code> where <code>CC_R</code> stands for the sum of
                            correlation coefficients of <code>k</code> prioritized connections of a <code>residue</code>
                            with other residues according to ranked correlation coefficients
                            in descending order and <code>c</code> is the sum
                            of the correlation matrix over all residues.
                        </div>

                        {{--                        <strong class="blog-post-meta">*Average</strong>--}}
                        <div class="text-center">
                            <img src="{{ URL::asset('img/cumulated.jpg') }}" class="img-thumbnail" alt="" width="300" height="200" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. cumuCCs shows the prioritized connections with the highest correlation
                                scores between a central residue and others.
                            </div>
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
                <a class="nav-link" href="#item-1">Implementation</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. What is cumuCCs?</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Equation</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
