<?php

/*
 * removes the require-dev section from composer.json
 * needed for linting in older php platforms
 */
function removeRequireDev()
{
    $filename = __DIR__.'/../../composer.json';

    $content = file_get_contents($filename);

    $data = json_decode($content, true);

    unset($data['require-dev']);

    $content = json_encode($data);

    file_put_contents($filename, $content);
}
