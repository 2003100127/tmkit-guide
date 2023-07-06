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
                        <h2 class="blog-post-title mb-1">Conversion between PDB and UniProt <IDs></IDs></h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <strong>TMKit</strong> provides a function to convert between a
                            PDB ID to an UniProt accession code. This tutorial shows how to

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
                            First, we can convert from a PDB ID to an UniProt accession code.
                            The PDB ID that will be recognized by <strong>TMKit</strong> should be
                            a protein name concatenated with a chain name by '_', e.g.,
                            <code>1xqf.A</code>. In our example dataset, there is a file that can
                            be found in <code>data/map/pdb_chain_uniprot.csv</code>, which needs to
                            be specified during the conversion.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

res = tmk.mapping.pdb2uniprot(
    id='1qxf.A',
    ref_fpn='data/map/pdb_chain_uniprot.csv',
)
print(res)

# output
O28935</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, we can convert from an UniProt accession code to a PDB ID.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

res = tmk.mapping.uniprot2pdb(
    id='O28935',
    ref_fpn='data/map/pdb_chain_uniprot.csv',
)
print(res)

# output
1qxf.A</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If there is a list of protein IDs to be converted,
                            we can do it like below.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk
import pandas as pd

prot_series = pd.Series(['6e3y', '6rfq', '6t0b'])
for prot in prot_series.index:
    res = tmk.mapping.pdb2uniprot(
        id=prot_series.iloc[prot],
        ref_fpn='data/map/pdb_chain_uniprot.csv',
    )
    print(res)

# output
P63092
Q9B6E8
P07256</code></pre>

                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>id</code> - a PDB ID  (e.g., 1qxf.A) or a UniProt accession code (e.g., O28935).
                            <br><code>ref_fpn</code> - reference file for conversion between PDB IDs and UniProt accession codes.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Output</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Please check the output in each vignette above.
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
                <a class="nav-link" href="#item-1">Conversion between PDB and UniProt <IDs></IDs></a>
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
