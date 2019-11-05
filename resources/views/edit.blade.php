


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Update</div>
                      
                           
                          @if(session('alert-success'))

                            <div class="alert alert-success">
                                   {{ session('alert-success') }}
                            </div>
                           @endif
                          
                <div class="card-body">
                   
 <form method="post" action="{{ route('user.update', $user->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">User Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
          </div>
          <div class="form-group">
              <label for="price">User Email:</label>
              <input type="text" class="form-control" name="email" value="{{ $user->email }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update user</button>
      </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
