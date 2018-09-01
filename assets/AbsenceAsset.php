<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */

class AbsenceAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
        'material/css/material-dashboard.css?v=2.0.0',
        'material/assets-for-demo/demo.css'
    ];
    public $js = [
        'material/js/core/jquery.min.js', 'material/js/core/popper.min.js',
        'material/js/bootstrap-material-design.js',
        'material/js/plugins/perfect-scrollbar.jquery.min.js',
        'material/js/plugins/chartist.min.js',
        'material/js/plugins/arrive.min.js',
        'material/js/plugins/bootstrap-notify.js',
        'material/js/plugins/demo.js',
        'material/js/material-dashboard.js?v=2.0.0'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}