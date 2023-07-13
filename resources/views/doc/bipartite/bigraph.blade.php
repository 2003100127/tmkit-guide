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
                        <h2 class="blog-post-title mb-1">Bigraph</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            A bipartite graph (bigraph for short) is defined as (V<sub>P</sub>+
                            V<sub>Q</sub>, E<sub>bi</sub>) [52], where there is no
                            adjacency (i.e., connections) between nodes in either
                            residue set V<sub>P</sub> or V<sub>Q</sub>.

                            A global residue-residue connection (GlobRRC, see
                            <a href="{{ url('doc/bipartite/scheme') }}" target="_blank" class="stretched-link text-success" style="position: relative;">
                                here</a>
                            ) is formed by an element from set V<sub>P</sub> and an
                            element from set V<sub>Q</sub>.

                            <br><br>
                            <strong>seqNetRR</strong> contains a few types of bipartite graphs, that is,
                            <code>patch</code>, <code>memconp</code>, <code>cross</code>, and <code>unchanged</code>.
                            You can also <strong>customize</strong> a bigraph.

                            <br><br>
                            In this tutorial, we will go through how to define and make a bigraph in Python.

                        </div>
                    </div>

                    <div id="item-1-1">
                        <h2>1. Patch</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            The first bigraph we want to show is <strong>patch</strong>, which
                            is defined by a square centering around a residue pair in a correlation
                            matrix (e.g., residue contact map) as shown in the plot below. We use the <code>patch</code> function
                            below to generate a <strong>patch</strong> with a length <code>L</code>.
                        </div>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/Patch.jpg') }}" class="img-thumbnail" alt="" width="300" height="200" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Patch bipartite graph in a residue contact map.
                            </div>
                        </div>
                        <pre><code class="language-python">def patch(length, step=1):
    arr = []
    for i in range(-length, length + 1, step):
        for j in range(-length, length + 1, step):
            arr.append([i, j])
    return arr</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If we have two residues 1 and 2, how does the <strong>TMKit</strong> program
                            know them and their neighbouring residues? In fact, either is marked by
                            the coordinate <code>0</code>. If a neighbouring residue appears on
                            the left side of residue 1, the coordinate of the neighbouring residue
                            is <code>-1</code> (which will be paired to residue 2), and a neighbouring
                            residue appear on the right side of residue 1
                            the coordinate of the neighbouring residue is <code>1</code>
                            (which will be paired to residue 2).

                            <br>
                            <br>
                            In <strong>TMKit</strong>, we use the function below to generate an
                            bigraph of one residue of a residue pair of interest.

                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, we will have the following output,
                            after calling this function by <code>patch(length=5, step=1)</code>
                            where <code>length</code> means the length of one edge of the patch
                            and <code>step</code> means in which step we will skip the positions to
                            the next one.
                        </div>
                        <pre><code class="language-python">[[-2, -2], [-2, -1], [-2, 0], [-2, 1], [-2, 2],
 [-1, -2], [-1, -1], [-1, 0], [-1, 1], [-1, 2],
 [0, -2], [0, -1], [0, 0], [0, 1], [0, 2],
 [1, -2], [1, -1], [1, 0], [1, 1], [1, 2],
 [2, -2], [2, -1], [2, 0], [2, 1], [2, 2]]</code></pre>

                    </div>

                    <div id="item-1-2">
                        <h2>2. MemConP</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            The second bigraph we show here is <strong>memconp</strong>, which
                            is used to study the two residues from two different helices
                            that face each other, for example, residue
                            1 and residue 2 in the plot below.
                        </div>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/tmsc.png') }}" class="img-thumbnail" alt="" width="500" height="300" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Two residues facing each other in a pair of helices.
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Residue 1 and residue 2 connect to each other's
                            neighbouring residues, like below.
                        </div>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/Memconp.png') }}" class="img-thumbnail" alt="" width="300" height="200" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Helix-helix connections in MemConP in bipartite graphs
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            It is defined by a group of specified coordinates, like in the code area below.
                        </div>
                        <pre><code class="language-python"># types in MemConP
bigraph = [
    [4, -4], [4, 4], [3, -4], [-4, 3], [3, 4],
    [4, 3], [0, -4], [0, 4], [0, -3], [0, 3],
    [-1, 0], [1, 0], [0, 0], [0, -1], [0, 1],
    [3, 0], [-3, 0], [4, 0], [-4, 0], [-3, -4],
    [-4, -3], [-3, 4], [4, -3], [-4, -4], [-4, 4],
]</code></pre>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Cross</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Next, residues can cross connected as <code>cross</code> as shown in the plot.
                        </div>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/cross.jpg') }}" class="img-thumbnail" alt="" width="300" height="200" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Cross connections of two residues in a bipartite graph.
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can represent this <code>cross</code>-style bigraph in Python,
                            which can be recognized by <strong>TMKit</strong>.
                        </div>
                        <pre><code class="language-python">bigraph = [
    [-1, 0], [1, 0], [0, 0], [0, 1], [0, -1],
]</code></pre>
                    </div>

                    <div id="item-1-4">
                        <h2>4. Unchanged</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If we do not want to do anything with each residue pair,
                            we can tell <strong>TMKit</strong> this way.
                        </div>
                        <pre><code class="language-python">bigraph = [
    [0, 0],
]</code></pre>
                    </div>

                    <div id="item-1-5">
                        <h2>4. Customized</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            You can build your own bipartite graphs
                            to obtain connections for testing! You can
                            simply replace <code>self.bigraph</code> with coordinates you like.
                        </div>
                        <pre><code class="language-python">self.bigraph = [
    ...
]</code></pre>
                    </div>
                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Bigraph</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Patch</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. MemConP</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">3. Cross</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-4">4. Unchanged</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-5">5. Customized</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
