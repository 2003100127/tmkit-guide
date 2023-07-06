<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

/* information web pages */
Route::get('feature', [WebsiteController::class, 'feature']);
Route::get('issue', [WebsiteController::class, 'issue']);
Route::get('download', [WebsiteController::class, 'download']);
Route::get('faqs', [WebsiteController::class, 'faqs']);
Route::get('about', [WebsiteController::class, 'about']);
Route::get('whatsnew', [WebsiteController::class, 'whatsnew']);


Route::get('doc/overview', [WebsiteController::class, 'overview']);
Route::get('doc/feature', [WebsiteController::class, 'gsfeature']);
Route::get('doc/installation', [WebsiteController::class, 'installation']);
Route::get('doc/exdataset', [WebsiteController::class, 'exdataset']);

# module sequence
Route::get('doc/seq/read', [WebsiteController::class, 'seq_read']);
Route::get('doc/seq/retrieve', [WebsiteController::class, 'seq_retrieve']);

Route::get('doc/topo/pdbtm', [WebsiteController::class, 'topo_pdbtm']);
Route::get('doc/topo/phobius', [WebsiteController::class, 'topo_phobius']);
Route::get('doc/topo/tmhmm', [WebsiteController::class, 'topo_tmhmm']);
Route::get('doc/topo/cytoextra', [WebsiteController::class, 'topo_cytoextra']);

Route::get('doc/msa/hhblits', [WebsiteController::class, 'msa_hhblits']);
Route::get('doc/msa/jackhmmer', [WebsiteController::class, 'msa_jackhmmer']);
Route::get('doc/msa/hhfilter', [WebsiteController::class, 'msa_hhfilter']);
Route::get('doc/msa/format', [WebsiteController::class, 'msa_format']);
Route::get('doc/msa/foldseek', [WebsiteController::class, 'msa_foldseek']);

Route::get('doc/collation/individual', [WebsiteController::class, 'coll_individual']);
Route::get('doc/collation/batch', [WebsiteController::class, 'coll_batch']);

Route::get('doc/feature/runlip', [WebsiteController::class, 'feature_runlip']);
Route::get('doc/feature/entropy', [WebsiteController::class, 'feature_entropy']);
Route::get('doc/feature/helixsurf', [WebsiteController::class, 'feature_helixsurf']);
Route::get('doc/feature/lip', [WebsiteController::class, 'feature_lip']);
Route::get('doc/feature/topo', [WebsiteController::class, 'feature_topo']);

Route::get('doc/mut/muthtp', [WebsiteController::class, 'mut_muthtp']);
Route::get('doc/mut/predmuthtp', [WebsiteController::class, 'mut_predmuthtp']);

Route::get('doc/cath/fetch', [WebsiteController::class, 'cath_fetch']);
Route::get('doc/cath/customize', [WebsiteController::class, 'cath_customize']);

Route::get('doc/ppi/biogrid', [WebsiteController::class, 'ppi_biogrid']);
Route::get('doc/ppi/intact', [WebsiteController::class, 'ppi_intact']);
Route::get('doc/ppi/connectivity', [WebsiteController::class, 'ppi_connectivity']);

Route::get('doc/rrc/read', [WebsiteController::class, 'rrc_read']);
Route::get('doc/rrc/evaluate', [WebsiteController::class, 'rrc_evaluate']);

Route::get('doc/qc/template', [WebsiteController::class, 'qc_template']);
Route::get('doc/qc/integrate', [WebsiteController::class, 'qc_integrate']);

Route::get('doc/vs/ppinterface', [WebsiteController::class, 'vs_ppinterface']);
Route::get('doc/vs/coloring', [WebsiteController::class, 'vs_coloring']);
Route::get('doc/vs/sm', [WebsiteController::class, 'vs_sm']);

Route::get('doc/mapping/pdb2uniprot', [WebsiteController::class, 'mapping_pdb2uniprot']);

Route::get('doc/bipartite/scheme', [WebsiteController::class, 'bi_scheme']);
Route::get('doc/bipartite/bigraph', [WebsiteController::class, 'bi_bigraph']);
Route::get('doc/bipartite/pipeline', [WebsiteController::class, 'bi_pipeline']);
Route::get('doc/bipartite/usage', [WebsiteController::class, 'bi_usage']);
//Route::get('doc/bipartite/cli', [WebsiteController::class, 'bi_cli']);

Route::get('doc/unipartite/scheme', [WebsiteController::class, 'uni_scheme']);
Route::get('doc/unipartite/unigraph', [WebsiteController::class, 'uni_unigraph']);
Route::get('doc/unipartite/pipeline', [WebsiteController::class, 'uni_pipeline']);
Route::get('doc/unipartite/usage', [WebsiteController::class, 'uni_usage']);
//Route::get('doc/unipartite/cli', [WebsiteController::class, 'uni_cli']);

Route::get('doc/cumulative/intro', [WebsiteController::class, 'cumu_intro']);
Route::get('doc/cumulative/pipeline', [WebsiteController::class, 'cumu_pipeline']);
Route::get('doc/cumulative/usage', [WebsiteController::class, 'cumu_usage']);
//Route::get('doc/cumulative/cli', [WebsiteController::class, 'cumu_cli']);


Route::get('doc/changelog', [WebsiteController::class, 'changelog']);

