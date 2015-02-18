<?php

require_once 'controller.php';

$controller = new Controller();

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
            <form action='<?php $Fmail = $controller->invoke(); ?>' method='post'>
                <textarea rows='10' cols='20' name='mail'></textarea><br>
                <input type='submit' value='Invia'>
            </form>
        </div>

        <div>
            <h3>La tua mail per Fullo:</h3>
            <?php echo $Fmail; ?>
        </div>
    </body>
</html>
