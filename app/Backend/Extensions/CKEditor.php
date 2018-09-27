<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/27
 * Time: 上午10:16
 */

namespace App\Backend\Extensions;

use Encore\Admin\Form\Field;

class CKEditor extends Field
{
    public static $js = [
        '/vendor/ckeditor/ckeditor.js',
        '/vendor/ckeditor/adapters/jquery.js',
    ];

    protected $view = 'admin.ckeditor';

    public function render()
    {
        $this->script = "$('textarea.{$this->getElementClassString()}').ckeditor();";

        return parent::render();
    }
}