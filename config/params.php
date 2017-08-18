<?php

return [
    'adminEmail' => 'admin@example.com',
    'avatar' => [
        'defaultImage' => '/images/avatar/default.jpg',
    ],
//    图片服务器的域名设置，拼接保存在数据库中的相对地址，可通过web进行展示
    'domain' =>'http://yii-web.dev.com',
    'webuploader' => [
//        后端处理图片的地址，value 是相对的地址
        'uploadUrl' => '/images',
//        多文件分隔符
        'delimiter' => ',',
//        基本配置
        'baseConfig' => [
            'defaultImage' => '/images/avatar/default.jpg',
            'disableGlobalDnd' => true,
            'accept' => [
                'title' => 'Images',
                'extensions' => 'gif,jpg,jpeg,bmp,png',
                'mimeTypes' => 'image/*',
            ],
            'pick' => [
                'multiple' => false,
            ],
        ],
    ]
];
