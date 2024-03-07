<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(){
        return route('user.home');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
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
            'name' => ['required', 'string', 'max:191'],
            //'captcha_token' => ['required'],
            'username' => ['required', 'string', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            //'captcha_token.required' => __('google captcha is required'),
            'name.required' => __('name is required'),
            'name.max' => __('name is must be between 191 character'),
            'username.required' => __('username is required'),
            'username.max' => __('username is must be between 191 character'),
            'username.unique' => __('username is already taken'),
            'email.unique' => __('email is already taken'),
            'email.required' => __('email is required'),
            'password.required' => __('password is required'),
            'password.confirmed' => __('both password does not matched'),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'country'   => $data['country'],
            'city'      => $data['city'],
            'username'  => $data['username'],
            'password'  => Hash::make($data['password'])
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createAdmin(Request $request)
    {
        $this->adminValidator($request->all())->validate();
        Admin::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('admin.home');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('frontend.user.register');
    }

    public function show_trial_form()
    {
        return view('frontend.user.trial');
    }

    protected function save_trial_form(Request $data)
    {
        // Validation rules
        $rules = [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        // Custom validation messages
        $messages = [
            'name.required' => __('Name is required.'),
            'name.max' => __('Name must not be greater than 191 characters.'),
            'email.required' => __('Email is required.'),
            'email.email' => __('Invalid email format.'),
            'email.max' => __('Email must not be greater than 255 characters.'),
            'email.unique' => __('Email is already taken.'),
            'country.required' => __('Country is required.'),
            'city.required' => __('City is required.'),
            'username.required' => __('Username is required.'),
            'username.max' => __('Username must not be greater than 255 characters.'),
            'username.unique' => __('Username is already taken.'),
            'password.required' => __('Password is required.'),
            'password.min' => __('Password must be at least 8 characters.'),
            'password.confirmed' => __('Passwords do not match.'),
        ];

        // Validate the data
        $validator = Validator::make($data->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proceed if validation passes

        $token_expire_date = Carbon::now()->addDays(7)->format('d-m-Y');
        $token = '';
        $password = Hash::make($data->password);

        $url = "https://secure.eclatproduct.com/api/tokens";
        $params = [
            'CompanyName' => $data->username,
            'Expirydate' => $token_expire_date,
            'Limit' => 20
        ];

        // Make API request to get token
        $max_retries = 3; // Set the maximum number of retries
        $retry_delay = 2; // Set the delay between retries in seconds

        for ($attempt = 1; $attempt <= $max_retries; $attempt++) {
            $ch = curl_init();

            // Set the cURL options
            curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Execute the request
            $api_response = curl_exec($ch);

            if ($api_response !== false) {
                $api_data = json_decode($api_response, true);

                if (isset($api_data['token'])) {
                    $token = $api_data['token'];
                    break; // Break out of the loop if a token is received
                }
            }

            // Close cURL resource to free up system resources
            curl_close($ch);

            if ($attempt < $max_retries) {
                sleep($retry_delay); // Wait before making the next attempt
            }
        }

        // Create a new user
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'country' => $data->country,
            'city' => $data->city,
            'username' => $data->username,
            'password' => $password,
            'upc_token' => $token,
        ]);

        try {
            $email_data = [
                'name' => $data->name,
                'email' => $data->email,
                'message' => 'Thank you for signing up for an Eclat Product account.',
                'token' => $token,
                'token_expire_date' => $token_expire_date
            ];

            Mail::send('mail.email_token', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email']);
                $message->subject('Token');
            });

            // Redirect to the email verification page
            return redirect()->route('user.home')->with('success', 'An email has been sent with instructions to verify your account.');
        } catch (\Exception $e) {
            // Handle the exception, e.g., log the error, return a response, etc.
            return redirect()->route('user.home')->with('error', 'An error occurred while sending the email.');
        }

    }
}
