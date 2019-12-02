<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PasswordsController extends Controller
{
    public function __contruct(){
        $this->middleware('guest');
    }

    public function getRemind(){
        return view('remind');
    }

    public function postRemind(Request $request){
        $this->validate($request, ['user_id'=> 'required|max:255]|exists:users'],);
        //dd($request->user_id);

        $user_id = $request->user_id;
        $token = Str::random(64);  // 버전 업 되면서 문법이 바뀜 str_random() => Str::random()

        \DB::table('password_resets')->insert([
            'user_id' => $user_id,
            'token' => $token,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        
        return redirect('/reset'.'/'.$token);
    }

    //변경 파트
    public function getReset($token = null){
        return view('reset', compact('token'));
    }

    public function postReset(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|max:255',
            'password' => 'required|string|confirmed|min:6',
        ]);
        
        $validator->validate();
        
        // $this->validate($request, [
        //     'user_id' => 'required|user_id|exists:users',
        //     'password' => 'reuqired|confirmed',
        //     'token' => 'required|confirmed',
        //     ]);

        // $validator = $request->validate([
        //     'user_id' => 'required|user_id|exists:users',
        //     'password' => 'reuqired|confirmed|min:6',
        //     'token' => 'required|confirmed'
        // ]);
        
        $token = $request->token;
        
        if(! \DB::table('password_resets')->whereToken($token)-> first()){
            flash('url이 정확하지 않습니다');

            return back()->withInput();
        }

        \App\User::whereUser_id($request->input('user_id'))->first()->update([
            'password' => Hash::make($request->input('password'))
        ]);

        \DB::table('password_resets')->whereToken($token)->delete();

        flash('비밀번호 바꿈');

        return view('signin');
    }
}
