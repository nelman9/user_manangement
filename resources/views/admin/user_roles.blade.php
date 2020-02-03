@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User roles {{$user->name}}</div>
                                           
                          
        <div class="card-body">
                                    
            <form action="{{route('roles.update', $user)}}" method=POST>
              @csrf
               {{method_field('PATCH')}}
             
            @foreach($roles as $role)
              <div  class="form-check">
                <input type=checkbox name=roles[] value="{{$role->id}}"
                @if($user->roles->pluck('id')->contains($role->id)) checked @endif>

                <label>{{$role->name}}</label>            
              </div>
            @endforeach
            <button class="btn btn-primary">assign</button>
          
             </form>
                    
         </div>
            </div>
        </div>
    </div>
</div>
@endsection
