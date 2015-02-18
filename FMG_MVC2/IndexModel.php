<?php

class IndexModel{
    public $corpoMail;
    
    function __construct(array $postArgs) {
        $this->corpoMail = htmlentities(trim(isset($postArgs['mail']) ? $postArgs['mail'] : null), ENT_QUOTES);
    }

    /* homepage */
    function splitMail() {
        $lines = explode(PHP_EOL, $this->corpoMail);
        
        $this->saveToJson($lines);
        
        return $lines;
    }

    function duplicateLines() {
        $lines = $this->splitMail();
        $mail = "";

        foreach ($lines as $line) {
            $mail .= $line . PHP_EOL . $line . PHP_EOL;
        }

        return trim($mail);
    }

    function saveToJson(array $lines) {
        $file = 'oldMail.json';
        
        $str = "";
        foreach ($lines as $line) {
            $str .= $line . PHP_EOL;
        }
        $mail[] = $str;
        
        if(!is_file($file)) {
            file_put_contents($file, json_encode($mail));
        } else {
            $content = json_decode(file_get_contents($file));
            $mixed = array_merge($mail, $content);
            file_put_contents($file, json_encode($mixed));
        }
    }

    function stampaMail() {
        return nl2br($this->duplicateLines());
    }
}