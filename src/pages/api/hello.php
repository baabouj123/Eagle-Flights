<?php
return function (\app\core\Request $req, \app\core\Response $res) {
    $res->status(200)->json([
        'name' => 'John Doe'
    ]);
};
