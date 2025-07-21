<?php
function load($file_path)
{
    $config = fopen($file_path, "r") or die("Unable to open file!");
    $data = fread($config,filesize($file_path));
    $xml = simplexml_load_string($data) or die("Error: Cannot create object");
    return $xml;
}
