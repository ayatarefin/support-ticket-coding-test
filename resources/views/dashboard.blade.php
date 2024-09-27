@extends('layouts.app')

@section('content')
<div class="container">
   {{-- In dashboard.blade.php --}}

@if(Auth::user()->role == 'admin')
@include('admin.index')
@else
@include('customer.index')
@endif

</div>
@endsection
