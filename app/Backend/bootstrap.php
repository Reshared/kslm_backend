<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

use Encore\Admin\Form;
use Encore\Admin\Grid\Column;
use App\Backend\Extensions\WangEditor;
use App\Backend\Extensions\Post\StickAction;
use App\Backend\Extensions\Message\DealAction;
use App\Backend\Extensions\Message\ViewAction;
use App\Backend\Extensions\Category\SortAction;

Encore\Admin\Form::forget(['map', 'editor']);
Form::extend('editor', WangEditor::class);
Column::extend('StickAction', StickAction::class);
Column::extend('DealAction', DealAction::class);
Column::extend('ViewAction', ViewAction::class);
Column::extend('SortAction', SortAction::class);
