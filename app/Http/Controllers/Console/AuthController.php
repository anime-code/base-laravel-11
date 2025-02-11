<?php

namespace App\Http\Controllers\Console;

use App\Enums\RoleType;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\User\IUserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        protected IUserRepo $userRepo
    )
    {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('console.auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginPost(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = $this->userRepo->getRecordsByConditions([
            ['email', $email],
            ['role', (string)RoleType::CONSOLE->value],
        ]);
        if ($user) {
            if ($user->trashed()) {
                return redirect()->route('console.login.form')->with('error', __('message.delete_admin_trashed'))->withInput();
            }

            if (Auth::guard('console')->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('console.login.form')->withErrors([
                    'email' => __('message.error_email_or_pass')
                ])->withInput();
            }
        } else {
            return redirect()->route('console.login.form')->withErrors([
                'email' => __('message.error_email_or_pass')
            ])->withInput();
        }
    }
}
