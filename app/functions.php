<?php

function isActive($path = '') {
    $current = \Illuminate\Support\Facades\Request::path();
    $paths = explode('/', $current);
    $current = $paths[0];
    return $current == $path;
}