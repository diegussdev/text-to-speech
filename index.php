<?php

use \App\Text\Speech;

require __DIR__ . '/vendor/autoload.php';

$filename = './storage/'. time() .'.mp3';
$language = 'en-US';
$text = $argv[1];

if (!$text) {
    die('No typed text to convert to voice');
}

Speech::run($text, $language, $filename);