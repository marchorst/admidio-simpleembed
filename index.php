<?php

$rootPath = dirname(dirname(__DIR__));

require_once('config.php');
require_once($rootPath . '/adm_program/system/common.php');
require_once('libs/parsedown-1.7.4/Parsedown.php');

if(!isset($plg_simpleembed_config)) $plg_simpleembed_config = array();

// Get page key
$key = $plg_simpleembed_config[$_GET["key"]];

if (isset($key['show_on_login']) && $key['show_on_login'] == true && $gValidLogin == false) {
    $gMessage->show($gL10n->get('SYS_INVALID_PAGE_VIEW'));
}

if (isset($key['allowed_roles']) && count($key['allowed_roles']) > 0) {
    // current user must be member of at least one listed role
    if (count(array_intersect($key['allowed_roles'], $gCurrentUser->getRoleMemberships())) == 0) {
        $gMessage->show($gL10n->get('SYS_INVALID_PAGE_VIEW'));
    }
}
if ($key == null) {
    $gMessage->show($gL10n->get('SYS_INVALID_PAGE_VIEW'));
    exit;
}

// show or hide breadcrumb
if (isset($key['show_breadcrumb']) && $key['show_breadcrumb'] == false) {
    $gNavigation->clear();
} else {
    $gNavigation->addStartUrl(CURRENT_URL, $key['title'], 'fa-home');
}

// Show or hide the Page title
if (isset($key['show_header']) && $key['show_header'] == false) {
    $title = '';
} else {
    $title = $key['title'];
}

$page = new HtmlPage('test', $title);

// Set Style
if (isset($key['custom_style']) && !empty(trim($key['custom_style']))) {
    $page->addHtml('<style>' . $key['custom_style'] . '</style>');
}

// Set Content
if (isset($key['content']) && !empty(trim($key['content']))) {
    $page->addHtml($key['content']);
}

// Get file content to include
if (isset($key['path'])) {
    $allowedExtensions = array("txt", "html", "htm", "md");
    $explode = explode('.', $key['path']);
    $extension =  $explode[count( $explode)-1];
    if(array_search($extension, $allowedExtensions) === false) {
        $gMessage->show($gL10n->get('SYS_IO_ERROR'));
    }
    $content = file_get_contents($rootPath."/".$key['path']);

    if($content)  {
        if(isset($key['markdown']) && $key['markdown'] == true) {
            $Parsedown = new Parsedown();
            $content = $Parsedown->text($content);
        }
        $page->addHtml($content);
    } else {
        $gMessage->show($gL10n->get('SYS_IO_ERROR'));
    }
}

$page->show();