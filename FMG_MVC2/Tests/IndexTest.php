<?php

require_once './IndexModel.php';


class IndexTests extends PHPUnit_Framework_TestCase
{
    
    public function testFormSubmit() {
        
        /* 
        * testare sendForm()
        */
        $_POST['mail'] = 'prova';
        $model = new IndexModel($_POST);
        
        $this->assertNotEmpty($model->corpoMail);
        
        $this->assertEquals('prova', $model->corpoMail);
    }
    
    public function testDuplicateLines() {
        
        /*
         * testare duplicateLines()
         */        
        $_POST['mail'] = "prova";
        $model = new IndexModel($_POST);
        
        $this->assertEquals("prova\nprova", $model->duplicateLines());
    }
    
    public function testSplitMail() {
        $prova = new \Symfony\Component\DomCrawler\Crawler;
        /*
         * testare splitMails()
         */
        $_POST['mail'] = "prova\nriga 2";
        $model = new IndexModel($_POST);
        
        $lines = $model->splitMail();
        
        $this->assertEquals("prova", $lines[0]);
        $this->assertEquals("riga 2", $lines[1]);
    }   
    
    
}
