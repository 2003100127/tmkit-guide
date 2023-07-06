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
                        <h2 class="blog-post-title mb-1">IntAct</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            Like <a href="https://thebiogrid.org" target="_blank" class="stretched-link text-success" style="position: relative;">
                                 <strong>BioGRID</strong></a>,
                            <strong>IntAct</strong> is another one of the most widely-used databases that
                            catalogues protein-protein interactions. You can check
                            <a href="https://www.ebi.ac.uk/intact/home" target="_blank" class="stretched-link text-success" style="position: relative;">
                                <strong>here</strong></a>
                            for details about <strong>IntAct</strong>.

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
                            First, let's download the IntAct database.
                            In the example dataset, there is a folder called <code>ppi</code>.
                            The path is <code>'./data/ppi/'</code>, which is the place where we suggest
                            users to manage the data used and generated. We can choose either a specific
                            version or the most recent version of the database. Using <code>current</code>,
                            we can download the most recent version. Then we can save it in
                            <code>'./data/ppi/'</code> through parameter <code>sv_fp</code>.

                            <br><br>
                            You should have a file called <code>intact.zip</code> after downloading.
                            The <code>tmk.ppi.download_intact_db</code> function will automatically decompress it
                            as <code>intact.txt</code>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.ppi.download_intact_db(
    version='current',
    sv_fp='./data/ppi/',
)</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, using the following codes, you can access the database.
                            The <code>'data/ppi/intact.txt'</code> is the IntAct database.
                            The <code>tmk.ppi.read_intact_db</code> function will extract a subset of it
                            containing only protein interactors A and B (
                            <code>#ID(s) interactor A</code> and
                            <code>ID(s) interactor B</code>).

                            <br><br>
                            Importantly, this function will save the subset as in
                            <code>interA_B.intact</code> in <code>'./data/ppi/interA_B.intact'</code>
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.ppi.read_intact_db(
    intact_fpn='./data/ppi/intact.txt',
    extract_ids=[
        '#ID(s) interactor A',
        'ID(s) interactor B',
    ],
    sv_fpn='data/ppi/interA_B.intact',
)
print(df)</code></pre>

                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>version</code> - version of a IntAct database, for example, current.
                            <br><code>intact_fpn</code> - path where a IntAct database is placed.
                            <br><code>sv_fp</code> - path to where you want to save files.
                            <br><code>extract_ids</code> - a list that can include more than one feature, such as <code>#ID(s) interactor A</code> and <code>ID(s) interactor B</code>.

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
                            Finally, you will see the following output, which shows 42 features
                            in <strong>IntAct</strong>, for example <code>Taxid interactor A</code>.
                            You can extract each of the feature in Python, e.g.,
                            <code>df['ID(s) interactor B']</code>.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">======>reading IntAct...
======>IntAct features are:
=========>No.1: #ID(s) interactor A
=========>No.2: ID(s) interactor B
=========>No.3: Alt. ID(s) interactor A
=========>No.4: Alt. ID(s) interactor B
=========>No.5: Alias(es) interactor A
=========>No.6: Alias(es) interactor B
=========>No.7: Interaction detection method(s)
=========>No.8: Publication 1st author(s)
=========>No.9: Publication Identifier(s)
=========>No.10: Taxid interactor A
=========>No.11: Taxid interactor B
=========>No.12: Interaction type(s)
=========>No.13: Source database(s)
=========>No.14: Interaction identifier(s)
=========>No.15: Confidence value(s)
=========>No.16: Expansion method(s)
=========>No.17: Biological role(s) interactor A
=========>No.18: Biological role(s) interactor B
=========>No.19: Experimental role(s) interactor A
=========>No.20: Experimental role(s) interactor B
=========>No.21: Type(s) interactor A
=========>No.22: Type(s) interactor B
=========>No.23: Xref(s) interactor A
=========>No.24: Xref(s) interactor B
=========>No.25: Interaction Xref(s)
=========>No.26: Annotation(s) interactor A
=========>No.27: Annotation(s) interactor B
=========>No.28: Interaction annotation(s)
=========>No.29: Host organism(s)
=========>No.30: Interaction parameter(s)
=========>No.31: Creation date
=========>No.32: Update date
=========>No.33: Checksum(s) interactor A
=========>No.34: Checksum(s) interactor B
=========>No.35: Interaction Checksum(s)
=========>No.36: Negative
=========>No.37: Feature(s) interactor A
=========>No.38: Feature(s) interactor B
=========>No.39: Stoichiometry(s) interactor A
=========>No.40: Stoichiometry(s) interactor B
=========>No.41: Identification method participant A
=========>No.42: Identification method participant B
======>The file is saved.
        #ID(s) interactor A ID(s) interactor B
0                    P49418             O43426
1          intact:EB7121639             P49418
2          intact:EB7121654             P49418
3          intact:EB7121715             P49418
4                    P49418   intact:EB7121765
...                     ...                ...
1262938              Q80TR1             Q9WTS4
1262939              Q92556             P07355
1262940              Q92556             Q14185
1262941              Q92556             P07355
1262942              Q92556             P07355

[1262943 rows x 2 columns]</code></pre>
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
                <a class="nav-link" href="#item-1">IntAct</a>
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
