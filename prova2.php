<?php

class Pagina
{
    public $header, $menu, $siderbar, $corpo, $footer;

    public function __construct(Header $header, Menu $menu, Corpo $corpo, Sidebar $sidebar, Footer $footer)
    {
        $this->header = $header;
        $this->menu = $menu;
        $this->corpo = $corpo;
        $this->sidebar = $sidebar;
        $this->footer = $footer;
    }
    
    protected function creaPagina()
    {
        $valore = $this->header->formatta();
        $valore .= $this->menu->formatta();
        $valore .= $this->corpo->formatta();
        $valore .= $this->sidebar->formatta();
        $valore .= $this->footer->formatta();
        
        return $valore;
    }
    
    public function stampaVideo()
    {
        echo $this->stampaHTML();
    }
    
    public function salvaHTML()
    {
        $file = 'prova2.html';
        file_put_contents($file, $this->stampaHTML());
    }
    
    public function stampaHTML()
    {
        $html = $this->creaPagina();
        
        $valore = "<html>\n<head>\n";
        $valore .= "<link  rel='stylesheet' href='prova2.css'>\n";
        $valore .= "<title>Prova n.2 PHP</title>\n</head>\n<body>";
        $valore .= $html;
        $valore .= "\n</body>\n</html>";
        
        return $valore;
    }
}


abstract class Element
{
    public function formatta()
    {
        $valore = "\n<" . $this->tagName() . ">\n";
        $valore .= $this->getValue();
        $valore .= "\n</" . $this->tagName() . ">";
        
        return $valore;
    }
    
    abstract protected function tagName();
    
    abstract protected function getValue();
}


class Header extends Element
{
    protected $immagine;
    
    public function __construct($img)
    {
        $this->immagine = $img;
    }
    
    protected function getValue()
    {
        return "<img src='" . $this->immagine . "' >";
    }
    
    protected function tagName()
    {
        return "header";
    }
}


class Corpo extends Element
{
    protected $titolo, $testo, $img;
    
    public function __construct($titolo, $testo, $img)
    {
        $this->titolo = $titolo;
        $this->testo = $testo;
        $this->img = $img;
    }
    
    protected function getValue()
    {
        $valore = "<h1>" . $this->titolo . "</h1>\n";
        $valore .= "<p>" . $this->testo . "</p>\n";
        $valore .= "<img src='" . $this->img . "' >";
        
        return $valore;
    }
    
    protected function tagName()
    {
        return "article";
    }
}


abstract class LinkContainer extends Element
{
    protected $links;
    
    public function __construct(array $links = [])
    {
        $this->links = $links;
    }
    
    public function getValue()
    {
        $valore = "";
        
        foreach ($this->links as $link) {
            $valore .= "<a href='" .$link. "'>" . $link . "</a> ";
        }
        
        return $valore;
    }
}


class Menu extends LinkContainer
{
    protected function tagName()
    {
        return "nav";
    }
}


class Sidebar extends LinkContainer
{
    protected function tagName()
    {
        return "aside";
    }
}


class Footer extends LinkContainer
{
    protected $testo;
    
    public function __construct(array $links, $testo)
    {
        parent::__construct($links);
        $this->testo = $testo;
    }
    
    public function getValue()
    {    
        $valore = parent::getValue();
        $valore .= $this->testo;
        
        return $valore;
    }

    protected function tagName()
    {
        return "footer";
    }
}

$testo = "testo di prova del footer!";
$header = new Header("img/headerPHP.jpg");
$menu = new Menu(["www.facebook.com", "www.9gag.com", "www.google.it", "www.yahoo.it", "www.bing.it"]);
$corpo = new Corpo("Titolo", "testo", "img/corpoPHP.jpg");
$sidebar = new Sidebar(["www.facebook.com", "www.9gag.com", "www.google.it", "www.yahoo.it", "www.bing.it"]);
$footer = new Footer(["www.google.it", "www.yahoo.it", "www.bing.it"], $testo);


$pagina_html = new Pagina($header, $menu, $corpo, $sidebar, $footer);
$pagina_html->salvaHTML();
$pagina_html->stampaVideo();




