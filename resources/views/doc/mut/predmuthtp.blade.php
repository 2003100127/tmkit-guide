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
                        <h2 class="blog-post-title mb-1">Pred-MutHTP</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            The <a href="https://www.iitm.ac.in/bioinfo/PredMutHTP/index.php" target="_blank" class="stretched-link text-success" style="position: relative;">
                                Pred-MutHTP</a> database contains the predictions of
                            disease‐causing and neutral mutations in human transmembrane proteins.
                            In the absence of experimentally-verified records, these are
                            extremely useful for providing information about the status of mutations
                            that occur in amino acid sites of human transmembrane proteins.

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
                        <h2>1. Download and Read</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            First, let's download the database of Pred-MutHTP.
                            In the example dataset, there is a folder called <code>mutation</code>.
                            The path is <code>'./data/mutation/'</code>, which is the place where we suggest
                            users to manage the data used and generated.

                            <br><br>
                            The database is called <code>pred_varhtp_mut.zip</code>.
                            You should decompress it after downloading.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.mut.download_predmuthtp_db(
    sv_fp='./data/mutation/'
)</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            After decompressing it, you will have <code>pred_varhtp_mut.csv</code>.
                            We can now access this database using the following code.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.mut.read_predmuthtp_db(
    pred_muthtp_fpn='./data/mutation/pred_varhtp_mut.csv'
)
print(df)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>sv_fp</code> - path to where you want to save the Pred-MutHTP database to be downloaded.
                            <br><code>pred_muthtp_fpn</code> - path where the Pred-MutHTP database is placed.

                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Finally, you will see the following output, which shows 5 features
                            in <strong>Pred-MutHTP</strong>, including:
                            <ul class="list-group-flush">
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> uniprot_id</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> protein_mutation_site</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> topology</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> mutation_type</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> mut_prob</li>
                            </ul>.
                            You can extract each of the feature in Python, e.g., <code>df['topology']</code>.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">======>reading Pred-MutHTP...
======>Pred-MutHTP features are:
=========>No.1: uniprot_id
=========>No.2: protein_mutation_site
=========>No.3: topology
=========>No.4: mutation_type
=========>No.5: mut_prob
         uniprot_id protein_mutation_site  ...    mutation_type mut_prob
0            A0PJX4                   M1A  ...          Neutral    0.731
1            A0PJX4                   M1C  ...          Neutral    0.731
2            A0PJX4                   M1D  ...  Disease-causing    0.745
3            A0PJX4                   M1E  ...  Disease-causing    0.745
4            A0PJX4                   M1F  ...  Disease-causing    0.745
...             ...                   ...  ...              ...      ...
54962537     Q9Y277                 A283S  ...          Neutral    0.820
54962538     Q9Y277                 A283T  ...          Neutral    0.525
54962539     Q9Y277                 A283V  ...  Disease-causing    0.542
54962540     Q9Y277                 A283W  ...  Disease-causing    0.690
54962541     Q9Y277                 A283Y  ...  Disease-causing    0.658

[54962542 rows x 5 columns]</code></pre>
                        </div>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Split into individual files</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            This will split the Pred-MutHTP database into individual files
                            according to the UniProt accession codes of human transmembrane proteins.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.mut.read_predmuthtp_db(
    pred_muthtp_fpn='./data/mutation/pred_varhtp_mut.csv'
)

tmk.mut.split_predmuthtp(
    pred_muthtp_df=df,
    sv_fp='data/mutation/'
)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>sv_fp</code> - path to where you want to save the Pred-MutHTP database to be downloaded.
                            <br><code>pred_muthtp_df</code> - Pandas dataframe of the Pred-MutHTP database.
                            <br><code>pred_muthtp_fpn</code> - path where the Pred-MutHTP database is placed.

                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            In the console, it prints the output as shown below.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">======>5185 uniprot proteins
