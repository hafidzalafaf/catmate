<?php

namespace App\Http\Controllers\API;

use Exception;
use Carbon\Carbon;
use App\Models\Otp;
use App\Models\User;
use App\Models\ApiUser;
use App\Mail\otp as MailOtp;
use Illuminate\Http\Request;
use App\Models\ForgotPassword;
use Illuminate\Validation\Rule;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\ForgotPasswordVerification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function Register(Request $request)
    {
        if (in_array('*', $request->ability) || in_array('register', $request->ability)) {
            try {
                $rules = [
                    'name' => ['required'],
                    'email' => ['required', 'email', Rule::unique(User::class)],
                    'password' => ['required', Password::min(8)->mixedCase()],
                    'repassword' => ['required', 'same:password', Password::min(8)->mixedCase()],
                    // 'address'=>['required'],
                    // 'username'=>['required',Rule::unique(User::class)],
                    'no_wa' => ['required', Rule::unique(User::class)],
                ];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {

                    return ResponseFormatter::error([
                        'message' => "Invalid validation",
                        'error' => [
                            'validation' => $validator->errors()
                        ],
                    ], 'Something went wrong', 406);
                }

                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    // 'address'=>$request->address,
                    // 'username'=>$request->username,
                    'no_wa' => $request->no_wa,
                ]);

                $otpCode = random_int(100000, 999999);


                Otp::create([
                    'email' => $request->email,
                    'code' => $otpCode,
                    'expired_date' => Carbon::now()->addMinute(5),
                ]);

                $maildata = [
                    'code' => $otpCode,
                ];

                Mail::to($request->email)->send(new MailOtp($maildata));

                // $user=User::where('email',$request->email)->first();

                // $tokenResult=$user->createToken('authToken',['*'])->plainTextToken;

                // return ResponseFormatter::success([
                //     'access_token'=>$tokenResult,
                //     'token_type'=>'Bearer',
                //     'user'=> [
                //         "id"=> null,
                //         "name"=> $user->name,
                //         "username"=> null,
                //         "email"=> $user->email,
                //         "email_verified_at"=> null,
                //         "address"=> null,
                //         "no_wa"=> $user->no_wa,
                //         "created_at"=> null,
                //         "updated_at"=> null,
                //     ],
                // ],'User Registered');

                return ResponseFormatter::success([
                    'message' => 'Success',
                ], 'Success Register');
            } catch (Exception $error) {
                return ResponseFormatter::error([
                    'message' => "Something went wrong",
                    'error' => $error,
                ], "Authentication Failed", 500);
            }
        } else {
            return ResponseFormatter::error([
                'error' => "Something went wrong",
            ], "Authentication Failed", 500);
        }
    }

    public function Login(Request $request)
    {
        if (in_array('*', $request->ability) || in_array('login', $request->ability)) {
            try {
                $rules = [
                    'email' => ['required', 'email'],
                    'password' => ['required'],
                ];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {

                    return ResponseFormatter::error([
                        'message' => "Invalid validation",
                        'error' => [
                            'validation' => $validator->errors()
                        ],
                    ], 'Something went wrong', 406);
                }

                $credentials = request(['email', 'password']);

                if (!Auth::attempt($credentials)) {
                    return ResponseFormatter::error([
                        'message' => 'error'
                    ], 'Autentication Failed', 500);
                }

                $user = User::where('email', $request->email)->first();

                if (!Hash::check($request->password, $user->password, [])) {
                    throw new \Exception("Invalid Credential");
                }

                if ($user->cats) {
                    $cats_status = TRUE;
                } else {
                    $cats_status = FALSE;
                }

                if ($user->email_verified_at) {
                    $email_verified_status = TRUE;
                    $tokenResult = $user->createToken('authToken', ['*'])->plainTextToken;
                } else {
                    $email_verified_status = FALSE;
                    $tokenResult = null;
                }

                return ResponseFormatter::success([
                    'email_verified_status' => $email_verified_status,
                    'have_cat_status' => $cats_status,
                    'access_token' => $tokenResult,
                    'token_type' => "Bearer",
                    'user' => [
                        'name' => $user->name,
                        'email' => $user->email,
                        'no_wa' => $user->no_wa,
                        'image' => $user->image,
                    ],
                ], 'Authenticated');
            } catch (Exception $error) {
                return ResponseFormatter::error([
                    'message' => 'error',
                    'error' => $error,
                ], 'Autentication Failed', 500);
            }
        } else {
            return ResponseFormatter::error([
                'error' => "Something went wrong",
            ], "Authentication Failed", 500);
        }
    }

    public function Logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        $data = [
            'access_token' => null,
            'token_type' => null,
            'user' => [
                "id" => null,
                "name" => null,
                "username" => null,
                "email" => null,
                "email_verified_at" => null,
                "address" => null,
                "no_wa" => null,
                "created_at" => null,
                "updated_at" => null,
            ],
        ];

        return ResponseFormatter::success($data, 'Token Revoked');
    }

    public function refreshUser(Request $request)
    {
        $user = $request->user();
        $tokenResult = $request->bearerToken();

        return ResponseFormatter::success([
            'access_token' => $tokenResult,
            'token_type' => "Bearer",
            'user' => $user,
        ], 'Authenticated');
    }

    public function coba(Request $request)
    {
        $user = User::where('id', $request->user()->id)->first();
        return $user->Cats;
    }

    public function cobakirimemail()
    {
        $emailToSend = 'coba@example.com';

        $maildata = [
            'code' => '000000',
        ];

        ForgotPassword::create([
            'email' => 'cobaa',
            'code' => 101010,
            'expired_date' => Carbon::now()->addMinute(5),
        ]);

        Mail::to($emailToSend)->send(new ForgotPasswordVerification($maildata));

        dd($maildata);
    }

    public function edit(Request $request, User $user)
    {
        $user = $request->user();
        // return $user->password;
        try {
            $rules = [
                'name' => ['required'],
                'email' => ['required', 'email', Rule::unique(User::class)->ignore($user->id)],
                // 'password' => ['required', Password::min(8)->mixedCase()],
                // 'repassword' => ['required', 'same:password', Password::min(8)->mixedCase()],
                'address' => ['required'],
                'username' => ['required', Rule::unique(User::class)->ignore($user->id)],
                'no_wa' => ['required', Rule::unique(User::class)->ignore($user->id)],
                'image' => ['image', 'file', 'max:1024'],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return ResponseFormatter::error([
                    'message' => "Invalid validation",
                    'error' => [
                        'validation' => $validator->errors()
                    ],
                ], 'Something went wrong', 406);
            }
            $image = $user->image;
            if ($request->file('image')) {
                if ($user->image != null && $user->image != $request->file('image')) {
                    Storage::delete($user->image);
                }
                $image = $request->file('image')->store('user');
            }
            User::where('id', $user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => Hash::make($request->password),
                'address' => $request->address,
                'username' => $request->username,
                'no_wa' => $request->no_wa,
                'image' => $image,
            ]);

            return ResponseFormatter::success($user->fresh(), 'Profile has been successfull updated!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Authentication Failed", 500);
        }
    }

    public function password(Request $request, User $user)
    {
        $user = $request->user();
        // return $user->password;
        try {
            $rules = [
                'password' => ['required', Password::min(8)->mixedCase()],
                'newpassword' => ['required', Password::min(8)->mixedCase()],
                'renewpassword' => ['required', 'same:newpassword', Password::min(8)->mixedCase()],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return ResponseFormatter::error([
                    'message' => "Invalid validation",
                    'error' => [
                        'validation' => $validator->errors()
                    ],
                ], 'Something went wrong', 406);
            }

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception("Invalid Credential");
            }


            $user->update([
                'password' => Hash::make($request->newpassword),
            ]);

            return ResponseFormatter::success($user->fresh(), 'Password has been successfull updated!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Authentication Failed", 500);
        }
    }

    public function forgotPassword(Request $request)
    {
        if (in_array('*', $request->ability) || in_array('forgotPassword', $request->ability)) {
            try {
                $rules = [
                    'email' => ['required'],
                ];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {

                    return ResponseFormatter::error([
                        'message' => "Invalid validation",
                        'error' => [
                            'validation' => $validator->errors()
                        ],
                    ], 'Something went wrong', 406);
                }


                if (User::where('email', $request->email)->first()) {
                    if (ForgotPassword::where('email', $request->email)->where('date', Carbon::now()->toDateString())->count() < 5) {
                        $otpCode = random_int(100000, 999999);

                        ForgotPassword::create([
                            'email' => $request->email,
                            'code' => $otpCode,
                            'expired_date' => Carbon::now()->addMinute(5),
                            'date' => Carbon::now(),
                        ]);

                        $maildata = [
                            'code' => $otpCode,
                        ];

                        Mail::to($request->email)->send(new ForgotPasswordVerification($maildata));

                        return ResponseFormatter::success([
                            'message' => "Success",
                        ], 'Success send forgot password verification');
                    } else {
                        return ResponseFormatter::error([
                            'message' => 'error'
                        ], 'Maximum reset password attempts reached', 500);
                    }
                } else {
                    return ResponseFormatter::error([
                        'message' => 'error'
                    ], 'User Not Found', 500);
                }
            } catch (Exception $error) {
                return ResponseFormatter::error([
                    'message' => "Something went wrong",
                    'error' => $error,
                ], "Sending Email Failed", 500);
            }
        } else {
            return ResponseFormatter::error([
                'error' => "Something went wrong",
            ], "Authentication Failed", 500);
        }
    }

    public function resetPassword(Request $request)
    {
        if (in_array('*', $request->ability) || in_array('resetPassword', $request->ability)) {
            try {
                $rules = [
                    'code' => ['required'],
                    'email' => ['required', 'email'],
                    'password' => ['required', Password::min(8)->mixedCase()],
                    'repassword' => ['required', 'same:password', Password::min(8)->mixedCase()],
                ];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {

                    return ResponseFormatter::error([
                        'message' => "Invalid validation",
                        'error' => [
                            'validation' => $validator->errors()
                        ],
                    ], 'Something went wrong', 406);
                }

                if ($forgotpass = ForgotPassword::where('code', $request->code)->first()) {
                    if ($forgotpass->expired_date >= Carbon::now()) {
                        if ($forgotpass->email == $request->email) {
                            if ($user = User::where('email', $request->email)->first()) {
                                $user->update([
                                    'password' => Hash::make($request->password),
                                ]);

                                return ResponseFormatter::success([
                                    'message' => "Success",
                                ], 'Success reset password');
                            } else {
                                return ResponseFormatter::error([
                                    'message' => 'error'
                                ], 'User Not Found', 500);
                            }
                        } else {
                            return ResponseFormatter::error([
                                'message' => 'error'
                            ], 'Email Does Not Match', 500);
                        }
                    } else {
                        return ResponseFormatter::error([
                            'message' => 'error'
                        ], 'Code Expired', 500);
                    }
                } else {
                    return ResponseFormatter::error([
                        'message' => 'error'
                    ], 'Forgot Password Not Found', 500);
                }
            } catch (Exception $error) {
                return ResponseFormatter::error([
                    'message' => "Something went wrong",
                    'error' => $error,
                ], "Reset Password Failed", 500);
            }
        } else {
            return ResponseFormatter::error([
                'error' => "Something went wrong",
            ], "Authentication Failed", 500);
        }
    }
}
