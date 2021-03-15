@extends('layouts.app')
@section('title', 'create category')

@section('content')
    @if (session('store_wrong'))
        <div class="alert alert-danger text-center">
            {{ session('store_wrong') }}
        </div>
    @endif
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="category_name">Name<span style="color: red">*</span></label>
            <input required type="text" class="form-control" id="category_name" name="name" placeholder="name">
        </div>
        <div class="form-group">
            <label for="category_description">Description</label>
            <textarea class="form-control" id="category_description" name="description" placeholder="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
