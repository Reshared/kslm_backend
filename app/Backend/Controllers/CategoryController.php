<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/9
 * Time: 下午8:37
 */

namespace App\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('产品辅分类管理');
            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(Category::class, function (Grid $grid) {
            $grid->model()->withDepth()->defaultOrder();
            $grid->column('id', 'ID');
            $grid->column('name', '名称')->display(function ($name) {
                $prefix = '|—';
                for ($i = 0; $i < $this->depth; $i++) {
                    $prefix .= '——';
                }
                return $prefix . $name;
            });
            $grid->column('sort', '调整顺序')->SortAction();
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
        //这里只能选择下一级没有产品分类
        $cateArr = $this->categories(true);
        return Admin::form(Category::class, function (Form $form) use ($cateArr) {
            $form->select('parent_id', '上级分类')->options($cateArr);
            $form->text('name', '分类名称')->rules('required|max:150');
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('新建辅分类');
            $content->body($this->form());
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('编辑辅分类');
            $content->body($this->form()->edit($id));
        });
    }

    public function sort(Request $request)
    {
        $id = $request->input('id');
        $type = $request->input('type');

        $category = Category::findOrFail($id);
        if ($type) {
            $category->up();
        } else {
            $category->down();
        }

        return response()->json(['ok' => 1]);
    }
}