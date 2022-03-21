<?php

function component(string $component)
{
    require \app\core\Application::$ROOT_DIR . "/components/" . $component . ".php";
}
