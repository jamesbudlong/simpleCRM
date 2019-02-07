@extends('layouts.master')

@section('content')
<router-view name="dashboard"></router-view>
<router-view name="tasks"></router-view>
<router-view name="history"></router-view>
<router-view name="customers"></router-view>
<router-view name="companies"></router-view>
<router-view name="persons"></router-view>
<router-view name="exploration"></router-view>
<router-view name="pipeline"></router-view>
<router-view name="epost"></router-view>
<router-view name="administration"></router-view>
<router-view name="customer_categories"></router-view>
<router-view name="customer_categories_create"></router-view>
<router-view name="customer_categories_edit"></router-view>
<router-view name="users"></router-view>
@endsection

    
