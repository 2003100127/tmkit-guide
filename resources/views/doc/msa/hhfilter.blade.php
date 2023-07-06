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
                        <h2 class="blog-post-title mb-1">HHfilter</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            Filtering multiple sequence alignments (MSAs) is important as it can technically reduce
                            the workload of computation by removing redundant protein sequences. This can be done by
                            the <strong>HHfilter</strong> method, a tool in <strong>HHblits</strong>.
                            <strong>TMKit</strong> provides the interface to <strong>HHfilter</strong>.

                            <br><br>
                            In this tutorial, we will go through how we can generate the HHfilter commands
                            for filtering MSAs, ensuring that no proteins sharing a certain sequence identity
                            are preserved.

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
                            We need to specify all parameters used for generating the HHfilter commands.
                            They mainly include <code>hhfilter_fp</code>, <code>a3m_path</code>，<code>new_a3m_path</code>.

                            <br><br>
                            Please make sure that you have installed <strong>HHblits</strong> software where
                            <strong>HHfilter</strong>HHfilter will be contained.
                            If not, please refer to
                            <a href="https://github.com/soedinglab/hh-suite" target="_blank" class="stretched-link text-success" style="position: relative;">
                                this tutorial</a> for how to install <strong>HHblits</strong>. In our case,
                            an executable of the <strong>HHfilter</strong> program is in <code>./hhblits/bin/</code>.

                            <br><br>
                            Please specify the path <code>new_a3m_path</code>
                            that you want to save the filtered MSAs in a3m format (please see
                            <a href="https://github.com/soedinglab/hh-suite/wiki#the-same-alignment-in-a3m" target="_blank" class="stretched-link text-success" style="position: relative;">
                                here</a>).
                        </div>
                        <pre><code class="language-python">hhfilter_fp = './hhblits/bin/'
a3m_path = 'data/a3m/'
new_a3m_path = 'data/a3m/filter/'</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Let's then filter the MSAs in <code>a3m</code> format by using the following codes.
                            Here, we used a maximum pairwise sequence identity of 90% to filter a generated MSA file
                            in a3m format, which ensures that no proteins sharing 90% sequence identity are preserved.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

for id in df.index:
    prot_name = df.loc[id, 'prot']
    seq_chain = df.loc[id, 'chain']
    tmk.msa.run_hhfilter(
        hhfilter_fp=hhfilter_fp,
        id=90,
        a3m_fpn=a3m_path + prot_name + seq_chain + '.a3m',
        new_a3m_fpn=new_a3m_path + prot_name + seq_chain + '.a3m',

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
                            <br><code>hhfilter_fp</code> - path where an executable of HHfilter is placed (normally it is in <code>hhblits/bin</code>).
                            <br><code>a3m_path</code> - path where a protein a3m file is placed.
                            <br><code>new_a3m_path</code> - path to where you want to save a filtered MSA in a3m format.

                            <br><code>id</code> - maximum pairwise sequence identity (def=90).
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
                            <strong>HHfilter</strong> how to filter generated a3m files.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">===>The current order: ./hhblits/bin/hhfilter -i data/a3m/6e3yE.a3m -o data/a3m/filter/6e3yE.a3m -id 90
===>The current order: ./hhblits/bin/hhfilter -i data/a3m/6rfqS.a3m -o data/a3m/filter/6rfqS.a3m -id 90
===>The current order: ./hhblits/bin/hhfilter -i data/a3m/6t0bm.a3m -o data/a3m/filter/6t0bm.a3m -id 90</code></pre>
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
                <a class="nav-link" href="#item-1">HHfilter</a>
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
