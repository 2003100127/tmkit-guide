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
                        <h2 class="blog-post-title mb-1">Cytoplasmic or extracellular segments</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            Transmembrane segments (or topologies) have implication for understanding many important
                            biological processes. In <strong>TMKit</strong>, <code>tmh</code> is the parameter to
                            ask the <code>tmkit.topo</code> module to return transmembrane segments for a given
                            transmembrane protein's XML file from PDBTM. As the topologies determined
                            from the PDBTM database are structure-based, it is commonly believed that
                            the quality of the topologies should be high. However, although the PDBTM XML file organizes many
                            different kinds of topologies, it does not define whether one of them appears to
                            the cytoplasmic or extracellular environment. Other predicted programs, such as
                            Phobius and TMHMM2, return the information about cytoplasmic or extracellular segments
                            of a protein. Researchers have started judging about which one segment in a PDBTM XML
                            file is cytoplasmic or extracellular other than the transmembrane segments,
                            which is then treated as a structure-derived
                            cytoplasmic or extracellular segment. Please see the two studies,
                            <a href="https://doi.org/10.1016/j.jsb.2019.02.009" target="_blank" class="stretched-link text-success" style="position: relative;">
                                MBPred</a> and <a href="https://doi.org/10.1016/j.csbj.2021.03.005" target="_blank" class="stretched-link text-success" style="position: relative;">
                                DeepTMInter</a>.

                            <br><br>
                            In <strong>TMKit</strong>, we offer this function and its usage is shown below.

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
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can use the <code>tmk.topo.cepdbtm</code> method to achieve this goal illustrated above.
                            First, we need to define some parameters, including the paths where a protein's PDB,
                            XML, Fasta files are placed, respectively. We encourage users to take a look at the
                            corresponding paths in the downloaded example dataset to get an understanding of
                            what's in there in the files. For detailed explanations about the parameters, please
                            see the below card <strong>Parameter illustration</strong>. <strong>TMKit</strong> will
                            detect the structure-derived cytoplasmic or extracellular
                            segments by the means of predicted topologies. In this case, we use the topological information
                            predicted by Phobius, namely, the <code>'./data/topo/1xqfA.jphobius'</code> file.
                            The reason why we use the information about PDB, XML, Fasta files
                            is that <strong>TMKit</strong> will convert between Fasta IDs and PDB IDs from
                            extracted topological information from an XML file. Finally, it returns only the
                            exact positions of residues in PDB structures for the cytoplasmic or extracellular
                            segments.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

pdbtm_seg, pred_seg = tmk.topo.cepdbtm(
    pdb_fp='./data/pdb/',
    prot_name='1xqf',
    seq_chain='A',
    file_chain='A',
    topo_fp='./data/topo/1xqfA.jphobius',
    xml_fp='./data/xml/',
    fasta_fp='./data/fasta/',
)
print('---Cytoplasmic and extracellular segments that are structure-derived :\n', pdbtm_seg)
print('---Cytoplasmic and extracellular segments Predicted by the Phobius tool: \n', pred_seg)</code></pre>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>pdb_fp</code> - path where a target PDB file is placed.
                            <br><code>fasta_fp</code> - path where a target Fasta file is placed.
                            <br><code>xml_fp</code> - path where a target XML file is placed.
                            <br><code>topo_fp</code> - path where a target topology file is placed. The topologies in this file are predicted an external prediction program. Currently, <code>TMKit</code> only supports the file format of the topologies predicted by <a href="https://doi.org/10.1006/jmbi.2000.4315" target="_blank" class="stretched-link text-secondary" style="position: relative;">
                                TMHMM</a>
                            and <a href="https://doi.org/10.1016/j.jmb.2004.03.016" target="_blank"
                                   class="stretched-link text-secondary" style="position: relative;">
                                Phobius</a>.
                            <br><code>prot_name</code> - name of a protein in the prefix of a PDB file name (e.g., <code>1xqf</code> in <code>1xqfA.pdb</code>).
                            <br><code>seq_chain</code> - chain of a protein in the prefix of a PDB file name (e.g., <code>A</code> in <code>1xqfA.pdb</code>) (<strong>biological purpose</strong>).
                            <br><code>file_chain</code> - chain of a protein in the prefix of a PDB file name (e.g., <code>A</code> in <code>1xqfA.pdb</code>) (<strong>technical purpose</strong>).
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">explanations</a>
                            for the difference between <code>seq_chain</code> and <code>file_chain</code>.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Output</h2>
                        {{-- section: output --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Finally, you will see the following output showing the structure-derived
                            cytoplasmic and extracellular segments of protein <code>1xqf</code> chain
                            <code>A</code>.

                            <br><br>
                            Similar to <a href="{{ url('doc/topo/pdbtm') }}" target="_blank"
                                          class="stretched-link text-info" style="position: relative;">the explanation</a>,
                            <code>xxx_lower</code> (for example, <code>tmh_lower</code>) is the set of starting positions
                            of residues in the PDB structure while <code>xxx_upper</code> (for example, <code>tmh_upper</code>)
                            is the set of ending positions of residues in the PDB structure. They match
                            each other this way. For example, for topology <code>alpha helix (tmh)</code>, the first
                            continuous segment is from residue <strong>13</strong> to residue <strong>30</strong>,
                            and the second one is from residue <strong>44</strong> to residue <strong>62</strong>, ...,
                            and the last one is from residue <strong>100</strong> to residue <strong>116</strong>.

                            <br><br>
                            More importantly, the inferred structure-derived cytoplasmic segments can be found using
                            the output <code>pdbtm_seg</code> through
                            <code>cyto_lower</code> and <code>cyto_upper</code> and the inferred structure-derived
                            extracellular segments can be found through <code>extra_lower</code> and <code>extra_upper</code>.
                            The explanations of the list of coordinates are the same as those for
                            <code>alpha helix (tmh)</code> above.
                            Similarly, the predicted cytoplasmic and extracellular segments can be found
                            using the output <code>pred_seg</code>.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">---Cytoplasmic and extracellular segments that are structure-derived :
 {'tmh_lower': [13, 44, 100, 125, 159, 187, 216, 246, 267, 290, 329], 'tmh_upper': [30, 62, 116, 145, 176, 204, 233, 261, 284, 308, 353], 'cyto_lower': [31, 117, 177, 180, 234, 285, 287, 354], 'cyto_upper': [43, 124, 179, 186, 245, 286, 289, 362], 'extra_lower': [1, 63, 146, 205, 262, 309], 'extra_upper': [12, 99, 158, 215, 266, 328]}

---Cytoplasmic and extracellular segments Predicted by the Phobius tool:
 {'cyto_lower': [31, 119, 180, 232, 285, 351], 'cyto_upper': [41, 124, 185, 242, 290, 362], 'tmh_lower': [6, 42, 96, 125, 159, 186, 211, 243, 266, 291, 328], 'tmh_upper': [30, 62, 118, 147, 179, 205, 231, 260, 284, 316, 350], 'extra_lower': [1, 63, 148, 206, 261, 317], 'extra_upper': [5, 95, 158, 210, 265, 327], 'signal_lower': [], 'signal_upper': [], 'cregion_lower': [], 'cregion_upper': [], 'hregion_lower': [], 'hregion_upper': [], 'nregion_lower': [], 'nregion_upper': []}</code></pre>
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
                <a class="nav-link" href="#item-1">PDBTM</a>
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
