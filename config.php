<?php
$plg_simpleembed_config = array(

    "example1" => array(
        "allowed_roles" => array(), // Only accesible by the role ids, leave empty to allow visitiors
        "title" => "Example 1",
        "content" => '<h1>Any HTML</h1>' // Any HTML content
    ),
    "example2" => array(
        "show_on_login" => true, // Only show on login
        "title" => "Example 2",
        "path" => 'resources/sample.html' // Include a file instead of the content
    )
);