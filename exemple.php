<?php

require "lib/HiddenFiles.class.php";

/**
 * Create HiddenFiles instance
 */
$HiddenFiles = new HiddenFiles();

/**
 * Create image with the hidden archive
 */
$HiddenFiles->create("image.jpg", "archive");

/**
 * Extraction test
 */
//$HiddenFiles->extract("ArchivedImage.jpg");

?>