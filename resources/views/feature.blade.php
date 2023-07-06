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
            <h1 class="display-6 fw-bold lh-1"># Function modules</h1>
            <p class="lead">
                TMKit provides currently nine modules to handle a number of
                transmembrane protein sequence and structural analysis problems,
                including visualization, sequence, quality control, topology,
                mapping, annotation, connectivity, edge extraction, and feature (Figure 1).
            </p>
            <div class="text-center">
                <img src="{{ URL::asset('img/tmkit_modules.png') }}" class="img-thumbnail" alt="" width="1000" height="500" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>. Functionality of TMKit.
                </div>
            </div>

            <h1 class="display-6 fw-bold lh-1"># Visualization</h1>
            <p class="lead">
                The program can automatically generate the label- or propensity-based
                PPI interfaces in between a POI and its interacting proteins (or its
                larger complex) placed finally in PyMOL
            </p>
            <div class="text-center">
                <img src="{{ URL::asset('img/tmkit_vs.png') }}" class="img-thumbnail" alt="" width="1000" height="500" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>. Visualization of transmembrane PPI interfaces,
                    protein-drug binding pockets, and colouring representations in TMKit.
                </div>
            </div>

            <h1 class="display-6 fw-bold lh-1"># Residue connections (i.e., contacts) in a TM protein</h1>
            <div class="text-center">
                <img src="{{ URL::asset('img/tmsc.png') }}" class="img-thumbnail" alt="" width="1000" height="500" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>. Functionality of TMKit.
                </div>

                <div class="alert alert-warning text-left" role="alert">
                    globRRCs - structurally contextual connections as an example
                </div>

                <img src="{{ URL::asset('img/globc.png') }}" class="img-thumbnail" alt="" width="300" height="200" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>. An example of structurally contextual connections.
                </div>
                <div class="alert alert-warning text-left" role="alert">
                    LocRRCs - serially contextual connections as an example
                </div>

                <img src="{{ URL::asset('img/locc.png') }}" class="img-thumbnail" alt="" width="300" height="200" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>. An example of serially contextual connections.
                </div>
                <div class="alert alert-danger text-left" role="alert">
                    Connections between a residue of interest and its serially ordered
                    neighbouring residues are referred to as local residue-residue
                    connections (LocRRCs for short). In sequence
                    context, LocRRCs are connections formed by residue 1 or 2 and
                    other residues that serially flank it. Likewise, global residue-residue
                    connections (GlobRRCs) are those formed by each of a residue pair of
                    interest (including its neighbours)
                    and the serially ordered neighbouring residues of the other one
                    of the residue pair (including itself, e.g., connections between
                    residue 1 and the neighbouring residues of residue 2).
                </div>
            </div>

            <h1 class="display-6 fw-bold lh-1"># Results</h1>
            <div class="text-center">
                <img src="{{ URL::asset('img/heatmap_bi.png') }}" class="img-thumbnail" alt="" width="1500" height="200" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>. Heatmap of the running time of methods for handling GlobRRCs.
                </div>

                <img src="{{ URL::asset('img/heatmap_uni.png') }}" class="img-thumbnail" alt="" width="1500" height="200" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>. Heatmap of the running time of methods for handling locRRCs.
                </div>

                <img src="{{ URL::asset('img/cumu_line.png') }}" class="img-thumbnail" alt="" width="1000" height="200" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>. Heatmap of the running time of methods for handling cumuCCs.
                </div>
            </div>


            <h1 class="display-6 fw-bold lh-1"># References</h1>
            <div class="p-4 mb-3 bg-light rounded">
                [1] F. Baquero, Transmission as a basic process in microbial biology. Lwoff Award Prize Lecture, FEMS Microbiology Reviews. 41 (2017) 816–827. https://doi.org/10.1093/femsre/fux042.
                <br> [2] F.L.A.N.D.G.J.H. Cook Daniel L. AND Bookstein, Physical Properties of Biological Entities: An Introduction to the Ontology of Physics for Biology, PLOS ONE. 6 (2011) 1–8. https://doi.org/10.1371/journal.pone.0028708.
                <br> [3] A.-L. Barabási, Z.N. Oltvai, Network biology: understanding the cell’s functional organization, Nature Reviews Genetics. 5 (2004) 101–113. https://doi.org/10.1038/nrg1272.
                <br> [4] L. Hood, J.R. Heath, M.E. Phelps, B. Lin, Systems Biology and New Technologies Enable Predictive and Preventative Medicine, Science (1979). 306 (2004) 640–643. https://doi.org/10.1126/science.1104635.
                <br> [5] F.J. Bruggeman, H. v Westerhoff, The nature of systems biology, Trends in Microbiology. 15 (2007) 45–50. https://doi.org/https://doi.org/10.1016/j.tim.2006.11.003.
                <br> [6] K. Faust, J. Raes, Microbial interactions: from networks to models, Nature Reviews Microbiology. 10 (2012) 538–550. https://doi.org/10.1038/nrmicro2832.
                <br> [7] T.A. Hopf, L.J. Colwell, R. Sheridan, B. Rost, C. Sander, D.S. Marks, Three-Dimensional Structures of Membrane Proteins from Genomic Sequencing, Cell. 149 (2012) 1607–1621. https://doi.org/10.1016/j.cell.2012.04.012.
                <br> [8] T. Hamp, B. Rost, Alternative Protein-Protein Interfaces Are Frequent Exceptions, PLOS Computational Biology. 8 (2012) e1002623. https://doi.org/10.1371/journal.pcbi.1002623.
                <br> [9] N.N. Parikshak, M.J. Gandal, D.H. Geschwind, Systems biology and gene networks in neurodevelopmental and neurodegenerative disorders, Nature Reviews Genetics. 16 (2015) 441–458. https://doi.org/10.1038/nrg3934.
                <br> [10] A. Bensimon, A.J.R. Heck, R. Aebersold, Mass Spectrometry–Based Proteomics and Network Biology, Annual Review of Biochemistry. 81 (2012) 379–405. https://doi.org/10.1146/annurev-biochem-072909-100424.
                <br> [11] M. Vidal, M.E. Cusick, A.-L. Barabási, Interactome Networks and Human Disease, Cell. 144 (2011) 986–998. https://doi.org/https://doi.org/10.1016/j.cell.2011.02.016.
                <br> [12] A.L. Hopkins, Network pharmacology: the next paradigm in drug discovery, Nature Chemical Biology. 4 (2008) 682–690. https://doi.org/10.1038/nchembio.118.
                <br> [13] J. Stelling, Mathematical models in microbial systems biology, Current Opinion in Microbiology. 7 (2004) 513–518. https://doi.org/https://doi.org/10.1016/j.mib.2004.08.004.
                <br> [14] D.H. Geschwind, G. Konopka, Neuroscience in the era of functional genomics and systems biology, Nature. 461 (2009) 908–915. https://doi.org/10.1038/nature08537.

            </div>



        </div>

    </div>
</div>

@include('layout.footer')
</body>

</html>
