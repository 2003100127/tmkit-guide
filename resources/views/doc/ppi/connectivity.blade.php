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
                        <h2 class="blog-post-title mb-1">Connectivity</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            Protein connectivity reflects how many known biological processes in which a
                            protein is involved if known protein-protein interaction (PPI) databases are used.
                            <strong>TMKit</strong> is powerful in studying protein connectivity as it not only
                            detect the interaction partners but also confirm how many subunits in a protein
                            complex (where it resides) interact with it.

                            <br><br>
                            In tutorials <a href="{{ url('doc/ppi/biogrid') }}" target="_blank" class="stretched-link text-success" style="position: relative;">
                                <strong>BioGRID</strong></a> and <a href="{{ url('doc/ppi/intact') }}" target="_blank" class="stretched-link text-success" style="position: relative;">
                                <strong>IntAct</strong></a>, we have shown how to access them. We can now use
                            the combination of them to study protein connectivity.

                            <br><br>
                            <strong>TMKit</strong> offers an interface (<code>tmkit.ppi</code>) to access the database.

                            In this tutorial, we will show how we can use this database in Python,
                            starting from downloading it.

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
                            First, we can define some file paths in <code>ppi_db_fpns</code>
                            as shown below, where <strong>BioGRID</strong>
                            (<code>BIOGRID-ALL-4.4.212.biogrid</code>)
                            and <strong>IntAct</strong> (<code>interA_B.intact</code>) can be found.
                        </div>
                        <pre><code class="language-python">ppi_db_fpns = {
    'biogrid': 'data/ppi/BIOGRID-ALL-4.4.212.biogrid',
    'intact': 'data/ppi/interA_B.intact',
}</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, using the following codes, you can generate the interaction partners
                            of a given protein <code>3pux</code> chain <code>G</code> whose UniProt
                            accession code is <code>P68183</code>. In the PDB structure, there are
                            other 4 chains, <code>A</code>, <code>B</code>, <code>E</code>, and <code>F</code>.

                            <br><br>
                            The <code>tmk.ppi.connectivity</code> method will first return all
                            interaction partners of protein <code>3pux</code> chain <code>G</code> in
                            <strong>BioGRID</strong> and <strong>IntAct</strong>, and then return how many
                            chains interact with it. We need to specify a dictionary called
                            <code>interacting_partner_idmap</code> where a PDB code matches an UniProt
                            accession code (e.g., <code>'3pux.A': 'P68187'</code>). Of course,
                            protein <code>3pux</code> chain <code>G</code> itself is needed to do so
                            <code>'3pux.G': 'P68183'</code> in <code>prot_idmap</code>.

                            <br><br>
                            Their complex structures are needed and the paths to them can be specified using parameters
                            <code>pdb_rcsb_fp</code> and <code>pdb_pdbtm_fp</code>.

                            <br><br>
                            Finally, the results will be saved in <code>'./data/ppi/indepdata.ppidb'</code> using parameter
                            <code>sv_fpn</code>. It will be like this below.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.ppi.connectivity(
    prot_name='3pux',
    seq_chain='G',
    prot_idmap={'3pux.G': 'P68183'},
    interacting_partner_idmap={
        '3pux.A': 'P68187',
        '3pux.B': 'P68187',
        '3pux.E': 'P0AEX9',
        '3pux.F': 'P02916',
    },
    pdb_rcsb_fp='./data/pdb/rcsb/',
    pdb_pdbtm_fp='./data/pdb/pdbtm/',
    sv_fpn='./data/ppi/indepdata.ppidb',
    ppi_db_fpns=ppi_db_fpns,
)
print(df)</code></pre>

                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_name</code> - name of a protein in the prefix of a PDB file name (e.g., 1xqf in 1xqfA.pdb).
                            <br><code>seq_chain</code> - chain of a protein in the prefix of a PDB file name (e.g., A in 1xqfA.pdb) (biological purpose).
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">explanations</a>
                            for the difference between <code>seq_chain</code> and <code>file_chain</code>.
                            <br><code>sv_fp</code> - path to where you want to save files.
                            <br><code>prot_idmap</code> - a Python dict with key -> value for PDB ID -> UniProt accession code (please see the command below for details).
                            <br><code>interacting_partner_idmap</code> - a Python dict with key -> value for PDB ID -> UniProt accession code (please see the command below for details).
                            <br><code>pdb_rcsb_fp</code> - path where a target PDB file is placed..
                            <br><code>pdb_pdbtm_fp</code> - path where a target PDB file is placed..
                            <br><code>ppi_db_fpns</code> - paths where interaction databases are placed (e.g., BIOGRID-ALL-4.4.212.biogrid and interA_B.intact).

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
                            Finally, you will see the following output. By searching two interaction
                            databases, all interaction partners
                            of protein <code>3pux</code> chain <code>G</code> are in the second column below.
                            <ul class="list-group-flush">
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P02916']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P02943']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P0A8N3']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P0AEX9']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P0AGH8']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P10907']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P19576']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P33650']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P37019']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P42907']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P68187']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'P76084']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'Q46832']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'chebi:"CHEBI:15422"']</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> ['3pux.G' 'chebi:"CHEBI:47785"']</li>
                            </ul>.
                            In the same time, the output also tells you that the 4
                            chains in the complex are all its interacting partners, which you can
                            find via key <code>num_ip_overlapped_db</code>
                            in file <code>'./data/ppi/indepdata.ppidb'</code>.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">======>basic info:
  prot_name chain pdbtm_chains rcsb_chains source diff   same
0      3pux     G        EFGAB       EFGAB   rcsb       EFGBA
===>UniProt protein id: {'3pux.G': 'P68183'}
===>protein 1 chain 3pux
======>scanning ppi db: biogrid
=========>Record(s) for P68183 found in the left column.
=========>Record(s) for P68183 found in the left column.
======>scanning ppi db: intact
=========>No record(s) for P68183 found in the left column.
=========>Record(s) for P68183 found in the left column.
======>interacting partners from the ppi databases:
[['3pux.G' 'P02916']
 ['3pux.G' 'P02943']
 ['3pux.G' 'P0A8N3']
 ['3pux.G' 'P0AEX9']
 ['3pux.G' 'P0AGH8']
 ['3pux.G' 'P10907']
 ['3pux.G' 'P19576']
 ['3pux.G' 'P33650']
 ['3pux.G' 'P37019']
 ['3pux.G' 'P42907']
 ['3pux.G' 'P68187']
 ['3pux.G' 'P76084']
 ['3pux.G' 'Q46832']
 ['3pux.G' 'chebi:"CHEBI:15422"']
 ['3pux.G' 'chebi:"CHEBI:47785"']]
======>interacting partner idmap: {'3pux.A': 'P68187', '3pux.B': 'P68187', '3pux.E': 'P0AEX9', '3pux.F': 'P02916'}
======>interacting partners from its complex: ['3pux.A', '3pux.B', '3pux.E', '3pux.F']
======>uniprot ids of interacting partners from its complex:['P68187', 'P68187', 'P0AEX9', 'P02916']
======>15 records found from the ppi databases
======>4 interacting partners from its complex
======>4 interacting partners from its complex and found in the ppi databases as well
  prot_name chain pdbtm_chains  ... num_ip ip_chains num_ip_overlapped_db
0      3pux     G        EFGAB  ...    4.0      ABEF                  4.0

[1 rows x 11 columns]</code></pre>
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
                <a class="nav-link" href="#item-1">Connectivity</a>
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
