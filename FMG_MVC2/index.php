<!DOCTYPE html>
<html>
    <head>
        <title>Fullo Mail Generator</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav style='margin-bottom:15px; font-size:30px;'>
            <a href="">Manda una mail</a> | <a href="app.php/archive">Archivio</a>
        </nav>
        <div>
            <form action='' method='post'>
                <textarea rows='10' cols='100' name='mail'></textarea><br>
                <input type='submit' value='Invia'>
            </form>
        </div>
        <div <?php echo empty($Fmail) ? "hidden" : ""; ?> >
            <h3>La tua mail per Fullo:</h3>
            <?php echo $Fmail; ?>
        </div>
    </body>
</html>
