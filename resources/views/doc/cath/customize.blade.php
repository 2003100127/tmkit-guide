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
                        <h2 class="blog-post-title mb-1">Customized metrics</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            This tutorial will walk you through how to extract structure-related information from
                            a Cath database using your customized metrics.

                            <br><br>
                            <strong>TMKit</strong> offers an interface (<code>tmkit.cath</code>) to access the database.

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
                            Suppose you have two proteins of interest. They are <code>3udc</code>
                            chain <code>A</code> and <code>3rko</code> chain <code>A</code>.
                            Let's define them in Python and render them in a Pandas dataframe as shown below.
                        </div>
                        <pre><code class="language-python">import pandas as pd
prots = [['3udc', 'A'], ['3rko', 'A']]
df_prot = pd.DataFrame(prots, columns=['prot', 'chain'])</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, we also need to read the downloaded Cath database (if you miss it, please see
                            <a href="{{ url('doc/cath/fetch') }}" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                <strong>here</strong></a>) in the following way.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.cath.read(
    cath_fpn='./data/cath/cath-b-newest-all.txt',
    groupby='version',
    group='v4_2_0',
)
print(df)</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If you are interested in <code>funfam_number</code>, <code>superfamily_id</code>
                            and <code>pdb_segments</code> of the proteins, you can tell <strong>TMKit</strong> by using
                            a list like below.
                        </div>
                        <pre><code class="language-python">metrics = [
    'funfam_number',
    'superfamily_id',
    'pdb_segments',
]</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Finally, we can extract all information about the
                            two proteins using the <code>tmk.cath.fftojson</code> function.
                            The results will be saved in <code>'data/cath/processed.json'</code>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

res = tmk.cath.fftojson(
    df_prot=df_prot,
    df_cath_domain=df,
    sv_fpn='data/cath/processed.json',
    targets=metrics,
)
print(res)</code></pre>

                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>version</code> - version of the Cath database.
                            <br><code>sv_fpn</code> - path to a file to save results.
                            <br><code>cath_fpn</code> - path to the downloaded Cath database.
                            <br><code>groupby</code> - metric used to group data, e.g., <code>version</code>. There are 4 metrics in total, i.e., <code>domain</code>, <code>version</code>, <code>superfamily</code>, and <code>bound</code>.
                            <br><code>group</code> - value of a metric. For example, if <code>version</code> is chosen, there are two, namely, <code>v4_2_0</code> and <code>putative</code>.
                            <br><code>df_prot</code> - Pandas dataframe of a series of proteins, consisting of protein names in the 1st column and chains in the 2nd column.
                            <br><code>df_cath_domain</code> - Pandas dataframe of the Cath database.
                            <br><code>targets</code> - protein structure-related metrics, e.g., superfamily ID.

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
                            <pre><code class="language-python">======>No.1 protein complex: 3udc
=========>domain id is: 3udcA01
=========>domain id is: 3udcA02
=========>domain id is: 3udcA03
=========>domain id is: 3udcB01
=========>domain id is: 3udcB02
=========>domain id is: 3udcB03
=========>domain id is: 3udcC01
=========>domain id is: 3udcC02
=========>domain id is: 3udcC03
=========>domain id is: 3udcD01
=========>domain id is: 3udcD02
=========>domain id is: 3udcD03
=========>domain id is: 3udcE01
=========>domain id is: 3udcE02
=========>domain id is: 3udcE03
=========>domain id is: 3udcF01
=========>domain id is: 3udcF02
=========>domain id is: 3udcF03
=========>domain id is: 3udcG01
=========>domain id is: 3udcG02
=========>domain id is: 3udcG03
======>No.2 protein complex: 3rko
=========>domain id is: 3rkoA00
=========>domain id is: 3rkoB02
=========>domain id is: 3rkoE00
=========>domain id is: 3rkoF01
=========>domain id is: 3rkoG00
=========>domain id is: 3rkoJ01
=========>domain id is: 3rkoK00
=========>domain id is: 3rkoL02
======>The file is saved.
{'3udc': {'A': {'01': {}, '02': {'funfam_number': 4564, 'superfamily_id': '2.30.30.60', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '177', 'chain_code': 'A', 'start': '128'}]}, '03': {'funfam_number': None, 'superfamily_id': '3.30.70.100', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '265', 'chain_code': 'A', 'start': '178'}]}}, 'B': {'01': {}, '02': {'funfam_number': 4564, 'superfamily_id': '2.30.30.60', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '177', 'chain_code': 'B', 'start': '128'}]}, '03': {'funfam_number': None, 'superfamily_id': '3.30.70.100', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '265', 'chain_code': 'B', 'start': '178'}]}}, 'C': {'01': {}, '02': {'funfam_number': 4564, 'superfamily_id': '2.30.30.60', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '177', 'chain_code': 'C', 'start': '128'}]}, '03': {'funfam_number': None, 'superfamily_id': '3.30.70.100', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '265', 'chain_code': 'C', 'start': '178'}]}}, 'D': {'01': {}, '02': {'funfam_number': 4564, 'superfamily_id': '2.30.30.60', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '177', 'chain_code': 'D', 'start': '128'}]}, '03': {'funfam_number': None, 'superfamily_id': '3.30.70.100', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '265', 'chain_code': 'D', 'start': '178'}]}}, 'E': {'01': {}, '02': {'funfam_number': 4564, 'superfamily_id': '2.30.30.60', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '177', 'chain_code': 'E', 'start': '128'}]}, '03': {'funfam_number': None, 'superfamily_id': '3.30.70.100', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '265', 'chain_code': 'E', 'start': '178'}]}}, 'F': {'01': {}, '02': {'funfam_number': 4564, 'superfamily_id': '2.30.30.60', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '177', 'chain_code': 'F', 'start': '128'}]}, '03': {'funfam_number': None, 'superfamily_id': '3.30.70.100', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '265', 'chain_code': 'F', 'start': '178'}]}}, 'G': {'01': {}, '02': {'funfam_number': 4564, 'superfamily_id': '2.30.30.60', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '177', 'chain_code': 'G', 'start': '128'}]}, '03': {'funfam_number': None, 'superfamily_id': '3.30.70.100', 'pdb_segments': [{'pdb_code': '3udc', 'stop': '265', 'chain_code': 'G', 'start': '178'}]}}}, '3rko': {'A': {'00': {'funfam_number': None, 'superfamily_id': '1.20.58.1610', 'pdb_segments': [{'pdb_code': '3rko', 'stop': '126', 'chain_code': 'A', 'start': '15'}]}}, 'B': {'02': {}}, 'E': {'00': {'funfam_number': None, 'superfamily_id': '1.20.58.1610', 'pdb_segments': [{'pdb_code': '3rko', 'stop': '126', 'chain_code': 'E', 'start': '15'}]}}, 'F': {'01': {'funfam_number': None, 'superfamily_id': '1.20.120.1200', 'pdb_segments': [{'pdb_code': '3rko', 'stop': '160', 'chain_code': 'F', 'start': '1'}]}}, 'G': {'00': {}}, 'J': {'01': {'funfam_number': None, 'superfamily_id': '1.20.120.1200', 'pdb_segments': [{'pdb_code': '3rko', 'stop': '160', 'chain_code': 'J', 'start': '1'}]}}, 'K': {'00': {}}, 'L': {'02': {}}}}</code></pre>
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
                <a class="nav-link" href="#item-1">Customized metrics</a>
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
