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
                        <h2 class="blog-post-title mb-1">BioGRID</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <a href="https://thebiogrid.org" target="_blank" class="stretched-link text-success" style="position: relative;">
                                <strong>BioGRID</strong></a> is one of the most widely-used databases that
                            catalogues protein-protein interactions. In version 4.4.223, the database is constructed by
                            going through more than 80,000 publications, which
                            has 2,629,002 protein and genetic interactions.

                            <br><br>
                            According to the <strong>BioGRID</strong> database, transmembrane proteins are involved in
                            nearly a quarter of all confirmed human interactions, and an even
                            higher percentage (almost 40%) was identified based on the most
                            recent human interactome map.

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
                            First, let's download the BioGRID database.
                            In the example dataset, there is a folder called <code>ppi</code>.
                            The path is <code>'./data/ppi/'</code>, which is the place where we suggest
                            users to manage the data used and generated. We can choose a specific
                            version of the database, namely, <code>4.4.212</code> and save it in
                            <code>'./data/ppi/'</code> through parameter <code>sv_fp</code>.

                            <br><br>
                            You should have a file called <code>BIOGRID-ALL-4.4.212.tab3.zip</code> after downloading.
                            The <code>tmk.ppi.download_biogrid_db</code> function will automatically decompress it
                            as <code>BIOGRID-ALL-4.4.212.tab3.txt</code>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.ppi.download_biogrid_db(
    version='4.4.212',
    sv_fp='./data/ppi/',
)</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, using the following codes, you can access the database.
                            The <code>'data/ppi/BIOGRID-ALL-4.4.212.tab3.txt'</code> is the BioGRID database.
                            The <code>tmk.ppi.read_biogrid_db</code> function will extract a subset of it
                            containing only protein interactors A and B (
                            <code>SWISS-PROT Accessions Interactor A</code> and
                            <code>SWISS-PROT Accessions Interactor B</code>).

                            <br><br>
                            Importantly, this function will save the subset as in
                            <code>BIOGRID-ALL-4.4.212.biogrid</code> in <code>'./data/ppi/BIOGRID-ALL-4.4.212.biogrid'</code>
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.ppi.read_biogrid_db(
    biogrid_fpn='data/ppi/BIOGRID-ALL-4.4.212.tab3.txt',
    sv_fpn='data/ppi/BIOGRID-ALL-4.4.212.biogrid',
    extract_ids=[
        'SWISS-PROT Accessions Interactor A',
        'SWISS-PROT Accessions Interactor B',
    ],
)
print(df)</code></pre>

                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>version</code> - version of a BioGRID database, for example, 4.4.212.
                            <br><code>biogrid_fpn</code> - path where a BioGRID database is placed.
                            <br><code>sv_fp</code> - path to where you want to save files.
                            <br><code>extract_ids</code> - a list that can include more than one feature, such as <code>SWISS-PROT Accessions Interactor A</code> and <code>SWISS-PROT Accessions Interactor B</code>.

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
                            Finally, you will see the following output, which shows 37 features
                            in <strong>BioGRID</strong>, for example <code>Entrez Gene Interactor A</code>.
                            You can extract each of the feature in Python, e.g.,
                            <code>df['SWISS-PROT Accessions Interactor A']</code>.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">======>reading BioGRID...
======>BioGRID features are:
=========>No.1: #BioGRID Interaction ID
=========>No.2: Entrez Gene Interactor A
=========>No.3: Entrez Gene Interactor B
=========>No.4: BioGRID ID Interactor A
=========>No.5: BioGRID ID Interactor B
=========>No.6: Systematic Name Interactor A
=========>No.7: Systematic Name Interactor B
=========>No.8: Official Symbol Interactor A
=========>No.9: Official Symbol Interactor B
=========>No.10: Synonyms Interactor A
=========>No.11: Synonyms Interactor B
=========>No.12: Experimental System
=========>No.13: Experimental System Type
=========>No.14: Author
=========>No.15: Publication Source
=========>No.16: Organism ID Interactor A
=========>No.17: Organism ID Interactor B
=========>No.18: Throughput
=========>No.19: Score
=========>No.20: Modification
=========>No.21: Qualifications
=========>No.22: Tags
=========>No.23: Source Database
=========>No.24: SWISS-PROT Accessions Interactor A
=========>No.25: TREMBL Accessions Interactor A
=========>No.26: REFSEQ Accessions Interactor A
=========>No.27: SWISS-PROT Accessions Interactor B
=========>No.28: TREMBL Accessions Interactor B
=========>No.29: REFSEQ Accessions Interactor B
=========>No.30: Ontology Term IDs
=========>No.31: Ontology Term Names
=========>No.32: Ontology Term Categories
=========>No.33: Ontology Term Qualifier IDs
=========>No.34: Ontology Term Qualifier Names
=========>No.35: Ontology Term Types
=========>No.36: Organism Name Interactor A
=========>No.37: Organism Name Interactor B
======>The file is saved.
        SWISS-PROT Accessions Interactor A SWISS-PROT Accessions Interactor B
0                                   P45985                             Q14315
1                                   Q86TC9                             P35609
2                                   Q04771                             P49354
3                                   P23769                             P29590
4                                   P15927                             P40763
...                                    ...                                ...
2407708                             P0DTC2                             P53622
2407709                             P0DTC2                             Q96WV5
2407710                             P38260                             P11484
2407711                             P38260                             P32589
2407712                             P59594                             P53621

[2407713 rows x 2 columns]</code></pre>
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
                <a class="nav-link" href="#item-1">BioGRID</a>
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
