<?php
namespace UserM\Http\Controllers;

use UserM\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::all();
        return view('home')->with('users',$users);
    }

    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $user=User::findorFail($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $validatedinfo = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
 
         User::whereId($id)->update($validatedinfo);
         $request->session()->flash('alert-success', 'User was successful updated!');
         return redirect()->route('home');
                        
    }
    
}
