<?php

function isActive($path = '') {
    $current = \Illuminate\Support\Facades\Request::path();
    $paths = explode('/', $current);
    $current = $paths[0];
    return $current == $path;
}

function url2Name($url) {
    $para = explode('/', $url);
    return end($para);
}

function fileExt($path) {
    $para = explode('.', $path);

    $ext = strtolower(end($para));
    switch ($ext) {
        case 'jpg':
        case 'png':
        case 'gif':
        case 'jpeg':
        case 'bmp':return 'image'; break;
        case 'mp4':
        case '3gp': return 'video'; break;
        case 'mp3': return 'autio'; break;
        case 'pdf': return 'pdf'; break;
        default: return 'other'; break;
    }
}