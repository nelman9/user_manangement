<?php 
namespace UserM\Http\Controllers\admin;

use UserM\User;
use UserM\Role;
use Illuminate\Http\Request;
use UserM\Http\Controllers\Controller;

class RolesController extends Controller
{
    //
    public function roles(User $user){
    	$roles=Role::all();
        return view('admin.user_roles')->with([ 'user'=>$user,
        	'roles'=>$roles
        ]);
    
    }	

    public function update(Request $request, User $user){
    	$user->roles()->sync($request->roles);
    	return redirect()->route('home');

    }
}