<?php

namespace App\Admin\Controllers;

use App\Event_list;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class Event_listController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('事件管理');
            $content->description('點選右方扳手圖案可以完成處理事件');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('處理事件編輯');
            $content->description('送出表單以編輯此事件');

            $content->body($this->form()->edit($id));
        });
    }
    public function process($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('處理事件確認');
            $content->description('送出表單以完成此事件');

            $content->body($this->form_process()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('新增事件');
            $content->description('可以利用這個頁面新增事件');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Event_list::class, function (Grid $grid) {

            $grid->id('ID')->latest();
            $grid->applicant('申請人');
            $grid->post_time('申請時間');
            $grid->room('房號');
            $grid->content('內容');
            $grid->process_flag('處理旗標');
            $grid->processer('處理人');
            $grid->student_gived('發放旗標');
            $grid->giveman('發放人');
            $grid->process_time('處理時間');
            $grid->filter(function($filter){
                // 去掉默认的id过滤器
                $filter->disableIdFilter();
                // 在这里添加字段过滤器
                $filter->like('applicant', '申請人');
                $filter->date('post_time', '申請時間');
                $filter->like('room', '房號');
                $filter->like('content', '內容');
                $filter->equal('process_flag', '處理旗標');
                $filter->like('processer', '處理人');
                $filter->like('student_gived', '發放旗標');
                $filter->like('giveman', '發放人');
                $filter->date('process_time', '處理時間');
            });
            $grid->actions(function ($actions) {
                 // prepend一个操作
                $actions->prepend('<a href="event_list/'.$actions->getKey().'/process"><i class="fa fa-wrench"></i></a>');
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        //設定時區為台北
        date_default_timezone_set('Asia/Taipei');
        return Admin::form(Event_list::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('applicant', '申請人');
            $form->text('room', '房間');
            $form->textarea('content', '內容');
            $form->text('process_flag', '處理旗標');
            $form->text('processer', '處理人');
            $form->datetime('process_time','處理時間')->format('YYYY-MM-DD HH:mm:ss');
            $form->text('student_gived', '發放旗標');
            $form->text('giveman', '發放人');
            
        });
    }
    
    protected function form_process()
    {
        //設定時區為台北
        date_default_timezone_set('Asia/Taipei');
        return Admin::form(Event_list::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('applicant', '申請人');
            $form->text('room', '房間');
            $form->textarea('content', '內容');
            $form->text('process_flag', '處理旗標')->default('1')->value('1');
            $form->text('processer', '處理人')->default(Admin::user()->name);
            $form->datetime('process_time','處理時間')->format('YYYY-MM-DD HH:mm:ss')->default(date("Y-m-d H:i:s"));
            $form->text('student_gived', '發放旗標');
            $form->text('giveman', '發放人');
            
        });
    }
}
