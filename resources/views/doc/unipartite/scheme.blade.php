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
                        <h2 class="blog-post-title mb-1">Scheme</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <strong>TMKit</strong> contains <strong>seqNetRR</strong>,
                            a high-performance computing library for constructing
                            residue connections in sequence and contact-map context and
                            performing the assignment of co-evolutionary features
                            (or other types of co-variant features) in linear time.
                            This module is aimed at facilitating co-evolutionary feature engineering,
                            scheme design, and organization for machine learning modelling
                            of interactions/contacts between residues.

                            <br><br>
                            In this tutorial, we will go through the definition of
                            <strong>local residue-residue connections  (LocRRCs)</strong> and
                            the computational scheme to construct them at a fast speed.

                            <br><br>
                            <i class="fa-solid fa-pen-to-square"></i>
                            <strong>Definition.</strong>
                            In sequence context, LocRRCs are connections formed by
                            residue 1 or 2 and other residues that serially flank it.
                            Please see examples
                            <a href="{{ url('doc/unipartite/unigraph') }}" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                here</a>. It focuses on how one residue of a residue pair
                            of interest connects with its neighbouring residues in the same side.
                            The overall property of the unigraph of this residue is imparted by strengths between the edges in
                            the graph. The strengths, in our case, are co-evolutionary features.

                            <br><br>
                            It is notorious to assign features to co-variant
                            residue pairs extracted from transmembrane proteins because this class
                            of protein usually has a long sequence that can generate a substantial number
                            of residue pairs. The <strong>seqNetRR</strong> library brings down the
                            total time by
                            <ul class="list-group-flush">
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i>
                                    designing modular methods (vastly saving the time of calling Python functions)
                                </li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i>
                                    constructing hash tables.
                                </li>
                            </ul>


                            This library has been compared with Pandas and NumPy and confirmed as
                            the fastest method to assign co-evolutionary features to GlobRRCs.

                        </div>
                    </div>

                    <div id="item-1-1">
                        <h2>1. Schematic illustration</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Suppose we have a protein sequence of length <code>L</code>.
                            The total number of residue pairs extracted from the sequence
                            is <code>(Lx(L-1))/2</code>. All of the residue pairs
                            can be represented by a 2D array or a 2D data object in Python.
                            After applying a window with size <code>w</code>, a 3D data object is formed,
                            as shown in the plot below.
                            Restricted with <code>t</code> edges of
                            <a href="https://en.wikipedia.org/wiki/Bipartite_graph" target="_blank" class="stretched-link text-success" style="position: relative;">
                                a bipartite graph</a> (its specific application is introduced in
                            <a href="{{ url('doc/bipartite/bigraph') }}" target="_blank"
                               class="stretched-link text-info" style="position: relative;">the next tutorial</a>
                            ), the number of window-placed GlobRRCs is <code>(2×w)x(2×w+1)</code> for each residue
                            and hence it goes to <code>2x(2×w)x(2×w+1)</code> for each residue pair.

                            <br>
                            <br>
                            The central problem is how we can most efficiently assign features to
                            such a volume of residue pairs. Apparently ,we cannot avoid the issue
                            on a 3D data object with O(n3) time complexity. However, by using hashing idea
                            and streamlining the whole process (avoid any unnecessary computational
                            operation), we can vastly reduce the time. The <strong>method</strong> <i>Hash</i>
                            has been tested most efficient.
                        </div>

                        {{-- section: img --}}
                        <div class="text-center">
                            <img src="{{ URL::asset('img/uni_comput.jpg') }}" class="img-thumbnail" alt="" width="700" height="500" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Computing scheme of feature assignment in seqNetRR.
                            </div>
                        </div>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-danger" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Method overview</strong>
                            <br><i class="fa-solid fa-book"></i> <strong><i>Hash_indirec</i></strong>: achieved with method 1 by constructing the entire combinations of residues first and then going to feature assignment.
                            <br><i class="fa-solid fa-book"></i> <strong><i>Hash</i></strong>: achieved with method 2 by assigning features and in the meantime constructing the entire list of residue pairs. Feature assignment is done by querying values from a hash table.
                            <br><i class="fa-solid fa-book"></i> <strong><i>Pandas</i></strong>: achieved with method 2 by assigning features and in the meantime constructing the entire list of residue pairs. Feature assignment is done by <i>pandas.at</i>.
                            <br><i class="fa-solid fa-book"></i> <strong><i>NumPy</i></strong>: achieved with method 2 by assigning features and in the meantime constructing the entire list of residue pairs. Feature assignment is done by <i>numpy array</i>.
                        </div>

                    </div>

                    <div id="item-1-2">
                        <h2>2. Computing performance</h2>
                        <div class="alert alert-success" role="alert">
                            <i class="fa-sharp fa-solid fa-download"></i>
                            TRAIN, PREVIOUS, and TEST used in
                            <a href="https://doi.org/10.1016/j.jsb.2020.107574" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                DeepHelicon</a> are used as benchmark datasets to gauge
                            the running time obtained via
                            <a href="https://data.mendeley.com/datasets/k8tfvgftv3/2" target="_blank"
                               class="stretched-link text-danger" style="position: relative;">this link</a>.
                        </div>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Computing performance is gauged by the running time of different methods.
                            <br><br>
                            we examined the feature assignment according to LocRRCs
                            restricted by a 5-node unipartite graph (refer to
                            <a href="{{ url('doc/unipartite/unigraph') }}" target="_blank"
                               class="stretched-link text-danger" style="position: relative;">here</a>). We included the
                            comparison with the NumPy method because of its
                            acceptable CPU time in handling LocRRCs. Similarly,
                            the feature assignment using the Hash method have turned
                            to a trivial problem where the running time is only 1.63s
                            on average (1.64s for TRAIN, 1.94s for PREVIOUS, and 1.30s for TEST).
                            The Hash method is 33-fold and 11-fold faster than the NumPy array
                            indexing method and the Pandas pandas.at method, respectively, in
                            the light of handling the feature assignment using LocRRCs.

                        </div>


                        <div class="text-center">
                            <img src="{{ URL::asset('img/bar_uni.png') }}" class="img-thumbnail" alt="" width="700" height="500" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. The total running time of the two tasks at the per-protein level.
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
                <a class="nav-link" href="#item-1">Scheme</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Schematic illustration</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Computing performance</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
