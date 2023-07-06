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
                        <h2 class="blog-post-title mb-1">Coloring</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <strong>TMKit</strong> allows users to color a protein in its any segments.
                            This function is added to <code>TMKit</code> considering that
                            users may simply want to highlight some important domains and see clearly
                            where they appear in a protein structure. This is exactly when
                            you can consider this application. We made it readily available by
                            using <code>tmk.vs.coloring</code>.
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
                            As an example, we take protein <code>6uiw</code> chain <code>A</code> to color
                            the following segments, residues <code>1-4</code>,
                            <code>58-61</code>, <code>5-57</code>,
                            <code>62-81</code>, <code>62</code>, <code>78</code>, and <code>81</code>.
                            A segment you want to color can be a single residue or a list of continuously numbered
                            residues. First, the whole protein will be colored <code>chromium</code>.
                            Then, if you want to color residues <code>1-4</code> red,
                            residues <code>5-57</code> orange,
                            residues <code>58-61</code> red,
                            residues <code>62-81</code> br4, and particularly,
                            residues <code>62</code>, <code>78</code>, and <code>81</code> violet, you can
                            put parameters <code>actions</code> and <code>colors</code> that way as shown below.
                            The <code>forms</code> parameter in the command
                            will render the segments in <code>lines</code> form.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.vs.coloring(
    pdb_fp='data/pdb/',
    prot_name='6uiw',
    seq_chain='A',
    prot_c='chromium',

    names=['segment1', 'segment2', 'segment3', 'segment4', 'segment5'],
    actions=['resi 1-4', 'resi 5-57', 'resi 58-61', 'i. 62-81', 'i. 62+78+81'],
    colors=['red', 'orange', 'red', 'br4', 'violet', ],
    forms=['lines', 'lines', 'lines', 'lines', 'lines', ],
)</code></pre>

                    </div>

                    <div class="text-center">
                        <img src="{{ URL::asset('img/6uiwA-coloring.png') }}" class="img-thumbnail" alt="" width="300" height="400" loading="lazy">
                        <div class="pb-4 mb-4 fst-italic border-bottom">
                            <br><strong>Caption</strong>. Segment colors of
                            <code>6t0b</code> chain <code>m</code>.
                        </div>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_name</code> - name of a protein in the prefix of a PDB file name (e.g., <code>1xqf</code> in <code>1xqfA.pdb</code>).
                            <br><code>seq_chain</code> - chain of a protein in the prefix of a PDB file name (e.g., <code>A</code> in <code>1xqfA.pdb</code>).
                            <br><code>pdb_fp</code> - path where a target PDB file is place.
                            <br><code>prot_c</code> - color of the entire protein.
                            <br><code>names</code> - names of segments.
                            <br><code>actions</code> - which segments.
                            <br><code>colors</code> - colors selected for the segments.
                            <br><code>forms</code> - representation.
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
    Enter "help <command-name>" for information on a specific command.

 Hit ESC anytime to toggle between text and graphics.

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
                <a class="nav-link" href="#item-1">Coloring</a>
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
