@extends('layouts.app')
@section('title', 'edit category')

@section('content')
    @if (session('update_wrong'))
        <div class="alert alert-danger text-center">
            {{ session('update_wrong') }}
        </div>
    @endif
    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="category_name">Name<span style="color: red">*</span></label>
            <input required type="text" class="form-control" id="category_name" name="name" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <label for="category_description">Description</label>
            <textarea class="form-control" id="category_description" name="description">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
