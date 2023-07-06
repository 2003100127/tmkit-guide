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
                        <h2 class="blog-post-title mb-1">Foldseek</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            In this tutorial, we introduce how
                            <strong>TMKit</strong> can use
                            a structural alignment method
                            <a href="https://search.foldseek.com/search" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                <strong>Foldseek</strong></a>
                            for seeking functional similar protein
                            structures to an input protein struture by searching a few databases.

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
                            First, a good scenario where <a href="https://search.foldseek.com/search" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                <strong>Foldseek</strong></a> is applied is when we
                            need to understand a predicted structure of a protein. For conveniences,
                            we use four AlphaFold2-predicted structures of proteins
                            <code>P63092</code>, <code>Q9B6E8</code>, <code>P07256</code>,
                            and <code>P63027</code>. They are saved in <code>./data/</code>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk
import pandas as pd

prot_series = pd.Series(['P63092', 'Q9B6E8', 'P07256', 'P63027'])
tmk.seq.retrieve_pdb_alphafold(
    prot_series=prot_series,
    sv_fp='./data/',
)

# output
===>No.1 protein name: P63092
======>successfully downloaded!
===>No.2 protein name: Q9B6E8
======>successfully downloaded!
===>No.3 protein name: P07256
======>successfully downloaded!
===>No.4 protein name: P63027
======>successfully downloaded!</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, we can run <code>tmk.seq.retrieve_foldseek</code> to search
                            a few databases by Foldseek. By default, the databases include
                            <code>afdb50</code>, <code>afdb-swissprot</code>,
                            <code>afdb-proteome</code>, <code>cath50</code>,
                            <code>mgnify_esm30</code>, <code>pdb100</code>, and
                            <code>gmgcl_id</code>. We can save the Foldseek results in
                            <code>./data/</code> as well.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.seq.retrieve_foldseek(
    pdb_fp='./data/',
    prot_name='P63027', # https://alphafold.ebi.ac.uk/entry/P63027
    sv_fp='./data/',
)

# output
===>Searching databases by foldseek...
===>Results have been saved!</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, we can check the results using the following code. For example,
                            we want to check the result for <code>P63027</code> and the file
                            is saved as <code>./data/P63027_foldseek_result.gz</code>. Please
                            find the output in section 3 <strong>Output</strong> below.
                        </div>
                        <pre><code class="language-python">import tarfile
import pandas as pd

with tarfile.open('./data/P63027_foldseek_result.gz', "r") as tar:
    csv_path = tar.getnames()[0]
    for i in tar.getnames():
        print(tar.extractfile(i))
        df = pd.read_csv(tar.extractfile(i), header=None, sep="\t")
        print(df)</code></pre>

                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_series</code> - Pandas dataframe storing protein names and chain names.
                            <br><code>prot_name</code> - name of a protein in the prefix of a PDB file name (e.g., <code>1xqf</code> in <code>1xqfA.pdb</code>).
                            <br><code>pdb_fp</code> - path where a protein's PDB structure is placed.
                            <br><code>sv_fp</code> - path where you want to save the result.
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
                            <pre><code class="language-python">===>Database: alis_afdb-proteome.m8
         0   ...                               20
0   job.pdb  ...                Rattus norvegicus
1   job.pdb  ...                      Danio rerio
2   job.pdb  ...                     Mus musculus
3   job.pdb  ...              Trichuris trichiura
4   job.pdb  ...       Cladophialophora carrionii
5   job.pdb  ...            Madurella mycetomatis
6   job.pdb  ...  Sporothrix schenckii ATCC 58251
7   job.pdb  ...  Schizosaccharomyces pombe 972h-
8   job.pdb  ...    Fonsecaea pedrosoi CBS 271.37
9   job.pdb  ...           Caenorhabditis elegans
10  job.pdb  ...    Histoplasma capsulatum G186AR
11  job.pdb  ...                         Zea mays

[12 rows x 21 columns]
===>Database: alis_afdb-swissprot.m8
         0   ...                               20
0   job.pdb  ...                     Homo sapiens
1   job.pdb  ...                   Macaca mulatta
2   job.pdb  ...                       Bos taurus
3   job.pdb  ...                Rattus norvegicus
4   job.pdb  ...                     Mus musculus
5   job.pdb  ...                   Xenopus laevis
6   job.pdb  ...                     Mus musculus
7   job.pdb  ...                       Bos taurus
8   job.pdb  ...                     Homo sapiens
9   job.pdb  ...                Rattus norvegicus
10  job.pdb  ...                     Mus musculus
11  job.pdb  ...              Macaca fascicularis
12  job.pdb  ...                     Homo sapiens
13  job.pdb  ...           Caenorhabditis elegans
14  job.pdb  ...              Schistosoma mansoni
15  job.pdb  ...                       Bos taurus
16  job.pdb  ...                     Pongo abelii
17  job.pdb  ...   Saccharomyces cerevisiae S288C
18  job.pdb  ...  Schizosaccharomyces pombe 972h-
19  job.pdb  ...           Caenorhabditis elegans
20  job.pdb  ...                     Homo sapiens
21  job.pdb  ...                     Homo sapiens

