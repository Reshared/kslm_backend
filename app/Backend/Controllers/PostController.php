<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/9
 * Time: 下午8:37
 */

namespace App\Backend\Controllers;

use App\Backend\Extensions\Post\TypeFilter;
use App\Backend\Extensions\ViewButton;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('资讯管理');
            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(Post::class, function (Grid $grid) {
            $grid->model()->orderBy('is_stick', 'desc')->orderBy('sort', 'desc')->orderBy('created_at', 'desc');
            $grid->column('id', 'ID');
            $grid->column('created_at', '发布时间')->style('width: 150px');;
            $grid->column('title', '名称')->style('max-width: 250px');
            $grid->column('sort', '排序值');
            $grid->column('is_stick', '置顶')->StickAction();
            $grid->column('clicks', '真实点击');
            $grid->disableRowSelector();
            $grid->disableExport();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->disableIdFilter();
                $filter->like('id', 'ID');
                $filter->like('title', '标题');
                $filter->equal('type', '分类');
            });

            $grid->tools(function (Grid\Tools $tools) {
                $tools->append(new TypeFilter());
            });
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->prepend('<a target="_blank" href="/support/' . $actions->getKey() . '"><i class="fa fa-eye"></i></a>');
            });
        });
    }

    public function form()
    {
        return Admin::form(Post::class, function (Form $form) {
            $form->select('type', '所属分类')->options([
                '技术支持', '服务与帮助', '行业动态'
            ]);
            $form->text('title', '名称')->rules('required|max:150');
            $form->textarea('description', '描述')->rules('max:255');
            $form->text('seo_title', 'title')->rules('max:255');
            $form->text('seo_keywords', 'keywords')->rules('max:255');
            $form->text('seo_description', 'description')->rules('max:255');
            $form->image('image', '图片上传')->uniqueName();
            $form->number('sort', '排序值');
            $form->editor('content', '图文详情')->rules('required');
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('新资讯');
            $content->body($this->form());
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('编辑资讯');
            $content->body($this->form()->edit($id));
        });
    }

    public function stick(Request $request)
    {
        $id = $request->input('id');
        $type = $request->input('type');

        $post = Post::findOrFail($id);
        $post->is_stick = $type ? 1 : 0;
        $post->save();

        return response()->json(['ok' => 1]);
    }
}