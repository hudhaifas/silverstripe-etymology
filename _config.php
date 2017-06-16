<?php

/**
 * Fetches the name of the current module folder name.
 *
 * @return string
 */
if (!defined('ETYMOLOGY_DIR')) {
    define('ETYMOLOGY_DIR', ltrim(Director::makeRelative(realpath(__DIR__)), DIRECTORY_SEPARATOR));
}