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
                        <h2 class="blog-post-title mb-1">Read</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <strong>TMKit</strong> can read biological sequences from a Fasta,
                            PDB (both RCSB or PDBTM), or XML (PDBTM) file. To be exact,
                            the <code>tmk.seq</code> module supports it. Due to the fact that
                            residues in FASTA format can be imperfectly aligned with those
                            from the PDB structure as experimentally resolved residues
                            can be discontinuous in its crystal structure for
                            a number of problems in crystallization processes (please refer to
                            <a href="https://doi.org/10.1038/s41586-018-0026-1" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                this paper</a>), we provide the mapping and conversion from
                            its Fasta IDs to PDB IDs. Please note that in both formats, the sequence
                            is kept the same but we will know how the exact position of each residue in
                            the PDB file corresponds to that in the Fasta file.
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
                        <h2>1. Sequence from a Fasta file</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can read a sequence from a Fasta file by
                            putting the following code. We can use protein <code>1xqf</code>
                            chain <code>A</code> (<code>'./data/fasta/1xqfA.fasta'</code> in the
                            example dataset <a href="{{ url('doc/exdataset') }}" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                here</a>).

                        </div>
                        <pre><code class="language-python">import tmkit as tmk

sequence = tmk.seq.read_from_fasta(
    fasta_fpn='./data/fasta/1xqfA.fasta'
)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>fasta_fpn</code> - path to a Fasta file.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                   class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">AVADKADNAFMMICTALVLFMTIPGIALFYGGLIRGKNVLSMLTQVTVTFALVCILWVVYGYSLAFGEGNNFFGNINWLMLKNIELTAVMGSIYQYIHVAFQGSFACITVGLIVGALAERIRFSAVLIFVVVWLTLSYIPIAHMVWGGGLLASHGALDFAGGTVVHINAAIAGLVGAYLPHNLPMVFTGTAILYIGWFGFNAGSAGTANEIAALAFVNTVVATAAAILGWIFGEWALRGKPSLLGACSGAIAGLVGVTPACGYIGVGGALIIGVVAGLAGLWGVTMPCDVFGVHGVCGIVGCIMTGIFAASSLGGVGFAEGVTMGHQLLVQLESIAITIVWSGVVAFIGYKLADLTVGLRVP</code></pre>
                        </div>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Sequence from a PDB file</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can read a sequence from a RCSB PDB file by
                            putting the following code. We can use protein <code>1xqf</code>
                            chain <code>A</code> (<code>'./data/pdb/1xqfA.pdb'</code> in the
                            example dataset <a href="{{ url('doc/exdataset') }}" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                here</a>).

                        </div>
                        <pre><code class="language-python">import tmkit as tmk

sequence = tmk.seq.read_from_pdb(
    pdb_fp='./data/pdb/',
    prot_name='1xqf',
    seq_chain='A',
    file_chain='A',
)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>pdb_fp</code> - path where a target PDB file is placed.
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

                        {{-- section: output --}}
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">AVADKADNAFMMICTALVLFMTIPGIALFYGGLIRGKNVLSMLTQVTVTFALVCILWVVYGYSLAFGEGNNFFGNINWLMLKNIELTAVMGSIYQYIHVAFQGSFACITVGLIVGALAERIRFSAVLIFVVVWLTLSYIPIAHMVWGGGLLASHGALDFAGGTVVHINAAIAGLVGAYLPHNLPMVFTGTAILYIGWFGFNAGSAGTANEIAALAFVNTVVATAAAILGWIFGEWALRGKPSLLGACSGAIAGLVGVTPACGYIGVGGALIIGVVAGLAGLWGVTMPCDVFGVHGVCGIVGCIMTGIFAASSLGGVGFAEGVTMGHQLLVQLESIAITIVWSGVVAFIGYKLADLTVGLRVP</code></pre>
                        </div>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Sequence from a XML file</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can read a sequence from a PDBTM XML file by
                            putting the following code. We can use protein <code>1xqf</code>
                            (<code>'./data/xml/1xqf.xml'</code> in the
                            example dataset <a href="{{ url('doc/exdataset') }}" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                here</a>).

                        </div>
                        <pre><code class="language-python">import tmkit as tmk

