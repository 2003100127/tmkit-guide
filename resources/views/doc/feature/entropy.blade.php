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
                        <h2 class="blog-post-title mb-1">Entropy</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            After generating LIPS results for protein <code>1xqf</code> chain <code>A</code>,
                            we can make the most of them to annotate the protein at
                            both surface and per-residue levels. In this tutorial, we show how we
                            can use <strong>TMKit</strong> annotate each residue with
                            entropy scores of the LIPS results that it belongs to.
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

df = tmk.feature.get_surf_entropy(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
    id=1,
)
print(df)

# output
     aa_ids   ents
0         2  1.158
1         5  6.798
2         6  4.896
3         9  4.852
4        12  3.694
..      ...    ...
150     352  4.846
151     355  4.551
152     356  3.724
153     359  3.276
154     362  4.539

[155 rows x 2 columns]</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            As shown above, the output is a dataframe containing 2 columns, that is,
                            <code>aa_ids</code> and <code>ents</code>, corresponding to amino acid ID
                            and <a href="https://doi.org/10.1186/1472-6807-6-13" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                the entropy score</a>.

                            <br>
                            <br>
                            If we want to annotate all amino acids with the entropy scores,
                            we need to use all 7 surface data. In <strong>TMKit</strong>,
                            we can do it this way.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

_, _, entropy_dict, _ = tmk.feature.read(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
)
print(entropy_dict)

# output
{1.0: 1.125, 4.0: 5.71, 5.0: 6.798, ..., 357.0: 5.976, 360.0: 1.749}</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Actually, we can use <strong>TMKit</strong> to check the summary about
                            all 7 surfaces, which shows <a href="https://doi.org/10.1186/1472-6807-6-13" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                the overall entropy score</a> at the surface level.

                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.feature.get_helix_all_surf_entropy(
    fp='./data/lips/',
    prot_name='1xqf',
    file_chain='A',
)
print(df)

# output
   surfs   ents
0      5  4.846
1      0  4.912
2      3  4.852
3      1  4.885
4      2  4.749
5      6  4.746
6      4  4.948</code></pre>

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
                <a class="nav-link" href="#item-1">Entropy</a>
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
