<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pipeline;
use DB;
use Session;

class PipelinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = DB::table('pipelines')
            ->leftJoin('users', 'pipelines.responsible_seller', '=', 'users.id')
            ->leftJoin('customers', 'tasks.customer_id', '=', 'customers.id')
            ->select('tasks.*','users.id as user_id','users.name as user_name','customers.id as customer_id','customers.first_name as first_name','customers.last_name as last_name','customers.company_name as company_name','customers.customer_type as customer_type')
            ->get();

        $pipelines = $results->paginate(2);

        return response()->json($pipelines);
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
        //dd($request);
        $session_user_id = \DB::table('sessions')->value('user_id');
        $customer_id = $request['customer_id'];

        $final_request = new Request($request['newPipeline']);

        $final_request->query->add(['created_by' => $session_user_id, 'customer_id' => $customer_id, 'updated_by' => $session_user_id]);
        $pipeline = Pipeline::create($final_request->all());
        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pipeline::findOrFail($id);
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
        $pipeline = Pipeline::findOrFail($id);
        $pipeline->update($request->all());

        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pipeline = Pipeline::findOrFail($id);
        $pipeline->delete();
        return '';
    }
}
