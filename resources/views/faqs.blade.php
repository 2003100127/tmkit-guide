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
            <h1 class="display-6 fw-bold lh-1"># FAQs</h1>

            <div class="p-4 mb-3 bg-light rounded">
                <strong>What questions is TMKit supposed to address?</strong>
                <p class="blog-post-meta">June 15, 2023 by <a href="https://github.com/2003100127" target="_blank">Jianfeng Sun</a></p>
                TMKit is a Python toolkit holding a bundle of function modules
                to allow multiple kinds of analyses of transmembrane protein sequences,
                structures, and functions. Many, if not most, function modules in TMKit
                are used to specialize in transmembrane protein-related problems but
                can also be applied general-purpose in different kinds of proteins.
                We highlight its visualization module that can facilitate the biological
                validation, interpretation, and translation of known and predicted PPI
                interfaces.
            </div>

            <div class="p-4 mb-3 bg-light rounded">
                <strong>What questions is seqNetRR supposed to address?</strong>
                <p class="blog-post-meta">June 15, 2023 by <a href="https://github.com/2003100127" target="_blank">Jianfeng Sun</a></p>
                seqNetRR integrated into TMKit is a high-performance computing library for
                constructing a variety of sets of residue connections and assigning
                features in linear time with respect to the number of residue pairs
                used. The seqNetRR module is mainly designed to permit the learning
                of the surrounding information of residues/residue pairs of
                interest in machine learning modelling problems.
            </div>

            <div class="p-4 mb-3 bg-light rounded">
                <strong>What is the relation between TMKit and seqNetRR?</strong>
                <p class="blog-post-meta">June 15, 2023 by <a href="https://github.com/2003100127" target="_blank">Jianfeng Sun</a></p>
                seqNetRR works as a module in TMKit.
            </div>

            <div class="p-4 mb-3 bg-light rounded">
                <strong>How to extract residue-residue connections?</strong>
                <p class="blog-post-meta">June 15, 2023 by <a href="https://github.com/2003100127" target="_blank">Jianfeng Sun</a></p>
                Residue-residue connections are extracted according to user-specified constraints, namely, edges in
                unipartite and bipartite graphs. Please take a look at Feature page.
            </div>

            <div class="p-4 mb-3 bg-light rounded">
                <strong>How is a window defined?</strong>
                <p class="blog-post-meta">June 15, 2023 by <a href="https://github.com/2003100127" target="_blank">Jianfeng Sun</a></p>
                A window in any size is applied to gauge serially ordered neighbouring residues
                of a residue/residue pairs of interest.
            </div>

            <div class="p-4 mb-3 bg-light rounded">
                <strong>What correlation matrices are used?</strong>
                <p class="blog-post-meta">June 15, 2023 by <a href="https://github.com/2003100127" target="_blank">Jianfeng Sun</a></p>
                seqNetRR deals with a correlation matrix or a three-column
                relation list (two for coordinates and one for coordinates)
                for pairwise relationships between residues. If the relation list,
                including the sparse matrix, is incomplete, seqNetRR will
                recover it by padding missing values with 0, considering that
                the information about neighbouring residues might be all needed.
                Then, a complete matrix or relation list full of all coordinates
                and coefficients is converted to a 2D hash table for querying.
                seqNetRR can receive the evolutionary couplings predicted by plmDCA,
                EVfold (FreeContact), mutual information (FreeContact),
                GaussianDCA. In addition, the simulated relation list with
                random coefficients of paired RRs in a certain molecular length
                is provided by seqNetRR.
            </div>

            <div class="p-4 mb-3 bg-light rounded">
                <strong>What are bipartite and unipartite graphs?</strong>
                <p class="blog-post-meta">June 15, 2023 by <a href="https://github.com/2003100127" target="_blank">Jianfeng Sun</a></p>
                seqNetRR provides memconp, cross, and patch for
                bipartite graphs and full connections between residues for
                unipartite graphs by default. seqNetRR is
                scalable in designing different graphs by modifying
                the bi_graph or uni_graph parameters
            </div>

            <div class="p-4 mb-3 bg-light rounded">
                <strong>How is the feature assignment performed?</strong>
                <p class="blog-post-meta">June 15, 2023 by <a href="https://github.com/2003100127" target="_blank">Jianfeng Sun</a></p>
                According to positions of residue pairs, seqNetRR assigns features
                to LocRRCs or GlobRRCs restricted by bipartite and
                unipartite graphs.
            </div>



        </div>

    </div>
</div>

@include('layout.footer')
</body>

</html>
