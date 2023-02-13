<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index($user)
    {
        $user_obj = User::findOrFail($user);

        return view('profiles.index', [
            'user' => $user_obj
        ]);
    }

    public function edit(User $user) {

        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {

        $this->authorize('update', $user->profile);
        
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image',
        ]);

        auth()->user()->profile->update($data);

        return redirect('/profile/' . $user->id);

    }
}
