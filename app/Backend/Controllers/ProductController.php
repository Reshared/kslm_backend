<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/9
 * Time: 下午8:37
 */

namespace App\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class ProductController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('产品管理');
            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(Product::class, function (Grid $grid) {
            $grid->column('id', 'ID');
            $grid->column('name', '产品名称')->style('max-width: 250px');
            $grid->column('category_name', '所属分类')->display(function () {
                $name = $this->categories->pluck('name')->toArray();
                return implode(',', $name);
            });
            $grid->column('sort', '排序值');
            $grid->column('clicks', '真实点击');
            $grid->disableRowSelector();
            $grid->disableExport();
            $grid->disableFilter();
        });
    }

    public function form()
    {
        $cateArr = $this->categories();
        $postArr = $this->posts();
        return Admin::form(Product::class, function (Form $form) use($cateArr, $postArr) {
            $form->multipleSelect('categories', '分类')->options($cateArr)->help('选择产品所属分类，支持都选');
            $form->text('name', '产品名称')->rules('required|max:150');
            $form->textarea('description', '产品描述')->rules('max:255');
            $form->text('seo_title', 'title')->rules('max:255');
            $form->text('seo_keywords', 'keywords')->rules('max:255');
            $form->text('seo_description', 'description')->rules('max:255');
            $form->image('image', '封面图')->uniqueName()->rules('required');
            $form->multipleImage('image_group', '产品组图')->uniqueName()->help('请一次性选择，新的选择将会替换已选图片');
            $form->number('sort', '序号值');
            $form->listbox('posts', '关联文章')->options($postArr)->help('左侧为待选资讯列表；右侧为已关联资讯列表');
            $form->editor('content', '产品详情')->rules('required');
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('新产品');
            $content->body($this->form());
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('编辑产品');
            $content->body($this->form()->edit($id));
        });
    }
}