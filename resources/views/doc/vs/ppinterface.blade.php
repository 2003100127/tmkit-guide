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
                        <h2 class="blog-post-title mb-1">PPI interface</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            Identification of <strong>protein-protein interaction (PPI)</strong>
                            interfaces of proteins is critical to understand the biological
                            processes governed by them. Direct visualization of the PPI
                            interfaces on 3D structures can facilitate their localization at
                            the atomic coordinate level. TMKit is an open-source toolkit that
                            enables access to the PPI interfaces by taking as input the
                            structure of a protein of interest (POI) and a list of
                            probabilities of residue sites to be involved in interactions.
                            The program can automatically generate the label- or propensity-based
                            PPI interfaces in between a POI and its interacting proteins
                            (or its larger complex), which can be visualised in
                            <a href="https://pymol.org/2" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                PyMOL</a>.

                            <br><br>
                            <strong>TMKit</strong> allows users to visualize the structure-based
                            interfaces between proteins in a complex. As shown in the plot below,
                            we generate the PPI interfaces in <a href="https://doi.org/10.1016/j.csbj.2023.01.036" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                this paper</a>.
                        </div>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/all.png') }}" class="img-thumbnail" alt="" width="1000" height="600" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Interfaces of <code>5b0w</code> chain <code>A</code>
                                and <code>6t0b</code> chain <code>m</code> in complex with their interaction partners, respectively.
                            </div>
                        </div>

                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-circle-info"></i>
                            Visualization of PPI interfaces in <strong>TMKit</strong> relies
                            on <strong>PyMOL</strong> but it is not installed by default. To use this function,
                            you need to install PyMOL. There are two ways to install it very easily as below.
                            We recommend installing it using an open-source PyMOL version (
                            <a href="https://github.com/schrodinger/pymol-open-source" target="_blank" class="stretched-link text-info" style="position: relative;">
                                the first way</a>).
                            For more detail, see also
                            <a href="https://pymol.org/2/support.html?#installation" target="_blank" class="stretched-link text-info" style="position: relative;">
                                here</a>.
                        </div>
                        <pre><code class="language-python"># highly recommended option
conda install -c conda-forge pymol-open-source

# or
conda install -c schrodinger pymol
</code></pre>

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
                            After importing <strong>TMKit</strong>, the following command allows you to
                            visualize the PPI interfaces of protein <code>6e3y</code> chain <code>E</code>
                            with other chains in complex protein <code>6e3y</code>.
                            The PPI interfaces are predicted using <a href="https://doi.org/10.1016/j.csbj.2021.03.005" target="_blank" class="stretched-link text-info" style="position: relative;">
                                DeepTMInter</a>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.vs.protoc_deeptminter(
    prot_name='6e3y',
    prot_chain='E',
    pdb_chain_fp='data/pdb/',
    dist_fp='data/rrc/',
    pdb_complex_fp='data/pdb/pdbtm/',
    tool='deeptminter',
    draw_type='probability',
    isite_fp='data/isite/',
    sv_bfactor_fp='data/vs/bfactor/6e3y/',
    pymol_bg_chain_ids='B+C+J+K',
)</code></pre>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/6e3yE.png') }}" class="img-thumbnail" alt="" width="400" height="200" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>. Predicted PPI interfaces in green for
                                <code>6e3y</code> chain <code>E</code> in complex with
                                their interaction partners in red, respectively.
                            </div>
                        </div>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                           The keynote here is the input of predicted PPI interfaces.
                            For your information, we show what this input file looks like below.
                            It has three columns
                            <ul class="list-group-flush">
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Residue ID</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Residue</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Predicted probability</li>
                            </ul>
                            In fact, you can generate a file in this format if you have other
                            Predicted PPI interfaces as regulated by parameter <code>isite_fp</code>.
                            Then, <strong>TMKit</strong> will recognize that anyway.

                            <br>
                            <br>
                            It should also be noticed that <strong>TMKit</strong> will use
                            the Predicted PPI interfaces to generate a file that is recognized by
                            PyMOL as saved in <code>sv_bfactor_fp</code>.
                        </div>
                        <pre><code class="language-python">1.0	E	0.18815077418058843
