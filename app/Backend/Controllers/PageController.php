<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/9
 * Time: 下午8:37
 */

namespace App\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class PageController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('单页管理');
            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(Page::class, function (Grid $grid) {
            $grid->column('id', 'ID');
            $grid->column('title', '名称');
            $grid->column('url', '链接地址')->display(function () {
                return url('pages/'. $this->id);
            });
            $grid->disableRowSelector();
            $grid->disableExport();
            $grid->disableFilter();
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->prepend('<a target="_blank" href="/pages/' . $actions->getKey() . '"><i class="fa fa-eye"></i></a>');
            });
        });
    }

    public function form()
    {
        return Admin::form(Page::class, function (Form $form) {
            $form->text('title', '标题')->rules('required|max:150');
            $form->text('seo_title', 'title')->rules('max:255');
            $form->text('seo_keywords', 'keywords')->rules('max:255');
            $form->text('seo_description', 'description')->rules('max:255');
            $form->textarea('description', '描述');
            $form->editor('content', '图文详情')->rules('required');
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('新单页');
            $content->body($this->form());
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('编辑单页');
            $content->body($this->form()->edit($id));
        });
    }
}