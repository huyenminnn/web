<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Yajra\Datatables\Datatables;

class AdminsController extends Controller
{
	/**
 	* Displays datatables front end view
 	*
 	* @return \Illuminate\View\View
 	*/
 	public function getIndex()
 	{
 		$admins = Admin::all();
 		return view('admin.admins.index',[
 			'admins' => $admins,
 		]);
 	}

	/**
	 * Process datatables ajax request, always go with getIndex when using DataTable
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function anyData()
	{
    	$list = Admin::all();
    	foreach ($list as $admins) {
    		$admins['admin_name'] = Admin::all();
    	}
    	return Datatables::of($list)
      ->addColumn('action', function ($admins) {
         return '<a name="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-id="'.$admins["id"].'" id="row-'.$admins["id"].'"></a>&nbsp;<a name="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-id='.$admins["id"].'></a>&nbsp;<a name="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-id='.$admins["id"].'></a>';
     })
      ->setRowId('id')
      ->make(true);
  }

	/**
	 * save new category to db
	 * @param Request $request [description]
	 */
	public function store(Request $request)
	{
		$data = $request->all();
		//$data['slug'] = str_slug($data['name']);
		$admins =  Admin::create($data);
		if ($admins!=null) {
			
			return $admins;
		} else {
			return response()->json(['done']);
		}
	}

	/**
	 * delete category by ID
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function destroy($id)
	{
		Admin::find($id)->delete();
		return response()->json(['done']);
	}

	/**
	 * get data of category by ID
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function show($id)
	{
		$admins = Admin::where('id','=',$id)->first();
		return $admins;
	}
	

}
