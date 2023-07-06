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
                        <h2 class="blog-post-title mb-1">Retrieve</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            It is essential to gain access to the sequence and structure of a transmembrane protein,
                            which are usually presented in
                            <a href="https://en.wikipedia.org/wiki/FASTA_format" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                Fasta</a>
                            and
                            <a href="https://en.wikipedia.org/wiki/Protein_Data_Bank_(file_format)" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                Protein Data Bank </a> (PDB, <a href="https://www.rcsb.org" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                https://www.rcsb.org</a>)
                             formats, respectively.
                            In addition to the two formats, there is another one available, called
                            <a href="https://en.wikipedia.org/wiki/XML" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                extensible markup language</a> (XML), which was first provided by
                            <a href="http://pdbtm.enzim.hu/" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                the PDBTM database</a> to conveniently document the topologies of transmembrane proteins.

                            <br><br>
                            In TMKit, the module that allows users to download protein files from different sources
                            is <code>tmkit.seq</code>.
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
                        <h2>1. RCSB PDB file</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can retrieve a RCSB PDB file. First, we need to specify all proteins of interest
                            in a Pandas dataframe. In <strong>TMKit</strong>, the Pandas dataframe of proteins
                            is recognized.
                        </div>
                        <pre><code class="language-python">import pandas as pd

prot_series = pd.Series(['6e3y', '6rfq', '6t0b'])
</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            You can save the files in <code>'./data/pdb/'</code>.
                            Then, putting the following code.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.seq.retrieve_pdb_from_rcsb(
    prot_series=prot_series,
    sv_fp='./data/pdb/',
)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_series</code> - dataframe of proteins.
                            <br><code>sv_fp</code> - path to save the RCSB PDB file to be downloaded.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                   class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">===>No.1 protein name: 6e3y
Downloading PDB structure '6e3y'...
======>successfully downloaded!
===>No.2 protein name: 6rfq
Downloading PDB structure '6rfq'...
======>successfully downloaded!
===>No.3 protein name: 6t0b
Downloading PDB structure '6t0b'...
======>successfully downloaded!</code></pre>
                        </div>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Retrieve a PDBTM PDB file</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Similarly, we can retrieve a PDBTM PDB file.
                            Specifying all proteins of interest
                            in a Pandas dataframe.
                        </div>
                        <pre><code class="language-python">import pandas as pd

prot_series = pd.Series(['6e3y', '6rfq', '6t0b'])
</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            You can save the files in <code>'./data/pdb/'</code>.
                            Then, putting the following code.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.seq.retrieve_pdb_from_pdbtm(
    prot_series=prot_series,
    sv_fp='./data/pdb/pdbtm/',
)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_series</code> - dataframe of proteins.
                            <br><code>sv_fp</code> - path to save the PDBTM PDB file to be downloaded.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                   class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">===>No.1 protein name: 6e3y
======>successfully downloaded!
===>No.2 protein name: 6rfq
======>successfully downloaded!
===>No.3 protein name: 6t0b
======>successfully downloaded!</code></pre>
                        </div>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Retrieve a PDBTM XML file</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Similarly, we can retrieve a PDBTM PDB file. As introduced in
                            <a href="http://pdbtm.enzim.hu/?_=/docs/manual" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                the PDBTM official manual</a>,
                            there are many records in the PDBTM database, including
                            <code>pdb_id (PDB code)</code>, <code>ch_id (chain ID)</code>,
                            <code>type (topologies)</code>, <code>title (TITLE section of PDB file)</code>,
                            <code>numtm (number of transmembrane segments)</code>, <code>seq (sequence)</code>,
                            <code>n_ifh (number of interfacial helices)</code>,
                            <code>n_loop (number of loops)</code>, <code>source (SOURCE section of PDB file)</code>,
                            <code>class (HEADER section of PDB file)</code>, <code>keyword (keywords)</code>,
                            <code>creation (date of creation)</code>, <code>lmod_date (date of last modification)</code>,
                            <code>lmod_descr (description of last mod)</code>. These records help researchers understand
                            and screen transmembrane proteins. All records are placed in the XML file of a
                            PDB protein file. In these records, <code>&lt;REGION&gt;</code> represents the topology of a protein
                            and can be 1, 2, B, H, C, I, L, F and U, which correspond to Side1, Side2, Beta-strand,
                            alpha-helix, coil, membrane-inside, membrane-loop,
                            interfacial helix and unknown localizations, respectively.
                            <br><br>
                            Also, we can start specifying all proteins of interest in a Pandas dataframe.
                        </div>
                        <pre><code class="language-python">import pandas as pd

prot_series = pd.Series(['6e3y', '6rfq', '6t0b'])
</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            You can save the files in <code>'./data/xml/'</code>.
                            Then, putting the following code.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.seq.retrieve_xml_from_pdbtm(
    prot_series=prot_series,
    sv_fp='./data/xml/',
)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_series</code> - dataframe of proteins.
                            <br><code>sv_fp</code> - path to save the XML file to be downloaded.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                   class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">===>No.1 protein name: 6e3y
======>successfully downloaded!
===>No.2 protein name: 6rfq
======>successfully downloaded!
===>No.3 protein name: 6t0b
======>successfully downloaded!</code></pre>
                        </div>
                    </div>

                    <div id="item-1-4">
                        <h2>4. Retrieve a AlphaFold2 PDB file</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Since the emerging
                            <a href="https://alphafold.ebi.ac.uk" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                AlphaFold2</a>, technology has swept the whole protein field,
                            with a profound impact on the development of both experiment- and computation-driven
                            structural studies, we added a few its related functions to <strong>TMKit</strong> (
                            we are also continuing to release more of those.

                            <br><br>
                            Also, we can start specifying all proteins of interest in a Pandas dataframe. Differently,
                            we need to put the UniProt accession codes of the proteins, because they usually do
                             not have determined structures in the PDB.
                        </div>
                        <pre><code class="language-python">import pandas as pd

prot_series = pd.Series(['P63092', 'Q9B6E8', 'P07256', 'P63027'])
</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            You can save the files in <code>'./data/pdb/'</code>.
                            Then, putting the following code.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.seq.retrieve_pdb_alphafold(
    prot_series=prot_series,
    sv_fp='./data/pdb/',
)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_series</code> - dataframe of proteins.
                            <br><code>sv_fp</code> - path to save the AlphaFold2 PDB file to be downloaded.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                   class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">===>No.0 protein name: P63092
======>successfully downloaded!
===>No.1 protein name: Q9B6E8
======>successfully downloaded!
===>No.2 protein name: P07256
======>successfully downloaded!
===>No.3 protein name: P63027
======>successfully downloaded!</code></pre>
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
                <a class="nav-link" href="#item-1">Retrieve</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Retrieve a RCSB PDB</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Retrieve a PDBTM PDB file</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">3. Retrieve a PDBTM XML file</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-4">4. Retrieve a AlphaFold2 PDB file</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
