@extends('layouts.app')
@section('title', 'categories')

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
    <h1 class="text-center">Categories</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Products in category</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->productAmount }}</td>
                <td><a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a></td>
                <td>
                    <form method="post" action="{{ route('categories.destroy', $category->id) }}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ route('categories.create') }}">Create new category</a>
@endsection
