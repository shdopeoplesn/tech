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

class ReceiveController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected function receive_check() {
        $applications = DB::table('event_list')->where('process_flag',1)
                                              ->where('student_gived',0)->paginate(12);
        return view('receive_check',['applications' => $applications,'this_script'=>'receive_check']);
    }
    protected function receive_doublecheck($data) {
        $applications = DB::table('event_list')->where('id',$data)->get();
        //DB::select('select * from users where id = '.$data);
        return view('receive_doublecheck',['applications' => $applications,'this_script'=>'receive_doublecheck']);
    }
    protected function submit(Request $data) {
        $data = Request::all();
        $giveman =  $data['giveman'];
        $id = $data['id'];
        DB::table('event_list') ->where('id', $id)->update([
            'giveman' => $giveman,
            'student_gived' => 1
            ]);
        return redirect('/receive_check');//返回住宿生領取確認清單
    }
     
}
