<?php

namespace App\Http\Controllers;

use App\Models\User;
use Domain\Users\Users\Actions\DeleteUserAction;
use Domain\Users\Users\Actions\StoreUserAction;
use Domain\Users\Users\Actions\UpdateUserAction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected function form($view, User $user)
    {
        return view($view, [
            'user' =>  $user,
        ]);
    }
    public function store(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        $action = new StoreUserAction($data);
        $result = $action->execute();

        $user = $result->object;

        return redirect()->route('users');
    }

    public function create()
    {
        return $this->form('create', new User);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        $data = [
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            ];

        $action = new UpdateUserAction($user, $data);
        $result = $action->execute();

        $user = $result->object;
        return redirect()->route('users', $user);
    }
    public function delete($id)
    {
        $user = User::find($id);
        $action = new DeleteUserAction($user);
        $result = $action->execute($user);

        $user = $result->object;
        return redirect()->route('users');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('update', ['user' => $user]);
    }
    public function preview($id)
    {
        $user = User::find($id);
        return view('preview', ['user' => $user]);
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('show', ['user' => $user]);
    }
}
