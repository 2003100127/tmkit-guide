<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){
        return view('home');
    }

    public function feature()
    {
        return view('feature');
    }

    public function download()
    {
        return view('download');
    }

    public function about()
    {
        return view('about');
    }

    public function faqs()
    {
        return view('faqs');
    }

    public function issue()
    {
        return view('issue');
    }

    public function whatsnew()
    {
        return view('whatsnew');
    }



    public function overview()
    {
        return view('doc/overview');
    }

    public function gsfeature()
    {
        return view('doc/feature');
    }

    public function installation()
    {
        return view('doc/installation');
    }

    public function exdataset()
    {
        return view('doc/example_data');
    }

    public function msa_hhblits()
    {
        return view('doc/msa/hhblits');
    }

    public function msa_jackhmmer()
    {
        return view('doc/msa/jackhmmer');
    }

    public function msa_hhfilter()
    {
        return view('doc/msa/hhfilter');
    }

    public function msa_format()
    {
        return view('doc/msa/format');
    }

    public function msa_foldseek()
    {
        return view('doc/msa/foldseek');
    }

    public function coll_individual()
    {
        return view('doc/collation/individual');
    }

    public function coll_batch()
    {
        return view('doc/collation/batch');
    }

    public function feature_runlip()
    {
        return view('doc/feature/runlip');
    }

    public function feature_helixsurf()
    {
        return view('doc/feature/helixsurf');
    }

    public function feature_lip()
    {
        return view('doc/feature/lip');
    }

    public function feature_entropy()
    {
        return view('doc/feature/entropy');
    }

    public function feature_topo()
    {
        return view('doc/feature/topo');
    }

    public function mut_muthtp()
    {
        return view('doc/mut/muthtp');
    }

    public function mut_predmuthtp()
    {
        return view('doc/mut/predmuthtp');
    }

    public function cath_fetch()
    {
        return view('doc/cath/fetch');
    }

    public function cath_customize()
    {
        return view('doc/cath/customize');
    }

    public function ppi_biogrid()
    {
        return view('doc/ppi/biogrid');
    }

    public function ppi_intact()
    {
        return view('doc/ppi/intact');
    }

    public function ppi_connectivity()
    {
        return view('doc/ppi/connectivity');
    }

    public function qc_template()
    {
        return view('doc/qc/template');
    }

    public function qc_integrate()
    {
        return view('doc/qc/integrate');
    }

    public function seq_read()
    {
        return view('doc/seq/read');
    }

    public function seq_retrieve()
    {
        return view('doc/seq/retrieve');
    }


    public function topo_pdbtm()
    {
        return view('doc/topo/pdbtm');
    }

    public function topo_phobius()
    {
        return view('doc/topo/phobius');
    }

    public function topo_tmhmm()
    {
        return view('doc/topo/tmhmm');
    }

    public function topo_cytoextra()
    {
        return view('doc/topo/cytoextra');
    }

    public function vs_ppinterface()
    {
        return view('doc/vs/ppinterface');
    }

    public function vs_coloring()
    {
        return view('doc/vs/coloring');
    }

    public function vs_sm()
    {
        return view('doc/vs/sm');
    }

    public function mapping_pdb2uniprot()
    {
        return view('doc/mapping/pdb2uniprot');
    }

    public function rrc_read()
    {
        return view('doc/rrc/read');
    }

    public function rrc_evaluate()
    {
        return view('doc/rrc/evaluate');
    }

    public function bi_bigraph()
    {
        return view('doc/bipartite/bigraph');
    }

    public function bi_scheme()
    {
        return view('doc/bipartite/scheme');
    }

    public function bi_pipeline()
    {
        return view('doc/bipartite/pipeline');
    }

    public function bi_usage()
    {
        return view('doc/bipartite/usage');
    }

    public function bi_cli()
    {
        return view('doc/bipartite/cli');
    }

    public function uni_unigraph()
    {
        return view('doc/unipartite/unigraph');
    }

    public function uni_scheme()
    {
        return view('doc/unipartite/scheme');
    }

    public function uni_pipeline()
    {
        return view('doc/unipartite/pipeline');
    }

    public function uni_usage()
    {
        return view('doc/unipartite/usage');
    }

    public function uni_cli()
    {
        return view('doc/unipartite/cli');
    }


    public function cumu_intro()
    {
        return view('doc/cumulative/introduction');
    }

    public function cumu_pipeline()
    {
        return view('doc/cumulative/pipeline');
    }

    public function cumu_usage()
    {
        return view('doc/cumulative/usage');
    }

    public function cumu_cli()
    {
        return view('doc/cumulative/cli');
    }

    public function changelog()
    {
        return view('doc/other/changelog');
    }
}
