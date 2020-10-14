<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function index()
    {
        if (Auth::user()->hasRole('superadmin'))
        {
            $users = User::all();
            return view('home',compact('users'));
        }
        return redirect()->route('quiz.index');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile',compact('user'));
    }

    public function profileActive(Request $request)
    {
        try {
            User::where('id',$request->id)->update(['email_verified_at'=>Carbon::now()]);
            return 'Account Active Successfully';
        }catch (\Exception $e){return $e->getMessage();}
    }

    public function password(Request $request)
    {
       $user = User::findOrFail(Auth::id());
        $request->validate([
            'name' => 'required|min:2',
            'password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'name'=>$request->name,
                'password' => Hash::make($request->new_password)
            ])->save();
             return redirect()->back()->with('success', 'Password changed');

        } else {
             return redirect()->back()->with('success', 'Password does not match');
        }
    }
}
