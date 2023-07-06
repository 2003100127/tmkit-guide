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
                        <h2 class="blog-post-title mb-1">Read</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <a href="https://en.wikipedia.org/wiki/Protein_contact_map" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                Protein residue contacts</a> are crucial for protein structural prediction and
                            drug target interaction prediction.
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
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df1, df2 = tmk.rrc.read(
    prot_name='1xqf',
    seq_chain='A',
    fasta_fp='data/fasta/',
    pdb_fp='data/pdb/',
    xml_fp='data/xml/',
    dist_fp='data/rrc/',
    tool_fp='data/rrc/tool/',
    seq_sep_inferior=1,
    seq_sep_superior=None,
    tool='membrain2',
)</code></pre>

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
                            Finally, you will see the following output. There are two Pandas
                            dataframes. The first one <code>df1</code> is the dataframe containing
                            the predicted contacts by tool <code>Membrain2</code>.
                        </div>
                        <pre><code class="language-python">print(df1)
contact_id_1  contact_id_2     score
0                13            44  0.032846
1                13            45  0.011669
2                13            46  0.019312
3                13            47  0.089862
4                13            48  0.026575
...             ...           ...       ...
19443           308           349  0.044726
19444           308           350  0.080527
19445           308           351  0.039438
19446           308           352  0.034000
19447           308           353  0.074005
[19448 rows x 3 columns]</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            The second one <code>df2</code> is the dataframe containing
                            the real distances between two residues. There are 8 columns,
                            <code>fasta_id_1</code>, <code>aa_1</code>, <code>pdb_id_1</code>,
                            <code>fasta_id_2</code>, <code>aa_2</code>, <code>pdb_id_2</code>,
                            <code>dist</code>, and <code>is_contact</code>, meaning
                            <code>Fasta id of the first residue</code>, <code>Amino acid type of the first residue</code>, <code>PDB id of the first residue</code>,
                            <code>Fasta id of the second residue</code>, <code>Amino acid type of the second residue</code>, <code>PDB id of the second residue</code>,
                            <code>distance</code>, and <code>if they are in contact</code>.
                        </div>
                        <pre><code class="language-python">print(df2)
fasta_id_1 aa_1 pdb_id_1 fasta_id_2 aa_2 pdb_id_2       dist is_contact
0             13    I       15         44    T       46  23.495386          0
1             13    I       15         45    Q       47  22.651615          0
2             13    I       15         46    V       48   18.67347          0
3             13    I       15         47    T       49  19.484049          0
4             13    I       15         48    V       50   21.53894          0
...          ...  ...      ...        ...  ...      ...        ...        ...
19443        308    F      332        349    G      373  35.690994          0
19444        308    F      332        350    Y      374  32.043457          0
19445        308    F      332        351    K      375  38.532841          0
19446        308    F      332        352    L      376  40.355228          0
19447        308    F      332        353    A      377  40.803558          0
[19448 rows x 8 columns]</code></pre>

                        <div class="alert alert-danger" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            You can combine the two dataframes directly because they
                            have been aligned this way below, which makes your research easier.
                        </div>
                        <pre><code class="language-python">import pandas as pd
df = pd.concat([df1, df2], axis=1)
print(df)

# output
       contact_id_1  contact_id_2     score  ... pdb_id_2       dist is_contact
0                13            44  0.032846  ...       46  23.495386          0
1                13            45  0.011669  ...       47  22.651615          0
2                13            46  0.019312  ...       48   18.67347          0
3                13            47  0.089862  ...       49  19.484049          0
4                13            48  0.026575  ...       50   21.53894          0
...             ...           ...       ...  ...      ...        ...        ...
19443           308           349  0.044726  ...      373  35.690994          0
19444           308           350  0.080527  ...      374  32.043457          0
19445           308           351  0.039438  ...      375  38.532841          0
19446           308           352  0.034000  ...      376  40.355228          0
19447           308           353  0.074005  ...      377  40.803558          0

[19448 rows x 11 columns]</code></pre>
                    </div>

                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Read</a>
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
