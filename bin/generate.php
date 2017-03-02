<?php

$source_url   = 'http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types';
$package_root = dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;

$class_path    = $package_root.'src'.DIRECTORY_SEPARATOR.'MimeType.php';
$template_path = $package_root.'var'.DIRECTORY_SEPARATOR.'class_template.txt';

$class_template = @file_get_contents($template_path);

if (empty($class_template))
    die("Unable to load Class Template.");

$types_source = @explode("\n", @file_get_contents($source_url));

if (empty($types_source))
    die("Unable to fetch up-to-date Mime Types from $source_url\n");

$mime_types = array();

foreach ($types_source as $line) if (
    !empty($line[0]) && $line[0] != '#' &&
    preg_match('/^([^\s]+)\s+(.+)$/', $line, $parts) &&
    preg_match_all('/([^\s]+)/', $parts[2], $extensions)
) {
    $mime_type        = $parts[1];
    foreach ($extensions[1] as $extension)
        $mime_types[(string) $extension] = $mime_type;
}

if (empty($mime_types))
    die("No Mime Types parsed from $source_url\n");

asort($mime_types);

$extension_count = count($mime_types);

$longest_ext = max(array_map('strlen', array_keys($mime_types)));

$indent = '    ';

$line = "\n$indent$indent'%s'%s => '%s',";

foreach ($mime_types as $ext => $mime_type) {
    $types_string .= sprintf(
        $line,
        addcslashes($ext,'\\\''),
        str_repeat(' ', $longest_ext - strlen($ext)),
        addcslashes($mime_type,'\\\'')
    );
}

$class_string = sprintf(
    $class_template,
    sprintf(
        "array(%s\n$indent)",
        substr($types_string, 0, -1)
    )
);

if (file_put_contents($class_path, $class_string))
    echo "Successfully Updated the class with $extension_count Extension/MimeType associations.\n";
else
    echo "There was an error updating the class.\n";