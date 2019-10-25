<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->column('name', '用户名');
        $grid->column('phone', '手机号');
        $grid->column('nickname', '昵称');
        $grid->column('avatar', '头像')->image();
        $grid->column('token', '登录token');
        $grid->column('sex', '性别')->display(function ($sex){
            return User::sexMaps()[$sex] ?? '未知';
        });
        $grid->column('age', '年龄');
        $grid->column('identifier', '身份标识符');
        $grid->column('integral', '积分数');
        $grid->column('created_at', '创建时间');
        $grid->column('updated_at', '更新时间');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('name', '名称');
        $show->field('phone', '电话号码');
        $show->field('nickname', '昵称');
        $show->field('avatar', '头像')->image();
        $show->field('token', __('Token'));
        $show->field('sex', '性别')->as(function ($sex){
            return User::sexMaps()[$sex] ?? '未知';
        });
        $show->field('age', '年龄');
        $show->field('identifier', '身份标识符');
        $show->field('integral', '积分数');
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);

        $form->text('name', '名称');
        $form->mobile('phone', '电话号码');
        $form->text('nickname', '昵称');
        $form->image('avatar', '头像');
        $form->textarea('token', '登录token');
        $form->radio('sex', '性别')->options(User::sexMaps());
        $form->number('age', '年龄')->default(18);
        $form->text('identifier', '身份标识符')->default('18');

        return $form;
    }
}