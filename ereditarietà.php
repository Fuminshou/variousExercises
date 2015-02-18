<?php

class Animale{
//    public function verso(){
//        echo "";
//    }
}

class Gatto extends Animale{
    public function verso(){
        echo "miao";
    }
}

class Gattino extends Gatto{
    
}

class Cuccia{
    public $animale;
    
    public function __construct(Animale $animale){
        $this->animale = $animale;
    }
    
    public function verso(){
        $this->animale->verso();
    }
}

$cuccia = new Cuccia(new Gattino());
$cuccia->verso();






