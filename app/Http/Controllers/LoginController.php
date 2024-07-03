<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Mail\Subscribe;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    protected $module, $keterangan;
    public function __construct()
    {
        $this->module = "auth";
        $this->keterangan = "Login";
    }

    public function index()
    {
        $data = array(
            "title" => $this->keterangan,
            "data" => array()
        );
        return view('auth.login', $data);
    }


    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function acLogin(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'username' => 'required',
                    'password' => 'required',
                    // 'g-recaptcha-response' => 'required',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'validation error ' . $validateUser->errors(),
                    'errors' => $validateUser->errors()
                ]);
            }
            // $cek_reCAPTCHA['success'] = true;
            // $cek_reCAPTCHA = $this->recaptchav2(env('CAPTCHA_SECRETKEY'), $request->input('g-recaptcha-response'));
            // if (!$cek_reCAPTCHA['success']) {
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'reCAPTCHA invalid!'
            //     ]);
            // }

            $remember_me = isset($request->rememberme) ? true : false;

            if (!Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember_me)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Username & Password does not match with our record.',
                ]);
            }

            $user = User::where('email', $request->username)->first();

            return response()->json([
                'url' => url('/admin'),
                'success' => true,
                'message' => 'User Logged In Successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Logout The User
     * @param Request $request
     * @return User
     */
    public function acLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    private function recaptchav2($secret_key, $recaptcha_response)
    {
        $recaptchaResponse = trim($recaptcha_response);
        $secret = $secret_key;

        $credential = array(
            'secret' => $secret,
            'response' => $recaptchaResponse
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        return json_decode($response, true);
    }
}
