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
      <th scope="col">Assign Roles</th>
      <th scope="col">Roles</th>
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
        @can('delete.user')
        <form action="{{ route('home.destroy', $user->id)}}" method="post">
           @csrf
           @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        @endcan
      </td>
      <td><a href="{{ route('user.roles', $user->id)}}" class="btn btn-primary">Roles</td>
      <td>
        {{implode(',',$user->roles()->get()->pluck('name')->toArray())}}
      </td>
    </tr>
    @endforeach    
  </tbody>
</table>
@can('create.product')
<a href="{{ route('product.create')}}" class="btn btn-primary">Create Product</a>
@endcan
       </div>
            </div>
        </div>
    </div>
</div>
@endsection