sequence = tmk.seq.read_from_xml(
    xml_fp='./data/xml/',
    xml_name='1xqf',
    seq_chain='A',
)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>xml_fp</code> - path where a target XML file is placed.
                            <br><code>xml_name</code> - name of the XML file.
                            <br><code>seq_chain</code> - chain of a protein.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">APAVADKADNAFMMICTALVLFMTIPGIALFYGGLIRGKNVLSMLTQVTVTFALVCILWVVYGYSLAFGEGNNFFGNINWLMLKNIELTAVMGSIYQYIHVAFQGSFACITVGLIVGALAERIRFSAVLIFVVVWLTLSYIPIAHMVWGGGLLASHGALDFAGGTVVHINAAIAGLVGAYLIGKRVGFGKEAFKPHNLPMVFTGTAILYIGWFGFNAGSAGTANEIAALAFVNTVVATAAAILGWIFGEWALRGKPSLLGACSGAIAGLVGVTPACGYIGVGGALIIGVVAGLAGLWGVTMLKRLLRVDDPCDVFGVHGVCGIVGCIMTGIFAASSLGGVGFAEGVTMGHQLLVQLESIAITIVWSGVVAFIGYKLADLTVGLRVPEEQEREGLDVNSHGENAYNADQAQQPAQADLE</code></pre>
                        </div>
                    </div>

                    <div id="item-1-4">
                        <h2>4. Get residue IDs from a FASTA file</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            We can still use the Fasta file (protein <code>1xqf</code>
                            chain <code>A</code>) to extract IDs of residues (<code>'./data/fasta/1xqf.fasta'</code> in the
                            example dataset <a href="{{ url('doc/exdataset') }}" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                here</a>).

                        </div>
                        <pre><code class="language-python">import tmkit as tmk

