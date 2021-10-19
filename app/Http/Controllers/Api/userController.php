<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception;
use Carbon\Carbon;


class userController extends Controller
{
    //user register 
    public function userRegister(Request $request){
        $username = $request->username;
        $email = $request->email;
        $password = md5($request->password);

        $emailExist =DB::table('users')->where('email', $email)->count();
        $userExist =DB::table('users')->where('username', $username)->count();
         
        if(!isset($username)){
			$result=array('status'=>201,'message'=> 'Username is required.');
		}else if(!isset($email)){
			$result=array('status'=>201,'message'=> 'Email is required.');
		}else if(!isset($password)){
			$result=array('status'=>201,'message'=> 'Password is required.');
		}else if($emailExist > 0){
			$result=array('status'=>201,'message'=> 'Email is already exist.');
		}else if($userExist > 0){
			$result=array('status'=>201,'message'=> 'Username is already exist.');
		}else{
			$date = date("Y-m-d h:i:s", time());
            $data = ['username'=>$username,'email'=>$email,'password'=>$password,'status'=>1,'created_at'=>$date, 'updated_at'=>$date];
            $addUsers =DB::table('users')->insert($data);
            if($addUsers){
                $result=array('status'=>200,'message'=> 'User added successfully.');
            }else{
                $result=array('status'=>201,'message'=> 'Something went wrong. Please try again.');
            }
				
        }
       echo json_encode($result);
    }

    //email verification otp
    
    public function emailSentOtp(Request $request) {
        $email = $request->email;
        $otp =  mt_rand(1000,9999);
        $date = date("Y-m-d h:i:s", time());
        $check_email = DB::table('email_otp')->where('email',$email)->count();

        $mail = new PHPMailer();
        $mail->SMTPDebug  = 0;  
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;    
        $mail->IsHTML(true);
        $mail->Username = "sakil.appic@gmail.com";
        $mail->Password ='APPICSOFTWARES';
        $mail->SetFrom("sakil.appic@gmail.com");
        $mail->Subject = "Email verification";
        $mail->Body="Email verification OTP ". $otp;
        $mail->AddAddress($email);

        if($check_email > 0){
            $up_otp = ['otp'=>$otp, 'create_at'=>$date, 'update_at'=>$date];
            $upt_success = DB::table('email_otp')->where('email', $email)->update($up_otp);
            if($upt_success){
                if($mail->Send()){
                    $result = array('status'=> 200, 'message'=>'Otp sent your email successfully');
                }
            }
            else{
                $result = array('status'=> 201, 'message'=>'Otp not sent');
            }
        }
        else{
            $gan_otp = ['email'=> $email, 'otp'=>$otp, 'create_at'=>$date, 'update_at'=>$date];
            $otp_success = DB::table('email_otp')->insert($gan_otp);
            
            if($otp_success){
                if($mail->Send()){
                    $result = array('status'=> 200, 'message'=>'Otp sent your email successfully');
                }
                else{
                    $result = array('status'=> 201, 'message'=>'Otp not sent');
                }
            }
            else{
                $result = array('status'=> 201, 'message'=>'Something is Wrong.');
            }
        }
            echo json_encode($result);
    }
     
    public function emailVerification(Request $request){
        $email = $request->email;
        $otp = $request->otp;
        
        $verify_otp = DB::table('email_otp')->where('email', $email)->where('otp', $otp)->first();
        $otp_expires_time = Carbon::now()->subMinutes(5);
      
        if($verify_otp->create_at < $otp_expires_time){
            $result = array('status'=> false, 'message'=>'OTP is unvalid.');
        }
        else{
            $result = array('status'=> true, 'message'=>'otp valid successfully.');
        }      
        echo json_encode($result);
    }


    public function forgotPassword(Request $request) {
        $email = $request->email;
        $otp =  mt_rand(1000,9999);
        $date = date("Y-m-d h:i:s", time());
        $check_email = DB::table('password_otp')->where('email',$email)->count();

        $mail = new PHPMailer();
        $mail->SMTPDebug  = 0;  
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;    
        $mail->IsHTML(true);
        $mail->Username = "sakil.appic@gmail.com";
        $mail->Password ='APPICSOFTWARES';
        $mail->SetFrom("sakil.appic@gmail.com");
        $mail->Subject = "Forgot password";
        $mail->Body="Forgot password OTP ". $otp;
        $mail->AddAddress($email);

        if($check_email > 0){
            $up_otp = ['otp'=>$otp, 'create_at'=>$date, 'update_at'=>$date];
            $upt_success = DB::table('password_otp')->where('email', $email)->update($up_otp);
            if($upt_success){
                if($mail->Send()){
                    $result = array('status'=> 200, 'message'=>'Otp sent successfully');
                }
            }
            else{
                $result = array('status'=> 201, 'message'=>'Otp not sent');
            }
        }
        else{
            $gan_otp = ['email'=> $email, 'otp'=>$otp, 'create_at'=>$date, 'update_at'=>$date];
            $otp_success = DB::table('password_otp')->insert($gan_otp);
            
            if($otp_success){
                if($mail->Send()){
                    $result = array('status'=> 200, 'message'=>'Otp sent successfully');
                }
                else{
                    $result = array('status'=> 201, 'message'=>'Otp not sent');
                }
            }
            else{
                $result = array('status'=> 201, 'message'=>'Something is Wrong.');
            }
        }
            echo json_encode($result);
    }

    public function passwordVerification(Request $request){
        $email = $request->email;
        $otp = $request->otp;
        
        $verify_otp = DB::table('password_otp')->where('email', $email)->where('otp', $otp)->first();
        $otp_expires_time = Carbon::now()->subMinutes(5);
      
        if($verify_otp->create_at < $otp_expires_time){
            $result = array('status'=> false, 'message'=>'OTP is unvalid.');
        }
        else{
            $result = array('status'=> true, 'message'=>'otp valid successfully.');
        }   
        echo json_encode($result);
    }

    public function passwordUpdate(Request $request){
        $email = $request->email;
        $newPassword = md5($request->newPassword);
        $confirmPassword = md5($request->confirmPassword);
        
        if(!isset($email)){
            $result = array('status'=> false, 'message'=>'Email is required');
        }
        elseif(!isset($newPassword)){
            $result = array('status'=> false, 'message'=>'New password is required');
        }
        elseif(!isset($confirmPassword)){
            $result = array('status'=> false, 'message'=>'Confirm password is required');
        }
        elseif($newPassword != $confirmPassword){
            $result = array('status'=> false, 'message'=>'password not match');
        }
        else{
           $date = date("Y-m-d h:i:s", time());
           $data =['password'=>$newPassword,'updated_at'=>$date]; 
           $pass_upde = DB::table('users')->where('email',$email)->update($data);
           if($pass_upde){
            $result = array('status'=> true, 'message'=>'password changed successfully.');
           }
           else{
            $result = array('status'=> false, 'message'=>'password not changed.');
           }
        }

        echo json_encode($result);
    }
    



}

              
     
            