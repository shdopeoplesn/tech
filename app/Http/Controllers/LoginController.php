<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use Session;
use Cookie;
use App\User_list;

class LoginController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    protected function showloginpage() {
        return view('login', ['this_script' => 'login']);
    }

    protected function login(Request $data) {
        Session::flush();
        $data = Request::all();
        $input_account = $data['account'];

        $users = User_list::where('account', '=', $input_account)->get();
        //如果沒抓到$user會是空陣列
        if (count($users) == 0) {
            return redirect('/login_from_this_page');
        }
        
        foreach ($users as $user) {
            if ($user->name == '' || !isset($user->name)) {
                return redirect('/login_form_this_page');
            } else {
                Session::put('account', $user->account);
                Session::put('name', $user->name);
                Session::put('chk_sum','tachibana_kanade');//檢查碼，用來判斷是否透過正常管道登入
            }
        }
        
        return redirect('/application');
    }
    
    protected function logout() {
        Session::forget('account');
        Session::forget('chksum');
        Session::forget('admin_flag');
        Session::flush();
        return redirect('/login_from_this_page');
    }

}
