<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Session;
use DB;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Customer::paginate(10);
        // return response()->json($posts);
        
        $customers = DB::table('customers')
            ->leftJoin('users', 'customers.responsible_seller', '=', 'users.id')
            ->leftJoin('customer_categories', 'customers.customer_category', '=', 'customer_categories.id')
            ->select('customers.*','users.name as user_name','customer_categories.category as category_name')
            ->get()
            >simplePaginate(15);
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
        //get user id of logged in user
        $session_user_id = \DB::table('sessions')->value('user_id');

        $customer_type = $request['customer_type'];
        $customer_category = $request['category'];
        $responsible_seller = $request['responsible_seller'];

        $final_request = new Request($request['customers']);

        $final_request->query->add([
            'created_by' => $session_user_id, 
            'updated_by' => $session_user_id, 
            'customer_type' => $customer_type,
            'customer_category' => $customer_category, 
            'responsible_seller' => $responsible_seller]);

        $customers = Customer::create($final_request->all());
        
        return "success";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
}
