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
                        <h2 class="blog-post-title mb-1">Batch collation</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            After going through how to <a href="{{ url('doc/collation/individual') }}" target="_blank"
                                                          class="stretched-link text-success" style="position: relative;">
                                collate individual proteins</a>, we
                            use this tutorial to batch collate a list of proteins.
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
                            We can first define a few Pandas dataframes to store the information
                            about 4 example proteins: <code>6cxh</code> chain <code>C</code>,
                            <code>3pux</code> chain <code>G</code>, <code>5guf</code> chain <code>A</code>,
                            and <code>4kjs</code> chain <code>A</code>.

                            <br><br>
                            <code>prot_df</code> stores the information about the four chains.
                            <br><code>prot_pdbtm_df</code> stores the information about all chains of
                            the protein PDBTM complexes that the four chains are derived from.
                            <br><code>prot_rcsb_df</code> stores the information about all chains of
                            the protein RCSB complexes that the four chains are derived from.

                        </div>
                        <pre><code class="language-python">import pandas as pd

prot_df = pd.DataFrame(
    [['6cxh', 'C'],
     ['3pux', 'G'],
     ['5guf', 'A'],
     ['4kjs', 'A'],]
)

prot_pdbtm_df = pd.DataFrame(
    [['3pux', 'E'],
    ['3pux', 'F'],
    ['3pux', 'G'],
    ['3pux', 'A'],
    ['3pux', 'B'],
    ['5guf', 'A'],
    ['5guf', 'B'],
    ['6cxh', 'A'],
    ['6cxh', 'B'],
    ['6cxh', 'C'],
    ['6cxh', 'D'],
    ['6cxh', 'E'],
    ['6cxh', 'F'],
    ['6cxh', 'G'],
    ['6cxh', 'H'],
    ['4kjs', 'A'],
    ['4kjs', 'C'],
    ['4kjs', 'D'],]
)

prot_rcsb_df = pd.DataFrame(
    [['4kjs', 'A'],
     ['4kjs', 'B'],
     ['6cxh', 'A'],
     ['6cxh', 'B'],
     ['6cxh', 'C'],
     ['5guf', 'A'],
     ['3pux', 'E'],
     ['3pux', 'F'],
     ['3pux', 'G'],
     ['3pux', 'A'],
     ['3pux', 'B'],],
)</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can use the following codes to batch collate them. If you have
                            a large number of protein complexes, the <code>tmk.collate.batch</code>
                            should be very effective for your needs.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df, transformation_detection = tmk.collate.batch(
    prot_df=prot_df,
    prot_pdbtm_df=prot_pdbtm_df,
    prot_rcsb_df=prot_rcsb_df,
    pdb_rcsb_fp=pdb_rcsb_fp,
    pdb_pdbtm_fp=pdb_pdbtm_fp,
)
print(df)
print(transformation_detection)</code></pre>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>pdb_rcsb_fp</code> - path where protein complexes from RCSB are placed.
                            <br><code>pdb_pdbtm_fp</code> - path where protein complexes from PDBTM are placed.
                            <br><code>prot_df</code> - tab-delimiter Pandas dataframe containing protein names and protein chains in two columns, respectively.
                            <br><code>prot_pdbtm_df</code> - tab-delimiter Pandas dataframe containing protein names and all of the chains of the protein (from PDBTM) in two columns, respectively.
                            <br><code>prot_rcsb_df</code> - tab-delimiter Pandas dataframe containing protein names and all of the chains of the protein (from RCSB) in two columns, respectively.
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
                            <pre><code class="language-python">      0  1     pdbtm   rcsb   diff source
0  6cxh  C  ABCDEFGH    ABC  FDHEG   rcsb
1  3pux  G     EFGAB  EFGAB          rcsb
2  5guf  A        AB      A      B   rcsb
3  4kjs  A       ACD     AB     CD   rcsb</code></pre>
                        </div>

                        <div class="alert alert-light" role="alert">
                            <i class="fa-solid fa-paperclip"></i>
                            It returns two output objects.
                            <br><code>protein collated df</code> - It contains 6 columns:
                            <ol class="list-group bg-light list-group-numbered">
                                <li class="list-group-item list-group-item-light">0</li>
                                <li class="list-group-item list-group-item-light">1</li>
                                <li class="list-group-item list-group-item-light">pdbtm</li>
                                <li class="list-group-item list-group-item-light">rcsb</li>
                                <li class="list-group-item list-group-item-light">diff</li>
                                <li class="list-group-item list-group-item-light">source</li>
                            </ol>

                            <br>The protein chain composed of col <code>0</code> and <code>1</code> comes from a complex
                            containing chains in cols <code>pdbtm</code> and <code>rcsb</code>.

                            <br>The different chains are stored in col <code>diff</code>.

                            <br>The column <code>source</code> means whether a chain(s) in PDBTM exists in
                            the chains in RCSB, which means if this chain(s) in PDBTM
                            is transformed using the BIOMAT 350 records.

                            <br>If <code>strategy='diff'</code> is selected and values in column <code>source</code> are
                            shown <code>rcsb</code>, which means all chains of a <code>self.prot_df</code> in PDBTM
                            can be found in RCSB.

                            <br><code>strategy_dict</code> stores the same or different chains between PDBTM and RCSB.

                            <br><code>throwback</code> - the path to the protein complex from PDBTM.

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
                <a class="nav-link" href="#item-1">Batch collation</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Parameters</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Run</a>
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
