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
                        <h2 class="blog-post-title mb-1">PDBTM</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <strong>TMKit</strong> is very powerful for obtaining different kinds of
                            topologies from an XML file retrieved from the
                            <a href="http://pdbtm.enzim.hu/" target="_blank" class="stretched-link text-success" style="position: relative;">
                                PDBTM</a>
                            database. You can refer to <a href="http://pdbtm.enzim.hu/?_=/docs/manual" target="_blank" class="stretched-link text-success" style="position: relative;">
                                the explanation</a> and <a href="https://doi.org/10.1093/bioinformatics/bti121" target="_blank" class="stretched-link text-success" style="position: relative;">
                                the TMDET algorithm</a> for the topology detection.
                            In PDBTM, it defines 9 topologies:
                            <ul class="list-group-flush">
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Side1</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Side2</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Beta-strand</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Alpha-helix</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Coil</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Membrane-inside</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Membrane-loop</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Interfacial helix</li>
                                <li class="list-group-item"><i class="fa-solid fa-pen-nib"></i> Unknown</li>
                            </ul>
                            With an XML file that documents transmembrane topologies,
                            it is important to get access to each kind of topology through programming.
                            We show how we can achieve this by using an example XML file.

                            <br><br>
                            In particular, we implement the <code>tmkit.topo</code> module by using
                            <a href="https://en.wikipedia.org/wiki/Aspect-oriented_programming" target="_blank" class="stretched-link text-success" style="position: relative;">
                                aspect-oriented programming (AOP)</a>, which makes it easier to use the topological
                            information in other functions.


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
                            First, we can define all types of topologies of transmembrane proteins
                            used in PDBTM in the following way.
                        </div>
                        <pre><code class="language-python">topos = {
    'Side1': 'side1',
    'Side2': 'side2',
    'Beta': 'strand',
    'Alpha': 'tmh',
    'Coil': 'coil',
    'Membrane-inside': 'inside',
    'Membrane-loop': 'loop',
    'Interfacial ': 'interfacial',
    'Unknown': 'Unknown',
}</code></pre>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            Then, we can scan a protein's XML file to see if it contains
                            all types of the topologies. By default, we still use <code>1xqf.xml</code>.
                            If we open this file, in chain <code>A</code>, there are only
                            <code>Side1</code>, <code>Side2</code>, <code>Alpha helix</code>,
                            and <code>Unknown</code> types. Using the following codes, we
                            can get the results expected.
                        </div>
                        <pre><code class="language-python">for topo, i in topos.items():
    print('Topology: {}'.format(topo))
    try:
        lower_ids, upper_ids = tmk.topo.from_pdbtm(
            xml_fp='data/xml/',
            prot_name='1xqf',
            seq_chain='A',
            topo=i,
        )
        if lower_ids:
            print('---lower bounds', lower_ids)
            print('---upper bounds', upper_ids)
    except:
        continue
    else:
        print('It does not has this topology.\n')</code></pre>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Parameters</h2>
                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>xml_fp</code> - path where a target XML file is placed.
                            <br><code>xml_name</code> - name of the XML file.
                            <br><code>seq_chain</code> - chain of a protein.
                            <br><code>topo</code> - a topology code. It can be one of <code>side1</code>, <code>side2</code>, <code>strand</code>, <code>tmh</code>, <code>coil</code>, <code>inside</code>, <code>loop</code>, <code>interfacial</code>, and <code>Unknown</code>, which correspond to Side1, Side2, Beta strand, Alpha helix, Coil, Membrane-inside, Membrane-loop, Interfacial, Unknown topologies.
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
                            Finally, you will see the following output showing which one type of topology
                            that protein <code>1xqf</code> chain <code>A</code> has.
                            <br><br>
                            In the output, <code>lower bounds</code> are the set of starting positions
                            of residues in the PDB structure while <code>upper bounds</code>
                            are the set of ending positions of residues in the PDB structure. They match
                            each other this way. For example, for topology <code>Side2</code>, the first
                            continuous segment is from residue <strong>3</strong> to residue <strong>14</strong>,
                            and the second one is from residue <strong>65</strong> to residue <strong>101</strong>, ...,
                            and the last one is from residue <strong>333</strong> to residue <strong>352</strong>.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">Topology: Side1
---lower bounds [33, 119, 179, 195, 249, 300, 311, 378]
---upper bounds [45, 126, 181, 201, 260, 301, 313, 386]
It does not has this topology.

Topology: Side2
---lower bounds [3, 65, 148, 220, 277, 333]
---upper bounds [14, 101, 160, 230, 281, 352]
It does not has this topology.

Topology: Beta strand
It does not has this topology.

Topology: Alpha helix
---lower bounds [15, 46, 102, 127, 161, 202, 231, 261, 282, 314, 353]
---upper bounds [32, 64, 118, 147, 178, 219, 248, 276, 299, 332, 377]
It does not has this topology.

Topology: Coil
It does not has this topology.

Topology: Membrane-inside
It does not has this topology.

Topology: Membrane-loop
It does not has this topology.

Topology: Interfacial
It does not has this topology.

Topology: Unknown
---lower bounds [1, 3, 15, 33, 46, 65, 102, 119, 127, 148, 161, 179, 182, 195, 202, 220, 231, 249, 261, 277, 282, 300, 302, 311, 314, 333, 353, 378, 387]
---upper bounds [2, 14, 32, 45, 64, 101, 118, 126, 147, 160, 178, 181, 194, 201, 219, 230, 248, 260, 276, 281, 299, 301, 310, 313, 332, 352, 377, 386, 418]
It does not has this topology.</code></pre>
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
