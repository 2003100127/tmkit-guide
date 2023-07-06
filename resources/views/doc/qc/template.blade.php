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
                        <h2 class="blog-post-title mb-1">Single metric</h2>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <strong>TMkit</strong> can bulk generate the records using a QC metric.
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
                            First, let's define 5 transmembrane proteins to be used,
                            <code>1xqf</code>, <code>A</code>,
                            <code>1eq8</code>, <code>A</code>,
                            <code>6e3y</code>, <code>E</code>,
                            <code>3pux</code>, <code>G</code>
                            and <code>3udc</code>, <code>A</code>, and put
                            them in a Pandas dataframe as follows.
                        </div>
                        <pre><code class="language-python">import pandas as pd

prots = [['1xqf', 'A'], ['1eq8', 'A'], ['6e3y', 'E'], ['3pux', 'G'], ['3udc', 'A'], ['3rko', 'A']]
df_prot = pd.DataFrame(prots, columns=['prot', 'chain'])
df_prot = df_prot.rename(columns={
    0: 'prot',
    1: 'chain',
})
print(df_prot)</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can download their PDB structures from PDBTM and
                            save them in <code>./data/pdb/pdbtm/</code>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.seq.retrieve_pdb_from_pdbtm(
    prot_series=df_prot['prot'],
    sv_fp='./data/pdb/pdbtm/',
)

# output
===>No.1 protein name: 1xqf
======>successfully downloaded!
===>No.2 protein name: 1eq8
======>successfully downloaded!
===>No.3 protein name: 6e3y
======>successfully downloaded!
===>No.4 protein name: 3pux
======>successfully downloaded!
===>No.5 protein name: 3udc
======>successfully downloaded!
===>No.6 protein name: 3rko
======>successfully downloaded!</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can then download their XML files from PDBTM and
                            save them in <code>./data/xml/</code>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.seq.retrieve_xml_from_pdbtm(
    prot_series=df_prot['prot'],
    sv_fp='./data/xml/',
)

# output
===>No.1 protein name: 1xqf
======>successfully downloaded!
===>No.2 protein name: 1eq8
======>successfully downloaded!
===>No.3 protein name: 6e3y
======>successfully downloaded!
===>No.4 protein name: 3pux
======>successfully downloaded!
===>No.5 protein name: 3udc
======>successfully downloaded!
===>No.6 protein name: 3rko
======>successfully downloaded!</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Finally, we can just use the following one command generate the
                            results using one of the 7 metrics <code>desc</code>, <code>met</code>, <code>bio_name</code>,
                            <code>head</code>, <code>mthm</code>, <code>rez</code>, and <code>seq</code>, representing
                            the description, determination method, biological name,
                            headline notation, number of helices, resolution, and sequence information, respectively.
                            Each time you can just alter what's put in parameter <code>metric</code>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.qc.obtain_single(
    df_prot=df_prot,
    pdb_cplx_fp='./data/pdb/pdbtm/',
    fasta_fp='./data/fasta/',
    xml_fp='./data/xml/',
    sv_fp='./data/qc/',
    metric='desc', # 'desc' 'met', 'bio_name', 'head', 'mthm', 'seq'
)
print(df)</code></pre>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>df_prot</code> - Pandas dataframe storing protein names and chain names.
                            <br><code>pdb_cplx_fp</code> - path where a protein complex file from PDBTM is placed.
                            <br><code>fasta_fp</code> - path where a protein Fasta file is placed.
                            <br><code>xml_fp</code> - path where a protein XML file from PDBTM is placed.
                            <br><code>sv_fp</code> - path to save files.
                            <br><code>metric</code> - a QC metric: 'rez', 'met', 'bio_name', 'head', 'desc', 'mthm', 'seq'.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Output</h2>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Resolution
                        </div>
                        <pre><code class="language-python">=========>protein 1xqf chain A with rez 1.8
=========>protein 1eq8 chain A with rez nan
=========>protein 6e3y chain E with rez 3.3
=========>protein 3pux chain G with rez 2.3
=========>protein 3udc chain A with rez 3.35
=========>protein 3rko chain A with rez 3.0
   prot chain   rez
0  1xqf     A  1.80
1  1eq8     A   NaN
2  6e3y     E  3.30
3  3pux     G  2.30
4  3udc     A  3.35
5  3rko     A  3.00</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Determination method
                        </div>
                        <pre><code class="language-python">=========>protein 1xqf chain A with met x-ray diffraction
=========>protein 1eq8 chain A with met unknown
=========>protein 6e3y chain E with met x-ray diffraction
=========>protein 3pux chain G with met x-ray diffraction
=========>protein 3udc chain A with met x-ray diffraction
=========>protein 3rko chain A with met x-ray diffraction
   prot chain                met
