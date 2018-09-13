<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/13
 * Time: 下午9:05
 */

namespace App\Backend\Controllers;

use App\Models\MajorCategory;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;

class MajorCategoryController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('产品主分类管理');
            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(MajorCategory::class, function (Grid $grid) {
            $grid->model()->orderBy('sort', 'desc')->orderBy('created_at', 'desc');
            $grid->column('id', 'ID');
            $grid->column('name', '名称');
            $grid->column('sort', '排序值');
            $grid->disableRowSelector();
            $grid->disableExport();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->disableIdFilter();
                $filter->like('name', '名称');
            });
        });
    }

    public function form()
    {
        return Admin::form(MajorCategory::class, function (Form $form) {
            $form->text('name', '分类名称')->rules('required|max:15');
            $form->number('sort', '排序值');
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('新建主分类');
            $content->body($this->form());
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('编辑主分类');
            $content->body($this->form()->edit($id));
        });
    }
}