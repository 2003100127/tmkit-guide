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
                        <h2 class="blog-post-title mb-1">Feature</h2>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>TMKit</strong> supports researchers to analyze the problems involving
                            transmembrane proteins by offering both commonly-used and bespoke methods that
                            access their sequences, structures, topologies, etc. It has many features from both
                            technical and biological perspectives. Technically, the library is written by an
                            object-oriented programming (OOP) manner with its specific system for naming parameters.
                            Biologically, we have been focusing on sorting out problems that are infested in a whole
                            analysis process, regardless of whether they are small or big. We summarize the feature
                            of TMKit in the following sections <strong>Nomenclature</strong> and
                           <strong>What is TMKit focused most on</strong>.

                            <button type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    </div>

                    <div id="item-2">
                        <h2>1. Nomenclature</h2>
                    </div>

                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        In the <strong>TMKit</strong> package, parameters are named and written proper to this tool.
                        Specifically, <strong>TMKit</strong> primarily uses the way of acronyms as
                        its naming system.
                    </div>


                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Technically, <code>fp</code> is an acronym for the <strong>file path</strong> and
                        <code>fpn</code> is an acronym for the <strong>file path + file name</strong>.
                        You should be able to see a lot of such cases where <code>fp</code> or
                        <code>fpn</code> is concatenated with <code>_</code> to some strings for a specific sort of file.
                        For example, <code>pdb_fp</code> represents the file path where a PDB file is contained,
                        and <code>pdb_fpn</code> represents a PDB file. Other cases go to
                        <code>fasta_fp</code> and <code>xml_fp</code>. You will also frequently see <code>sv_fpn</code>,
                        with <code>sv</code> representing <strong>save</strong>, which means the file that are about
                        to save some results.
                    </div>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Biologically, since the name of a protein-related file, such as the multiple sequence alignment
                        (MSA), PDB structure, Fasta sequence, is composed of two parts by convention, one for the RCSB
                        name and the other one for the chain name. For example, the MSA for the crystal structure
                        of the A3 domain of human von Willebrand factor A3 domain chain A is named 1atzA.aln in
                        <a href="https://github.com/soedinglab/CCMpred/tree/master/example" target="_blank"
                           class="stretched-link text-danger" style="position: relative;">
                            https://github.com/soedinglab/CCMpred/tree/master/example</a>.
                        It is the same as those data files in
                        <a href="http://bioinf.cs.ucl.ac.uk/downloads/PSICOV/suppdata" target="_blank"
                           class="stretched-link text-danger" style="position: relative;">
                            http://bioinf.cs.ucl.ac.uk/downloads/PSICOV/suppdata
                        </a>. For conveniences, <strong>TMKit</strong>
                        distinguishes between the structure name and the chain name in the file name. Specifically,
                        <strong>TMKit</strong> handles it this way, <code>msa_fp</code> represents the path to a MSA file
                        of a protein, <code>prot_name</code> represents the name of the structure of the protein,
                        and <code>file_chain</code> represents the name of the specific chain of the protein. In many
                        cases, <code>file_chain</code> could not be used anyway if you have a protein file named using
                        the UniProt accession code. But should you want to tell <strong>TMKit</strong> to operate something
                        on a chain, you need to specify <code>seq_chain</code>.

                        <br><br>
                        In addition, for a batch operation on multiple proteins, you can pass a Pandas dataframe
                        containing two columns of protein names and chains, respectively onto <strong>TMKit</strong>.
                        The parameter is <code>prot_df</code> in most of the cases.
                    </div>

                    <div id="item-3">
                        <h2>2. What is <strong>TMKit</strong> focused most on?</h2>
                    </div>

                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <strong>TMKit</strong> is focused on addressing the grind of analyzing a protein by offering
                        a high level of granularity. For example, you need to map a protein from its PDB name to the
                        UniProt accession code to get more of information about it and vice versa. However, it seems not
                        that friendly to support you to do so using Python because there are not many well-prepared
                        packages available for this.
                        Otherwise, you may consider to use R because it seems to have more methods for this.
                        A small thing may slow down your coding speed a lot. You can achieve your purpose by using
                        <code>tmkit.collate</code> module of TMKit. Another example is that transmembrane proteins
                        are assembled oligomeric to perform biological functions. However, the RCSB structure could only
                        contain its non-repeated subunit(s), while some transmembrane protein databases hold its oligomeric
                        complex (after transformation). The problem is that the two files are named the same and we
                        know little about how many new chains are added to the transformed structure file. You can very
                        easily know about this by using the <code>tmkit.collate</code> module of TMKit.
                        <br><br>
                        In addition, we engineered a few high-speed computing libraries potentially for machine learning
                        to TMKit. It is important to extract information about pairwise/single residues
                        because their relationships are involved in many important biological studies and the biologically-
                        relevant features are extracted from them for machine learning modelling. TMKit allows you to do
                        this by using many well-tried schemes or customized schemes in the <code>tmkit.edge</code> module.

                    </div>

                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Feature</a>
                <a class="nav-link" href="#item-2">1. Nomenclature</a>
                <a class="nav-link" href="#item-3">2. What is <strong>TMKit</strong> focused most on?</a>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
