@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products Dashboard</div>

                <div class="card-body">
                   
  <form method="POST" action="{{ route('product.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Product Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="price">Product price :</label>
              <input type="numeric" class="form-control" name="price"/>
          </div>
          <div   class="btn-group">
          <button type="submit" class="btn btn-primary">Create Product</button>
         
          <a href="{{ route('home')}}" class="btn btn-primary">Home</a></div>
      </form>
    </div>
  </div>
      
         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
