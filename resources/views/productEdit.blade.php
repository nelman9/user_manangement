@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products Dashboard</div>

                <div class="card-body">

                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
                   @endif
                   
  <form method="post" action="{{ route('product.update', $product->id) }}">
          <div class="form-group">
              @csrf
              @method('patch')
              <label for="name">Product Name:</label>
              <input type="text" class="form-control" name="name" value="{{$product->name}}"/>
          </div>
          <div class="form-group">
              <label for="price">Product price :</label>
              <input type="numeric" class="form-control" name="price" value="{{$product->price}}"/>
          </div>
          <div   class="btn-group">
          <button type="submit" class="btn btn-primary">update Product</button>
      </form>
    </div>
  </div>
      
         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
