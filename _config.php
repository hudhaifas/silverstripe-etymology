<?php

/**
 * Fetches the name of the current module folder name.
 *
 * @return string
 */
if (!defined('ETYMOLOGIST_DIR')) {
    define('ETYMOLOGIST_DIR', ltrim(Director::makeRelative(realpath(__DIR__)), DIRECTORY_SEPARATOR));
}