0  1xqf     A  x-ray diffraction
1  1eq8     A            unknown
2  6e3y     E  x-ray diffraction
3  3pux     G  x-ray diffraction
4  3udc     A  x-ray diffraction
5  3rko     A  x-ray diffraction</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Protein name
                        </div>
                        <pre><code class="language-python">=========>protein 1xqf chain A with bio_name the mechanism of ammonia transport based on the crystal structure of amtb of e. coli.
=========>protein 1eq8 chain A with bio_name three-dimensional structure of the pentameric helical bundle of the acetylcholine receptor m2 transmembrane segment
=========>protein 6e3y chain E with bio_name cryo-em structure of the active, gs-protein complexed, human cgrp receptor
=========>protein 3pux chain G with bio_name crystal structure of an outward-facing mbp-maltose transporter complex bound to adp-bef3
=========>protein 3udc chain A with bio_name crystal structure of a membrane protein
=========>protein 3rko chain A with bio_name crystal structure of the membrane domain of respiratory complex i from e. coli at 3.0 angstrom resolution
   prot chain                                           bio_name
0  1xqf     A  the mechanism of ammonia transport based on th...
1  1eq8     A  three-dimensional structure of the pentameric ...
2  6e3y     E  cryo-em structure of the active, gs-protein co...
3  3pux     G  crystal structure of an outward-facing mbp-mal...
4  3udc     A            crystal structure of a membrane protein
5  3rko     A  crystal structure of the membrane domain of re...</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Header line information
                        </div>
                        <pre><code class="language-python">=========>protein 1xqf chain A with head transport protein
=========>protein 1eq8 chain A with head signaling protein
=========>protein 6e3y chain E with head signaling protein
=========>protein 3pux chain G with head hydrolase/transport protein
=========>protein 3udc chain A with head membrane protein
=========>protein 3rko chain A with head oxidoreductase
   prot chain                         head
0  1xqf     A            transport protein
1  1eq8     A            signaling protein
2  6e3y     E            signaling protein
3  3pux     G  hydrolase/transport protein
4  3udc     A             membrane protein
5  3rko     A               oxidoreductase</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Description of proteins
                        </div>
                        <pre><code class="language-python">=========>protein 1xqf chain A with desc TRANSPORT PROTEIN
=========>protein 1eq8 chain A with desc SIGNALING PROTEIN
=========>protein 6e3y chain E with desc SIGNALING PROTEIN
=========>protein 3pux chain G with desc HYDROLASE/TRANSPORT PROTEIN
=========>protein 3udc chain A with desc MEMBRANE PROTEIN
=========>protein 3rko chain A with desc OXIDOREDUCTASE
   prot chain                         desc
0  1xqf     A            TRANSPORT PROTEIN
1  1eq8     A            SIGNALING PROTEIN
2  6e3y     E            SIGNALING PROTEIN
3  3pux     G  HYDROLASE/TRANSPORT PROTEIN
4  3udc     A             MEMBRANE PROTEIN
5  3rko     A               OXIDOREDUCTASE</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Number of helices
                        </div>
                        <pre><code class="language-python">=========>protein 1xqf chain A with mthm 11.0
=========>protein 1eq8 chain A with mthm 1.0
=========>protein 6e3y chain E with mthm 1.0
=========>protein 3pux chain G with mthm 6.0
=========>protein 3udc chain A with mthm 3.0
=========>protein 3rko chain A with mthm 3.0
   prot chain  mthm
0  1xqf     A  11.0
1  1eq8     A   1.0
2  6e3y     E   1.0
3  3pux     G   6.0
4  3udc     A   3.0
5  3rko     A   3.0</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Sequence information
                        </div>
                        <pre><code class="language-python">=========>File failed: 1xqf A
=========>File failed: 1eq8 A
=========>File failed: 6e3y E
=========>File failed: 3pux G
=========>File failed: 3udc A
=========>File failed: 3rko A
   prot chain                                             seq_aa  seq_len
0  1xqf     A  AVADKADNAFMMICTALVLFMTIPGIALFYGGLIRGKNVLSMLTQV...    362.0
1  1eq8     A                            EKMSTAISVLLAQAVFLLLTSQR     23.0
2  6e3y     E  EANYGALLRELCLTQFQVDMEAVGETLWCDWGRTIRSYRELADCTW...    115.0
3  3pux     G  AMVQPQKARLFITHLLLLLFIAAIMFPLLMVVAISLRQGNFATGSL...    293.0
4  3udc     A  YDIKAVKFLLDVLKILIIAFIGIKFADFLIYRFYKLYSKSKIQLPQ...    267.0
5  3rko     A  AFAIFLIVAIGLCCLMLVGGWFLGGRARARLRLSAKFYLVAMFFVI...     95.0</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            You can use the information to do QC. For example, proteins that
                            are determined by X-ray methods are reserved. You should do this as follows.
                            Then, protein <code>1eq8</code> chain <code>A</code> will be eliminated.
                        </div>
                        <pre><code class="language-python">df[df['met'] == 'x-ray diffraction']</code></pre>
                    </div>

                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Single metric</a>
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
