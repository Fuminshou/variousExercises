<?php

class Mail implements JsonSerializable
{
    public $corpoMail;
    
    public function __construct(array $corpoMail)
    {
        $this->corpoMail = htmlentities(trim(isset($corpoMail['mail']) ? $corpoMail['mail'] : null), ENT_QUOTES);
    }

    public function jsonSerialize() {
        return $this->corpoMail;
    }
    
    public function splitMail()
    {
        $lines = explode(PHP_EOL, $this->corpoMail);
       
        return $lines;
    }
    
    public function duplicateLines()
    {
        $lines = $this->splitMail();
        $mail = "";
        
        foreach($lines as $line){
            $mail .= $line . PHP_EOL . $line . PHP_EOL;
        }
        
        return trim($mail);
    }
    
    public function saveToJson()
    {
        $file = 'oldMail.json';

        if(!is_file($file)) {
            fopen($file, "x");
            file_put_contents($file, json_encode($this->corpoMail, JSON_PRETTY_PRINT));
            fclose($file);
        }
        else{
            $current = file_get_contents($file);
            $current .= "\n" . json_encode($this->corpoMail, JSON_PRETTY_PRINT);
            file_put_contents($file, $current);
        }
    }
    
    public function stampaMail()
    {
        return $this->duplicateLines();
    }
}
