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

    public function store()
    {
        \Illuminate\Support\Facades\Request::offsetUnset('image_group');
        \Illuminate\Support\Facades\Request::offsetUnset('files');
        return $this->form()->store();
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

    public function form($id = 0)
    {
        $cateArr = $this->categories();
        $majorCateArr = $this->majorCategories();
        $postArr = $this->posts();

        $form = new Form(new Product);
        $form->select('major_category_id', '主分类')->options($majorCateArr)->rules('required');
        $form->select('category_id', '辅分类')->options($cateArr);
        $form->text('name', '产品名称')->rules('required|max:150');
        $form->textarea('description', '产品描述')->rules('required|max:1000');
        $form->text('seo_title', 'title')->rules('max:255');
        $form->text('seo_keywords', 'keywords')->rules('max:255');
        $form->text('seo_description', 'description')->rules('max:255');
        $form->image('image', '封面图')->uniqueName()->rules('required');
        $form->number('sort', '序号值');
        $form->listbox('posts', '关联文章')->options($postArr)->help('左侧为待选资讯列表；右侧为已关联资讯列表');
        $form->ckeditor('content', '产品详情')->rules('required');

        $form->multipleImage('image_group','产品组图')->removable()->options([
            'showRemove' => false,
            'showCancel' => false,
            'showClose' => false,
            'showUpload' => true,
            'showUploadedThumbs' => true,
            'browseOnZoneClick' => true,
            'autoOrientImage' => true,
            'deleteUrl' => url('admin/new_delete'),
            'uploadUrl' => url('admin/new_upload'),
            'deleteExtraData' => [
                '_token'    => csrf_token(),
                '_method'   => 'POST',
            ],
            'uploadExtraData' => [
                '_token'    => csrf_token(),
                '_method'   => 'POST',
            ],
        ]);
        $form->multipleFile('files','附件')->removable()->options([
            'showRemove' => false,
            'showCancel' => false,
            'showClose' => false,
            'showUpload' => true,
            'showUploadedThumbs' => true,
            'browseOnZoneClick' => true,
            'autoOrientImage' => true,
            'deleteUrl' => url('admin/new_delete'),
            'uploadUrl' => url('admin/new_upload'),
            'deleteExtraData' => [
                '_token'    => csrf_token(),
                '_method'   => 'POST',
            ],
            'uploadExtraData' => [
                '_token'    => csrf_token(),
                '_method'   => 'POST',
            ],
        ]);

        if ($id) {
            $product = Product::findOrFail($id);
            $images = $product->images_paths;
            $files = $product->files_paths;
            $form->hidden('images_paths')->default($images);
            $form->hidden('files_paths')->default($files);
        } else {
            $form->hidden('images_paths');
            $form->hidden('files_paths');
        }

        Admin::script(
            <<<EOT
$('input.files').on('filedeleted', function(event, key, jqXHR, data) {
    paths = $('input.files_paths').val();
    paths = paths.split(',')
    paths[key] = ""
    $('input.files_paths').val(paths.join(','));
});

$('input.files').on('fileremoved', function(event, id, index) {
    paths = $('input.files_paths').val();
    paths = paths.split(',')
    paths[index] = ""
    $('input.files_paths').val(paths.join(','));
});

$('input.files').on('fileuploaded', function (event, data, previewId, index) {
    var form = data.form, files = data.files, extra = data.extra,
        response = data.response, reader = data.reader;
        var paths = '';
        for (var i in response) {
            paths += response[i] + ','
        }
        paths = $('input.files_paths').val() + ',' + paths;
        $('input.files_paths').val(paths);
});


$('input.image_group').on('filedeleted', function(event, key, jqXHR, data) {
    paths = $('input.images_paths').val();
    paths = paths.split(',')
    paths[key] = ""
    $('input.images_paths').val(paths.join(','));
});

$('input.image_group').on('fileremoved', function(event, id, index) {
    paths = $('input.images_paths').val();
    paths = paths.split(',')
    paths[index] = ""
    $('input.images_paths').val(paths.join(','));
});

$('input.image_group').on('fileuploaded', function (event, data, previewId, index) {
    var form = data.form, files = data.files, extra = data.extra,
        response = data.response, reader = data.reader;
        var paths = '';
        for (var i in response) {
            paths += response[i] + ','
        }
        paths = $('input.images_paths').val() + ',' + paths;
        $('input.images_paths').val(paths);
});
EOT
        );
        return $form;
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
            $content->body($this->form($id)->edit($id));
        });
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $paths = [];
            foreach ($files as $file) {
                $paths[] = $file->store(config('admin.upload.directory.image'));
            }

            return response()->json($paths);
        }

        return response()->json(['消息' => '上传失败'])->setStatusCode(422);
    }

    public function uploadFile(Request $request)
    {
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $paths = [];
            foreach ($files as $file) {
                $paths[] = $file->storeAs(config('admin.upload.directory.file'), $file->getFilename());
            }

            return response()->json($paths);
        }

        return response()->json(['消息' => '上传失败'])->setStatusCode(422);
    }

    public function delete()
    {
        return response()->json();
    }
}