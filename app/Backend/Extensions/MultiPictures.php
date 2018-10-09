<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/27
 * Time: 下午6:31
 */

namespace App\Backend\Extensions;

use Encore\Admin\Form\Field;

class MultiPictures extends Field
{
    public static $js = [
        '/js/imgFileupload.js',
    ];

    protected $view = 'admin.ckeditor';

    public function render()
    {
        $this->script = "var imgFile = new ImgUploadeFiles('.{$this->getElementClassString()}',function(e){
			this.init({
				MAX : 3, //限制个数
				MH : 5800, //像素限制高度
				MW : 5900, //像素限制宽度
				callback : function(arr){
					console.log(arr)
				}
			});
		});";

        return parent::render();
    }
}