<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

use App\SmartyView;
use \Smarty\Smarty;

$smarty = new SmartyView();

$smarty->setTemplateDir( ROOT . '/templates/' );
$smarty->setCompileDir( ROOT . 'data/cache/templates/' );
$smarty->setExtensions([
    new \Smarty\Extension\CoreExtension(),
    new \Smarty\Extension\DefaultExtension(),
]);

//$smarty->addPluginsDir( ROOT . 'libs/smarty-plugins/' );


session_start();

try {
    $smarty->setCaching(Smarty::CACHING_OFF);

    $smarty->display('extends:layouts/layout.tpl|index.tpl');
} catch ( \Smarty\Exception $e ) {
} catch ( Exception $e ) {
}