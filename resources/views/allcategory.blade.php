@extends('master.master')
@section('content')

<div class="container-fluid mt-5 mb-5" style="overflow:hidden">

	<div class="container-fluid  ">
 
 <h3 class="text-center ml-3 heading_line">All Categories
 </h3>
</div>  

<div class="row mt-5 ">

 @forelse($submenues as $category)
 
 
 
 <div class="col-md-3 mt-3">
 	<!-- from category component -->
 	<x-subcategorycomponent :category="$category"/>


</div>

@empty
   <x-messagecomponent message="Category Not Found" />
  @endforelse
</div>
</div>
@endsection