@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users Dashboard</div>

                <div class="card-body">
                  @if(session('alert-success'))

                            <div class="alert alert-success">
                                   {{ session('alert-success') }}
                            </div>
                    @endif
                    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
     @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td><a href="{{ route('user.edit', $user->id)}}" class="btn btn-primary">Edit</a></td>
      <td>
        <form action="{{ route('home.destroy', $user->id)}}" method="post">
           @csrf
           @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach    
  </tbody>
</table>
<a href="{{ route('product.create')}}" class="btn btn-primary">Create Product</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