[22 rows x 21 columns]
===>Database: alis_afdb50.m8
         0   ...                             20
0   job.pdb  ...                    Danio rerio
1   job.pdb  ...                    Danio rerio
2   job.pdb  ...                   Mus musculus
3   job.pdb  ...            Macaca fascicularis
4   job.pdb  ...  Periophthalmus magnuspinnatus
..      ...  ...                            ...
56  job.pdb  ...      Verrucomicrobia bacterium
57  job.pdb  ...           Caulobacter sp. FWC2
58  job.pdb  ...           Fusarium euwallaceae
59  job.pdb  ...                Jatropha curcas
60  job.pdb  ...            Tribolium castaneum

[61 rows x 21 columns]
===>Database: alis_cath50.m8
         0        1   ...       19                              20
0   job.pdb  3hd7A00  ...    10116               Rattus norvegicus
1   job.pdb  3hd7E00  ...    10116               Rattus norvegicus
2   job.pdb  1sfcE00  ...    10116               Rattus norvegicus
3   job.pdb  1sfcI00  ...    10116               Rattus norvegicus
4   job.pdb  1sfcA00  ...    10116               Rattus norvegicus
5   job.pdb  1kilA00  ...     9606                    Homo sapiens
6   job.pdb  2n1tA00  ...     9606                    Homo sapiens
7   job.pdb  5ccgG00  ...    10116               Rattus norvegicus
8   job.pdb  5ccgA00  ...    10116               Rattus norvegicus
9   job.pdb  5kj7A00  ...    10116               Rattus norvegicus
10  job.pdb  5cchA00  ...    10116               Rattus norvegicus
11  job.pdb  6ip1A00  ...     9913                      Bos taurus
12  job.pdb  1l4aA00  ...  1051067             Doryteuthis pealeii
13  job.pdb  2npsA00  ...    10116               Rattus norvegicus
14  job.pdb  4wy4A00  ...     9606                    Homo sapiens
15  job.pdb  3b5nA00  ...   559292  Saccharomyces cerevisiae S288C

[16 rows x 21 columns]
===>Database: alis_gmgcl_id.m8
        0   ...                                                 18
0  job.pdb  ...  YEVTNVSPDEITGDGPGFTDTEWDGDDVTASLPNPSEADDAAGVLD...
1  job.pdb  ...  LTTVSDEWCVSTCAAGCPPAASLWCRCEDVRAADAVPANQGAAAWG...
2  job.pdb  ...  IILSISNKQDTEKIQRESWNIWGTSQWYSTYTIMIKTDVDEYKIVE...

[3 rows x 19 columns]
===>Database: alis_mgnify_esm30.m8
        0   ...                                                 18
0  job.pdb  ...  MSIKYLLIGNPEDCEEIGHYPDRGASKTTAKEADKIFKKLSQSGIQ...
1  job.pdb  ...  MSIQYVLIGNPEDCEEIGHYPDRGASKSIAKEANQIFKKLSESGIK...
2  job.pdb  ...  MTSSSPYEYSAVARNTTILAQFANSNGNFDVLVTEILQKINIPENQ...
3  job.pdb  ...  MAVQYSSIYQGQDLLASKSNGSLPNNVKKLMDSIAIQAKPNDLACV...
4  job.pdb  ...  MASSSATTPACPSLRHVLIVRHDAAIREGTLLCEAWAAAVGTARTS...
5  job.pdb  ...  YLASDKTTGADVAIKEFFPRDYCGRAPDGSLAMSPGHNAGLVDTLK...
6  job.pdb  ...  LMFADGPLTQPPNLAALVRLAGTTAAVDRAIRLTEQQAGNLITTAA...
7  job.pdb  ...  MQEILPARGLARRRSLAASTGIGETTEMDQDSNQTSPGAVAAGPGS...
8  job.pdb  ...  APAASTAPAAPSGGPASACGPEAQGTTPEGRAERELLGALRARRAE...

[9 rows x 19 columns]
===>Database: alis_pdb100.m8
        0   ...                 20
0  job.pdb  ...  Rattus norvegicus
1  job.pdb  ...  Rattus norvegicus

[2 rows x 21 columns]</code></pre>
                        </div>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Results from each database contains 20 columns. Please see
                            <a href="https://github.com/steineggerlab/foldseek/issues/25#issuecomment-1193354723" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                here</a>
                            here for their explanations.
                        </div>
                        <pre><code class="language-python">[
    'job_desc',
    'query','target','pident','alnlen','mismatch','gapopen','qstart','qend','tstart','tend','evalue','bits',
    'qlen','tlen','qaln','taln','tca','tseq',
    'taxid','taxname',
]</code></pre>
                    </div>

                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Foldseek</a>
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