seq_fasta_ids = tmk.seq.fasid(
    fasta_fpn='./data/fasta/1xqfA.fasta',
)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>fasta_fpn</code> - path to a Fasta file.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">{1: 'A', 2: 'V', 3: 'A', 4: 'D', 5: 'K', 6: 'A', 7: 'D', 8: 'N', 9: 'A', 10: 'F', 11: 'M', 12: 'M', 13: 'I', 14: 'C', 15: 'T', 16: 'A', 17: 'L', 18: 'V', 19: 'L', 20: 'F', 21: 'M', 22: 'T', 23: 'I', 24: 'P', 25: 'G', 26: 'I', 27: 'A', 28: 'L', 29: 'F', 30: 'Y', 31: 'G', 32: 'G', 33: 'L', 34: 'I', 35: 'R', 36: 'G', 37: 'K', 38: 'N', 39: 'V', 40: 'L', 41: 'S', 42: 'M', 43: 'L', 44: 'T', 45: 'Q', 46: 'V', 47: 'T', 48: 'V', 49: 'T', 50: 'F', 51: 'A', 52: 'L', 53: 'V', 54: 'C', 55: 'I', 56: 'L', 57: 'W', 58: 'V', 59: 'V', 60: 'Y', 61: 'G', 62: 'Y', 63: 'S', 64: 'L', 65: 'A', 66: 'F', 67: 'G', 68: 'E', 69: 'G', 70: 'N', 71: 'N', 72: 'F', 73: 'F', 74: 'G', 75: 'N', 76: 'I', 77: 'N', 78: 'W', 79: 'L', 80: 'M', 81: 'L', 82: 'K', 83: 'N', 84: 'I', 85: 'E', 86: 'L', 87: 'T', 88: 'A', 89: 'V', 90: 'M', 91: 'G', 92: 'S', 93: 'I', 94: 'Y', 95: 'Q', 96: 'Y', 97: 'I', 98: 'H', 99: 'V', 100: 'A', 101: 'F', 102: 'Q', 103: 'G', 104: 'S', 105: 'F', 106: 'A', 107: 'C', 108: 'I', 109: 'T', 110: 'V', 111: 'G', 112: 'L', 113: 'I', 114: 'V', 115: 'G', 116: 'A', 117: 'L', 118: 'A', 119: 'E', 120: 'R', 121: 'I', 122: 'R', 123: 'F', 124: 'S', 125: 'A', 126: 'V', 127: 'L', 128: 'I', 129: 'F', 130: 'V', 131: 'V', 132: 'V', 133: 'W', 134: 'L', 135: 'T', 136: 'L', 137: 'S', 138: 'Y', 139: 'I', 140: 'P', 141: 'I', 142: 'A', 143: 'H', 144: 'M', 145: 'V', 146: 'W', 147: 'G', 148: 'G', 149: 'G', 150: 'L', 151: 'L', 152: 'A', 153: 'S', 154: 'H', 155: 'G', 156: 'A', 157: 'L', 158: 'D', 159: 'F', 160: 'A', 161: 'G', 162: 'G', 163: 'T', 164: 'V', 165: 'V', 166: 'H', 167: 'I', 168: 'N', 169: 'A', 170: 'A', 171: 'I', 172: 'A', 173: 'G', 174: 'L', 175: 'V', 176: 'G', 177: 'A', 178: 'Y', 179: 'L', 180: 'P', 181: 'H', 182: 'N', 183: 'L', 184: 'P', 185: 'M', 186: 'V', 187: 'F', 188: 'T', 189: 'G', 190: 'T', 191: 'A', 192: 'I', 193: 'L', 194: 'Y', 195: 'I', 196: 'G', 197: 'W', 198: 'F', 199: 'G', 200: 'F', 201: 'N', 202: 'A', 203: 'G', 204: 'S', 205: 'A', 206: 'G', 207: 'T', 208: 'A', 209: 'N', 210: 'E', 211: 'I', 212: 'A', 213: 'A', 214: 'L', 215: 'A', 216: 'F', 217: 'V', 218: 'N', 219: 'T', 220: 'V', 221: 'V', 222: 'A', 223: 'T', 224: 'A', 225: 'A', 226: 'A', 227: 'I', 228: 'L', 229: 'G', 230: 'W', 231: 'I', 232: 'F', 233: 'G', 234: 'E', 235: 'W', 236: 'A', 237: 'L', 238: 'R', 239: 'G', 240: 'K', 241: 'P', 242: 'S', 243: 'L', 244: 'L', 245: 'G', 246: 'A', 247: 'C', 248: 'S', 249: 'G', 250: 'A', 251: 'I', 252: 'A', 253: 'G', 254: 'L', 255: 'V', 256: 'G', 257: 'V', 258: 'T', 259: 'P', 260: 'A', 261: 'C', 262: 'G', 263: 'Y', 264: 'I', 265: 'G', 266: 'V', 267: 'G', 268: 'G', 269: 'A', 270: 'L', 271: 'I', 272: 'I', 273: 'G', 274: 'V', 275: 'V', 276: 'A', 277: 'G', 278: 'L', 279: 'A', 280: 'G', 281: 'L', 282: 'W', 283: 'G', 284: 'V', 285: 'T', 286: 'M', 287: 'P', 288: 'C', 289: 'D', 290: 'V', 291: 'F', 292: 'G', 293: 'V', 294: 'H', 295: 'G', 296: 'V', 297: 'C', 298: 'G', 299: 'I', 300: 'V', 301: 'G', 302: 'C', 303: 'I', 304: 'M', 305: 'T', 306: 'G', 307: 'I', 308: 'F', 309: 'A', 310: 'A', 311: 'S', 312: 'S', 313: 'L', 314: 'G', 315: 'G', 316: 'V', 317: 'G', 318: 'F', 319: 'A', 320: 'E', 321: 'G', 322: 'V', 323: 'T', 324: 'M', 325: 'G', 326: 'H', 327: 'Q', 328: 'L', 329: 'L', 330: 'V', 331: 'Q', 332: 'L', 333: 'E', 334: 'S', 335: 'I', 336: 'A', 337: 'I', 338: 'T', 339: 'I', 340: 'V', 341: 'W', 342: 'S', 343: 'G', 344: 'V', 345: 'V', 346: 'A', 347: 'F', 348: 'I', 349: 'G', 350: 'Y', 351: 'K', 352: 'L', 353: 'A', 354: 'D', 355: 'L', 356: 'T', 357: 'V', 358: 'G', 359: 'L', 360: 'R', 361: 'V', 362: 'P'}</code></pre>
                        </div>
                    </div>

                    <div id="item-1-5">
                        <h2>5. Get residue IDs from a PDB file</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            <strong>TMKit</strong> allows for extracting structure-derived IDs
                            of residues from a PDB protein file. For example, we can still use protein <code>1xqf</code>
                            chain <code>A</code> for this (<code>'./data/pdb/1xqf.pdb'</code> in the
                            example dataset <a href="{{ url('doc/exdataset') }}" target="_blank" class="stretched-link text-danger" style="position: relative;">
                                here</a>).

                            <br><br>
                            It is important to correctly mapping Fasta IDs of residues to their exact positions in a
                            PDB structure as it may affect your biological analysis and result interpretation.
                            You can see the output of the PDB IDs of residues of 1xqfA protein that do not agree to those
                            from Fasta IDs.
                            This tutorial offers a basic operation for this and we will specifically illustrate it
                            in topological analysis (please see here).
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

