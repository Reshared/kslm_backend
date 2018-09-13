<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/13
 * Time: 下午10:09
 */

namespace App\Backend\Extensions\Message;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class ViewAction extends AbstractDisplayer
{
    public function display()
    {
        return '<a href="' . url('backend/messages/' . $this->row->id . '/edit') . '">点击查看</a>';
    }
}