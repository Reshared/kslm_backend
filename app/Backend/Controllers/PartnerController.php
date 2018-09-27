<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/9
 * Time: 下午8:37
 */

namespace App\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class PartnerController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('合作企业管理');
            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(Partner::class, function (Grid $grid) {
            $grid->model()->orderBy('sort', 'desc')->orderBy('created_at', 'desc');
            $grid->column('id', 'ID');
            $grid->column('name', '企业名称');
            $grid->column('sort', '排序值');
            $grid->column('clicks', '点击');
            $grid->disableRowSelector();
            $grid->disableExport();
            $grid->disableFilter();
        });
    }

    public function form()
    {
        return Admin::form(Partner::class, function (Form $form) {
            $form->text('name', '名称')->rules('required|max:150');
            $form->number('sort', '排序值');
            $form->image('image', '封面图')->uniqueName()->rules('required');
            $form->radio('is_recommend', '推荐位')->options(['不推荐', '推荐'])->default(0);
            $form->ckeditor('content', '图文详情');
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('新合作企业');
            $content->body($this->form());
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('编辑合作企业');
            $content->body($this->form()->edit($id));
        });
    }
}