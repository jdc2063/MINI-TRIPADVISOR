<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return redirect('/');
    }

    // Affiche la page d'un utilisateur
    public function user($id) {
        $auth = Auth::user();
        if ($auth == NULL) {
            $auth = 0;
        } else {
            $auth = $auth->id;
        }
        $user = User::find($id);
        return view("user")->withAuth($auth)->withUsers($user);
    }

    // Affiche la page de modification d'un utilisateur
    public function page_change($id) {
        $user = User::find($id);
        return view("modify_user")->withUsers($user);
    }

    // Modifie un utilisateur
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
