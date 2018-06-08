<?php
use App\Models\Goods;
return array(
    'title' => "好物管理",
    'single' => 'goods',
    'model' => Goods::class,
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
        'title' => array(
            'title' => '标题',
        ),
        'description' => array(
            'title' => '简介',
        ),
    ),
    'edit_fields' => array(
        'url' => array(
            'title' => '链接',
        ),
        'image_url' => array(
            'title' => '图片',
            'type' => 'image',
            'location' => public_path() . '/uploads/images/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'display_raw_value' => false,
            // 'sizes' => array(
            //     array(65, 57, 'crop', public_path() . '/uploads/images/thumbs/small/', 100),
            //     array(220, 138, 'landscape', public_path() . '/uploads/images/thumbs/medium/', 100),
            //     array(383, 276, 'fit', public_path() . '/uploads/images/thumbs/full/', 100)
            // )
        ),
        'user_id' => array(
            'title' => '用户ID',
            'type' => 'number',
        ),
        'title' => array(
            'title' => '标题',
        ),
        'description' => array(
            'title' => '简介',
        ),
    ),
);