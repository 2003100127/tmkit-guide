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
                            After going through the
                            <a href="{{ url('doc/cumulative/intro') }}" target="_blank"
                               class="stretched-link text-danger" style="position: relative;">definition</a> and
                            <a href="{{ url('doc/cumulative/intro') }}" target="_blank"
                               class="stretched-link text-danger" style="position: relative;">biological implication</a> of
                            <strong>the cumulated correlation coefficients (cumuCCs)</strong> of a residue,
                            we use this tutorial to give a step-by-step implementation of cumuCCs
                            of residues and perform the feature assignment through
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

                    {{-- section: 2. Extract residues --}}
                    <div id="item-1-2">
                        <h2>2. Extract residues</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can next extract all residues separated by a certain separation
                            as shown below. The lower and upper bounds of how far a residue is next to
                            another residue can be regulated by <code>seq_sep_inferior</code> and
                            <code>seq_sep_superior</code>. When they are <code>0</code>
                            and <code>None</code>, respectively, all
                            unrepeated residues will be generated.

                        </div>
                        <pre><code class="language-python">from tmkit.seqnetrr.combo.Length import length as plength

pos_list = plength(
    seq_sep_inferior=0,
    seq_sep_superior=None,
).tosgl(
    length=len(sequence),
)
print(pos_list[:10])

# output
[[1], [2], [3], [4], [5], [6], [7], [8], [9], [10], ...]</code></pre>
                    </div>

                    {{-- section: 3. Extract residues --}}
                    <div id="item-1-3">
                        <h2>3. Generate a position list</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Using the <code>pos_list</code>, we
                            can add more information to the residues.
                            The code below adds positions with amino acid symbols.
                            For example, in the output, the first 3 elements in each
                            array (e.g., <code>[1, 'A', 1, 0]</code>) mean
                            <code>Fasta position</code>, <code>amino acid symbol</code>,
                            and the placeholder for <code>PDB position</code>.
                            The last element is the placeholder for a feature.
                        </div>
                        <pre><code class="language-python">from tmkit.seqnetrr.combo.Position import Position as pfasta

position = pfasta(
    sequence=sequence,
).single(
    pos_list=pos_list,
)
print(position[:10])

