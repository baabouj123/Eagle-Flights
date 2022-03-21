<?php
function csrf(){
    $auth = new \app\controllers\Auth();
    $session = new \app\core\Session();
    $csrf_token = $session->get("csrf_token") ?? $auth->generateToken();
    $session->set("csrf_token", $csrf_token);
    echo "<input type='hidden' id='csrf_token' name='csrf_token' value='$csrf_token'>";
}
