<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

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
        return redirect('/');
    }

    public function user($id) {
        $auth = Auth::user();
        $user = User::find($id);
        return view("user")->withAuth($user)->withUsers($user);
    }

    public function page_change($id) {
        $user = User::find($id);
        return view("modify_user")->withUsers($user);
    }

    public function update(Request $request) {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->avatar != NULL) {
            $path = request('avatar')->store('avatars', 'public');
            $path = "/storage/" . $path;
            $user->image = $path;
        } else if ($request->delete_image == "on") {
            $path = "/images/default-avatar.jpg";
            $user->image = $path;
        }
        $user->save();
        return redirect("/user/$request->id");
    }
}
