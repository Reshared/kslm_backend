<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/9
 * Time: 下午7:57
 */

namespace App\Backend\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Message;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class MessageController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('留言管理');
            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(Message::class, function (Grid $grid) {
            $grid->column('id', 'ID');
            $grid->column('name', '姓名')->style('width: 150px');
            $grid->column('company', '公司')->style('width: 150px');
            $grid->column('address', '地址')->style('width: 150px');
            $grid->column('mobile', '电话')->style('width: 150px');
            $grid->column('email', '邮箱')->style('width: 150px');
            $grid->column('job', '职位')->style('width: 150px');
            $grid->column('content', '留言内容');
            $grid->column('interest', '感兴趣的产品')->style('width: 200px');
            $grid->column('area', '应用领域')->style('width: 200px');
            $grid->column('created_at', '留言时间')->style('width: 150px');
            $grid->disableRowSelector();
            $grid->disableActions();
            $grid->disableCreateButton();
            $grid->disableExport();
            $grid->disableFilter();
        });
    }
}