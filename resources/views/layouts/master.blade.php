@include('header')
<div id="app"> 
@include('nav') 
@include('sidebar') 
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @yield('content')
</div>
<!-- /.content-wrapper -->
</div>
@include('footer') 