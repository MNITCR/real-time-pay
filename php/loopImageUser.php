<?php
$dir = "../asset/uploads/";
//get the list of all files with .jpg, .png, and .svg extensions in the directory
$images = array_merge(glob($dir . "*.jpg"), glob($dir . "*.png"), glob($dir . "*.svg"));

// Extract file names from the paths
$fileNames = array_map('basename', $images);

// return the list of file names as JSON
echo json_encode($fileNames);
