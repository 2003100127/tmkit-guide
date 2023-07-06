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
                        <h2 class="blog-post-title mb-1">Unigraph</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            Two unipartite graphs (V<sub>P</sub>+V<sub>P</sub>,
                            E<sub>uni_P</sub>) and (V<sub>Q</sub>+V<sub>Q</sub>,E<sub>uni_Q</sub>)
                            for which edges between two vertices from the same set
                            are only available are used to demarcate
                            local residue-residue connections (LocRRCs, see
                            <a href="{{ url('doc/unipartite/scheme') }}" target="_blank" class="stretched-link text-success" style="position: relative;">
                                here</a>).
                            A LocRRC is formed by any two elements from set V<sub>P or set V<sub>Q.

                        </div>
                    </div>

                    <div id="item-1-1">
                        <h2>1. Fully-connected</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Here, we mainly want to show how to construct
                            an unipartite graph in Python, which can be
                            recognized by <strong>TMKit</strong>.
                            The unipartite graph is constructed by considering residue pairs
                            in a fully-connected manner, as shown in the plot below.
                        </div>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/local.jpg') }}" class="img-thumbnail" alt="" width="300" height="200" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Connections in a fully-connected manner in an unipartite graph.
                            </div>
                        </div>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If we have two residues 1 and 2, how does the <strong>TMKit</strong> program
                            know them and their neighbouring residues? In fact, either is marked by
                            the coordinate <code>0</code>. If a neighbouring residue appears on
                            the left side of residue 1, the coordinate of the neighbouring residue
                            is <code>-1</code> (which will be paired to residue 1 per se),
                            and a neighbouring residue appear on the right side of residue 1
                            the coordinate of the neighbouring residue is <code>1</code>
                            (which will be paired to residue 1 per se).

                            <br>
                            <br>
                            In <strong>TMKit</strong>, we use the function below to generate an
                            unigraph of one residue of a residue pair of interest.

                        </div>
                        <pre><code class="language-python">import itertools

def combo2x2(array):
    combo = []
    ob = itertools.combinations(array, 2)
    for i in ob:
        combo.append(list(i))
    return combo</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If we have a residue at sequence position 4, we want to check out
                            the connections between each of its 3 neighbouring residues on
                            the right and left sides (as shown in the plot below), we
                            can first assign a list of positions to
                            <code>array</code>, like the code below.
                        </div>

                        <pre><code class="language-python">array = [1, 2, 3, 4, 5, 6, 7]</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, we can pass the <code>array</code> to the <code>combo2x2</code> function,
                            we will obtain all the coordinates of all residue pairs in this unigraph, like
                            below.
                        </div>
                        <pre><code class="language-python">unigraph = combo2x2(array=array)
print(unigraph)

# output
[[1, 2], [1, 3], [1, 4], [1, 5], [1, 6], [1, 7],
 [2, 3], [2, 4], [2, 5], [2, 6], [2, 7],
 [3, 4], [3, 5], [3, 6], [3, 7],
 [4, 5], [4, 6], [4, 7],
 [5, 6], [5, 7],
 [6, 7],
]</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If the central residue is at sequence position 1,
                            the left positions of it will be padded by <code>None</code>, like this
                            <code>[None, None, None, 1, 2, 3, 4]</code>. Then, the unigraph of it
                            looks like this below.
                        </div>

                        <pre><code class="language-python">[[None, None], [None, None], [None, 1], [None, 2], [None, 3], [None, 4],
 [None, None], [None, 1], [None, 2], [None, 3], [None, 4],
 [None, 1], [None, 2], [None, 3], [None, 4],
 [1, 2], [1, 3], [1, 4],
 [2, 3], [2, 4],
 [3, 4]
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
                <a class="nav-link" href="#item-1">Unigraph</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Fully-connected</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
