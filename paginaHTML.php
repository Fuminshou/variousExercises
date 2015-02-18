<?php
/*
 * Creare una pagina html con elementi che si stampano a video
 * header (img), menu (link), sidebar (link), corpo (testo + img), footer (link)
*/

class Pagina{
    public $header, $menu, $siderbar, $corpo, $footer;

    public function __construct(Header $header, PageElement $menu, PageElement $sidebar, 
                                PageElement $corpo, PageElement $footer){    
        $this->header = $header;
        $this->menu = $menu;
        $this->sidebar = $sidebar;
        $this->corpo = $corpo;
        $this->footer = $footer;
    }
    
    public function creaPagina(){
        $valore = $this->header->formatta();
        $valore .= $this->menu->formatta();
        $valore .= $this->sidebar->formatta();
        $valore .= $this->corpo->formatta();
        $valore .= $this->footer->formatta();
        
        return $valore;
    }
    
    public function stampaVideo(Pagina $pagina){
        $this->pagina = $pagina;
        
        $valore = $this->pagina->creaPagina();
        
        echo $valore;
    }
    
    public function stampaHTML(Pagina $pagina){
        $file = 'PaginaProvaPHP.html';
        $this->pagina = $pagina;
        $html = $this->pagina->creaPagina();
        
        $valore = "<html>\n<head>\n";
        $valore .= "<link  rel='stylesheet' href='provaPaginaPHP.css'>";
        $valore .= "<title>ProvaPaginaPHP</title>\n</head>\n<body>\n<div id='wrapper'>";
        $valore .= $html;
        $valore .= "</div>\n</body>\n</html>";
        
        file_put_contents($file, $valore);
    }
}

class PageElement{    
    public function addTagDiv($valore, $elemento){
        $this->elemento = $elemento;
        
        if(is_a($this->elemento, 'Header')){
            $this->valore = "<div class='header'>" . $valore . "</div>\n";
        }
        elseif(is_a($this->elemento, 'Menu')){
            $this->valore = "<div class='menu'>" . $valore . "</div>\n";
        }
        elseif(is_a($this->elemento, 'Sidebar')){
            $this->valore = "<div class='sidebar'>" . $valore . "</div>\n";
        }
        elseif(is_a($this->elemento, 'Corpo')){
            $this->valore = "<div class='corpo'>" . $valore . "</div>\n";
        }
        elseif(is_a($this->elemento, 'Footer')){
            $this->valore = "<div class='footer'>" . $valore . "</div>\n";
        }else{
            $this->valore = "<div>" . $valore . "</div>\n";
        }
        
        return $this->valore;
    }
    
    public function addTagImg($source){
        $this->valore = "<img src='" . $source . "'>";
        
        return $this->valore;
    }
    
    public function addTagP($valore){
        $this->valore = "<p>" . $valore . "</p>";
        
        return $this->valore;
    }
    
    public function getText($start, $step){
        $filename = 'testiProvaPHP.txt';
        
        $testo = file_get_contents($filename, NULL, NULL, $start, $step);
        
        return $testo;
    }
}

class LinkContainer extends PageElement{
    public function addTagLink($valore){
        return $valore = "<a href=''>" . $valore . "</a>";
    }
}

class Menu extends LinkContainer{
    public $menu;
    
    public function __construct(){
        $this->menu = $menu;
    }
    
    public function formatta(){
        $this->menu = new Menu;
        
        $valore = $this->menu->addTagLink($this->menu->getText(-1, 6));
        $valore .= " | " . $this->menu->addTagLink($this->menu->getText(-1, 6));
        $valore .= " | " . $this->menu->addTagLink($this->menu->getText(-1, 6));
        $valore .= " | " . $this->menu->addTagLink($this->menu->getText(-1, 6));
        $valore .= " | " . $this->menu->addTagLink($this->menu->getText(-1, 6));
        
        $valore = $this->menu->addTagDiv($valore, $this->menu);
        
        return $valore;
    }
}

class Sidebar extends LinkContainer{
    public $sidebar;
    
    public function formatta(){
        $this->sidebar = new Sidebar;
        
        $valore = $this->sidebar->addTagLink($this->sidebar->getText(7, 5));
        $valore .= "<br>" . $this->sidebar->addTagLink($this->sidebar->getText(14, 13));
        $valore .= "<br>" . $this->sidebar->addTagLink($this->sidebar->getText(7, 5));
        $valore .= "<br>" . $this->sidebar->addTagLink($this->sidebar->getText(14, 13));
        $valore .= "<br>" . $this->sidebar->addTagLink($this->sidebar->getText(7, 5));
        $valore .= "<br>" . $this->sidebar->addTagLink($this->sidebar->getText(14, 13));
        $valore .= "<br>" . $this->sidebar->addTagLink($this->sidebar->getText(7, 5));
        $valore .= "<br>" . $this->sidebar->addTagLink($this->sidebar->getText(14, 13));
        $valore .= "<br>" . $this->sidebar->addTagLink($this->sidebar->getText(7, 5));
        $valore .= "<br>" . $this->sidebar->addTagLink($this->sidebar->getText(14, 13));
        $valore .= "<br>" . $this->sidebar->addTagLink($this->sidebar->getText(7, 5));
        $valore .= "<br>" . $this->sidebar->addTagLink($this->sidebar->getText(14, 13));
        
        $valore = $this->sidebar->addTagDiv($valore, $this->sidebar);
        
        return $valore;
    }
}

class Footer extends LinkContainer{
    public $footer;
    
    public function formatta(){
        $this->footer = new Footer;
        
        $valore = $this->footer->addTagLink($this->footer->getText(28, 25));
        $valore .= " | " . $this->footer->addTagLink($this->footer->getText(54, 46));
        $valore .= " | " . $this->footer->addTagLink($this->footer->getText(101, 27));
        $valore = $this->footer->addTagDiv($valore, $this->footer);
        
        return $valore;
    }
}

class Header extends PageElement{
    public $header;
    
    public function formatta(){
        $this->header = new Header;
        
        $valore = $this->header->addTagImg("img/headerPHP.jpg");
        $valore = $this->header->addTagDiv($valore, $this->header);
        
        return $valore;
    }
}

class Corpo extends PageElement{
    public $corpo;
    
    public function formatta(){
        $this->corpo = new Corpo;
        
        $immagine = $this->corpo->addTagImg("img/corpoPHP.jpg");
        
        $testo = $this->corpo->addTagP($this->corpo->getText(101, 101));
        $testo .= $this->corpo->addTagP($this->corpo->getText(202, 211));
        $testo .= $this->corpo->addTagP($this->corpo->getText(412, 404));
        $testo .= $this->corpo->addTagP($this->corpo->getText(816, 1219));
        $testo .= $this->corpo->addTagP($this->corpo->getText(2037, 395));
        
        $valore = $this->corpo->addTagDiv($immagine . $testo, $this->corpo);
        
        return $valore;
    }
}

$pagina_html = new Pagina(new Header, new Menu, new Sidebar, new Corpo, new Footer);
//$pagina_html->stampaVideo($pagina_html);
$pagina_html->stampaHTML($pagina_html);