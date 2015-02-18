<?php

require_once './ArchiveModel.php';

class ArchiveTests extends PHPUnit_Framework_TestCase
{
    public function testReadJson() {
        
        /*
         * testare readFromJson();
         */
        $file = "mailTest.json";
        $testo = ["riga 1", "riga 2"];
        
        $model = new ArchiveModel($file);
        
        file_put_contents($file, json_encode($testo));
        
        $this->assertEquals($model->readFromJson($file), $testo);
        
        unlink($file);
    }
    
    public function testFormatta() {
        
        /*
         * testare formattaMail()
         */
             
        $testo = ["riga 1\rriga 2", "altra mail\raltra riga"];
        $formattato = ["riga 1<br>riga 2", "altra mail<br>altra riga"];
        
        $model = new ArchiveModel("oldMail.json");
        
        $this->assertEquals($formattato, $model->formattaMail($testo));
        
        unlink('oldMail.json');
    }
}