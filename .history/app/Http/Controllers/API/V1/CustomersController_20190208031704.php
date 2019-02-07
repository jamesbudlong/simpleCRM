<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Person;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd($request['customers']['customer_type']);
        $first_name = $request['customers']['first_name'];
        $last_name = $request['customers']['last_name'];
        $customer_type = $request['customer_type'];

        if($customer_type == 'person'){ //if inserting person
            $person = new Person;
            $person->first_name = $first_name;
            $person->last_name = $last_name;
            $person->save();

            $new_person_id = $person->id;
            //return $new_person_id;
            $var = $this->storeCustomerDetails($request['customers'], $new_person_id, $customer_type);
            return $var;
        }
        else{ //if inserting company
            return "no wow";
        }
        
        
        //die($request['customers']['first_name']);
    }

    public function storeCustomerDetails($passed_request, $new_id, $customer_type)
    {      
        $request = new Request($passed_request);
        
        $request->query->add(['customer_details_id' => $new_id,'customer_type' => $customer_type]);
        // dd($request);
        $customers = Customers::create($request->all());
        return $customers;
        //Customer::create(array_merge($request->all(), ['index' => 'value']));
        // $new_array = array('customer_details_id' => $new_id,'customer_type' => $customer_type);
        // $passed_request = array_merge($passed_request, $new_array);
 
        // $customers = new Customer($passed_request);
        // $customers->fill($passed_request);
        // return $customers->id;
        // //$customer = Customer::create($request2->all() + ['customer_details_id' => $new_id, 'customer_type' => $customer_type]);
        //return $customer;
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
