<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerCategoriesController extends Controller
{
    public function index()
    {
        return User::latest()->paginate(10);
    }
}
