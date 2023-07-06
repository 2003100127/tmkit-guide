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
                        <h2 class="blog-post-title mb-1">Reformat</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            It is necessary to convert between MSAs in different formats.
                            In <strong>HHblits</strong>, the <strong>Reformat</strong> method can support this function.

                            <br><br>
                            In this tutorial, we will show how we can convert between MSAs from
                            <a href="https://en.wikipedia.org/wiki/Stockholm_format" target="_blank" class="stretched-link text-success" style="position: relative;">
                                Stockholm format</a>
                            to <a href="https://github.com/soedinglab/hh-suite/wiki#the-same-alignment-in-a3m" target="_blank" class="stretched-link text-success" style="position: relative;">
                                a3m format</a>.

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
                            First, let's prepare some transmembrane proteins and make them recognizable in Python,
                            like this.
                        </div>
                        <pre><code class="language-python">prots = [
    ['6e3y', 'E'],
    ['6rfq', 'S'],
    ['6t0b', 'm'],
]
import pandas as pd
df = pd.DataFrame(prots, columns=['prot', 'chain'])</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We need to specify all parameters used for generating the Reformat commands.
                            They mainly include <code>reformat_fp</code>,
                            <code>input_fp</code>，and <code>sv_fp</code>.

                            <br><br>
                            Please make sure that you have installed <strong>HHblits</strong> software.
                            If not, please refer to
                            <a href="ttps://github.com/soedinglab/hh-suite" target="_blank" class="stretched-link text-success" style="position: relative;">
                                this tutorial</a> for how to install <strong>HHblits</strong>. In our case,
                            an executable of the <strong>Reformat</strong> method is in <code>./hhblits/scripts/</code>.

                            <br><br>
                            Please specify the path <code>sv_fp</code>
                            that you want to save the reformatted MSAs in a3m format (please see
                            <a href="https://github.com/soedinglab/hh-suite/wiki#the-same-alignment-in-a3m" target="_blank" class="stretched-link text-success" style="position: relative;">
                                here</a>).
                        </div>
                        <pre><code class="language-python">reformat_fp = './hhblits/scripts/'
input_fp ='./data/a3m/'
sv_fp ='./data/a3m/reformat/'</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Let's then generate the MSAs for these proteins defined above by using the following codes.
                            Of course, there are many more parameters other than the four above and you can change the values
                            of the parameters (see <strong>Parameters</strong> below).
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

for id in df.index:
    prot_name = df.loc[id, 'prot']
    seq_chain = df.loc[id, 'chain']
    tmk.msa.run_format(
        reformat_fp=reformat_fp,
        max_length_per_name_line=1500,
        aa_per_line=1500,
        input_format='sto',
        output_format='a3m',
        input_fpn=input_fp + prot_name + seq_chain + '.sto',
        output_fpn=sv_fp + prot_name + seq_chain + '.a3m',

        # if you won't do it on clusters, please give False to the parameter send2cloud
        send2cloud=False,
        cloud_cmd="",

        # send2cloud=True,
        # cloud_cmd="qsub -q all.q -N 'jsun'",
    )</code></pre>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>reformat_fp</code> - path where an executable of Reformat is placed.
                            <br><code>input_fp</code> - path where a protein sequence database is placed.
                            <br><code>sv_fp</code> - path to where you want to save the MSAs in a3m format.

                            <br><code>input_format</code> - input format, e.g., <code>.sto</code> for Stockholm format.
                            <br><code>output_format</code> - output format, e.g., <code>.a3m</code> for a3m format.
                            <br><code>max_length_per_name_line</code> - maximum number of characers in nameline (default=1000)
                            <br><code>aa_per_line</code> - number of residues per line (for Clustal, FASTA, A2M, A3M formats) (default=100)

                            <br>->We encourage users to check the meaning of all parameters via <a href="https://github.com/soedinglab/hh-suite/wiki#summary-of-command-line-parameters" target="_blank"
                                                                                                   class="stretched-link text-info" style="position: relative;">this route</a>.
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
                            Finally, you will see the following output showing the generated commands. It will tell
                            <strong>Reformat</strong> how to search MSAs.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">===>The current order: ./hhblits/scripts/reformat.pl -d 1500 -l 1500 sto a3m ./data/a3m/6e3yE.sto ./data/a3m/reformat/6e3yE.a3m
===>The current order: ./hhblits/scripts/reformat.pl -d 1500 -l 1500 sto a3m ./data/a3m/6rfqS.sto ./data/a3m/reformat/6rfqS.a3m
===>The current order: ./hhblits/scripts/reformat.pl -d 1500 -l 1500 sto a3m ./data/a3m/6t0bm.sto ./data/a3m/reformat/6t0bm.a3m</code></pre>
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
                <a class="nav-link" href="#item-1">Reformat</a>
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
