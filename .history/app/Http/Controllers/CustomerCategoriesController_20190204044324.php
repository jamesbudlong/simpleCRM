<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerCategoriesController extends Controller
{
    return CustomerCategory::latest()->paginate(10);
}
