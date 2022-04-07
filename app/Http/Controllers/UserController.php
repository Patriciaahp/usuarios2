<?php

namespace App\Http\Controllers;

use App\Models\User;
use Domain\Users\Users\Actions\ActivateUserAction;
use Domain\Users\Users\Actions\DeactivateUserAction;
use Domain\Users\Users\Actions\DeleteUserAction;
use Domain\Users\Users\Actions\StoreUserAction;
use Domain\Users\Users\Actions\UpdateUserAction;
use Illuminate\Http\Request;

class UserController extends Controller
{

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
        return $this->form('users/create', new User());
    }

    protected function form($view, User $user)
    {
        return view($view, [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
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
        return view('users/update', ['user' => $user]);
    }

    public function preview($id)
    {
        $user = User::find($id);
        return view('users/preview', ['user' => $user]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users/show', ['user' => $user]);
    }

    public function status($id)
    {
        $user = User::find($id);

    }

    public function inactive($id)
    {
        $user = User::find($id);

        $action = new DeactivateUserAction($user);
        $action->execute();
        return redirect()->route('users');
    }

    public function active($id)
    {
        $user = User::find($id);

        $action = new ActivateUserAction($user);
        $action->execute();
        return redirect()->route('users');
    }


}
