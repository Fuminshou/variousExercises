<?php

class ArchiveModel {
    
    public $filename;
    
    public function __construct($filename) {
        $this->filename = $filename;
    }
    
    /* archivio */
    public function formattaMail(array $mails) {
        
        foreach($mails as $mail) {
            $arr[] = str_replace("\r", "<br>", $mail);
        }
        
        return $arr;
    }

    public function readFromJson() {
        
        if (!is_file($this->filename)) {
            return ["Non ci sono vecchie email da mostrare!"];
        } else {
            $mails = $this->formattaMail(json_decode(file_get_contents($this->filename)));
            
            return $mails;
        }
    }
}