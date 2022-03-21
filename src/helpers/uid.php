<?php
function uid(int $length = 24): string
{
    return bin2hex(random_bytes($length));
}