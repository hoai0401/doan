@extends('admin.index')

@section('header')
    @parent
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Choose Image:</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label>Product </label>
                        <select class="form-control" name="product_id">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            <button type="submit" class="btn btn-primary">Add Image</button>
        </form>
    </div>
@endsection