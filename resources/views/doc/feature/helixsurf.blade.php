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
                        <h2 class="blog-post-title mb-1">Helix surface identification</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            After generating LIPS results for protein <code>1xqf</code> chain <code>A</code>,
                            we can make the most of them to annotate the protein at
                            both surface and per-residue levels. In this tutorial, we show how we
                            can use <strong>TMKit</strong> annotate each residue with
                            helix surfaces of LIPS results that it belongs to.
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

df = tmk.feature.read_helix_surf(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
    id=1,
)
print(df)

# output
     aa_ids aa_names  lipos   ents  surf
0         2        V  0.026  1.158     1
1         5        K  0.804  6.798     1
2         6        A  0.573  4.896     1
3         9        A  0.697  4.852     1
4        12        M  0.973  3.694     1
..      ...      ...    ...    ...   ...
150     352        L  0.828  4.846     1
151     355        L  0.688  4.551     1
152     356        T  0.535  3.724     1
153     359        L  0.984  3.276     1
154     362        P  0.615  4.539     1

[155 rows x 5 columns]</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            As shown above, the output is a dataframe containing 5 columns, that is,
                            <code>aa_ids</code>, <code>aa_names</code>, <code>lipos</code>,
                            <code>ents</code>, and <code>surf</code>, corresponding to amino acid ID,
                            amino acid name, <a href="https://doi.org/10.1186/1472-6807-6-13" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                the LIPOS score</a> for the amino acid, entropy, and the helix
                            surface ID.

                            <br>
                            <br>
                            If we want to annotate all amino acids with the helix
                            surface IDs, we need to use all 7 surface data. In <strong>TMKit</strong>,
                            we can do it this way.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

aa_surf_rank, _, _, _ = tmk.feature.read(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
)
print(aa_surf_rank)

# output
{1: 4, 4: 0, 5: 1, 8: 4, 11: 0, ..., 357: 2, 360: 5}</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Actually, we can use <strong>TMKit</strong> to check the summary about
                            all 7 surfaces, which shows the entropy, <a href="https://doi.org/10.1186/1472-6807-6-13" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                the LIPOS score</a>, and the final LIPS score at the surface level.

                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.feature.read_helix_all_surf(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
)
print(df)

# output
   surfs  lipos   ents    lxe
0      5  1.834  4.846  8.889
1      0  1.770  4.912  8.694
2      3  1.729  4.852  8.389
3      1  1.815  4.885  8.865
4      2  1.791  4.749  8.507
5      6  1.777  4.746  8.435
6      4  1.767  4.948  8.741</code></pre>
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
                <a class="nav-link" href="#item-1">Helix surface identification</a>
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
