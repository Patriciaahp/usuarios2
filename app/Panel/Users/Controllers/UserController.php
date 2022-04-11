<?php

namespace App\Panel\Users\Controllers;

use App\Models\User;
use App\Panel\Users\Requests\UserStoreRequest;
use App\Panel\Users\Requests\UserUpdateRequest;
use Domain\Users\Users\Actions\ActivateUserAction;
use Domain\Users\Users\Actions\DeactivateUserAction;
use Domain\Users\Users\Actions\DeleteUserAction;
use Domain\Users\Users\Actions\StoreUserAction;
use Domain\Users\Users\Actions\UpdateUserAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function redirect;
use function view;

class UserController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['active'] = 1;
        if (Auth::attempt($credentials)) {
            return redirect('users');
        }
        return redirect("login")->with('error', 'Your Account is suspended, please contact Admin.');
    }

    public function index()
    {
        return view('users/login');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();

        $data = [
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'password' => $validated['password'],
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

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findById($id);

        $validated = $request->validated();
        $data = [
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];

        $action = new UpdateUserAction($user, $data);
        $result = $action->execute();

        $user = $result->object;
        return redirect()->route('users', $user);
    }

    public function delete($id)
    {
        $user = User::findById($id);
        $action = new DeleteUserAction($user);
        $result = $action->execute($user);

        $user = $result->object;
        return redirect()->route('users');
    }

    public function edit($id)
    {
        $user = User::findById($id);
        return view('users/update', ['user' => $user]);
    }

    public function preview($id)
    {
        $user = User::findById($id);
        return view('users/preview', ['user' => $user]);
    }

    public function show($id)
    {
        $user = User::findById($id);
        return view('users/show', ['user' => $user]);
    }

    public function inactive($id)
    {
        $user = User::findById($id);

        $action = new DeactivateUserAction($user);
        $action->execute();
        return redirect()->route('users');
    }

    public function active($id)
    {
        $user = User::findById($id);

        $action = new ActivateUserAction($user);
        $action->execute();
        return redirect()->route('users');
    }
}
