<div class="flex-shrink-1 p-6 bg-white" style="width: 280px;">
    <a href="{{ url('doc/overview') }}" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-5 fw-semibold">Documentation</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                Get started
            </button>
            <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/overview') }}" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a></li>
                    <li><a href="{{ url('doc/feature') }}" class="link-dark d-inline-flex text-decoration-none rounded">Feature</a></li>
                    <li><a href="{{ url('doc/installation') }}" class="link-dark d-inline-flex text-decoration-none rounded">Installation</a></li>
                    <li><a href="{{ url('doc/exdataset') }}" class="link-dark d-inline-flex text-decoration-none rounded">Example dataset</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#seq-collapse" aria-expanded="true">
                Sequence
            </button>
            <div class="collapse show" id="seq-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/seq/retrieve') }}" class="link-dark d-inline-flex text-decoration-none rounded">Retrieve</a></li>
                    <li><a href="{{ url('doc/seq/read') }}" class="link-dark d-inline-flex text-decoration-none rounded">Read</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#topo-collapse" aria-expanded="true">
                Protein topology
            </button>
            <div class="collapse show" id="topo-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/topo/pdbtm') }}" class="link-dark d-inline-flex text-decoration-none rounded">PDBTM</a></li>
                    <li><a href="{{ url('doc/topo/phobius') }}" class="link-dark d-inline-flex text-decoration-none rounded">Phobius</a></li>
                    <li><a href="{{ url('doc/topo/tmhmm') }}" class="link-dark d-inline-flex text-decoration-none rounded">TMHMM</a></li>
                    <li><a href="{{ url('doc/topo/cytoextra') }}" class="link-dark d-inline-flex text-decoration-none rounded">Intra- and extra-cellular</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#feature-collapse" aria-expanded="true">
                Feature
            </button>
            <div class="collapse show" id="feature-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/feature/runlip') }}" class="link-dark d-inline-flex text-decoration-none rounded">Run LIPS</a></li>
                    <li><a href="{{ url('doc/feature/helixsurf') }}" class="link-dark d-inline-flex text-decoration-none rounded">Helix surface identification</a></li>
                    <li><a href="{{ url('doc/feature/lip') }}" class="link-dark d-inline-flex text-decoration-none rounded">Lips score</a></li>
                    <li><a href="{{ url('doc/feature/entropy') }}" class="link-dark d-inline-flex text-decoration-none rounded">Entropy</a></li>
                    <li><a href="{{ url('doc/feature/topo') }}" class="link-dark d-inline-flex text-decoration-none rounded">Topology</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#bipartite-collapse" aria-expanded="false">
                Edge bipartite
            </button>
            <div class="collapse show" id="bipartite-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/bipartite/scheme') }}" class="link-dark d-inline-flex text-decoration-none rounded">Scheme</a></li>
                    <li><a href="{{ url('doc/bipartite/bigraph') }}" class="link-dark d-inline-flex text-decoration-none rounded">Bigraph</a></li>
                    <li><a href="{{ url('doc/bipartite/pipeline') }}" class="link-dark d-inline-flex text-decoration-none rounded">Pipeline</a></li>
                    <li><a href="{{ url('doc/bipartite/usage') }}" class="link-dark d-inline-flex text-decoration-none rounded">Usage</a></li>
{{--                    <li><a href="{{ url('doc/bipartite/cli') }}" class="link-dark d-inline-flex text-decoration-none rounded">Command line interface</a></li>--}}
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#unipartite-collapse" aria-expanded="false">
                Edge unipartite
            </button>
            <div class="collapse show" id="unipartite-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/unipartite/scheme') }}" class="link-dark d-inline-flex text-decoration-none rounded">Scheme</a></li>
                    <li><a href="{{ url('doc/unipartite/unigraph') }}" class="link-dark d-inline-flex text-decoration-none rounded">Unigraph</a></li>
                    <li><a href="{{ url('doc/unipartite/pipeline') }}" class="link-dark d-inline-flex text-decoration-none rounded">Pipeline</a></li>
                    <li><a href="{{ url('doc/unipartite/usage') }}" class="link-dark d-inline-flex text-decoration-none rounded">Usage</a></li>
{{--                    <li><a href="{{ url('doc/unipartite/cli') }}" class="link-dark d-inline-flex text-decoration-none rounded">Command line interface</a></li>--}}
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#cumulative-collapse" aria-expanded="false">
                Edge cumulative
            </button>
            <div class="collapse show" id="cumulative-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/cumulative/intro') }}" class="link-dark d-inline-flex text-decoration-none rounded">Introduction</a></li>
                    <li><a href="{{ url('doc/cumulative/pipeline') }}" class="link-dark d-inline-flex text-decoration-none rounded">Pipeline</a></li>
                    <li><a href="{{ url('doc/cumulative/usage') }}" class="link-dark d-inline-flex text-decoration-none rounded">Usage</a></li>
{{--                    <li><a href="{{ url('doc/cumulative/cli') }}" class="link-dark d-inline-flex text-decoration-none rounded">Command line interface</a></li>--}}
                </ul>
            </div>
        </li>


        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#msa-collapse" aria-expanded="true">
                MSA
            </button>
            <div class="collapse show" id="msa-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/msa/hhblits') }}" class="link-dark d-inline-flex text-decoration-none rounded">HHblits</a></li>
                    <li><a href="{{ url('doc/msa/jackhmmer') }}" class="link-dark d-inline-flex text-decoration-none rounded">Jackhmmer</a></li>
                    <li><a href="{{ url('doc/msa/hhfilter') }}" class="link-dark d-inline-flex text-decoration-none rounded">HHfilter</a></li>
                    <li><a href="{{ url('doc/msa/format') }}" class="link-dark d-inline-flex text-decoration-none rounded">Format</a></li>
                    <li><a href="{{ url('doc/msa/foldseek') }}" class="link-dark d-inline-flex text-decoration-none rounded">Foldseek AlphaFold2</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collation-collapse" aria-expanded="true">
                Collation
            </button>
            <div class="collapse show" id="collation-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/collation/individual') }}" class="link-dark d-inline-flex text-decoration-none rounded">Individual</a></li>
                    <li><a href="{{ url('doc/collation/batch') }}" class="link-dark d-inline-flex text-decoration-none rounded">Batch</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collation-collapse" aria-expanded="true">
                Mapping
            </button>
            <div class="collapse show" id="collation-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/mapping/pdb2uniprot') }}" class="link-dark d-inline-flex text-decoration-none rounded">PDB to UniProt</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#qc-collapse" aria-expanded="true">
                QC - workbench
            </button>
            <div class="collapse show" id="qc-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/qc/template') }}" class="link-dark d-inline-flex text-decoration-none rounded">Single metric</a></li>
                    <li><a href="{{ url('doc/qc/integrate') }}" class="link-dark d-inline-flex text-decoration-none rounded">Integration</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#mutation-collapse" aria-expanded="true">
                Mutation
            </button>
            <div class="collapse show" id="mutation-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/mut/muthtp') }}" class="link-dark d-inline-flex text-decoration-none rounded">MutHTP</a></li>
                    <li><a href="{{ url('doc/mut/predmuthtp') }}" class="link-dark d-inline-flex text-decoration-none rounded">Pred-MutHTP</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#cath-collapse" aria-expanded="true">
                CATH
            </button>
            <div class="collapse show" id="cath-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/cath/fetch') }}" class="link-dark d-inline-flex text-decoration-none rounded">Fetch</a></li>
                    <li><a href="{{ url('doc/cath/customize') }}" class="link-dark d-inline-flex text-decoration-none rounded">Customized metrics</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#ppi-collapse" aria-expanded="true">
                PPI
            </button>
            <div class="collapse show" id="ppi-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/ppi/biogrid') }}" class="link-dark d-inline-flex text-decoration-none rounded">BioGRID</a></li>
                    <li><a href="{{ url('doc/ppi/intact') }}" class="link-dark d-inline-flex text-decoration-none rounded">IntAct</a></li>
                    <li><a href="{{ url('doc/ppi/connectivity') }}" class="link-dark d-inline-flex text-decoration-none rounded">Connectivity</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#rrc-collapse" aria-expanded="true">
                Residue contact
            </button>
            <div class="collapse show" id="rrc-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/rrc/read') }}" class="link-dark d-inline-flex text-decoration-none rounded">Read</a></li>
                    <li><a href="{{ url('doc/rrc/evaluate') }}" class="link-dark d-inline-flex text-decoration-none rounded">Evaluation</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#vs-collapse" aria-expanded="true">
                Structure visualization
            </button>
            <div class="collapse show" id="vs-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/vs/ppinterface') }}" class="link-dark d-inline-flex text-decoration-none rounded">PPI interface</a></li>
                    <li><a href="{{ url('doc/vs/coloring') }}" class="link-dark d-inline-flex text-decoration-none rounded">Coloring</a></li>
                    <li><a href="{{ url('doc/vs/sm') }}" class="link-dark d-inline-flex text-decoration-none rounded">Protein-ligand binding pocket</a></li>
                </ul>
            </div>
        </li>

        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="true">
                Others
            </button>
            <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/changelog') }}" class="link-dark d-inline-flex text-decoration-none rounded">Change log</a></li>
                    <li><a href="{{ url('whatsnew') }}" class="link-dark d-inline-flex text-decoration-none rounded">What's new</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>

<div class="b-example-divider b-example-vr"></div>
