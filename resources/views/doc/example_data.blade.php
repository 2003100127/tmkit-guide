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
                        <h2 class="blog-post-title mb-1">Example dataset</h2>
                        <div class="alert alert-success" role="alert">
                            To get started with <strong>TMKit</strong>, an example dataset is required to be downloaded
                            beforehand. We release this dataset on
                            <a href="https://doi.org/10.5281/zenodo.10530158" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                Zenodo</a>. After downloading this dataset and placing it properly,
                            you should be walked through all cases presented in this tutorial.

                        </div>
                    </div>

                    <div id="item-1-1">
                        <h2>1. Download</h2>
                        <div class="alert alert-secondary" role="alert">
                            If you would like to save the data file in the current folder, please put
                            <code>'./data.zip'</code> on <code>sv_fpn</code>.
                            <a href="https://zenodo.org/records/10530158/files/TMKit%20data.zip?download=1" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                The dataset URL</a>
                            to the data has been fixed. You can do it all as illustrated below.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

# if you use tmkit version 0.0.3
tmk.fetch.tmkit_data(
    sv_fpn='./data.zip'
)

# if you still use tmkit version 0.0.2
tmk.fetch.tmkit_data(
    url='https://zenodo.org/records/10530158/files/TMKit%20data.zip?download=1',
    sv_fpn='./data.zip'
)</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            Then, unzip it by doing the following way. The dataset folder is
                            specified <code>'./'</code>, meaning the current folder.
                        </div>
                        <pre><code class="language-python">tmk.fetch.unzip(
    in_fpn='./data.zip',
    out_fp='./'
)</code></pre>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Content</h2>
                        <div class="alert alert-secondary" role="alert">
                            It has the following folders, ie.,
                            <code>cath</code>,
                            <code>contact</code>,
                            <code>external_lib</code>,
                            <code>fasta</code>,
                            <code>isite</code>,
                            <code>lips</code>,
                            <code>map</code>,
                            <code>msa</code>,
                            <code>mutation</code>,
                            <code>pdb</code>,
                            <code>ppi</code>,
                            <code>qc</code>,
                            <code>rrc</code>,
                            <code>topo</code>,
                            <code>vs</code>,
                            <code>xml</code>, which mainly contains Fasta, PDB, XML files, etc.
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
                <a class="nav-link" href="#item-1">Installation</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Download</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Content</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
