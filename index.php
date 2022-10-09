<?php

$rootPath = dirname(dirname(__DIR__));
$pluginFolder = basename(__DIR__);

require_once('config.php');
require_once($rootPath . '/adm_program/system/common.php');

$key = $plg_simpleembed_config[$_GET["key"]];

if (isset($key['show_on_login']) && $key['show_on_login'] == true && $gValidLogin == false) {
    $gMessage->show($gL10n->get('SYS_INVALID_PAGE_VIEW'));
    exit;    
}

if (isset($key['allowed_roles']) && count($key['allowed_roles']) > 0) {
    // current user must be member of at least one listed role
    if(count(array_intersect($key['allowed_roles'], $gCurrentUser->getRoleMemberships())) == 0) {
        $gMessage->show($gL10n->get('SYS_INVALID_PAGE_VIEW'));
        exit;
    }
}
if($key == null) {
    $gMessage->show($gL10n->get('SYS_INVALID_PAGE_VIEW'));
    exit;
}

$gNavigation->addStartUrl(CURRENT_URL, $key['title'], 'fa-home');
$page = new HtmlPage('test', $key['title']);

$page->addHtml('<style>.admidio-content{height: calc(100% - 170px);}</style>');

if(isset($key['content'])) $page->addHtml($key['content']);
if(isset($key['path'])) $page->addHtml(file_get_contents($key['path']));

$page->show();