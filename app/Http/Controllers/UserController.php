<?php

namespace App\Http\Controllers;

use App\Http\Requests\User as UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();

        return view('pages.users', [
            'users' => $users
        ]);
    }

    public function store(UserRequest $request)
    {
        $userCreate = User::create($request->all());

        if (!empty($request->file('photo'))) {
            $userCreate->photo = $request->file('photo')->store('user');
            $userCreate->save();
        }

        return response()->json($userCreate);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::where('id', $id)->first();

        if (!empty($request->file('photo'))) {
            Storage::delete($user->photo);
            $user->photo = '';
        }

        $user->fill($request->all());

        if (!empty($request->file('photo'))) {
            $user->photo = $request->file('photo')->store('user');
        }

        $user->save();

        return response()->json($user);
    }

    public function alterStatus($id)
    {
        $user = User::where('id', $id)->first();

        if ($user->status == 1) {
            $user->status = 0;
            $user->save();
            return response()->json($user);
        }

        if ($user->status == 0) {
            $user->status = 1;
            $user->save();
            return response()->json($user);
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id)->delete();

        return response()->json($user);
    }
}
