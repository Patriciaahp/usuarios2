<?php

namespace App\Panel\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Notifications\WelcomeEmail;
use App\Panel\Users\Requests\PasswordResetRequest;
use App\Panel\Users\Requests\UserStoreRequest;
use App\Panel\Users\Requests\UserUpdateRequest;
use Domain\Users\Models\User;
use Domain\Users\Users\Actions\ActivateUserAction;
use Domain\Users\Users\Actions\DeactivateUserAction;
use Domain\Users\Users\Actions\DeleteUserAction;
use Domain\Users\Users\Actions\StoreUserAction;
use Domain\Users\Users\Actions\UpdatePasswordAction;
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

        $credentials = $request->only('email', 'password', 'active');

        $user = User::findByEmail($credentials['email']);
        if (!$user) {
            return redirect("login")->with('error', 'Incorrect email or password, please check your credentials');
        }
        if ($user->active == true && Auth::attempt($credentials)) {
            return redirect('users');
        }
        if ($user->active == false && Auth::attempt($credentials)) {
            return redirect("login")->with('error', 'Your Account is suspended,
        please check your inbox and reset your password or contact Admin.');
        }
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

        $user->notify(new WelcomeEmail($user->id, $user->remember_token));

        return redirect()->route('users');
    }

    public function create()
    {

        return $this->form('users/create', new User());
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

    public function error()
    {
        return view('users/error');
    }

    public function reset(Request $request, $id, $token)
    {
        $user = User::findById($id);
        $token = $user->remember_token;
        $urlToken = explode('/', $request->url());
        if ($token === $urlToken[5]) {
            return view('users/reset', ['user' => $user, 'token' => $token]);
        } else {
            return view('users/error');
        }
    }

    public function updatePassword(PasswordResetRequest $request, $id)
    {
        $user = User::findById($id);
        $validated = $request->validated();

        $data = [
            'password' => $validated['password'],
        ];
        $action = new UpdatePasswordAction($user, $data);
        $result = $action->execute();

        $user = $result->object;
        $action = new ActivateUserAction($user);
        $action->execute();

        return redirect()->route('/login');
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

    protected function form($view, User $user)
    {
        return view($view, [
            'user' => $user,
        ]);
    }

}
