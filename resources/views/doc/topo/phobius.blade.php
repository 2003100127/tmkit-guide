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
                        <h2 class="blog-post-title mb-1">Phobius</h2>
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
                            <strong>Phbious</strong>.

                        </div>

                        <div class="alert alert-warning" role="alert">
                            <i class="fa-sharp fa-solid fa-triangle-exclamation"></i>
                            <strong>TMKit</strong> does contains <strong>a built-in Phobius program</strong>
                            to predict topologies of a transmembrane protein. However, in our latest version, we
                            notice that with the upgrading of Python version, the built-in Phbious program
                            was not supported to run in Python inline. To suit the update of Python of
                            higher versions, we have to cancel the usage of built-in Phbious program that
                            directly predicts the topologies of a transmembrane protein through <strong>TMKit</strong>.
                            However, <strong>TMKit</strong> still supports parsing topologies of a transmembrane protein
                            anyway. You may predict the topologies via
                            <a href="https://www.ebi.ac.uk/Tools/pfa/phobius" target="_blank"
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
                            <code>tmk.topo.from_phobius</code> by simply specifying two parameters
                            <code>topo</code> and <code>phobius_fpn</code>. See explanations in section
                            <strong>Parameters</strong>. We placed an example Phobius prediction file in
                            <code>'./data/topo/1xqfA.jphobius'</code>. Suppose you have this Phobius prediction file below.
                        </div>
                        <pre><code class="language-python">ID   1XQF:A|PDBID|CHAIN|SEQUENCE
FT   DOMAIN        1      5       NON CYTOPLASMIC.
FT   TRANSMEM      6     30
FT   DOMAIN       31     41       CYTOPLASMIC.
FT   TRANSMEM     42     62
FT   DOMAIN       63     95       NON CYTOPLASMIC.
FT   TRANSMEM     96    118
FT   DOMAIN      119    124       CYTOPLASMIC.
FT   TRANSMEM    125    147
FT   DOMAIN      148    158       NON CYTOPLASMIC.
FT   TRANSMEM    159    179
FT   DOMAIN      180    185       CYTOPLASMIC.
FT   TRANSMEM    186    205
FT   DOMAIN      206    210       NON CYTOPLASMIC.
FT   TRANSMEM    211    231
FT   DOMAIN      232    242       CYTOPLASMIC.
FT   TRANSMEM    243    260
FT   DOMAIN      261    265       NON CYTOPLASMIC.
FT   TRANSMEM    266    284
FT   DOMAIN      285    290       CYTOPLASMIC.
FT   TRANSMEM    291    316
FT   DOMAIN      317    327       NON CYTOPLASMIC.
FT   TRANSMEM    328    350
FT   DOMAIN      351    362       CYTOPLASMIC.
//</code></pre>
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

lower_ids, upper_ids = tmk.topo.from_phobius(
    topo='tmh',
    phobius_fpn='./data/topo/1xqfA.jphobius',
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
                            <br><code>phobius_fpn</code> - path to a target Phobius file.
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
                            continuous segment is from residue <strong>6</strong> to residue <strong>30</strong>,
                            and the second one is from residue <strong>42</strong> to residue <strong>62</strong>, ...,
                            and the last one is from residue <strong>328</strong> to residue <strong>350</strong>.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">---lower bounds [6, 42, 96, 125, 159, 186, 211, 243, 266, 291, 328]
---upper bounds [30, 62, 118, 147, 179, 205, 231, 260, 284, 316, 350]</code></pre>
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
                <a class="nav-link" href="#item-1">Phobius</a>
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
