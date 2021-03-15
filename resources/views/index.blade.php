@extends('layouts.app')
@section('title', 'main page')

@section('content')
    <h3 class="center">Admin panel</h3>
    <a class="center" href="{{ route('categories.index') }}">Categories</a><br>
    <a class="center" href="{{ route('products.index') }}">Products</a>
@endsection
