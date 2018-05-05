<?php

namespace App\Admin\Controllers;

use App\User_list;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class User_listController extends Controller
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

            $content->header('前端使用者管理');
            $content->description('可以新增、編輯、刪除');

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

            $content->header('使用者編輯');
            $content->description('編輯使用者的資料');

            $content->body($this->form()->edit($id));
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

            $content->header('新增使用者');
            $content->description('可以利用這個頁面新增使用者');

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
        return Admin::grid(User_list::class, function (Grid $grid) {

            $grid->id('ID')->latest();
            $grid->account('帳號(學號/管理員編號)');
            $grid->name('姓名');
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(User_list::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('account', '帳號(學號/管理員編號)');
            $form->text('name', '姓名');
        });
    }
    
}
