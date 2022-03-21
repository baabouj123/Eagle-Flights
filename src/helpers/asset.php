<?php

function asset(string $asset)
{
    echo $_ENV["SITE_URL"] . "assets/" . $asset;
}
