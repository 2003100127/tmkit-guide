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
                        <h2 class="blog-post-title mb-1">MutHTP</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            The <a href="https://www.iitm.ac.in/bioinfo/MutHTP/index.php" target="_blank" class="stretched-link text-success" style="position: relative;">
                                MutHTP</a> database collects a cohort of missense, insertion,
                            and deletion mutation sites from the 5 commonly used resources:
                            Humsavar, SwissVar, 1000 Genomes, COSMIC and ClinVar databases.

                            <br><br>
                            <strong>TMKit</strong> offers an interface (<code>tmkit.mut</code>) to access the database.

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
                            First, let's download a database of MutHTP.
                            In the example dataset, there is a folder called <code>mutation</code>.
                            The path is <code>'./data/mutation/'</code>, which is the place where we suggest
                            users to manage the data used and generated.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.mut.download_muthtp_db(
    version='2020',
    sv_fp='./data/mutation/'
)</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            After decompressing it, you will have <code>MutHTP_2020.txt</code>.
                            We can now access this database using the following code.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.mut.read_muthtp_db(
    muthtp_fpn='./data/mutation/MutHTP_2020.txt'
)
print(df)</code></pre>

                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>version</code> - version of a MutHTP database, for example, 2020.
                            <br><code>muthtp_fpn</code> - path where a MutHTP database is placed.
                            <br><code>sv_fp</code> - path to where you want to save a MutHTP database to be downloaded.

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
                            Finally, you will see the following output, which shows 22 features
                            in <strong>MutHTP</strong>, including Uniprot IDs (<code>uniprot_id</code>), PDB IDs
                            (<code>pdb_id</code>), topological information (<code>topology</code>), etc.
                            You can extract each of the feature in Python, e.g., <code>df['topology']</code>.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">======>reading MutHTP...
======>MutHTP features are:
=========>No.1: id
=========>No.2: gene_id
=========>No.3: uniprot_id
=========>No.4: mutation_type
=========>No.5: chromosome_number
=========>No.6: origin_cell
=========>No.7: nucleotide_mutation_site
=========>No.8: protein_mutation_site
=========>No.9: pdb_id
=========>No.10: protein_structure_mutation_site
=========>No.11: 3D_structure
=========>No.12: interface
=========>No.13: transmembrane_domain
=========>No.14: topology
=========>No.15: disease
=========>No.16: disease_class
=========>No.17: uniprot_id_isoform
=========>No.18: neighbouring_residue
=========>No.19: source_database
=========>No.20: conservation_score
=========>No.21: odds_ratio
=========>No.22: type_passing_membrane
            id  gene_id  ... odds_ratio type_passing_membrane
0            1    ESYT2  ...          -            Multi-pass
1            2  SLC5A10  ...          -            Multi-pass
2            3  SLC5A10  ...          -            Multi-pass
3            4  SLC5A10  ...          -            Multi-pass
4            5  SLC5A10  ...          -            Multi-pass
...        ...      ...  ...        ...                   ...
206384  206385   SLC4A4  ...        NaN                   NaN
206385  206386   SLC4A4  ...        NaN                   NaN
206386  206387   SLC4A4  ...        NaN                   NaN
206387  206388   SLC4A4  ...        NaN                   NaN
206388  206389   SLC4A4  ...        NaN                   NaN

[206389 rows x 22 columns]</code></pre>
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
                <a class="nav-link" href="#item-1">MutHTP</a>
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