# output
[[1, 'A', 1, 0],
[2, 'V', 2, 0],
[3, 'A', 3, 0],
[4, 'D', 4, 0],
[5, 'K', 5, 0],
[6, 'A', 6, 0],
[7, 'D', 7, 0],
[8, 'N', 8, 0],
[9, 'A', 9, 0],
[10, 'F', 10, 0],
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
                        <pre><code class="language-python">from tmkit.seqnetrr.window.Single import Single

window_m_ids = Single(
    sequence=sequence,
    position=position,
    window_size=3,
).mid()
print(window_m_ids[:10])

# output
[[None, None, None, 1, 2, 3, 4],
[None, None, 1, 2, 3, 4, 5],
[None, 1, 2, 3, 4, 5, 6],
[1, 2, 3, 4, 5, 6, 7],
[2, 3, 4, 5, 6, 7, 8],
[3, 4, 5, 6, 7, 8, 9],
[4, 5, 6, 7, 8, 9, 10],
[5, 6, 7, 8, 9, 10, 11],
[6, 7, 8, 9, 10, 11, 12],
[7, 8, 9, 10, 11, 12, 13],
 ...
 ]</code></pre>

                    </div>

                    {{-- section: 5. Generate cumuCCs --}}
                    <div id="item-1-5">
                        <h2>5. Generate cumuCCs</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            The code below can Generate cumuCCs for residues of interest.
                        </div>
                        <pre><code class="language-python">from tmkit.seqnetrr.graph.Cumulative import Cumulative

res = Cumulative(
    sequence=sequence,
    window_size=5,
    window_m_ids=window_m_ids,
    input_kind='freecontact',
).assign(
    list_2d=position,
    L=int(len(sequence)/5),
    fpn='data/rrc/tool/1xqfA.evfold',
)
print(res)

# output
[[1, 'A', 1, 0, 0, 0, 0, 0, 0, 0.0, 0.0, 981.2731380245631, 966.1044130133483, 876.1295995508353, 921.1073699092246],
[2, 'V', 2, 0, 0, 0, 0, 0, 0.0, 0.0, 981.2731380245631, 966.1044130133483, 876.1295995508353, 921.1073699092246, 866.7270683087568],
[3, 'A', 3, 0, 0, 0, 0, 0.0, 0.0, 981.2731380245631, 966.1044130133483, 876.1295995508353, 921.1073699092246, 866.7270683087568, 969.3246187616661],
[4, 'D', 4, 0, 0, 0, 0.0, 0.0, 981.2731380245631, 966.1044130133483, 876.1295995508353, 921.1073699092246, 866.7270683087568, 969.3246187616661, 819.806884450987],
[5, 'K', 5, 0, 0, 0.0, 0.0, 981.2731380245631, 966.1044130133483, 876.1295995508353, 921.1073699092246, 866.7270683087568, 969.3246187616661, 819.806884450987, 754.0407418336364],
[6, 'A', 6, 0, 0.0, 0.0, 981.2731380245631, 966.1044130133483, 876.1295995508353, 921.1073699092246, 866.7270683087568, 969.3246187616661, 819.806884450987, 754.0407418336364, 868.7066033260365],
[7, 'D', 7, 0, 0.0, 981.2731380245631, 966.1044130133483, 876.1295995508353, 921.1073699092246, 866.7270683087568, 969.3246187616661, 819.806884450987, 754.0407418336364, 868.7066033260365, 725.6260121243803],
[8, 'N', 8, 0, 981.2731380245631, 966.1044130133483, 876.1295995508353, 921.1073699092246, 866.7270683087568, 969.3246187616661, 819.806884450987, 754.0407418336364, 868.7066033260365, 725.6260121243803, 697.4153464206792],
[9, 'A', 9, 0, 966.1044130133483, 876.1295995508353, 921.1073699092246, 866.7270683087568, 969.3246187616661, 819.806884450987, 754.0407418336364, 868.7066033260365, 725.6260121243803, 697.4153464206792, 828.2056524269541],
[10, 'F', 10, 0, 876.1295995508353, 921.1073699092246, 866.7270683087568, 969.3246187616661, 819.806884450987, 754.0407418336364, 868.7066033260365, 725.6260121243803, 697.4153464206792, 828.2056524269541, 705.506309006248]],
...
]</code></pre>

                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>input_kind</code> - feature format that is regulated by a co-evolution method, such ccmpred, freeContact, gdca, or plmc.
                            <br><code>fpn</code> - path where a covariance matrix (co-evolutionary features) is placed. The covariance matrix should be generated by either CCMPred, FreeContact, GDCA, or plm-DCA. Or, a file that contains three columns (the 1st two for residue pair IDs and the 3rd one for co-evolutionary strengths) is fine.
                            <br><code>mode</code> - method to generate cumuCCs. It can be 'hash', 'hash_rf', 'hash_ori', 'pandas', or 'numpy'.
                            <br><code>window_size</code> - window size.
                            <br><code>window_m_ids</code> - list of residues after applying a window.
                            <br><code>sequence</code> - molecular sequence.
                            <br><code>L</code> - top-ranked <code>L</code> co-evolutionary strengths that a residue of interest is involved in.

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
                        <pre><code class="language-python">from tmkit.seqnetrr.graph.Cumulative import Cumulative

res = Cumulative(
    sequence=sequence,
    window_size=5,
    window_m_ids=window_m_ids,
    input_kind='simulate',
).assign(
    list_2d=position,
    L=int(len(sequence)/5),
    simu_seq_len=len(sequence),
)
print(res[:10])

# output
[[1, 'A', 1, 0, 0, 0, 0, 0, 0, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028],
[2, 'V', 2, 0, 0, 0, 0, 0, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028],
[3, 'A', 3, 0, 0, 0, 0, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028],
[4, 'D', 4, 0, 0, 0, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028],
[5, 'K', 5, 0, 0, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028],
[6, 'A', 6, 0, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028],
[7, 'D', 7, 0, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028],
[8, 'N', 8, 0, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028],
[9, 'A', 9, 0, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028],
[10, 'F', 10, 0, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028, 0.3988919667590028],
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
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Extract residues</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">3. Generate a position list</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-4">4. Window setting</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-5">5. Generate cumuCCs</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
