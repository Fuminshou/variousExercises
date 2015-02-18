<?php

class Router
{
    public function match($uri)
    {        
        if($uri === "/app.php"){
            return 'index.php';
        }
        elseif($uri === "/app.php/archive"){
            return 'archive.php';
        }
    }
    
}
