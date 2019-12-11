<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\ManageProject;
use Excel;
use DB;
use App\Imports\UsersImport;

class ImportExcelController extends Controller
{
    function index($id) {

    	$datamg = ManageProject::find($id);
    	$data = DB::table('users')->where('manage_project_id', $id)->orderBy('id', 'DESC')->paginate(5);
     	return view('import_excel', compact('datamg','data'));
    }

    function import(Request $request, $id) {
		$this->validate($request, [
		'select_file'  => 'required|mimes:xls,xlsx'
		]);

		Excel::import(new UsersImport($id), request()->file('select_file'));

     	return back()->with('success', 'Excel Data Imported successfully.');
    }


}
