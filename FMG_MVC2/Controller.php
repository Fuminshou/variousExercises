<?php

require_once 'IndexModel.php';
require_once 'ArchiveModel.php';

/* homepage */
function sendForm() {   
    $model = new IndexModel($_POST);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // && $model->stampaMail() != ""
        $Fmail = $model->stampaMail();
    }
    
    require_once 'index.php';
}

/* archivio */
function showOldMail() {
    $model = new ArchiveModel('oldMail.json');

    $oldMail = $model->readFromJson();
    
    require_once 'archive.php';
}
