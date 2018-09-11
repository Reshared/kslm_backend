<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/10
 * Time: 上午10:42
 */

namespace App\Backend\Extensions\Post;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class StickAction extends AbstractDisplayer
{
    public function display()
    {
        Admin::script($this->script());

        if ($this->row->is_stick) {
            return '<button data-id="'.$this->row->id.'" class="btn btn-xs btn-primary make_stick">已置顶</button>';
        }

        return '<button data-id="'.$this->row->id.'" class="btn btn-xs btn-default make_un_stick">未置顶</button>';
    }

    public function script()
    {
        return <<<EOT
$('.make_un_stick').click(function(){
    $.ajax({
        url: "/backend/posts/stick",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': LA.token
        },
        data: { 'id': $(this).attr('data-id'), 'type': 1 },
        success: function(data, code) {
            $('.grid-refresh').click();
        },
        error: function () {
            swal("操作失败", "请重试~","error")
        }
    });
})

$('.make_stick').click(function(){
    console.log($(this).attr('data-id'))
    $.ajax({
        url: "/backend/posts/stick",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': LA.token
        },
        data: { 'id': $(this).attr('data-id'), 'type': 0 },
        success: function(data, code) {
            $('.grid-refresh').click();
        },
        error: function () {
            swal("操作失败", "请重试~","error")
        }
    });
})
EOT;

    }
}