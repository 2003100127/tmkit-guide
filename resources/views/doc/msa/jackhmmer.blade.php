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
                        <h2 class="blog-post-title mb-1">JackHmmer</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            Multiple sequence alignments (MSAs) can support the evolutionary analysis of
                            a protein and have been widely used in protein research.
                            MSAs were usually generated for a sequence by running a few iterations of
                            <strong>JackHmmer</strong> searches against a protein database, such
                            as UniRef (<strong>version</strong>: 30_2020_06).

                            <br><br>
                            In this tutorial, we will go through how we can generate the JackHmmer commands
                            for further MSA generation.

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
                            We need to specify all parameters used for generating the JackHmmer commands.
                            They mainly include <code>jackhmmer_fp</code>,
                            <code>fasta_fp</code>，<code>db_path</code>，<code>sv_fp</code>.

                            <br><br>
                            Please make sure that you have installed <strong>JackHmmer</strong> software.
                            If not, please refer to
                            <a href="http://hmmer.org/documentation.html" target="_blank" class="stretched-link text-success" style="position: relative;">
                                this tutorial</a> for how to install <strong>JackHmmer</strong>. In our case,
                            an executable of the <strong>JackHmmer</strong> program is in <code>./hmmer3.1b2/bin/</code>.

                            <br><br>
                            Then, you need to prepare a protein sequence database that can be used for
                            <strong>JackHmmer</strong> searches. For example, you may use
                            <a href="https://uniclust.mmseqs.com" target="_blank" class="stretched-link text-success" style="position: relative;">
                                UniClust databases</a>. After then, you can specify <code>db_path</code> as
                            <code>'./uniclust_2020.06/UniRef30_2020_06'</code>.

                            <br><br>
                            Please specify the path <code>sv_fp</code>
                            that you want to save the MSAs in a3m format (please see
                            <a href="https://github.com/soedinglab/hh-suite/wiki#the-same-alignment-in-a3m" target="_blank" class="stretched-link text-success" style="position: relative;">
                                here</a>).
                        </div>
                        <pre><code class="language-python">fasta_fp = './data/fasta/'
jackhmmer_fp = '/home/hmmer3.1b2/bin/'
db_path ='./uniclust_2020.06/UniRef30_2020_06'
sv_fp ='./data/a3m/'</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Let's then generate the MSAs for these proteins defined above by using the following codes.
                            Of course, there are many more parameters other than the four above.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

for id in df.index:
    prot_name = df.loc[id, 'prot']
    seq_chain = df.loc[id, 'chain']
    tmk.msa.run_jackhmmer(
        jackhmmer_fp=jackhmmer_fp,
        fasta_fpn=fasta_fp + prot_name + seq_chain + '.fasta',
        sv_fpn=sv_fp + prot_name + seq_chain + '.sto',
        db_path=db_path,

        # additional parameters
        cpu=4,
        iteration=3,
        jhm_E=10,
        incE=1e-3,
        noali='',

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
                            <br><code>fasta_fp</code> - path where a protein Fasta file is placed.
                            <br><code>jackhmmer_fp</code> - path where an executable of JackHmmer is placed (normally it is in <code>hmmer3.1b2/bin</code>).
                            <br><code>db_path</code> - path where a protein sequence database is placed.
                            <br><code>sv_fp</code> - path to where you want to save the MSAs in a3m format.

                            <br><code>cpu</code> - number of CPUs.
                            <br><code>iteration</code> - number of iterations by a hidden Markov model.
                            <br><code>jhm_E</code> - In the per-target output, report target sequences with an E-value of <= <x>. The
                                default is 10.0, meaning that on average, about 10 false positives will be reported
                                per query, so you can see the top of the noise and decide for yourself if it’s really
                                noise.
                            <br><code>incE</code> - Use an E-value as the per-target inclusion threshold. The default is
                            0.01, meaning that on average, about 1 false positive would be expected in every
                            100 searches with different query sequences.
                            <br><code>noali</code> - Omit the alignment section from the main output. This can greatly reduce the output volume.
                            <br>->We encourage users to check the meaning of all parameters via
                                <a href="http://eddylab.org/software/hmmer/Userguide.pdf" target="_blank" class="stretched-link text-info" style="position: relative;">
                                    here</a>.
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
                            <strong>JackHmmer</strong> how to search MSAs.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">===>The current order: /home/hmmer3.1b2/bin/jackhmmer --cpu 4 -N 3 -E 10 --incE 0.001 --noali -A ./data/a3m/6e3yE.sto ./data/fasta/6e3yE.fasta ./uniclust_2020.06/UniRef30_2020_06
===>The current order: /home/hmmer3.1b2/bin/jackhmmer --cpu 4 -N 3 -E 10 --incE 0.001 --noali -A ./data/a3m/6rfqS.sto ./data/fasta/6rfqS.fasta ./uniclust_2020.06/UniRef30_2020_06
===>The current order: /home/hmmer3.1b2/bin/jackhmmer --cpu 4 -N 3 -E 10 --incE 0.001 --noali -A ./data/a3m/6t0bm.sto ./data/fasta/6t0bm.fasta ./uniclust_2020.06/UniRef30_2020_06</code></pre>
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
                <a class="nav-link" href="#item-1">JackHmmer</a>
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
