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
                        <h2 class="blog-post-title mb-1">Collate an individual protein</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            In this tutorial, we introduce <code>tmkit.collate</code>,
                            a module to allow collation of a protein chain downloaded
                            from <strong>PDBTM</strong> by comparing it with chains
                            of the same protein downloaded from <strong>RCSB</strong>.
                            When studies involve a <strong>PDBTM</strong>-derived
                            protein chain, the collation is probably required since there
                            may be chains from a <strong>RCSB</strong> PDB structure file
                            that are transformed to it or ignored by PDBTM.
                            This tutorial gives an example of detecting such information
                            at the per-protein level.
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
                            First, we need to prepare RCSB and PDBTM structures of proteins.
                            We have put a few protein structures in the following folders if you have downloaded
                            <a href="{{ url('doc/exdataset') }}" target="_blank" class="stretched-link text-info" style="position: relative;">
                                our example dataset</a>. Alternatively, you can obtain them through
                            <a href="{{ url('doc/seq/retrieve') }}" target="_blank" class="stretched-link text-info" style="position: relative;">
                                this tutorial</a>.
                        </div>
                        <pre><code class="language-python">pdb_rcsb_fp = 'data/pdb/collate/rcsb/'
pdb_pdbtm_fp = 'data/pdb/collate/pdbtm/'</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, we can check how many chains there are and what chains are contained in there
                            by using the following code.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

# PDBTM
chains = tmk.collate.chain(
    prot_name='6cxh',
    pdb_fp=pdb_pdbtm_fp,
)
print(chains)

# output
======>protein has chains ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']
['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If we focus on a certain chain <code>C</code> of protein <code>6cxh</code>,
                            we can get how many other chains differ to each other or are the same.
                            The output dataframe allows you to see there are chains <code>GDEHF</code>
                            from RCSB that are different from those from PDBTM.
                            The <code>transformation_detection</code> is used to check if
                            the chain of focus is transformed by another chain from a RCSB PDB structure.
                            <code>untransformed</code> means it is not transformed by another chain.
                            Please see the output below.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df, transformation_detection = tmk.collate.single(
    prot_name='6cxh',
    chain_focus='C',
    pdb_rcsb_fp=pdb_rcsb_fp,
    pdb_pdbtm_fp=pdb_pdbtm_fp,
)

# output
print(df)
prot_name chain pdbtm_chains rcsb_chains source   diff same
0      6cxh     C     ABCDEFGH         ABC   rcsb  GDEHF  ACB

print(transformation_detection)
{'6cxh.C': 'untransformed'}</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If we test protein <code>3pux</code> chain <code>G</code>, we found that
                            the PDB structure from PDBTM is the same as that from RCSB, shown below.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df, transformation_detection = tmk.collate.single(
    prot_name='3pux',
    chain_focus='G',
    pdb_rcsb_fp=pdb_rcsb_fp,
    pdb_pdbtm_fp=pdb_pdbtm_fp,
)

# output
print(df)
  prot_name chain pdbtm_chains rcsb_chains source diff   same
0      3pux     G        EFGAB       EFGAB   rcsb       AEFGB

print(transformation_detection)
{'3pux.G': 'untransformed'}</code></pre>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_name</code> - name of a protein in the prefix of a PDB file name (e.g., <code>1xqf</code> in <code>1xqfA.pdb</code>).
                            <br><code>chain_focus</code> - chain of a protein in the prefix of a PDB file name (e.g., <code>A</code> in <code>1xqfA.pdb</code>).
                            <br><code>pdb_rcsb_fp</code> - path to a protein complex from RCSB.
                            <br><code>pdb_pdbtm_fp</code> - path to a protein complex from PDBTM.
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
                            <pre><code class="language-python">======>protein has chains ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']
['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']
======>basic info:
  prot_name chain pdbtm_chains rcsb_chains source diff   same
0      3pux     G        EFGAB       EFGAB   rcsb       AEFGB
  prot_name chain pdbtm_chains rcsb_chains source diff   same
0      3pux     G        EFGAB       EFGAB   rcsb       AEFGB
{'3pux.G': 'untransformed'}</code></pre>
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
                <a class="nav-link" href="#item-1">Collate an individual protein</a>
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
