<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class EventAsset
 *
 * @package app\modules\event\assets
 */
class UserAsset extends AssetBundle
{

    /**
     * @var string
     */
    public $sourcePath = '@app/assets/dist';

    /**
     * @var array
     */
    public $js = [
        'js/user.js',
        '//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js',

    ];

    /**
     * @var array
     */
    public $css = [
        'css/user.css',
        '//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    /**
     * @var array
     */
    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];
}
