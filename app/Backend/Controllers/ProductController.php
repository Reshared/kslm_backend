<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/9
 * Time: 下午8:37
 */

namespace App\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MajorCategory;
use App\Models\Product;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\Input;

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
            $grid->column('majorCategory.name', '主分类');
            $grid->column('category.name', '辅分类');
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
        $majorCateArr = $this->majorCategories();
        $postArr = $this->posts();
        return Admin::form(Product::class, function (Form $form) use ($cateArr, $postArr, $majorCateArr) {
            $form->select('major_category_id', '主分类')->options($majorCateArr)->rules('required');
            $form->select('category_id', '辅分类')->options($cateArr);
            $form->text('name', '产品名称')->rules('required|max:150');
            $form->textarea('description', '产品描述')->rules('required|max:1000');
            $form->text('seo_title', 'title')->rules('max:255');
            $form->text('seo_keywords', 'keywords')->rules('max:255');
            $form->text('seo_description', 'description')->rules('max:255');
            $form->image('image', '封面图')->uniqueName()->rules('required');
            $form->multipleImage('image_group','产品组图')->uniqueName()->removable();
//            $form->multipleImage('image_group', '产品组图')->options([
//                'uploadUrl' => Input::url() . '/upload',
//                'deleteUrl' => Input::url() . '/un_upload',
//                'uploadExtraData' => [
//                    '_token' => csrf_token()
//                ],
//                'deleteExtraData' => [
//                    '_token' => csrf_token()
//                ],
//                'uploadAsync' => true,
//                'showUpload' => true,
//            ])->uniqueName()->removable();
            $form->number('sort', '序号值');
            $form->listbox('posts', '关联文章')->options($postArr)->help('左侧为待选资讯列表；右侧为已关联资讯列表');
            $form->ckeditor('content', '产品详情')->rules('required');
            $form->multipleImage('files','附件')->removable();
//            $form->multipleFile('files', '附件上传')->options([
//                'uploadUrl' => Input::url() . '/upload_file',
//                'deleteUrl' => Input::url() . '/un_upload_file',
//                'uploadExtraData' => [
//                    '_token' => csrf_token()
//                ],
//                'deleteExtraData' => [
//                    '_token' => csrf_token()
//                ],
//                'uploadAsync' => true,
//                'showUpload' => true,
//                'maxFileCount' => 20
//            ])->removable();
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