seq_pdb_ids = tmk.seq.pdbid(
    pdb_fp='./data/pdb/',
    prot_name='1xqf',
    seq_chain='A',
    file_chain='A',
)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>pdb_fp</code> - path where a target PDB file is placed.
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

                        {{-- section: output --}}
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">{3: 'A', 4: 'V', 5: 'A', 6: 'D', 7: 'K', 8: 'A', 9: 'D', 10: 'N', 11: 'A', 12: 'F', 13: 'M', 14: 'M', 15: 'I', 16: 'C', 17: 'T', 18: 'A', 19: 'L', 20: 'V', 21: 'L', 22: 'F', 23: 'M', 24: 'T', 25: 'I', 26: 'P', 27: 'G', 28: 'I', 29: 'A', 30: 'L', 31: 'F', 32: 'Y', 33: 'G', 34: 'G', 35: 'L', 36: 'I', 37: 'R', 38: 'G', 39: 'K', 40: 'N', 41: 'V', 42: 'L', 43: 'S', 44: 'M', 45: 'L', 46: 'T', 47: 'Q', 48: 'V', 49: 'T', 50: 'V', 51: 'T', 52: 'F', 53: 'A', 54: 'L', 55: 'V', 56: 'C', 57: 'I', 58: 'L', 59: 'W', 60: 'V', 61: 'V', 62: 'Y', 63: 'G', 64: 'Y', 65: 'S', 66: 'L', 67: 'A', 68: 'F', 69: 'G', 70: 'E', 71: 'G', 72: 'N', 73: 'N', 74: 'F', 75: 'F', 76: 'G', 77: 'N', 78: 'I', 79: 'N', 80: 'W', 81: 'L', 82: 'M', 83: 'L', 84: 'K', 85: 'N', 86: 'I', 87: 'E', 88: 'L', 89: 'T', 90: 'A', 91: 'V', 92: 'M', 93: 'G', 94: 'S', 95: 'I', 96: 'Y', 97: 'Q', 98: 'Y', 99: 'I', 100: 'H', 101: 'V', 102: 'A', 103: 'F', 104: 'Q', 105: 'G', 106: 'S', 107: 'F', 108: 'A', 109: 'C', 110: 'I', 111: 'T', 112: 'V', 113: 'G', 114: 'L', 115: 'I', 116: 'V', 117: 'G', 118: 'A', 119: 'L', 120: 'A', 121: 'E', 122: 'R', 123: 'I', 124: 'R', 125: 'F', 126: 'S', 127: 'A', 128: 'V', 129: 'L', 130: 'I', 131: 'F', 132: 'V', 133: 'V', 134: 'V', 135: 'W', 136: 'L', 137: 'T', 138: 'L', 139: 'S', 140: 'Y', 141: 'I', 142: 'P', 143: 'I', 144: 'A', 145: 'H', 146: 'M', 147: 'V', 148: 'W', 149: 'G', 150: 'G', 151: 'G', 152: 'L', 153: 'L', 154: 'A', 155: 'S', 156: 'H', 157: 'G', 158: 'A', 159: 'L', 160: 'D', 161: 'F', 162: 'A', 163: 'G', 164: 'G', 165: 'T', 166: 'V', 167: 'V', 168: 'H', 169: 'I', 170: 'N', 171: 'A', 172: 'A', 173: 'I', 174: 'A', 175: 'G', 176: 'L', 177: 'V', 178: 'G', 179: 'A', 180: 'Y', 181: 'L', 195: 'P', 196: 'H', 197: 'N', 198: 'L', 199: 'P', 200: 'M', 201: 'V', 202: 'F', 203: 'T', 204: 'G', 205: 'T', 206: 'A', 207: 'I', 208: 'L', 209: 'Y', 210: 'I', 211: 'G', 212: 'W', 213: 'F', 214: 'G', 215: 'F', 216: 'N', 217: 'A', 218: 'G', 219: 'S', 220: 'A', 221: 'G', 222: 'T', 223: 'A', 224: 'N', 225: 'E', 226: 'I', 227: 'A', 228: 'A', 229: 'L', 230: 'A', 231: 'F', 232: 'V', 233: 'N', 234: 'T', 235: 'V', 236: 'V', 237: 'A', 238: 'T', 239: 'A', 240: 'A', 241: 'A', 242: 'I', 243: 'L', 244: 'G', 245: 'W', 246: 'I', 247: 'F', 248: 'G', 249: 'E', 250: 'W', 251: 'A', 252: 'L', 253: 'R', 254: 'G', 255: 'K', 256: 'P', 257: 'S', 258: 'L', 259: 'L', 260: 'G', 261: 'A', 262: 'C', 263: 'S', 264: 'G', 265: 'A', 266: 'I', 267: 'A', 268: 'G', 269: 'L', 270: 'V', 271: 'G', 272: 'V', 273: 'T', 274: 'P', 275: 'A', 276: 'C', 277: 'G', 278: 'Y', 279: 'I', 280: 'G', 281: 'V', 282: 'G', 283: 'G', 284: 'A', 285: 'L', 286: 'I', 287: 'I', 288: 'G', 289: 'V', 290: 'V', 291: 'A', 292: 'G', 293: 'L', 294: 'A', 295: 'G', 296: 'L', 297: 'W', 298: 'G', 299: 'V', 300: 'T', 301: 'M', 311: 'P', 312: 'C', 313: 'D', 314: 'V', 315: 'F', 316: 'G', 317: 'V', 318: 'H', 319: 'G', 320: 'V', 321: 'C', 322: 'G', 323: 'I', 324: 'V', 325: 'G', 326: 'C', 327: 'I', 328: 'M', 329: 'T', 330: 'G', 331: 'I', 332: 'F', 333: 'A', 334: 'A', 335: 'S', 336: 'S', 337: 'L', 338: 'G', 339: 'G', 340: 'V', 341: 'G', 342: 'F', 343: 'A', 344: 'E', 345: 'G', 346: 'V', 347: 'T', 348: 'M', 349: 'G', 350: 'H', 351: 'Q', 352: 'L', 353: 'L', 354: 'V', 355: 'Q', 356: 'L', 357: 'E', 358: 'S', 359: 'I', 360: 'A', 361: 'I', 362: 'T', 363: 'I', 364: 'V', 365: 'W', 366: 'S', 367: 'G', 368: 'V', 369: 'V', 370: 'A', 371: 'F', 372: 'I', 373: 'G', 374: 'Y', 375: 'K', 376: 'L', 377: 'A', 378: 'D', 379: 'L', 380: 'T', 381: 'V', 382: 'G', 383: 'L', 384: 'R', 385: 'V', 386: 'P'}</code></pre>
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
                <a class="nav-link" href="#item-1">Read</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Sequence from a Fasta file</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Sequence from a PDB file</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">3. Sequence from a XML file</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-4">4. Get IDs from a FASTA file</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-5">5. Get IDs from a PDB file</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
