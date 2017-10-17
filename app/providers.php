<?php
/* @var $app \App\Application */

$app
    ->register(new \App\Provider\ConsoleProvider())
    ->register(new \App\Provider\CommandProvider());
