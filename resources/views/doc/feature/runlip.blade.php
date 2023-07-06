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
                        <h2 class="blog-post-title mb-1">Run LIPS</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <strong>TMKit</strong> embeds the
                            <a href="http://gila.bioe.uic.edu/lab/lips" target="_blank" class="stretched-link text-success" style="position: relative;">
                                LIPS</a> (LIPid-facing Surface)
                            method to generate helix surfaces, lips scores, and entropy scores.
                            Please see <a href="https://doi.org/10.1186/1472-6807-6-13" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                their publication</a> for method details.

                            <br><br>
                            You can also check <a href="https://doi.org/10.1016/j.csbj.2023.01.036" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                our recent publication</a> for more
                            illustration. Since TM proteins are anchored to the membrane by α- helices and, thereby, interact with lipids,
                            it is necessary to study a variety of lipid-accessible protein properties in practice, such
                            as the helix orientation relative to lipids. We detail a helix orientation
                            prediction process below, employed by the LIPS method.
                            It illustrates the close link between the specialized
                            features and some of the biological processes that the
                            membrane proteins perform. Importantly, TM proteins are enriched
                            for coiled coils in TM regions, which consist of seven periodically
                            occurring amino acid residues, termed heptad repeats, each
                            represented by ABCDEFG. As shown
                            <a href="https://doi.org/10.1186/1472-6807-6-13" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                here</a>, using
                            a heptad repeat, seven helical faces are generated if each of the
                            seven residues takes turns being thought of as an anchoring residue.
                            <a href="https://doi.org/10.1186/1472-6807-6-13" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                Adamian and Liang</a>, each anchoring residue is
                            complemented by two residues (occurring two positions apart from
                            the anchoring residue), which together constitute one of the seven
                            surfaces. Therefore, starting from the first residue A, the formed 7
                            helical faces are ADE, BEF, CFG, DGA, EAB, FBC, and GCD. In the LIPS
                            (lipid-facing surface) pipeline, sliding from the first position in a
                            given TM protein sequence, each residue is serially partitioned into
                            one of the seven helical faces and assigned an entropy and a lipophilicity
                            score. These scores, for each helical face, are then incorporated
                            to yield the LIPS score used to estimate its helix
                            orientation. As the majority of residues involved in interactions between
                            TM helices can be aligned to the heptad repeats, either or
                            both the face-level LIPS scores and the residue-level lipophilicity
                            scores may be helpful in identifying interaction sites in TM proteins.
                            In the MBPred work, the importance of using the helical face-related
                            scores for interaction site prediction is partly demonstrated by the
                            mean decrease in impurity (i.e., also called Gini importance) and the
                            leave-one-out test.
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
                            LIPS replies on an input of a multiple sequence alignment (MSA).
                            We use the MSA of protein <code>1xqf</code> chain <code>A</code>
                            to generate LIPS results. We have put it in <code>./data/msa/</code>.

                            <br><br>
                            Note that <strong>TMKit</strong> has a method that is a wrapper of
                            an external library <code>lips.pl</code>, which can be found via
                            <a href="http://gila.bioe.uic.edu/lab/lips/lips.txt" target="_blank" class="stretched-link text-bg-danger" style="position: relative;">
                                the link</a>. The <code>lips.pl</code> library in <strong>TMKit</strong>
                            is a slightly modified version of the original one, which makes it a bit easier to
                            obtain the results. The file has been placed in <code>./data/external_lib/lips.pl</code>.
                            Please cite Please see <a href="https://doi.org/10.1186/1472-6807-6-13" target="_blank" class="stretched-link text-bg-danger" style="position: relative;">
                                their research</a> if you use the script or the LIPS results
                            in your studies.

                            <br><br>
                            With the following command, you are able to generate the LIPS results.
                            You can find the results saved in <code>./data/lips/</code>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.feature.generate_helix_surfaces(
    msa_path='./data/msa/',
    prot_name='1xqf',
    file_chain='A',
    lips_fpn='./data/external_lib/lips.pl',
    sv_fp='./data/lips/',
)</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If you have multiple proteins and want to get the
                            LIPS results all at once, you can do it as follows.
                            First, let's generate a Pandas dataframe to describe
                            the proteins.
                        </div>
                        <pre><code class="language-python">import pandas as pd

prots = [
    ['1xqf', 'A'],
    ['3pux', 'G'],
    ['3rko', 'A'],
]
df_prot = pd.DataFrame(prots, columns=['prot', 'chain'])</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, please put the dataframe to <code>df_prot</code> in command
                            <code>tmk.feature.bgenerate_helix_surfaces</code> below. Please
                            find the output and parameter illustration below.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.feature.bgenerate_helix_surfaces(
    msa_path='./data/msa/',
    lips_fpn='./data/external_lib/lips.pl',
    sv_fp='./data/lips/',
    df_prot=df_prot,
)</code></pre>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_name</code> - name of a protein in the prefix of a PDB file name (e.g., <code>1xqf</code> in <code>1xqfA.pdb</code>).
                            <br><code>file_chain</code> - chain of a protein in the prefix of a PDB file name (e.g., <code>A</code> in <code>1xqfA.pdb</code>).
                            <br><code>df_prot</code> - Pandas dataframe storing protein names and chain names.
                            <br><code>msa_path</code> - path where a protein MSA file is placed.
                            <br><code>sv_fp</code> - path to save files.
                            <br><code>lips_fpn</code> - path to the LIPS library.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Output</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We show below that for a single protein
                            <code>1xqf</code> chain <code>A</code>, what kind of output the program
                            will give users. First, it has 7 files for 7 surfaces, each having their residues residing.
                            Finally, it outputs a summary file with 7 surfaces with
                            <code>LIPOPHILICITY</code>, <code>ENTROPY</code>,
                            and <code>LIPS</code> scores.
                        </div>
                        <pre><code class="language-python">save path is: tmkit/data/example/1xqfA/
     SURFACE 0:
  1 A  0.018 1.125
  4 D  0.740 5.710
  5 K  0.804 6.798
...
362 P  0.615 4.539
     SURFACE 1:
  2 V  0.026 1.158
  5 K  0.804 6.798
  6 A  0.573 4.896
 ...
362 P  0.615 4.539
     SURFACE 2:
  3 A  0.552 4.238
  6 A  0.573 4.896
  7 D  0.865 2.885
 ...
360 R  1.174 1.749
     SURFACE 3:
  4 D  0.740 5.710
  7 D  0.865 2.885
  8 N  0.679 5.217
 ...
361 V  0.751 3.144
     SURFACE 4:
  5 K  0.804 6.798
  8 N  0.679 5.217
  9 A  0.697 4.852
...
362 P  0.615 4.539
  1 A  0.018 1.125
  2 V  0.026 1.158
     SURFACE 5:
  6 A  0.573 4.896
  9 A  0.697 4.852
 10 F  1.621 2.735
 ...
360 R  1.174 1.749
  2 V  0.026 1.158
  3 A  0.552 4.238
     SURFACE 6:
  7 D  0.865 2.885
 10 F  1.621 2.735
 11 M  0.975 4.820
 ...
361 V  0.751 3.144
  3 A  0.552 4.238
  4 D  0.740 5.710

SURFACE LIPOPHILICITY ENTROPY   LIPS
   5        1.834      4.846    8.889
   3        1.729      4.852    8.389
   0        1.770      4.912    8.694
   6        1.777      4.746    8.435
   2        1.791      4.749    8.507
   1        1.815      4.885    8.865
   4        1.767      4.948    8.741</code></pre>

                    </div>


                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Run LIPS</a>
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
