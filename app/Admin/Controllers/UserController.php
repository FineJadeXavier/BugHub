<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserController extends Controller
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

            $content->header('用户管理');
            $content->description('在这你可以管理网站用户');
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

            $content->header('用户修改');
            $content->description('在这你可以修改网站用户');
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
            $content->header('用户新增');
            $content->description('在这你可以新增网站用户');
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
        return Admin::grid(User::class, function (Grid $grid) {
            $grid->column('avatar','用户头像')->display(function ($avatar) {
                return "<img src='$avatar' style='width:70px;'>";
            });
            $grid->id('ID')->sortable();
            $grid->column('nickname', '用户昵称');
            $grid->column('email', '邮箱地址');
            $grid->created_at('创建时间');
            $grid->paginate(15);
            $grid->filter(function ($filter) {
                // 设置created_at字段的范围查询
                $filter->between('created_at', 'Created Time')->datetime();
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
        return Admin::form(User::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->url("avatar",'用户头像');
            $form->text('nickname', '用户昵称');
            $form->email('email', '邮箱地址');
            $form->password('password', '用户密码');
        });
    }
}
