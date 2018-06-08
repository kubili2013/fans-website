<?php
use App\Models\Image;
return array(
    'title' => "图片管理",
    'single' => 'images',
    'model' => Image::class,
    'columns' => array(
        'id' => array(
            'title' => 'ID'
        ),
        'url' => array(
            'title' => '链接',
            'output' => function($value,$model){
                return '<a href="' . $value . '" target="_blank">' . $value . '</href>';
            }
        ),
        'image_url' => array(
            'title' => '图片',
            'output' => function($value,$model){
                return '<img src="' . $value . '" width="60px">';
            }
        ),
        'title' => array(
            'title' => '标题',
        ),
        'description' => array(
            'title' => '简介',
        ),
        'operation' => array(
            'title' => '操作',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ),
    ),
    'filters' => array(
        'name' => array(
            'title' => 'Name'
        ),
        'email' => array(
            'title' => 'Email'
        ),
    ),
    'edit_fields' => array(
        'name' => array(
            'title' => 'Name'
        ),
        'email' => array(
            'title' => 'Email'
        ),
        'role' => array(
            'type' => 'enum',
            'title' => '角色',
            'options' => array(
                'admin' => '管理员',
                'user' => '普通用户',
            )
        ),
    ),
);