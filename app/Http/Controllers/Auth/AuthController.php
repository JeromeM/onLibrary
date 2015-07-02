<?php

namespace onLibrary\Http\Controllers\Auth;

use onLibrary\Models\Users;
use Validator;
use onLibrary\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $redirectTo = '/account';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout', 'loginValidate']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Users::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginValidate(Request $request)
    {
        $success    = true;
        $errors     = array();

        // Validation des données
        $input = array(
            'email'         => $request->input('email'),
            'password'      => $request->input('password'),
        );

        $rules = array(
            'email'         => 'required|email',
            'password'      => 'required',
        );

        $messages = array(
            'email.required'    => trans('validation.emailRequired'),
            'email.email'       => trans('validation.emailEmail'),

            'password.required' => trans('validation.passwordRequired'),
        );

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $success = false;
            $errors = $validator->errors();
        }


        return response()->json(['success' => $success, 'errors' => $errors]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerValidate(Request $request)
    {
        $success = true;
        $errors  = array();

        // Validation des données
        $input = array(
            'email'                 => $request->input('email'),
            'password'              => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
        );

        $rules = array(
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6|confirmed',
        );

        $messages = array(
            'email.required'        => trans('validation.emailRequired'),
            'email.email'           => trans('validation.emailEmail'),
            'email.max'             => trans('validation.emailMax'),
            'email.unique'          => trans('validation.emailUnique'),

            'password.required'     => trans('validation.passwordRequired'),
            'password.min'          => trans('validation.passwordMin'),
            'password.confirmed'    => trans('validation.passwordConfirm'),
        );

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $success = false;
            $errors = $validator->errors();
        }

        return response()->json(['success' => $success, 'errors' => $errors]);
    }

}
