<!DOCTYPE html>
<html>
    <head>
        <title>Fullo Mail Generator</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav style='margin-bottom:15px; font-size:30px;'>
            <a href="/app.php">Manda una mail</a> | <a href="">Archivio</a>
        </nav>
        <div>
            <h1>Archivio</h1>
            <?php
            foreach ($oldMail as $mail) {
                ?>
                <p><?php echo $mail ?></p><hr>
                <?php
            }
            ?>
        </div>
    </body>
</html>
