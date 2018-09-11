<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/10
 * Time: 上午10:26
 */

namespace App\Backend\Extensions\Post;

use Encore\Admin\Grid\Tools\AbstractTool;
use Illuminate\Support\Facades\Input;

class TypeFilter extends AbstractTool
{
    public function render()
    {
        $current = ['技术支持', '服务与帮助', '行业动态'];
        $type = Input::get('type', 0);
        return <<<EOT
<button class="btn btn-default dropdown-toggle" type="button" id="typeFilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">$current[$type]
  </button>
  <ul class="dropdown-menu" aria-labelledby="typeFilter">
    <li><a href="?type=0">技术支持</a></li>
    <li><a href="?type=1">服务与帮助</a></li>
    <li><a href="?type=2">行业动态</a></li>
  </ul>
EOT;
    }
}