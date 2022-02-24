<?php

namespace App\Http\Controllers\API;

use Exception;
use Carbon\Carbon;
use App\Models\Otp;
use App\Models\User;
use App\Models\ApiUser;
use App\Mail\otp as MailOtp;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OtpController extends Controller
{
    public function confirmOtp(Request $request)
    {
        if (in_array('*', $request->ability) || in_array('otp.submit', $request->ability)) {
            try {

                $rules=[
                    'email'=>['required','email'],
                    'code'=>['required'],
                ];

                $validator= Validator::make($request->all(),$rules);
                
                if ($validator->fails()) {
                    
                    return ResponseFormatter::error([
                        'message'=>"Invalid validation",
                        'error'=>[
                            'validation'=>$validator->errors()
                        ],
                    ],'Something went wrong',406);

                }

                if ($Otp = Otp::where('email',$request->email)->first()) {
                    if ($Otp->expired_date >= Carbon::now()) {

                        if ($Otp->code == $request->code) {
                            // $user=User::where('email',$request->email)->first();
                
                            if ($user=User::where('email',$request->email)->first()) {
                                $user->update([
                                    'email_verified_at' => Carbon::now(),
                                ]);
                    
                                $tokenResult=$user->createToken('authToken',['*'])->plainTextToken;
                    
                                // return ResponseFormatter::success([
                                //     'email_verified_status'=>TRUE,
                                //     'access_token'=>$tokenResult,
                                //     'token_type'=>"Bearer",
                                //     'user'=>[
                                //         'name' => $user->name,
                                //         'email' => $user->email,
                                //         'no_wa' => $user->no_wa,
                                //     ],
                                // ], 'Authenticated');

                                return ResponseFormatter::success([
                                    'access_token'=>$tokenResult,
                                    'token_type'=>"Bearer",
                                    'user'=>$user,
                                ],'OTP Success');
                            }else {
                                return ResponseFormatter::error([
                                    'message'=>'error'
                                ],'User Not Found',500);
                            }
                        }else {
                            return ResponseFormatter::error([
                                'message'=>'error'
                            ],'OTP Does Not Match',500);
                        }

                    }else {
                        return ResponseFormatter::error([
                            'message'=>'error'
                        ],'OTP Expired',500);
                    }
                }else {
                    return ResponseFormatter::error([
                        'message'=>'error'
                    ],'OTP Not Found',500);
                }
                
            } catch (Exception $error) {
                return ResponseFormatter::error([
                    'message'=>"Something went wrong",
                    'error'=>$error,
                ],"OTP Failed",500);
            }
        }else {
            return ResponseFormatter::error([
                'error'=>"Something went wrong",
            ],"Authentication Failed",500);
        }
    }

    public function changeEmail(Request $request)
    {
        if (in_array('*', $request->ability) || in_array('otp.changeEmail', $request->ability)) {
            try {
                $rules=[
                    'old_email'=>['required','email'],
                    'new_email'=>['required','email',Rule::unique('users','email')],
                ];

                $validator= Validator::make($request->all(),$rules);
                
                if ($validator->fails()) {
                    
                    return ResponseFormatter::error([
                        'message'=>"Invalid validation",
                        'error'=>[
                            'validation'=>$validator->errors()
                        ],
                    ],'Something went wrong',406);

                }

                if ($old = Otp::where('email',$request->old_email)->first()) {
                    $old->delete();

                    $otpCode = random_int(100000, 999999);

                    Otp::create([
                        'email'=>$request->new_email,
                        'code'=>$otpCode,
                        'expired_date'=>Carbon::now()->addMinute(5),
                    ]);

                    $user = User::where('email',$request->old_email)->first();
                    $user->update([
                        'email' => $request->new_email,
                    ]);

                    $maildata = [
                        'code'=>$otpCode,
                    ];
        
                    Mail::to($request->new_email)->send(new MailOtp($maildata));

                    return ResponseFormatter::success([
                        'message'=> 'Success',
                    ],'Email Success Changed');
                }else {
                    return ResponseFormatter::error([
                        'message'=>'error'
                    ],'OTP Not Found',500);
                }

            } catch (Exception $error) {
                return ResponseFormatter::error([
                    'message'=>"Something went wrong",
                    'error'=>$error,
                ],"OTP Failed",500);
            }
        }else {
            return ResponseFormatter::error([
                'error'=>"Something went wrong",
            ],"Authentication Failed",500);
        }
    }

    public function resend(Request $request)
    {   
        if (in_array('*', $request->ability) || in_array('otp.resend', $request->ability)) {
            try {
                $rules=[
                    'email'=>['required','email'],
                ];

                $validator= Validator::make($request->all(),$rules);
                
                if ($validator->fails()) {
                    
                    return ResponseFormatter::error([
                        'message'=>"Invalid validation",
                        'error'=>[
                            'validation'=>$validator->errors()
                        ],
                    ],'Something went wrong',406);

                }

                if ($old = Otp::where('email',$request->email)->first()) {
                    $old->delete();

                    $code = random_int(100000, 999999);

                    Otp::create([
                        'email'=>$request->email,
                        'code'=>$code,
                        'expired_date'=>Carbon::now()->addMinute(5),
                    ]);

                    $maildata = [
                        'code'=>$code,
                    ];
        
                    Mail::to($request->email)->send(new MailOtp($maildata));

                    return ResponseFormatter::success([
                        'message'=> 'Success',
                    ],'OTP Success Resend');
                    
                }else {
                    return ResponseFormatter::error([
                        'message'=>'error'
                    ],'OTP Not Found',500);
                }
            } catch (Exception $error) {
                return ResponseFormatter::error([
                    'message'=>"Something went wrong",
                    'error'=>$error,
                ],"Resend OTP Failed",500);
            }
        }else {
            return ResponseFormatter::error([
                'error'=>"Something went wrong",
            ],"Authentication Failed",500);
        }
    }
}
