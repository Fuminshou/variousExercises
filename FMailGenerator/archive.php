<?php

require_once 'controller.php';

$controller = new Controller();
$oldMail = $controller->showOldMail();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Fullo Mail Generator</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav><a href="index.php">Manda una mail</a> | <a href="archive.php">Archivio</a></nav>
        <div>
            <?php echo $oldMail; ?>
        </div>
    </body>
</html>
