<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use Session;
use DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = DB::table('tasks')
            ->leftJoin('users', 'tasks.responsible_seller', '=', 'users.id')
            ->leftJoin('customers', 'tasks.customer_id', '=', 'customers.id')
            ->where('customer_id', '=', $id)
            ->select('tasks.*','users.name as user_name','customers.first_name as first_name','customers.last_name as last_name','customers.company_name as company_name')
            ->get();

        $customers = $results->paginate(3);

        return response()->json($customers);
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
        $session_user_id = \DB::table('sessions')->value('user_id');
        $customer_id = $request['customer_id'];

        $final_request = new Request($request['tasksAdd']);

        $final_request->query->add(['created_by' => $session_user_id, 'customer_id' => $customer_id, 'updated_by' => $session_user_id]);
        $tasks = Task::create($final_request->all());
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
        return Task::findOrFail($id);
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
        $task = Task::findOrFail($id);
        $task->update($request->all());

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
        $task = Task::findOrFail($id);
        $task->delete();
        return 'success';
    }

    public function getAllTasksByCustomerID($id)
    {
        $results = DB::table('tasks')
            ->leftJoin('users', 'tasks.responsible_seller', '=', 'users.id')
            ->where('customer_id', '=', $id)
            ->select('tasks.*','users.name as user_name')
            ->get();

        //$customers = $results->paginate(3);

        return response()->json($results);

        // $results = Task::where('customer_id', '=', $id)->get();
        // return $results;
    }
}
