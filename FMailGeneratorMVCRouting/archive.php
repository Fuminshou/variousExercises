<?php
//require_once 'Controller.php';
//
//$controller = new Controller();
//$oldMail = $controller->showOldMail();

require_once 'Model.php';

$model = new Model();
$oldMail = $model->readFromJson();
        
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Fullo Mail Generator</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav><a href="/app.php">Manda una mail</a> | <a href="">Archivio</a></nav>
        <div>
            <?php echo $oldMail; ?>
        </div>
    </body>
</html>
