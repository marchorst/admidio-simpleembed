<?php
$plg_simpleembed_config = array(

    "example1" => array(
        "allowed_roles" => array(), // Optional, Only accesible by the role ids, leave empty to allow visitiors
        "title" => "Example 1",
        "show_header" => true, // Optional
        "show_breadcrumb" => true, // Optional
        "content" => '<h1>Any HTML</h1>', // Any HTML content
        "path" => '', // optional, relativ path from root, includes only extensions with *.txt, *.html, *.htm, *.md
        "custom_style" => "" // Optional
    ),
    "example2" => array(
        "allowed_roles" => array(), // Only accesible by the role ids, leave empty to allow visitiors
        "title" => "Example 1",
        "show_breadcrumb" => false, // Optional, This will call the clear method to the navigation
        "show_header" => false, // do not show the title
        "content" => '<h1>Any HTML</h1>', // Any HTML content
        "custom_style" => ".admidio-content{height: calc(100% - 170px);}" // Optional
    ),
    "example3" => array(
        "show_on_login" => true, // Only show on login
        "title" => "Example 2", 
        "show_header" => false,
        "path" => 'README.md' // Include a file instead of the content
    )
);