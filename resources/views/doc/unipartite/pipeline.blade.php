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
                        <h2 class="blog-post-title mb-1">Pipeline</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            After going through the <a href="{{ url('doc/unipartite/scheme') }}" target="_blank"
                                                       class="stretched-link text-danger" style="position: relative;">concept</a>,
                            <a href="{{ url('doc/unipartite/unigraph') }}" target="_blank"
                               class="stretched-link text-danger" style="position: relative;">definition</a>, and
                            <a href="{{ url('doc/unipartite/scheme') }}" target="_blank"
                               class="stretched-link text-danger" style="position: relative;">biological implication</a> of
                            <strong>the edge unipartite graph (LocRRCs)</strong> of a residue pair,
                            we use this tutorial to give a step-by-step implementation of LocRRCs
                            of residue pairs and perform the feature assignment through
                            the <strong>seqNetRR</strong> library.
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

                    {{-- section: 1. Sequence reading --}}
                    <div id="item-1-1">
                        <h2>1. Sequence reading</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We begin by reading the sequence of protein <code>1xqf</code> chain <code>A</code>
                            as shown below.

                            <br><br>
                            <i class="fa-solid fa-circle-info"></i>
                            Please note that <strong>seqNetRR</strong> can also read a sequence of
                            deoxyribonucleic acids, ribonucleic acids in protein, DNA,
                            or RNA molecules. It can theoretically read a sequence of any biological
                            entities.
                        </div>
                        <pre><code class="language-python">from tmkit.sequence import Fasta as sfasta
# read a sequence
sequence = sfasta.get(
    fasta_fpn='./data/fasta/1xqfA.fasta',
)
print(sequence)

# output
AVADKADNAFMMICTALVLFMTIPGIALFYGGLIRGKNVLSMLTQVTVTFALVCILWVVYGYS
LAFGEGNNFFGNINWLMLKNIELTAVMGSIYQYIHVAFQGSFACITVGLIVGALAERIRFSAV
LIFVVVWLTLSYIPIAHMVWGGGLLASHGALDFAGGTVVHINAAIAGLVGAYLPHNLPMVFTG
TAILYIGWFGFNAGSAGTANEIAALAFVNTVVATAAAILGWIFGEWALRGKPSLLGACSGAIA
GLVGVTPACGYIGVGGALIIGVVAGLAGLWGVTMPCDVFGVHGVCGIVGCIMTGIFAASSLGG
VGFAEGVTMGHQLLVQLESIAITIVWSGVVAFIGYKLADLTVGLRVP</code></pre>
                    </div>

                    {{-- section: 2. Extract residue pairs --}}
                    <div id="item-1-2">
                        <h2>2. Extract residue pairs</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can next generate all residue pairs separated by a certain separation
                            as shown below. The lower and upper bounds of how far any two residues are in
                            pairs can be regulated by <code>seq_sep_inferior</code> and
                            <code>seq_sep_superior</code>. When they are <code>0</code>
                            and <code>None</code>, respectively, all possible
                            unrepeated residue pairs will be generated.

                        </div>
                        <pre><code class="language-python">from tmkit.seqnetrr.combo.Length import length as pl

# generate residue pairs according to sequence separation
pos_list = pl(
    seq_sep_superior=None,
    seq_sep_inferior=0
).to_pair(
    length=len(sequence)
)
print(pos_list[:10])

# output
[[1, 2], [1, 3], [1, 4], [1, 5], [1, 6], [1, 7], [1, 8], [1, 9], [1, 10], ...]</code></pre>
                    </div>

                    {{-- section: 3. Generate a position list --}}
                    <div id="item-1-3">
                        <h2>3. Generate a position list</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Using the <code>pos_list</code>, we
                            can add more information to the residue pairs.
                            The code below adds positions with amino acid symbols.
                            For example, in the output, the first 3 elements in each
                            array (e.g., <code>[1, 'A', 1, 2, 'L', 2, 0]</code>) mean
                            <code>Fasta position</code>, <code>amino acid symbol</code>,
                            and the placeholder for <code>PDB position</code>, and the same for
                            the next 3 elements. The last element is the placeholder for
                            a feature.
                        </div>
                        <pre><code class="language-python">from tmkit.seqnetrr.combo.Position import Position as pfasta

position = pfasta(
    sequence=sequence,
).pair(
    pos_list=pos_list,
)
print(position[:10])

# output
[[1, 'A', 1, 2, 'L', 2, 0],
 [1, 'A', 1, 3, 'L', 3, 0],
 [1, 'A', 1, 4, 'S', 4, 0],
 [1, 'A', 1, 5, 'F', 5, 0],
 [1, 'A', 1, 6, 'E', 6, 0],
 [1, 'A', 1, 7, 'R', 7, 0],
 [1, 'A', 1, 8, 'K', 8, 0],
 [1, 'A', 1, 9, 'Y', 9, 0],
 [1, 'A', 1, 10, 'R', 10, 0],
 [1, 'A', 1, 11, 'V', 11, 0],
 ...
]</code></pre>

                    </div>

                    {{-- section: 4. Window setting --}}
                    <div id="item-1-4">
                        <h2>4. Window setting</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            A window with size 5 is placed to extract neighbouring residues of each of central residues.
                        </div>
                        <pre><code class="language-python">from tmkit.seqnetrr.window.Pair import Pair

window_m_ids = Pair(
    sequence=sequence,
    position=position,
    window_size=5,
).mid()
print(window_m_ids[:10])

