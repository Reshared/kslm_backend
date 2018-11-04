<?php
/**
 * Created by PhpStorm.
 * User: resharedhou
 * Date: 2018/11/4
 * Time: 11:23 AM
 */

namespace App\Backend\Controllers;

use App\Models\Setting;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('网站设置');
            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(Setting::class, function (Grid $grid) {
            $grid->column('sdesc', '设置项');
            $grid->disableRowSelector();
            $grid->disableExport();
            $grid->disableFilter();
            $grid->disableCreateButton();
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->disableDelete();
            });
        });
    }

    public function form($id)
    {
        $setting = Setting::findOrFail($id);
        if ($setting->stype == 'string') {
            return Admin::form(Setting::class, function (Form $form) use ($setting) {
                $form->text('svalue', $setting->sdesc)->rules('required|max:30');
            });
        } elseif ($setting->stype == 'image') {
            return Admin::form(Setting::class, function (Form $form) use ($setting) {
                $form->image('svalue', $setting->sdesc)->rules('required')->help('只能上传一张');
            });
        } elseif ($setting->stype == 'images') {
            Admin::script(
                <<<EOT
$('input.svalue').on('filedeleted', function(event, key, jqXHR, data) {
    paths = $('input.images_paths').val();
    paths = paths.split(',')
    paths[key] = ""
    $('input.images_paths').val(paths.join(','));
});

$('input.svalue').on('fileremoved', function(event, id, index) {
    paths = $('input.images_paths').val();
    paths = paths.split(',')
    paths[index] = ""
    $('input.images_paths').val(paths.join(','));
});

$('input.svalue').on('fileuploaded', function (event, data, previewId, index) {
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
            return Admin::form(Setting::class, function (Form $form) use ($setting) {
                $form->hidden('images_paths')->default($setting->images_paths);
                $form->multipleImage('svalue', $setting->sdesc)->removable()->options([
                    'showRemove' => false,
                    'showCancel' => false,
                    'showClose' => false,
                    'showUpload' => true,
                    'showUploadedThumbs' => true,
                    'browseOnZoneClick' => true,
                    'autoOrientImage' => true,
                    'deleteUrl' => url('backend/deletes/setting'),
                    'uploadUrl' => url('backend/uploads/setting'),
                    'deleteExtraData' => [
                        '_token' => csrf_token(),
                        '_method' => 'POST',
                    ],
                    'uploadExtraData' => [
                        '_token' => csrf_token(),
                        '_method' => 'POST',
                    ],
                ])->rules('required')->help('可上传多张，请点击上传后保存。推荐尺寸：135*135');
            });
        } elseif ($setting->stype == 'text') {
            return Admin::form(Setting::class, function (Form $form) use ($setting) {
                $form->ckeditor('svalue', $setting->sdesc)->rules('required');
            });
        } else {
            return Admin::form(Setting::class, function (Form $form) use ($setting) {
                $values = json_decode($setting->svalue);
                foreach ($values as $key => $value) {
                    if ($key == '简介') {
                        $form->textarea($key, $key)->default($value)->rules('required');
                    } else {
                        $form->text($key, $key)->default($value)->rules('required');
                    }
                }
            });
        }
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('修改网站配置');
            $content->body($this->form($id)->edit($id));
        });
    }

    public function update($id)
    {
        $setting = Setting::findOrFail($id);
        if ($setting->stype == 'string' || $setting->stype == 'text') {
            $setting->svalue = Input::get('svalue');
        } elseif ($setting->stype == 'strings') {
            $setting->svalue = json_encode(Input::only(['公司名称', '简介', '统一服务热线', '北京代表处', '邮箱', '地址', '经度', '纬度']));
        } elseif ($setting->stype == 'image') {
            $path = Input::file('svalue')->store(config('admin.upload.directory.image'));
            $setting->svalue = $path;
        } elseif ($setting->stype == 'images') {
            $setting->svalue = trim(Input::get('images_paths'), ',');
        }
        $setting->save();

        return redirect('/backend/settings');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('svalue')) {
            $files = $request->file('svalue');
            $paths = [];
            foreach ($files as $file) {
                $paths[] = $file->store(config('admin.upload.directory.image'));
            }

            return response()->json($paths);
        } else {
            return response()->json(['消息' => '上传失败'])->setStatusCode(422);
        }
    }

    public function delete()
    {
        return response()->json();
    }
}