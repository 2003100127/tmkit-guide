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
                        <h2 class="blog-post-title mb-1">Lipophilicity score</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            After generating LIPS results for protein <code>1xqf</code> chain <code>A</code>,
                            we can make the most of them to annotate the protein at
                            both surface and per-residue levels. In this tutorial, we show how we
                            can use <strong>TMKit</strong> annotate each residue with
                            lipophilicity scores of the LIPS results that it belongs to.
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
                            We can first read the file of a helix surface ID <code>id=1</code> using
                            the following code.
                            Please remember that we have put the results for
                            protein <code>1xqf</code> chain <code>A</code> in folder
                            <code>./data/lips/</code> as shown in
                            <a href="{{ url('doc/feature/runlip') }}" target="_blank" class="stretched-link text-info" style="position: relative;">
                                the last tutorial</a>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.feature.get_surf_lips(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
    id=1,
)
print(df)

# output
    aa_ids  lipos
0         2  0.026
1         5  0.804
2         6  0.573
3         9  0.697
4        12  0.973
..      ...    ...
150     352  0.828
151     355  0.688
152     356  0.535
153     359  0.984
154     362  0.615

[155 rows x 2 columns]</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            As shown above, the output is a dataframe containing 2 columns, that is,
                            <code>aa_ids</code> and <code>lipos</code>, corresponding to amino acid ID
                            and <a href="https://doi.org/10.1186/1472-6807-6-13" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                the lipophilicity score</a>.

                            <br>
                            <br>
                            If we want to annotate all amino acids with the lipophilicity scores,
                            we need to use all 7 surface data. In <strong>TMKit</strong>,
                            we can do it this way.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

_, lipos_dict, _, _ = tmk.feature.read(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
)
print(lipos_dict)

# output
{1.0: 0.018, 4.0: 0.74, 5.0: 0.804, ..., 357.0: 0.727, 360.0: 1.174}</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Actually, we can use <strong>TMKit</strong> to check the summary about
                            all 7 surfaces, which shows <a href="https://doi.org/10.1186/1472-6807-6-13" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                the overall lipophilicity score</a> at the surface level.

                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.feature.get_helix_all_surf_lips(
    prot_name='1xqf',
    file_chain='A',
    fp='./data/lips/',
)
print(df)

# output
   surfs  lipos
0      5  1.834
1      0  1.770
2      3  1.729
3      1  1.815
4      2  1.791
5      6  1.777
6      4  1.767</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Additionally, there are
                            average lipophilicity scores</a> at the surface level, which
                            can be accessed as follows. The column <code>lxe</code> represents
                            the average lipophilicity scores.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.feature.get_helix_all_surf_avelips(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
)
print(df)

# output
   surfs    lxe
0      5  8.889
1      0  8.694
2      3  8.389
3      1  8.865
4      2  8.507
5      6  8.435
6      4  8.741</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can continue to make most of the average lipophilicity
                            scores to annotate helix surfaces.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

_, _, _, lips_dict = tmk.feature.read(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
)
print(lips_dict)

# output
{5.0: [1.834, 4.846, 8.889], 0.0: [1.77, 4.912, 8.694], 3.0: [1.729, 4.852, 8.389], 1.0: [1.815, 4.885, 8.865], 2.0: [1.791, 4.749, 8.507], 6.0: [1.777, 4.746, 8.435], 4.0: [1.767, 4.948, 8.741]}</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We finally sort out an overall dataframe containing the LIPS results for all amino acids
                            using the code below.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df_surf = tmk.feature.read_helix_all_surf(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
)

df = tmk.feature.torosseta(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
    df_surf_lips=df_surf,
)
print(df)

# output
======>reading surface 5
======>reading surface 0
======>reading surface 3
======>reading surface 1
======>reading surface 2
======>reading surface 6
======>reading surface 4
      aa_ids  mean_lipo  lipos   ents
0          6      8.435  0.573  4.896
1          9      8.435  0.697  4.852
2         10      8.435  1.621  2.735
3         13      8.435  0.838  5.327
4         16      8.435  0.722  4.914
...      ...        ...    ...    ...
1080     358      8.507  0.522  2.980
1081     359      8.507  0.984  3.276
1082     362      8.507  0.615  4.539
1083       1      8.507  0.018  1.125
1084       2      8.507  0.026  1.158

[1085 rows x 4 columns]</code></pre>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>prot_name</code> - name of a protein in the prefix of a PDB file name (e.g., <code>1xqf</code> in <code>1xqfA.pdb</code>).
                            <br><code>file_chain</code> - chain of a protein in the prefix of a PDB file name (e.g., <code>A</code> in <code>1xqfA.pdb</code>).
                            <br><code>fp</code> - path where the LIPS results for a protein are placed.
                            <br><code>id</code> - surface id, 0-6.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Output</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Please check the output in each vignette above.
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
                <a class="nav-link" href="#item-1">Lipophilicity score</a>
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
