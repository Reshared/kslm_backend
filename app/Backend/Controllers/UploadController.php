<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/14
 * Time: 下午10:41
 */

namespace App\Backend\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadImg(Request $request)
    {
        $file = $request->file("mypic");
        // dd($file);
        if (!empty($file)) {
            foreach ($file as $key => $value) {
                $len = $key;
            }
            if ($len > 25) {
                return response()->json(['ResultData' => 6, 'info' => '最多可以上传25张图片']);
            }
            $m = 0;
            $k = 0;
            for ($i = 0; $i <= $len; $i++) {
                // $n 表示第几张图片
                $n = $i + 1;
                if ($file[$i]->isValid()) {
                    if (in_array(strtolower($file[$i]->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
                        if ($newFileName = $file[$i]->store("uploads/images/")) {
                            $m = $m + 1;
                        } else {
                            $k = $k + 1;
                        }
                        $msg = $m . "张图片上传成功 " . $k . "张图片上传失败<br>";
                        $return[] = ['ResultData' => 0, 'info' => $msg, 'newFileName' => $newFileName];
                    } else {
                        return response()->json(['ResultData' => 3, 'info' => '第' . $n . '张图片后缀名不合法!<br/>' . '只支持jpeg/jpg/png/gif格式']);
                    }
                } else {
                    return response()->json(['ResultData' => 1, 'info' => '第' . $n . '张图片超过最大限制!<br/>' . '图片最大支持2M']);
                }
            }

        } else {
            return response()->json(['ResultData' => 5, 'info' => '请选择文件']);
        }
        return $return;
    }

    public function uploadCk(Request $request)
    {
        $file = $request->file("upload");
        if (!$file->isValid()) {
            return response()->json([
                'uploaded' => 0,
                'error' => [
                    'message' => '图片不合法'
                ]
            ]);
        }

        if (!in_array(strtolower($file->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
            return response()->json([
                'uploaded' => 0,
                'error' => [
                    'message' => '不支持的图片格式'
                ]
            ]);
        }

        $picname = $file->getClientOriginalName();

        if ($newFileName = $file->store("uploads/images/")) {
            return response()->json([
                'uploaded' => 1,
                'fileName' => $picname,
                'url' => url($newFileName),
            ]);
        }

        return response()->json([
            'uploaded' => 0,
            'error' => [
                'message' => '上传失败，请重试'
            ]
        ]);
    }

    public function uploadMul(Request $request, $id)
    {
        $files = $request->file("image_group");
        if (empty($files)) {
            return response()->json(['reason' => '请上传文件'])->setStatusCode(413);
        }

        $uploads = [];
        foreach ($files as $file) {
            if (!$file->isValid()) {
                return response()->json(['reason' => '文件不合法'])->setStatusCode(413);
            }

            $uploads[] = $file->store('uploads/images/');
        }

        $product = Product::findOrFail($id);
        $product->image_group =  implode(',', array_merge($product->image_group, $uploads));
        $product->save();

        return response()->json(['success' => true]);
    }

    public function unUploadMul(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $images = $product->image_group;
        unset($images[$request->get('key')]);
        $product->image_group = implode(',', $images);
        $product->save();
        return response()->json(['success' => true]);
    }

    public function uploadFiles(Request $request, $id)
    {
        $files = $request->file("files");
        if (empty($files)) {
            return response()->json(['reason' => '请上传文件'])->setStatusCode(413);
        }

        $uploads = [];
        foreach ($files as $file) {
            if (!$file->isValid()) {
                return response()->json(['reason' => '文件不合法'])->setStatusCode(413);
            }
            $uploads[] = $file->store('uploads/files/');
        }

        $product = Product::findOrFail($id);
        $product->files =  implode(',', array_merge($product->files, $uploads));
        $product->save();

        return response()->json(['success' => true]);
    }

    public function unUploadFiles(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $images = $product->files;
        unset($images[$request->get('key')]);
        $product->files = implode(',', $images);
        $product->save();
        return response()->json(['success' => true]);
    }
}