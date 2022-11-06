@extends('layouts.navbar_admin')

@section('navbar-admin')
    
<h1 class="h3 mb-4 text-gray-800">{{Auth::guard('webadmin')->user()->nama_admin}}</h1>

@endsection