2.0	A	0.18221259814512925
3.0	N	0.48554193714932137
4.0	Y	0.2300926974945463
5.0	G	0.19098275362491618
6.0	A	0.29934709803605297
7.0	L	0.6238960299120727
8.0	L	0.23262215907285386
9.0	R	0.20293083989377006
10.0	E	0.19328412766954645
...
114.0	K	0.7522871745416599
115.0	R	0.7660381644357218
</code></pre>
                    </div>



                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_name</code> - name of a protein in the prefix of a PDB file name (e.g., <code>1xqf</code> in <code>1xqfA.pdb</code>).
                            <br><code>prot_chain</code> - chain of a protein in the prefix of a PDB file name (e.g., <code>A</code> in <code>1xqfA.pdb</code>).
                            <br><code>pdb_chain_fp</code> - path where a target PDB file is place.
                            <br><code>dist_fp</code> - path where a file containing real distances between residues is placed (please check the file at <code>./data/rrc</code> in the example dataset).
                            <br><code>pdb_complex_fp</code> - path where a PDB file showing a protein complex is placed.
                            <br><code>tool</code> - tool name. Currently, the reading of DeepTMInter, DELPHI, and MBPred files is supported.
                            <br><code>isite_fp</code> - path where a file showing interaction sites and the interaction likelihoods is placed.
                            <br><code>sv_bfactor_fp</code> - path to save a bfactor file.
                            <br><code>bg_chain_ids</code> - interaction chains in a protein complex.
                            <br><code>bg_chain_color</code> - color of interaction chains in a protein complex.
                            <br><code>draw_type</code> - label_actual, # label_actual, label_predicted, probability
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
                            Finally, you will see the following output.
                        </div>
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

======>Time to read&label distances for 6e3y E: 0.004998445510864258s.
======>Time to read&label distances for 6e3y E: 0.003000020980834961s.
['P', 'N', 'A', 'B', 'G', 'R', 'E']

bFactor:
///E/29/N new: 0.188151
///E/29/CA new: 0.188151
///E/29/C new: 0.188151
...
///E/143/NH2 new: 0.766038

 Detected OpenGL version 4.6. Shaders available.
 Detected GLSL version 4.60.
 OpenGL graphics engine:
  GL_VENDOR:   NVIDIA Corporation
  GL_RENDERER: NVIDIA GeForce RTX 2070/PCIe/SSE2
  GL_VERSION:  4.6.0 NVIDIA 536.40
 Detected 12 CPU cores.  Enabled multithreaded rendering.
D:\Programming\anaconda3\envs\tmkit\Lib\site-packages\pymol\commanding.py:321: DeprecationWarning: setDaemon() is deprecated, set the daemon attribute instead
  t.setDaemon(1)</code></pre>
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
                <a class="nav-link" href="#item-1">Interface visualization</a>
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


{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/6t0bm/actual.png') }}" class="img-thumbnail" alt="" width="1000" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. Real interfaces of <code>6t0b</code> chain--}}
{{--        <code>m</code> in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/6t0bm/actual-details.png') }}" class="img-thumbnail" alt="" width="400" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. Detailed real interfaces of <code>6t0b</code> chain <code>m</code>--}}
{{--        in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/6t0bm/deeptminter.png') }}" class="img-thumbnail" alt="" width="1000" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. DeepTMInter-predicted interfaces of <code>6t0b</code> chain--}}
{{--        <code>m</code> in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/6t0bm/deeptminter-details.png') }}" class="img-thumbnail" alt="" width="400" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. Detailed DeepTMInter-predicted interfaces of <code>6t0b</code> chain <code>m</code>--}}
{{--        in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/6t0bm/delphi.png') }}" class="img-thumbnail" alt="" width="1000" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. DELPHI-predicted interfaces of <code>6t0b</code> chain--}}
{{--        <code>m</code> in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/6t0bm/delphi-details.png') }}" class="img-thumbnail" alt="" width="400" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. Detailed DELPHI-predicted interfaces of <code>6t0b</code> chain <code>m</code>--}}
{{--        in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/6t0bm/mbpred.png') }}" class="img-thumbnail" alt="" width="1000" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. MBPred-predicted interfaces of <code>6t0b</code> chain--}}
{{--        <code>m</code> in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/6t0bm/mbpred-details.png') }}" class="img-thumbnail" alt="" width="400" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. Detailed MBPred-predicted interfaces of <code>6t0b</code> chain <code>m</code>--}}
{{--        in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/5b0wA/actual.png') }}" class="img-thumbnail" alt="" width="600" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. Real interfaces of <code>5b0w</code> chain--}}
{{--        <code>A</code> in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/5b0wA/deeptminter.png') }}" class="img-thumbnail" alt="" width="600" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. DeepTMInter-predicted interfaces of <code>5b0w</code> chain--}}
{{--        <code>A</code> in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/5b0wA/delphi.png') }}" class="img-thumbnail" alt="" width="600" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. DELPHI-predicted interfaces of <code>5b0w</code> chain--}}
{{--        <code>A</code> in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="text-center">--}}
{{--    <img src="{{ URL::asset('img/5b0wA/mbpred.png') }}" class="img-thumbnail" alt="" width="600" height="600" loading="lazy">--}}
{{--    <div class="pb-4 mb-4 fst-italic border-bottom">--}}
{{--        <br><strong>Caption</strong>. MBPred-predicted interfaces of <code>5b0w</code> chain--}}
{{--        <code>A</code> in complex with their interaction partners, respectively.--}}
{{--    </div>--}}
{{--</div>--}}
