# SimpleEmbed
With this simple Admidio plugin you can add some custom pages with static content like HTML, MarkDown or plain text.

## Configuration
You can either add your configuration to config.php or add it to your "adm_my_files/config.php". (I would recomment to add it to the adm_my_files)

### Add a page
Here are three examples with all possible values.
```
$plg_simpleembed_config["example"] = array(
    "allowed_roles" => array(), // Optional, Only accesible by the role ids, leave empty to allow visitiors
    "title" => "Example 1",
    "show_header" => true, // Optional
    "show_breadcrumb" => true, // Optional
    "content" => '<h1>Any HTML</h1>', // Any HTML content
    "path" => '', // optional, relativ path from root, includes only extensions with *.txt, *.html, *.htm, *.md
    "markdown" => false, // Optional
    "custom_style" => "" // Optional
);

$plg_simpleembed_config["example2"] = array(
    "allowed_roles" => array(), // Only accesible by the role ids, leave empty to allow visitiors
    "title" => "Example 1",
    "show_breadcrumb" => false, // Optional, This will call the clear method to the navigation
    "show_header" => false, // do not show the title
    "content" => '<h1>Any HTML</h1>', // Any HTML content
    "custom_style" => ".admidio-content{height: calc(100% - 170px);}" // Optional
);

$plg_simpleembed_config["example3"] = array(
    "show_on_login" => true, // Only show on login
    "title" => "Example 2", 
    "show_header" => false,
    "markdown" => true,
    "path" => 'README.md' // Include a file instead of the content
    // Hint: you could inlcude files from the uploaded document store
    // i.E. adm_my_files/documents_YOUR-ORG/uploaded-file.md
);
```

# Ideas
- Add some basic wysiwyg editor - but this also means to move it to the database

# Licenses / usage
This project uses parsdown with MIT License (https://github.com/erusev/parsedown)