# output
[[[None, None, 1, 2, 3], [None, 1, 2, 3, 4]],
 [[None, None, 1, 2, 3], [1, 2, 3, 4, 5]],
 [[None, None, 1, 2, 3], [2, 3, 4, 5, 6]],
 [[None, None, 1, 2, 3], [3, 4, 5, 6, 7]],
 [[None, None, 1, 2, 3], [4, 5, 6, 7, 8]],
 [[None, None, 1, 2, 3], [5, 6, 7, 8, 9]],
 [[None, None, 1, 2, 3], [6, 7, 8, 9, 10]],
 [[None, None, 1, 2, 3], [7, 8, 9, 10, 11]],
 [[None, None, 1, 2, 3], [8, 9, 10, 11, 12]],
 [[None, None, 1, 2, 3], [9, 10, 11, 12, 13]],
 ...
 ]</code></pre>
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-circle-info"></i>
                            The output lists the window-placed residues for each
                            residue pair. The residues on the left or right are
                            the window-placed residues of a central residue.
                        </div>
                    </div>

                    {{-- section: 5. Generate LocRRCs and assign features --}}
                    <div id="item-1-5">
                        <h2>5. Generate LocRRCs and assign features</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            The code below can construct LocRRCs and assigns features to residue pairs of interest.
                        </div>
                        <pre><code class="language-python">from tmkit.seqnetrr.graph.Unipartite import Unipartite as unigraph

res = unigraph(
    sequence=sequence,
    window_size=5,
    window_m_ids=window_m_ids,
    input_kind='freecontact',
).assign(
    list_2d=position,
    fpn='data/rrc/tool/1xqfA.evfold',
    mode='hash',
)

# output
[[1, 'A', 1, 2, 'V', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 4.20528, 1.62297, 0.867657, 5.95861, 2.41727, 4.77151, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 4.20528, 1.62297, 0.867657, 0.613155, 5.95861, 2.41727, 1.92145, 4.77151, 2.17778, 3.71394],
 [1, 'A', 1, 3, 'A', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 4.20528, 1.62297, 0.867657, 5.95861, 2.41727, 4.77151, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 4.20528, 1.62297, 0.867657, 0.613155, 1.22804, 5.95861, 2.41727, 1.92145, 1.15329, 4.77151, 2.17778, 1.78778, 3.71394, 2.28648, 3.84836],
 [1, 'A', 1, 4, 'D', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 4.20528, 1.62297, 0.867657, 5.95861, 2.41727, 4.77151, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 4.20528, 1.62297, 0.867657, 0.613155, 1.22804, 0.457961, 5.95861, 2.41727, 1.92145, 1.15329, 0.981263, 4.77151, 2.17778, 1.78778, 0.812219, 3.71394, 2.28648, 3.22982, 3.84836, 2.79506, 3.31474],
 [1, 'A', 1, 5, 'K', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 4.20528, 1.62297, 0.867657, 5.95861, 2.41727, 4.77151, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 4.20528, 1.62297, 0.867657, 0.613155, 1.22804, 0.457961, 0.43229, 5.95861, 2.41727, 1.92145, 1.15329, 0.981263, 0.427951, 4.77151, 2.17778, 1.78778, 0.812219, 0.658312, 3.71394, 2.28648, 3.22982, 1.75035, 3.84836, 2.79506, 2.92361, 3.31474, 3.36977, 4.7285],
 [1, 'A', 1, 6, 'A', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 4.20528, 1.62297, 0.867657, 5.95861, 2.41727, 4.77151, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 4.20528, 1.62297, 0.867657, 0.613155, 1.22804, 0.457961, 0.43229, 0.152289, 5.95861, 2.41727, 1.92145, 1.15329, 0.981263, 0.427951, 0.465656, 4.77151, 2.17778, 1.78778, 0.812219, 0.658312, 0.765282, 3.71394, 2.28648, 3.22982, 1.75035, 0.58954, 3.84836, 2.79506, 2.92361, 1.64622, 3.31474, 3.36977, 1.83432, 4.7285, 2.50384, 3.05042],
 ...
 ]</code></pre>


                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>input_kind</code> - feature format that is regulated by a co-evolution method, such ccmpred, freeContact, gdca, or plmc.
                            <br><code>fpn</code> - path where a covariance matrix (co-evolutionary features) is placed. The covariance matrix should be generated by either CCMPred, FreeContact, GDCA, or plm-DCA. Or, a file that contains three columns (the 1st two for residue pair IDs and the 3rd one for co-evolutionary strengths) is fine.
                            <br><code>mode</code> - method to generate LocRRCs. It can be 'hash', 'hash_rf', 'hash_ori', 'pandas', or 'numpy'.
                            <br><code>window_size</code> - window size.
                            <br><code>window_m_ids</code> - list of residue pairs after applying a window.
                            <br><code>sequence</code> - molecular sequence.

                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If you don't have a co-evolutionary file for a protein, you still want
                            to check what will happen with the function. You can use
                            our built-in function for simulating a covariance matrix by assigning
                            <code>simulate</code> to <code>input_kind</code> and
                            <code>len(sequence)</code> to <code>simu_seq_len</code> and turning off
                            parameter <code>fpn</code>. It will be like this.

                        </div>
                        <pre><code class="language-python">from tmkit.seqnetrr.graph.Unipartite import Unipartite as unigraph

res = unigraph(
    sequence=sequence,
    window_size=5,
    window_m_ids=window_m_ids,
    input_kind='simulate',
).assign(
    list_2d=position,
    simu_seq_len=len(sequence),
    mode='hash',
)
print(res)

# output
[[1, 'A', 1, 2, 'V', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
 [1, 'A', 1, 3, 'A', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
 [1, 'A', 1, 4, 'D', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
 [1, 'A', 1, 5, 'K', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
 [1, 'A', 1, 6, 'A', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
 ...
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
                <a class="nav-link" href="#item-1">Pipeline</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Sequence reading</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Extract residue pairs</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">3. Generate a position list</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-4">4. Window setting</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-5">5. Generate GlobRRCs and assign features</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
