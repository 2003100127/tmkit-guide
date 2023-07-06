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
                        <h2 class="blog-post-title mb-1">Overview</h2>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>TMKit</strong> is an open-source Python programming interface,
                            which is modular, scalable, and specifically designed for processing
                            transmembrane protein data. It is a one-stop computational analysis
                            tool for transmembrane proteins, enabling users to perform database wrangling,
                            engineer features at the mutational, domain, and topological levels,
                            and visualize protein-protein interaction interfaces through its
                            unique programming interface. In addition, TMKit includes seqNetRR,
                            a high-performance computing library that allows for customised
                            construction and rewiring of residue connections. This library
                            is particularly well-suited for assigning coevolutionary features at a fast speed.
                            <br><br>
                            <strong>TMKit</strong> offers quality control, I/O and collation of protein
                            sequences/structures, sequence-predicted/structure-derived
                            topologies, multiple sequence alignment generation,
                            generation of canonical TM-specific features,
                            visualization of protein structures and interfaces between
                            TM proteins. Besides, other intriguing features of TMKit
                            are the processing of functional (CATH), interactome, and
                            mutational databases and more functionalities expected.
                            It allows performance evaluation of residue-residue contact
                            predictions.
                            <button type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    </div>

                    <div id="item-2">
                        <h2>1. Functions of TMKit</h2>
                        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                            <strong>TMKit</strong> provides nine function classes to handle a number of
                            transmembrane protein sequence and structural analysis
                            problems, including <code>visualization</code>, <code>sequence</code>,
                            <code>quality control</code>, <code>topology</code>, <code>mapping</code>,
                            <code>annotation</code>, <code>connectivity</code>,
                            <code>edge extraction</code>, and <code>feature</code>.

                            <button type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>


                    <div id="item-3">
                        <h3>1.1 Modules summary</h3>
                        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                            After installation of <code>tmkit</code> (please see
                            <a href="{{ url('doc/installation') }}" target="_blank"
                               class="stretched-link text-danger" style="position: relative;">
                                how to install it</a>), you can import this library by
                            putting the following code in a Python script or a Jupyter notebook.
                            Then, you can access the 14 modules covering 9 function classes.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk</code></pre>
                        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                            The below table summarizes what tasks these modules can be used to do.
                        </div>
                        <div class="container">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tool module</th>
                                    <th scope="col">Function class</th>
                                    <th scope="col">Note</th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">1</th>
                                    <td><code>tmk.fetch</code></td>
                                    <td>Quality control</td>
                                    <td>fetch example data</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><code>tmk.qc</code></td>
                                    <td>Quality control</td>
                                    <td>generate and extract metrics of sequences and structures</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td><code>tmk.seq</code></td>
                                    <td>Sequence</td>
                                    <td>parse sequences and structures</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td><code>tmk.msa</code></td>
                                    <td>Sequence</td>
                                    <td>produce commands for generating multiple sequence alignment</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td><code>tmk.feature</code></td>
                                    <td>Feature</td>
                                    <td>protein biological features</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td><code>tmk.collate</code></td>
                                    <td>Mapping</td>
                                    <td>seek difference between RCSB and PDBTM structures</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td><code>tmk.topo</code></td>
                                    <td>Topology</td>
                                    <td>transmembrane protein topologies</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td><code>tmk.rrc</code></td>
                                    <td>Feature</td>
                                    <td>performance evaluation of residue contact prediction</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td><code>tmk.ppi</code></td>
                                    <td>Connectivity</td>
                                    <td>protein connectivity</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td><code>tmk.mut</code></td>
                                    <td>Annotation</td>
                                    <td>transmembrane protein's mutation data processing</td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td><code>tmk.vs</code></td>
                                    <td>Visualization</td>
                                    <td>visualize protein structures</td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td><code>tmk.cath</code></td>
                                    <td>Annotation</td>
                                    <td>access protein domains and families</td>
                                </tr>
                                <tr>
                                    <th scope="row">13</th>
                                    <td><code>tmk.mapping</code></td>
                                    <td>Mapping</td>
                                    <td>conversion between protein identifiers</td>
                                </tr>
                                <tr>
                                    <th scope="row">14</th>
                                    <td><code>tmk.edge</code></td>
                                    <td>Edge extraction</td>
                                    <td>rewiring of connections between residues</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div id="item-4">
                        <h3>1.2 Module functions</h3>
                        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                            The module functions are descried briefly in the cards below.
                        </div>
                        <div class="container-fluid">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ URL::asset('img/module/Visualization.png') }}" width="160" height="100" alt="...">
                                        <div class="card-body">
                                            <hr class="bg-primary border-b-2 border-top border-primary">
                                            <h5 class="card-title">Visualization</h5>
                                            <p class="card-text">
                                                Identification of protein-protein interaction (PPI) interfaces of
                                                proteins is critical to understand the biological
                                                processes governed by them.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ URL::asset('img/module/Sequence.png') }}" width="160" height="100" alt="...">
                                        <div class="card-body">
                                            <hr class="bg-success border-b-2 border-top border-success">
                                            <h5 class="card-title">Sequence</h5>
                                            <p class="card-text">
                                                The sequence pre-processing module is a fundamental
                                                component of TMKit, designed to handle sequence reading
                                                in diverse formats, sequence retrieval from various sources, and
                                                multiple sequence alignment (MSA) generation.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ URL::asset('img/module/Quality control.png') }}" width="160" height="100" alt="...">
                                        <div class="card-body">
                                            <hr class="bg-warning border-b-2 border-top border-warning">
                                            <h5 class="card-title">Quality control</h5>
                                            <p class="card-text">
                                                This module evaluates various criteria, including
                                                the experimentation methods used, resolution, subclass,
                                                and sequence length, to qualify proteins in bulk.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ URL::asset('img/module/Topology.png') }}" width="160" height="100" alt="...">
                                        <div class="card-body">
                                            <hr class="bg-secondary border-b-2 border-top border-secondary">
                                            <h5 class="card-title">Topology</h5>
                                            <p class="card-text">
                                                TMKit can be used to obtain more detailed non-TM topologies,
                                                that is, side 1, side 2, strand, coil, inside, loop,
                                                and interfacial. Besides the structure-derived topologies,
                                                TMKit also supplies predicted topologies by embedding
                                                <a href="https://doi.org/10.1006/jmbi.2000.4315" target="_blank"
                                                   class="stretched-link text-secondary" style="position: relative;">
                                                    TMHMM</a>
                                                and <a href="https://doi.org/10.1016/j.jmb.2004.03.016" target="_blank"
                                                       class="stretched-link text-secondary" style="position: relative;">
                                                    Phobius</a> running on the command line interface (CLI)
                                                and within Python
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ URL::asset('img/module/Mapping.png') }}" width="160" height="100" alt="...">
                                        <div class="card-body">
                                            <hr class="bg-danger border-b-2 border-top border-danger">
                                            <h5 class="card-title">Mapping</h5>
                                            <p class="card-text">
                                                Identifier mapping between structural and sequence data (e.g.,
                                                FASTA residue IDs and PDB residue IDs) is an important
                                                technical premise to guarantee the correct interpretation
                                                of biological findings.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ URL::asset('img/module/Annotation.png') }}" width="160" height="100" alt="...">
                                        <div class="card-body">
                                            <hr class="bg-warning border-b-2 border-top border-warning">
                                            <h5 class="card-title">Annotation</h5>
                                            <p class="card-text">
                                                Amino acid residues of transmembrane proteins to be involved in mutations
                                                and function domains can be annotated through the
                                                <a href="https://doi.org/10.1093/bioinformatics/bty054" target="_blank"
                                                   class="stretched-link text-warning" style="position: relative;">
                                                    MutHTP</a>,
                                                <a href="https://doi.org/10.1002/humu.23961" target="_blank"
                                                   class="stretched-link text-warning" style="position: relative;">
                                                    Pred-MutHTP</a>
                                                 and <a href="https://www.cathdb.info" target="_blank"
                                                        class="stretched-link text-warning" style="position: relative;">
                                                    CATH</a> databases.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ URL::asset('img/module/Connectivity.png') }}" width="160" height="100" alt="...">
                                        <div class="card-body">
                                            <hr class="bg-warning border-b-2 border-top border-warning">
                                            <h5 class="card-title">Connectivity</h5>
                                            <p class="card-text">
                                                Studying connections of a protein to others in a PPI
                                                network is of crucial importance to understand its biological role.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ URL::asset('img/module/Edge extraction.png') }}" width="160" height="100" alt="...">
                                        <div class="card-body">
                                            <hr class="bg-info border-b-2 border-top border-info">
                                            <h5 class="card-title">Edge extraction</h5>
                                            <p class="card-text">
                                                We provide a high-performance computing library for extracting connections
                                                between residues by constructing bipartite and unipartite graphs (where
                                                residue connections are treated as edges) and assigning features in
                                                linear time with respect to the number of residues used.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ URL::asset('img/module/Feature.png') }}" width="160" height="100" alt="...">
                                        <div class="card-body">
                                            <hr class="bg-primary border-b-2 border-top border-primary">
                                            <h5 class="card-title">Feature</h5>
                                            <p class="card-text">
                                                A set of transmembrane protein-specific and general-purpose
                                                features is provided by TMKit in support of machine learning modelling.
                                            </p>
                                        </div>
                                    </div>
                                </div>
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
                <a class="nav-link" href="#item-1">Overview</a>
                <a class="nav-link" href="#item-2">1. Functions of TMKit</a>
                <a class="nav-link" href="#item-3">1.1 Modules summary</a>
                <a class="nav-link" href="#item-4">1.2 Module functions</a>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
