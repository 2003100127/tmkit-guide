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
                        <h2 class="blog-post-title mb-1">Protein-ligand binding pocket</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            Identification of protein-ligand binding pockets is crucial for understanding
                            many biological processes that is mediated by ligands and
                            its visualization can help drug discovery and biological interpretation.
                            <strong>TMKit</strong> allows users to show the pocket details of a protein-ligand complex.
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
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            The protein structure <code>6feq</code> is a transmembrane
                            protein-ligand complex, showing a structure of
                            inhibitor-bound human multidrug transporter ABCG2 (as shown in the plot below).
                            A small molecule inhibitor (or ligand) Ko143 can inhibition the biological functions of ABCG2.
                            We extract the complex structure and show the protein-ligand pocket in multiple forms .
                            The complex has been placed in <CODE>data/example/vs/</CODE>.
                        </div>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/6feq.png') }}" class="img-thumbnail" alt="" width="300" height="400" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Protein-ligand complex of <code>6feq</code>.
                            </div>
                        </div>


                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            First, we can visualize it in rainbow form annotated with residues
                            around the ligand using the following code.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.vs.sm_local(
    prot_name='6feq',
    pdb_complex_fp=to('data/example/vs/'),
    sm_rep="sticks",
    nby_rep='sticks',
    prot_c='blue_white_magenta',
    sm_c='blue_green',
    pocket_rep='stick'
)</code></pre>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/rainbow.png') }}" class="img-thumbnail" alt="" width="300" height="400" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Rainbow of the interaction pocket.
                            </div>
                        </div>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Second, we can visualize it in sphere form with no residue annotation
                            using the following code.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.vs.sm_local(
    prot_name='6feq',
    pdb_complex_fp='data/pdb/rcsb/',
    sm_rep="sticks",
    nby_rep='sticks',
    prot_c='blue_white_magenta',
    sm_c='blue_green',
    pocket_rep='sphere'
)</code></pre>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/sphere.png') }}" class="img-thumbnail" alt="" width="300" height="400" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Sphere of the interaction pocket.
                            </div>
                        </div>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Third, we can visualize it in surface form with no residue annotation
                            using the following code.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.vs.sm_local(
    prot_name='6feq',
    pdb_complex_fp='data/pdb/rcsb/',
    sm_rep="sticks",
    nby_rep='sticks',
    prot_c='blue_white_magenta',
    sm_c='blue_green',
    pocket_rep='surface'
)</code></pre>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/surface.png') }}" class="img-thumbnail" alt="" width="300" height="400" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Surface of the interaction pocket.
                            </div>
                        </div>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_name</code> - name of a protein in the prefix of a PDB file name (e.g., <code>1xqf</code> in <code>1xqfA.pdb</code>).
                            <br><code>pdb_complex_fp</code> - path where a target protein complex file is place.
                            <br><code>prot_c</code> - color of the entire protein.
                            <br><code>sm_rep</code> - representation of a ligand.
                            <br><code>nby_rep</code> - representation of amino acid residues surrounding a ligand.
                            <br><code>sm_c</code> - color of a ligand.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Output</h2>
                        {{-- section: output --}}
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">PyMOL(TM) Molecular Graphics System, Version 2.5.0.
 Copyright (c) Schrodinger, LLC.
 All Rights Reserved.

    Created by Warren L. DeLano, Ph.D.

    PyMOL is user-supported open-source software.  Although some versions
    are freely available, PyMOL is not in the public domain.

    If PyMOL is helpful in your work or study, then please volunteer
    support for our ongoing efforts to create open and affordable scientific
    software by purchasing a PyMOL Maintenance and/or Support subscription.

    More information can be found at "http://www.pymol.org".

    Enter "help" for a list of commands.
    Enter "help command-name" for information on a specific command.

 Hit ESC anytime to toggle between text and graphics.

 Detected OpenGL version 4.6. Shaders available.
 Detected GLSL version 4.60.
 OpenGL graphics engine:
  GL_VENDOR:   NVIDIA Corporation
  GL_RENDERER: NVIDIA GeForce RTX 2070/PCIe/SSE2
  GL_VERSION:  4.6.0 NVIDIA 536.40</code></pre>
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
                <a class="nav-link" href="#item-1">Protein-ligand binding pocket</a>
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
