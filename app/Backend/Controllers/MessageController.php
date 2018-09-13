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
use Illuminate\Http\Request;

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
            $grid->model()->orderBy('deal')->orderBy('created_at');
            $grid->column('id', 'ID');
            $grid->column('created_at', '发布时间')->style('width: 150px');
            $grid->column('name', '提交人');
            $grid->column('mobile', '提交手机');
            $grid->column('view', '填写内容')->ViewAction()->style('width: 100px');
            $grid->column('deal', '操作')->DealAction()->style('width: 100px');
            $grid->disableRowSelector();
            $grid->disableActions();
            $grid->disableCreateButton();
            $grid->disableExport();
            $grid->disableFilter();
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('查看留言');
            $content->body($this->form()->edit($id));
        });
    }

    public function form()
    {
        return Admin::form(Message::class, function (Form $form) {
            $form->display('name', '名称');
            $form->display('company', '公司');
            $form->display('address', '地址');
            $form->display('mobile', '电话');
            $form->display('email', '邮箱');
            $form->display('job', '职位');
            $form->display('content', '留言内容');
            $form->display('interest', '感兴趣的产品');
            $form->display('area', '应用领域');
            $form->display('created_at', '留言时间');
            $form->disableReset();
            $form->disableSubmit();
        });
    }

    public function deal(Request $request)
    {
        $id = $request->input('id');

        $message = Message::findOrFail($id);
        $message->deal = 1;
        $message->save();

        return response()->json(['ok' => 1]);
    }
}