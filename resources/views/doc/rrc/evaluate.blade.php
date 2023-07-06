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
                        <h2 class="blog-post-title mb-1">Performance evaluation</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <strong>TMKit</strong> includes functions for the evaluation of
                            performance between contact prediction methods.
                            Different from other computational software, we offer the
                            performance evaluation for <strong>residues within transmembrane topologies</strong>.
                            They are typically a-helices.

                            <br><br>
                            <strong>TMKit</strong> allows for reading files of protein residue contacts predicted by
                            <ul class="list-group-flush">
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> PSICOV</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> FreeContact</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> CCMPred</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Gremlin</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> GDCA</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> PlmDCA</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> MemConP</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Membrain2</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> DeepHelicon</li>
                            </ul>

                            <strong>PSICOV</strong>, <strong>FreeContact</strong>, <strong>CCMPred</strong>,
                            <strong>Gremlin</strong>, <strong>GDCA</strong>, and <strong>PlmDCA</strong> are
                            canonical covariance methods, while <strong>MemConP</strong>, <strong>Membrain2</strong>,
                            and <strong>DeepHelicon</strong>
                            are machine learning methods specialized for transmembrane proteins.
                        </div>


                    </div>

                    <div id="item-1-1">
                        <h2>1. Example usage</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can use the following code to obtain the residue contacts of
                            protein <code>1xqf</code> chain <code>A</code>. Similar to other cases in our
                            tutorial, there are commonly used parameters. Please the next section for details.
                            In the current version, <strong>TMKit</strong> supports evaluation using precision,
                            recall, F1-score, accuracy, and Matthews correlation coefficient.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

res = tmk.rrc.evaluate(
    prot_name='1xqf',
    seq_chain='A',
    fasta_fp='data/fasta/',
    pdb_fp='data/pdb/',
    xml_fp='data/xml/',
    dist_fp='data/rrc/',
    tool_fp='data/rrc/tool/',
    cutoff=5.5,
    tool='membrain2',
    seq_sep_inferior=1,
    seq_sep_superior=None,
    sort=2,
)
print(res)</code></pre>

                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>pdb_fp</code> - path where a target PDB file is placed.
                            <br><code>fasta_fp</code> - path where a target Fasta file is placed.
                            <br><code>xml_fp</code> - path where a target XML file is placed.
                            <br><code>dist_fp</code> - path where a file containing real distances between residues is placed (please check the file at <code>./data/rrc</code> in the example dataset).
                            <br><code>tool_fp</code> - path where a protein residue contact map file is placed.
                            <br><code>tool</code> - name of a contact prediction tool. It can be one of <code>PSICOV</code>, <code>FreeContact</code>, <code>CCMPred</code>, <code>Gremlin</code>, <code>GDCA</code>, <code>PlmDCA</code>, <code>MemConP</code>, <code>Membrain2</code>, and <code>DeepHelicon</code>.
                            <br><code>cutoff</code> - distance cutoff to see whether two residues are in spatial contact (e.g., 5.5 angstrom).
                            <br><code>seq_sep_inferior</code> - The lower bounds of how far any two residues are in pairs.
                            <br><code>seq_sep_superior</code> - The upper bounds of how far any two residues are in pairs.
                            <br><code>prot_name</code> - name of a protein in the prefix of a PDB file name (e.g., <code>1xqf</code> in <code>1xqfA.pdb</code>).
                            <br><code>seq_chain</code> - chain of a protein in the prefix of a PDB file name (e.g., <code>A</code> in <code>1xqfA.pdb</code>). Parameter <code>file_chain</code> will be converted within the function.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">explanations</a>
                            for the difference between <code>seq_chain</code> and <code>file_chain</code>.
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
                        <pre><code class="language-python">======>Evaluating protein 1xqfA
=========>precision: 0.7818181818181819
=========>recall: 0.20772946859903382
=========>mcc: 0.39739008414082766
=========>f1score: 0.3282442748091603
=========>accuracy: 0.9819004524886877</code></pre>
                    </div>

                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Performance evaluation</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Define parameters</a>
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
