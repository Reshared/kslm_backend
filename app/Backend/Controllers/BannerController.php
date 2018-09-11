<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/9
 * Time: 下午7:57
 */

namespace App\Backend\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Banner;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class BannerController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('Banner管理');
            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(Banner::class, function (Grid $grid) {
            $grid->column('id', 'ID');
            $grid->column('created_at', '发布时间')->style('width: 150px');
            $grid->column('title', '名称')->style('max-width: 250px');
            $grid->column('sort', '排序值');
            $grid->disableRowSelector();
            $grid->disableExport();
            $grid->disableFilter();
        });
    }

    public function form()
    {
        return Admin::form(Banner::class, function (Form $form) {
            $form->text('title', '标题')->rules('required|max:150');
            $form->image('image', '图片上传')->uniqueName()->rules('required');
            $form->number('sort', '排序值');
            $form->text('url', '跳转链接')->help('【跳转链接】留空则表示不跳转');
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('新Banner');
            $content->body($this->form());
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('编辑Banner');
            $content->body($this->form()->edit($id));
        });
    }
}