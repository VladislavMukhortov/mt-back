@extends('layouts.app')
@section('title', 'products')

@section('content')
{{--Алерты можно вынести в отдельные вьюхи--}}
    @if (session('update_success'))
        <div class="alert alert-success text-center">
            {{ session('update_success') }}
        </div>
    @endif
    @if (session('store_success'))
        <div class="alert alert-success text-center">
            {{ session('store_success') }}
        </div>
    @endif
    @if (session('delete_success'))
        <div class="alert alert-success text-center">
            {{ session('delete_success') }}
        </div>
    @endif
    @if (session('delete_wrong'))
        <div class="alert alert-danger text-center">
            {{ session('delete_wrong') }}
        </div>
    @endif
    <a href="/"><--back</a>
    <h1 class="text-center">Products</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Parent category</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Items left</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category_name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->items_left }}</td>
                <td><a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a></td>
                <td>
                    <form method="post" action="{{ route('products.destroy', $product->id) }}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ route('products.create') }}">Create new product</a>
@endsection
