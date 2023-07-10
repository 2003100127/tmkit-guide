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
                        <h2 class="blog-post-title mb-1">TMHMM</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <strong>TMKit</strong> can parse the topologies predicted by a couple of
                            most widely used predictions tools, including <a href="https://doi.org/10.1006/jmbi.2000.4315" target="_blank"
                                                                             class="stretched-link text-secondary" style="position: relative;">
                                TMHMM2</a>
                            and <a href="https://doi.org/10.1016/j.jmb.2004.03.016" target="_blank"
                                   class="stretched-link text-secondary" style="position: relative;">
                                Phobius</a>. The two programs have been very widely used in prediction
                            of topologies of transmembrane proteins.
                            In this tutorial, we showcase the usage of parsing the topologies predicted by
                            <strong>TMHMM</strong>.

                        </div>

                        <div class="alert alert-warning" role="alert">
                            <i class="fa-sharp fa-solid fa-triangle-exclamation"></i>
                            <strong>TMKit</strong> does support <strong>predicting topologies
                                of a transmembrane protein by the TMHMM program</strong> via Python alone.
                            However, in our latest version, we
                            notice that with the upgrading of Python version, the NumPy has experienced
                            a major revision in terms of the numerical operations, for example, <code>np.int</code>
                            and  <code>np.float</code>, which conflicts with a Python version of the
                            TMHMM method.  To suit the update of Python of
                            higher versions, we have to cancel the usage of built-in TMHMM program that
                            directly predicts the topologies of a transmembrane protein through <strong>TMKit</strong>.
                            However, <strong>TMKit</strong> still supports parsing the
                            topologies of a transmembrane protein predicted by the TMHMM method anyway. You
                            may predict the topologies via <a href="https://services.healthtech.dtu.dk/services/TMHMM-2.0" target="_blank"
                                                              class="stretched-link text-bg-danger" style="position: relative;">
                                here</a>.
                        </div>

                        {{-- section: example dataset reminder --}}
                        <div class="alert alert-danger" role="alert">
                            <i class="fa-solid fa-circle-check"></i>
                            Please make sure that the TMKit example dataset has been downloaded
                            before you walk through the tutorial (please refer to
                            <a href="{{ url('doc/exdataset') }}" target="_blank" class="stretched-link text-info" style="position: relative;">
                                here</a>).
                        </div>
                    </div>

                    <div id="item-1-1">
                        <h2>1. Example usage</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            In <strong>TMKit</strong>, you can obtain the topologies of a transmembrane protein through
                            <code>tmk.topo.from_tmhmm</code> by simply specifying two parameters
                            <code>topo</code> and <code>tmhmm_fpn</code>. See explanations in section
                            <strong>Parameters</strong>. We placed an example TMHMM prediction file in
                            <code>'./data/topo/1xqfA.tmhmm'</code>. Suppose you have this TMHMM prediction file below.
                        </div>
                        <pre><code class="language-python">%pred NB(0): o 1 9, M 10 32, i 33 38, M 39 61, o 62 95, M 96 118, i 119 124, M 125 147, o 148 181, M 182 204, i 205 210, M 211 233, o 234 261, M 262 284, i 285 290, M 291 313, o 314 327, M 328 350, i 351 362
?0 oooooooooMMMMMMMMMMMMMMMMMMMMMMMiiiiiiMMMMMMMMMMMMMMMMMMMMMMMooooooooooo

?0 oooooooooooooooooooooooMMMMMMMMMMMMMMMMMMMMMMMiiiiiiMMMMMMMMMMMMMMMMMMMM

?0 MMMooooooooooooooooooooooooooooooooooMMMMMMMMMMMMMMMMMMMMMMMiiiiiiMMMMMM

?0 MMMMMMMMMMMMMMMMMooooooooooooooooooooooooooooMMMMMMMMMMMMMMMMMMMMMMMiiii

?0 iiMMMMMMMMMMMMMMMMMMMMMMMooooooooooooooMMMMMMMMMMMMMMMMMMMMMMMiiiiiiiiii

?0 ii</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            You can put the following codes in either
                            a Jupyter notevbook or a Python script. If you want to see the predicted transmembrane
                            topologies there, you can simply assign <code>topo</code> <code>tmh</code>.
                            If you want to see the predicted cytoplasmic or extra-cellular
                            topologies there, you can simply assign <code>topo</code> <code>cyto</code>
                            or <code>extra</code>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

lower_ids, upper_ids = tmk.topo.from_tmhmm(
    topo='tmh',
    tmhmm_fpn='./data/topo/1xqfA.tmhmm',
    from_fasta=False,
    file_kind='Linux',
)
print('---lower bounds', lower_ids)
print('---upper bounds', upper_ids)</code></pre>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>tmhmm_fpn</code> - path to a target TMHMM file.
                            <br><code>topo</code> - name of a topology kind. It can be 'cyto', 'extra', or 'tmh'.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Output</h2>
                        {{-- section: output --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Finally, you will see the following output showing the transmembrane segment
                            that protein <code>1xqf</code> chain <code>A</code> has.
                            <br><br>
                            In the output, <code>lower bounds</code> are the set of starting positions
                            of residues in the PDB structure while <code>upper bounds</code>
                            are the set of ending positions of residues in the PDB structure. They match
                            each other this way. For example, for topology <code>Side2</code>, the first
                            continuous segment is from residue <strong>10</strong> to residue <strong>32</strong>,
                            and the second one is from residue <strong>39</strong> to residue <strong>61</strong>, ...,
                            and the last one is from residue <strong>328</strong> to residue <strong>350</strong>.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">---lower bounds [10, 39, 96, 125, 182, 211, 262, 291, 328]
---upper bounds [32, 61, 118, 147, 204, 233, 284, 313, 350]</code></pre>
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
                <a class="nav-link" href="#item-1">TMHMM</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Example usage</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Parameters</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">3. Output</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
