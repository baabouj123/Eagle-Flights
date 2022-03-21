<?php
require_once \app\core\Application::$ROOT_DIR . "\helpers\asset.php";
/**
 * @var $title string
 */
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;500;600;700&family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@400;500;600;700&display=swap"
          rel="stylesheet">
    <script src="<?php asset("js/tailwindcss.js"); ?>"></script>
    <title><?php echo $title ?? "Eagle Flight" ?></title>
</head>
