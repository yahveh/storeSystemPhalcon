<?php

/** Define Main App Directory */
define(ROOT_DIR, basename(__DIR__) . DIRECTORY_SEPARATOR);

/** Define Main App Directory */
define(APP_DIR, __DIR__. DIRECTORY_SEPARATOR);

/** Require Template Engine */
require_once('../app/templates/main/header.php');


require_once '../app/system/Template.php';

/** Require Alert Class */
include_once APP_DIR . 'system/Alert.php';

$template = new Template(
    '../app/templates',
    'template_',
    ROOT_DIR
);

session_start();