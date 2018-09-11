<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/10
 * Time: 下午11:45
 */

namespace App\Backend\Extensions\Category;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class SortAction extends AbstractDisplayer
{
    public function display()
    {
        Admin::script($this->script());

        return '<div class="btn-group"><button data-id="'.$this->row->id.'" class="btn btn-xs btn-success move-up">上</button><button data-id="'.$this->row->id.'" class="btn btn-xs btn-default move-down">下</button></div>';
    }

    public function script()
    {
        return <<<EOT
$('.move-up').click(function(){
    $.ajax({
        url: "/backend/categories/sort",
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

$('.move-down').click(function(){
    $.ajax({
        url: "/backend/categories/sort",
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