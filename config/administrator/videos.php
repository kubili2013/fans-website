<?php
use App\Models\Video;
return array(
    'title' => "视频管理",
    'single' => 'videos',
    'model' => Video::class,
    'columns' => array(
        'id' => array(
            'title' => 'ID'
        ),
        'name' => array(
            'title' => 'Name'
        ),
        'email' => array(
            'title' => 'Email'
        ),
        'weibo_id' => array(
            'title' => '微博ID'
        ),
        'avatar' => array(
            'title' => '头像',
            'output' => function($value,$model){
                return '<img src="' . $value . '" width="60px">';
            }
        ),
        'weibo_index' => array(
            'title' => '微博主页',
            'output' => function($value,$model){
                return '<a href="' . $value . '" target="_blank">' . $value . '</href>';
            }
        ),
        'role' => array(
            'title' => '角色',
            'type' => 'enum',
            'options' => array(
                'admin' => '管理员',
                'user' => '普通用户',
            )
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