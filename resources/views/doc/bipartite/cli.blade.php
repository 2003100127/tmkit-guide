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
                        <h2 class="blog-post-title mb-1">Command line interface</h2>
                        <div class="alert alert-primary" role="alert">
                            This tutorial shows the construction of globRRCs
                            of residue pairs and the feature assignment with command line interface.
                        </div>
                    </div>

                    <div id="item-1-1">
                        <h2>1. Parameter assembly</h2>
                        <pre><code class="language-python">                _   _      _   ____  _
  __ _  ___ ___| \ | | ___| |_| __ )(_) ___
 / _` |/ __/ __|  \| |/ _ \ __|  _ \| |/ _ \
| (_| | (_| (__| |\  |  __/ |_| |_) | | (_) |
 \__,_|\___\___|_| \_|\___|\__|____/|_|\___/

usage: seqnetrr [-h] [--method method] [--fasta_fpn fasta_fpn]
                 [--net_fpn net_fpn] [--window_size window_size]
                 [--seq_sep_inferior seq_sep_inferior]
                 [--seq_sep_superior seq_sep_superior] [--pair_mode pair_mode]
                 [--assign_mode assign_mode] [--input_kind input_kind]
                 [--cumu_ratio cumu_ratio] [--is_sv is_sv]
                 [--output_net output_net]

Welcome to seqNetRR!

optional arguments:
  -h, --help            show this help message and exit
  --method method, -m method
                        str - a method can be: unipartite | bipartite |
                        cumulative
  --fasta_fpn fasta_fpn, -mol_f fasta_fpn
                        str - molecule sequence full file path
  --net_fpn net_fpn, -net_f net_fpn
                        str - full file path of relationships between any two
                        molecules
  --window_size window_size, -ws window_size
                        int - window size
  --seq_sep_inferior seq_sep_inferior, -ssinf seq_sep_inferior
                        int - sequence separation inferior
  --seq_sep_superior seq_sep_superior, -sssup seq_sep_superior
                        str - sequence separation superior
  --pair_mode pair_mode, -pmode pair_mode
                        str - mode of global pairs: patch | memconp | cross |
                        unchanged
  --assign_mode assign_mode, -amode assign_mode
                        str - mode of assignment: hash | hash_ori | hash_rl |
                        pandas | numpy
  --input_kind input_kind, -ikind input_kind
                        str - input kind for relationships of a network file:
                        general | simulate | freecontact | gdca | cmmpred |
                        plmc
  --cumu_ratio cumu_ratio, -cr cumu_ratio
                        float - cumulative ratio
  --is_sv is_sv, -issv is_sv
                        bool - to make sure if save to a file
  --output_net output_net, -o output_net
                        str - output net to a file.</code></pre>
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-circle-info"></i>
                            The <code>numpy</code> for <code>NumPy</code> and
                            <code>pandas</code> for <code>Pandas</code>
                            methods are also included.
                        </div>
                    </div>

                    <div id="item-1-2">
                        <h2>2. seqNetRR command</h2>
                        <pre><code class="language-python">seqnetrr -m bipartite \
-mol_f ./seqnetrr/data/example/1aigL.fasta \
-net_f ./seqnetrr/data/example/1aigL.evfold \
-ws 2 \
-ssinf 0 \
-sssup None \
-pmode patch \
-amode hash \
-ikind freecontact \
-cr 1.0 \
-is_sv True \
-o ./seqnetrr/data/example/1aigL.seqnetrr</code></pre>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Summary information</h2>
                        <div class="p-4 mb-3 bg-light rounded">
                            The console summarizes some necessary information of this process.
                        </div>
                        <pre><code class="language-python"># output
                _   _      _   ____  _
  __ _  ___ ___| \ | | ___| |_| __ )(_) ___
 / _` |/ __/ __|  \| |/ _ \ __|  _ \| |/ _ \
| (_| | (_| (__| |\  |  __/ |_| |_) | | (_) |
 \__,_|\___\___|_| \_|\___|\__|____/|_|\___/

11/07/2022 22:52:07 logger: ===>Molecular sequence: ALLSFERKYRVPGGTLVGGNLFDFWVGPFYVGFFGVATFFFAALGIILIAWSAVLQGTWNPQLISVYPPALEYGLGGAPLAKGGLWQIITICATGAFVSWALREVEICRKLGIGYHIPFAFAFAILAYLTLVLFRPVMMGAWGYAFPYGIWTHLDWVSNTGYTYGNFHYNPAHMIAISFFFTNALALALHGALVLSAANPEKGKEMRTPDHEDTFFRDLVGYSIGTLGIHRLGLLLSLSAVFFSALCMIITGTIWFDQWVDWWQWWVKLPWWANIPGGING
11/07/2022 22:52:07 logger: ===>Molecule length: 281
11/07/2022 22:52:07 logger: ===>Window size: 2
11/07/2022 22:52:07 logger: ===>Sequence separation inferior: 0
11/07/2022 22:52:07 logger: ===>Sequence separation superior: None
11/07/2022 22:52:07 logger: ===>Mode: external
11/07/2022 22:52:07 logger: ===>Input kind: freecontact
11/07/2022 22:52:07 logger: ===>Pair mode: patch
11/07/2022 22:52:07 logger: ===>pair number: 39340
11/07/2022 22:52:07 logger: =========>Window molecule generation: 0.2850000858306885s.
11/07/2022 22:52:12 logger: ======>bipartite pair assignment: 4.633999586105347s.
11/07/2022 22:52:12 logger: ===>total time: 4.98199725151062s.
11/07/2022 22:52:12 logger: ===>saving...
11/07/2022 22:52:16 logger: ===>saved!</code></pre>
                    </div>
                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Command line interface</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Parameter assembly</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. seqNetRR command</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">3. Summary information</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