=========>Splitting No.0 protein from Pred-MutHTP
=========>Splitting No.1 protein from Pred-MutHTP
=========>Splitting No.2 protein from Pred-MutHTP
=========>Splitting No.3 protein from Pred-MutHTP
=========>Splitting No.4 protein from Pred-MutHTP
=========>Splitting No.5 protein from Pred-MutHTP
=========>Splitting No.6 protein from Pred-MutHTP
=========>Splitting No.7 protein from Pred-MutHTP
=========>Splitting No.8 protein from Pred-MutHTP
=========>Splitting No.9 protein from Pred-MutHTP
=========>Splitting No.10 protein from Pred-MutHTP
=========>Splitting No.11 protein from Pred-MutHTP
=========>Splitting No.12 protein from Pred-MutHTP
=========>Splitting No.13 protein from Pred-MutHTP
=========>Splitting No.14 protein from Pred-MutHTP
=========>Splitting No.15 protein from Pred-MutHTP
=========>Splitting No.16 protein from Pred-MutHTP
=========>Splitting No.17 protein from Pred-MutHTP
=========>Splitting No.18 protein from Pred-MutHTP
=========>Splitting No.19 protein from Pred-MutHTP
=========>Splitting No.20 protein from Pred-MutHTP
=========>Splitting No.21 protein from Pred-MutHTP
=========>Splitting No.22 protein from Pred-MutHTP
=========>Splitting No.23 protein from Pred-MutHTP
=========>Splitting No.24 protein from Pred-MutHTP
=========>Splitting No.25 protein from Pred-MutHTP
=========>Splitting No.26 protein from Pred-MutHTP
=========>Splitting No.27 protein from Pred-MutHTP
=========>Splitting No.28 protein from Pred-MutHTP
=========>Splitting No.29 protein from Pred-MutHTP
=========>Splitting No.30 protein from Pred-MutHTP
=========>Splitting No.31 protein from Pred-MutHTP
=========>Splitting No.32 protein from Pred-MutHTP
=========>Splitting No.33 protein from Pred-MutHTP
=========>Splitting No.34 protein from Pred-MutHTP
=========>Splitting No.35 protein from Pred-MutHTP
=========>Splitting No.36 protein from Pred-MutHTP
=========>Splitting No.37 protein from Pred-MutHTP
=========>Splitting No.38 protein from Pred-MutHTP
=========>Splitting No.39 protein from Pred-MutHTP
=========>Splitting No.40 protein from Pred-MutHTP
=========>Splitting No.41 protein from Pred-MutHTP
=========>Splitting No.42 protein from Pred-MutHTP
=========>Splitting No.43 protein from Pred-MutHTP
=========>Splitting No.44 protein from Pred-MutHTP
=========>Splitting No.45 protein from Pred-MutHTP
=========>Splitting No.46 protein from Pred-MutHTP
=========>Splitting No.47 protein from Pred-MutHTP
=========>Splitting No.48 protein from Pred-MutHTP
=========>Splitting No.49 protein from Pred-MutHTP
=========>Splitting No.50 protein from Pred-MutHTP
......</code></pre>
                        </div>

                    </div>

                    <div id="item-1-3">
                        <h2>3. Access an individual file</h2>
                        <div class="p-4 mb-3 bg-light rounded">
                            Now, we can see what is contained in an individual file.
                            Let's check this protein <code>A0PK00</code> (UniProt accession code)
                            using the following code.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.mut.read_split_predmuthtp(
    pred_split_muthtp_fpn='data/mutation/A0PK00.predmuthtp'
)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>pred_split_muthtp_fpn</code> - path where an individual file from the Pred-MutHTP database is placed.

                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            In the console, it prints the output as shown below.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">======>reading split Pred-MutHTP...
     uniprot_id protein_mutation_site  mut_prob
0        W5XKT8                  Y34A     0.698
1        W5XKT8                  Y34C     0.567
2        W5XKT8                  Y34D     0.551
3        W5XKT8                  Y34E     0.642
4        W5XKT8                  Y34F     0.785
...         ...                   ...       ...
6151     W5XKT8                 N324S     0.598
6152     W5XKT8                 N324T     0.711
6153     W5XKT8                 N324V     0.859
6154     W5XKT8                 N324W     0.874
6155     W5XKT8                 N324Y     0.809

[6156 rows x 3 columns]</code></pre>
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
                <a class="nav-link" href="#item-1">Pred-MutHTP</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Download and Read</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Split into individual files</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">3. Access an individual file</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
