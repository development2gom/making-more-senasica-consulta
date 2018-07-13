<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetClassicTopBarBlank extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/webAssets/';
    public $css = [
        'plugins/ladda/ladda.min.css',
        'templates/classic/topbar/assets/examples/css/pages/login-v3.min.css',
        'css/site-extend.css',
        "https://framework-gb.cdn.gob.mx/assets/styles/main.css"
    ];
    public $js = [
        'plugins/ladda/spin.min.js',
        'plugins/ladda/ladda.min.js',
        'js/geeks.js',
        "https://framework-gb.cdn.gob.mx/gobmx.js"

    ];
    public $depends = [
        'app\assets\AppAssetClassicTopBar',
    ];
}
