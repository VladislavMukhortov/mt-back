@extends('layouts.app')
@section('title', 'edit product')

@section('content')
    @if (session('update_wrong'))
        <div class="alert alert-danger text-center">
            {{ session('update_wrong') }}
        </div>
    @endif
    <form action="{{ route('products.update', $product->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="product_name">Name<span style="color: red">*</span></label>
            <input required type="text" class="form-control" id="product_name" name="name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="product_description">Description</label>
            <textarea class="form-control" id="product_description" name="description">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="product_price">Price<span style="color: red">*</span></label>
            <input required type="number" class="form-control" id="product_price" name="price" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="category_name">Items left<span style="color: red">*</span></label>
            <input required type="number" class="form-control" id="category_items" name="items_left" value="{{ $product->items_left }}">
        </div>
        <div class="form-group">
            <label for="parent_category">Parent category<span style="color: red">*</span></label>
            <select required id="parent_category" name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if($category->id == $product->category_id) selected @endif>
                            {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
