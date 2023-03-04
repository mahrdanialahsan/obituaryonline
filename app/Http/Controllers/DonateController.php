<?php

namespace App\Http\Controllers;

use App\Campaigns;
use Illuminate\Http\Request;
use DB;
use Session;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(@Auth()->user()->is_admin == 1){
            return redirect(url('/'));
        }
        return view('donate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uid
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter(Request $request){
        $check      = '';
        $orderBy    = '';
        $orderByArr = [];
        if($request->has('filter_post_date') && !is_null($request->filter_post_date)  && !empty($request->filter_post_date)){
            $filter_post_date   =   date('Y-m-d',strtotime($request->filter_post_date));
            $check .=  " AND DATE(created_at) = '$filter_post_date' ";
        }
        if($request->has('filter_name') && !is_null($request->filter_name)  && !empty($request->filter_name)){
            $filter_name   =   $request->filter_name;
            $check .=  " AND (deceased_first_name LIKE '$filter_name' || deceased_last_name LIKE '$filter_name' ) ";
        }
        if($request->has('filter_post_nric') && !is_null($request->filter_post_nric)  && !empty($request->filter_post_nric)){
            $filter_post_nric   =   $request->filter_post_nric;
            $check .=  " AND nric LIKE '%$filter_post_nric' ";
        }
        if($request->has('filter_born_year') && !is_null($request->filter_born_year)  && !empty($request->filter_born_year)){
            $filter_born_year   =   $request->filter_born_year;
            $check .=  " AND YEAR(created_at) = '$filter_born_year' ";
        }

        if($request->has('sort_by_date') && $request->sort_by_date == 1){
            $orderByArr[] = 'date_of_death';
        }
        if($request->has('sort_by_age') && $request->sort_by_age == 1){
            $orderByArr[] = 'DATEDIFF(date_of_death,date_of_birth)';
        }
        if(count($orderByArr)>0){
            $orderBy = "ORDER BY ".implode(',',$orderByArr)." ".((int)@$request->sort_by_desc == 1 ? " DESC": " ASC");
        }
        $result = DB::select("SELECT * FROM campaigns WHERE status = 1  $check  $orderBy ");
        return response()->json($result);
    }
}
