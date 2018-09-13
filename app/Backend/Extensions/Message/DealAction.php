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

class DealAction extends AbstractDisplayer
{
    public function display()
    {
        Admin::script($this->script());

        if ($this->row->deal) {
            return '<button data-id="'.$this->row->id.'" class="btn btn-xs btn-default">已处理</button>';
        }

        return '<button data-id="'.$this->row->id.'" class="btn btn-xs btn-primary make_deal">未处理</button>';
    }

    public function script()
    {
        return <<<EOT
$('.make_deal').click(function(){
    $.ajax({
        url: "/backend/messages/deal",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': LA.token
        },
        data: { 'id': $(this).attr('data-id') },
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