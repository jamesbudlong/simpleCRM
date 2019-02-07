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
        //dd($request);
        $first_name = $request['customers']['first_name'];
        $last_name = $request['customers']['last_name'];
        $customer_type = $request['customer_type'];
        $customer_category = $request['category'];
        $responsible_seller = $request['responsible_seller'];

        if($customer_type == 'person'){ //if inserting person
            $person = new Person;
            $person->first_name = $first_name;
            $person->last_name = $last_name;
            $person->save();

            $new_person_id = $person->id;
            //return $new_person_id;
            $new_customer_id = $this->storeCustomerDetails($request['customers'], $new_person_id, $customer_type, $customer_category, $responsible_seller);
            return $new_customer_id;
        }
        else{ //if inserting company
            return "for company";
        }
        
        
        //die($request['customers']['first_name']);
    }

    public function storeCustomerDetails($passed_request, $new_id, $customer_type, $customer_category, $responsible_seller)
    {      
        $request = new Request($passed_request);
        
        $request->query->add(['customer_details_id' => $new_id,
                            'customer_type' => $customer_type,
                            'customer_category' => $customer_category,
                            'responsible_seller' => $responsible_seller
        ]);
        
        $customers = Customer::create($request->all());
        return $new_id = $customers->id;;
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
