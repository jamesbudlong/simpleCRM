<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomerCategory;
use Session;

class CustomerCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return CustomerCategory::all();
        $posts = CustomerCategory::paginate(3);
        // $response = [
        //     'pagination' => [
        //         'total' => $posts->total(),
        //         'per_page' => $posts->perPage(),
        //         'current_page' => $posts->currentPage(),
        //         'last_page' => $posts->lastPage(),
        //         'from' => $posts->firstItem(),
        //         'to' => $posts->lastItem()
        //     ],
        //     'data' => $posts
        // ];
        return response()->json($posts);
        //return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        dd($session_user_id);
        $request->query->add(['created_by' => $session_user_id, 'updated_by' => $session_user_id]);
        $customerCategory = CustomerCategory::create($request->all());
        return $customerCategory;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CustomerCategory::findOrFail($id);
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
        $customerCategory = CustomerCategory::findOrFail($id);
        $customerCategory->update($request->all());

        return $customerCategory;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerCategory = CustomerCategory::findOrFail($id);
        $customerCategory->delete();
        return '';
    }

    public function getAllCategories()
    {
        return CustomerCategory::all();
    }
}
