<?php 
namespace Wrek;

class Site 
{
    protected $siteroot;
    protected $title; 

    public function __construct($title = "Wrek Site", $siteroot = "./") 
    {
        $this->setTitle($title);
        $this->setSiteroot($siteroot);
    }

    public function render() 
    {
        echo '<a href="' . $this->url() . '">' . $this->title() . '</a>';
        echo "\n<br />";
        echo "This site is rendered!";
    }

    public function root() 
    {
        return $this->getSiteroot();
    }

    public function title() 
    {
        return $this->getTitle();
    }

    public function url($file = "") 
    {
        return $this->root() . trim($file, DIRECTORY_SEPARATOR . '/');
    }

    public function getSiteroot() {
        return $this->siteroot;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title = "") 
    {
        $this->title = $title;
    }
    public function setSiteroot($siteroot = "") 
    {
        $this->siteroot = $siteroot;
    }
}

/* 
        
if (!isset($siteroot))
    $siteroot = "./";

if (!isset($title))
    $title = "lytedev";

$nav_items = array(
    'about' => "About",
    'contact' => "Contact",
    'projects' => "Projects",
    'blog' => "Blog",

    'buildaria' => false, 
    'buildaria.php' => false, 

    '#?default' => 'about', 
);

function nav() {
    global $nav_items, $curpage, $siteroot;
    $output = "";
    foreach ($nav_items as $k => $v) {
        if ($v == false) continue;
        if (substr($k, 0, 1) == '#') continue; 
        $output .= '<li><a href="' . $siteroot . $k . '"';
        if ($k == $curpage) {
            $output .= ' class="active"';
        }
        $output .= '>' . $v . '</a></li>';
    }
    return $output;
} 

*/ 
