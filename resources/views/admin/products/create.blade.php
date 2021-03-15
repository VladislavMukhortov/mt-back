@extends('layouts.app')
@section('title', 'create product')

@section('content')
    @if (session('store_wrong'))
        <div class="alert alert-danger text-center">
            {{ session('store_wrong') }}
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="category_name">Name<span style="color: red">*</span></label>
            <input required type="text" class="form-control" id="category_name" name="name" placeholder="name">
        </div>
        <div class="form-group">
            <label for="category_description">Description</label>
            <textarea class="form-control" id="category_description" name="description" placeholder="description"></textarea>
        </div>
        <div class="form-group">
            <label for="product_price">Price<span style="color: red">*</span></label>
            <input required type="number" class="form-control" id="product_price" name="price" placeholder="price">
        </div>
        <div class="form-group">
            <label for="category_name">Items left<span style="color: red">*</span></label>
            <input required type="number" class="form-control" id="category_items" name="items_left" placeholder="items left">
        </div>
        <div class="form-group">
            <label for="parent_category">Parent category<span style="color: red">*</span></label>
            <select required id="parent_category" name="category_id" class="form-control">
                <option disabled selected>--select category--</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
