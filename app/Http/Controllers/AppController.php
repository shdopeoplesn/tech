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

class AppController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function submit(Request $data) {
        $data = Request::all();
        //print_r($data);
        /*
	card_1 = 補發學生證登錄
	card_2 = 房卡遺失/毀損
	card_3 = 冷氣卡遺失/毀損
	card_4 = 餘額加值失敗
	net_1 = 網路線遺失
	net_2 = 網路線毀損
	net_3 = 網路狀態異常
        */
        $applicant = $data['applicant'];
        $room = $data['room'];
        if(isset($data['optionsRadios'])){
            $optionsRadios = $data['optionsRadios'];
        }
        $content= $data['content'];
        $student_gived = 0;//預設是住宿生未領取
        //有值有問題(為空)
        if($applicant == '' || $room == '' || (!isset($optionsRadios) && $content =='')){
            Session::flash('response', 'false'); 
            return redirect('/application');//返回申請頁
        }
        if(!isset($optionsRadios)){
            $final_content = $content;
        }else{
            switch($optionsRadios){
                case 'card_1': $final_content = '補發學生證登錄';
                    break;
                case 'card_2': $final_content = '房卡遺失/毀損';
                    break;
                case 'card_3': $final_content = '冷氣卡遺失/毀損';
                    break;
                case 'card_4': $final_content = '餘額加值失敗';$student_gived = 1;//住宿生不必領取
                    break;
                case 'net_1': $final_content = '網路線遺失';
                    break;
                case 'net_2': $final_content = '網路線毀損';
                    break;
                case 'net_3': $final_content = '網路狀態異常';$student_gived = 1;//住宿生不必領取
                    break;
                default:        
            }
        }
        
        //設定時區為台北
        date_default_timezone_set('Asia/Taipei');
        $post_time = date("Y-m-d H:i:s");
        DB::table('event_list')->insert([
            ['applicant' => $applicant , 'room' => $room, 'post_time' => $post_time, 'content' => $final_content, 'student_gived' => $student_gived]
        ]);
        Session::flash('response', 'true'); 
        return redirect('/application');//返回申請頁
    }
    
    protected function applicate() {
        $applications = DB::table('event_list')->where('process_flag',0)->paginate(12);
        return view('application',['applications' => $applications,'this_script' => 'application']);
    }
}
