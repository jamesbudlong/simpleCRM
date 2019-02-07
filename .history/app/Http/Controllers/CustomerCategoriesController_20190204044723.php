<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerCategoriesController extends Controller
{
    public function index()
    {
        return CustomerCategory::latest()->paginate(10);
    }

    public function show($id)
    {
      $customer_category = CustomerCategory::find($id);
      return array('customer_categories' => $customer_category);
    }
}
