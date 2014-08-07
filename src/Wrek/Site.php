<?php
namespace Wrek;

class Site
{
    /**
     * The site's relative root.
     *
     * @var string
     */
    protected $_root = "";

    /**
     * Whether or not the site is in debug mode.
     *
     * @var boolean
     */
    protected $_debug = false;

    /**
     * The site's title.
     *
     * @var string
     */
    protected $_title = "Wrek Site";

    protected $_routes = array();

    /**
     * The site's constructor.
     *
     * @param object $data An object for initializing the protected properties.
     */
    public function __construct($data = NULL)
    {
        // Cast to an object if we're sent an array
        $data = (object)$data;
        if (!empty($data)) {
            foreach ($this as $key => $value) {
                if (substr($key, 0, 1) !== '_') continue;
                $k = substr($key, 1);
                if (isset($data->$k)) {
                    $this->$key = $data->$k;
                }
            }
        }

        if (empty($this->_root)) {
            $this->_root = dirname($_SERVER['SCRIPT_NAME']);
        }

        if (empty($this->_routes)) {
            $this->_routes = array(
                '404' => 'pages/404',
                'front' => 'pages/front',
            );
        }
    }

    /**
     * Returns the Wrek query string. See getQuery().
     *
     * @return string The Wrek query string.
     */
    public function query()
    {
        return $this->getQuery();
    }

    /**
     * Returns the relative site root. See getRoot().
     * @return string The relative site root.
     */
    public function root()
    {
        return $this->getRoot();
    }

    /**
     * Returns the site's title. See getTitle().
     * @return string The site's title.
     */
    public function title()
    {
        return $this->getTitle();
    }

    /**
     * Returns the site's routes. See getRoutes().
     * @return array The site's routes.
     */
    public function routes()
    {
        return $this->getRoutes();
    }

    /**
     * Builds a URL by prepending the site's relative root URL.
     *
     * @param  string $file The URL to prepend.
     * @return string The prepended URL.
     */
    public function url($file = "")
    {
        return $this->root() . trim($file, DIRECTORY_SEPARATOR . '/');
    }

    /**
     * Returns the file requested by the Wrek query.
     *
     * @param  array $routes The routes array.
     * @return string The file to require for the route.
     */
    public function getRouteFile() {
        $route = '';
        $routes = $this->routes();

        // Get the query
        $q = $this->query();
        if (!$q) {
            $q = 'front';
        }
        if (!isset($routes[$q])) {
            if (isset($routes['404'])) {
                $route = $routes['404'];
            } else {
                $route = 'pages/404';
            }
        } else {
            $route = $routes[$q];
        }

        if (substr($route, -4, 4) !== '.php') {
            $route .= '.php';
        }
        return $route;
    }

    /**
     * Extracts the actual Wrek query string for routing purposes.
     *
     * @return mixed Returns the Wrek query string or false if none given.
     */
    public function getQuery() {
        if (isset($_GET['q'])) {
            if (!empty($_GET['q'])) {
                $q = $_GET['q'];
                $root = $this->root();
                if (substr($q, 0, strlen($root))) {
                    $q = substr($q, strlen($root));
                }
                return trim($q, DIRECTORY_SEPARATOR . "/ \t\n\r\0\x0B");
            }
        }
        return false;
    }

    /**
     * Returns the site's relative root.
     *
     * @return string The site's relative root.
     */
    public function getRoot() {
        return $this->_root;
    }

    /**
     * Returns the site's title.
     *
     * @return string The site's title.
     */
    public function getTitle() {
        return $this->_title;
    }

    /**
     * Returns the site's routes.
     *
     * @return array The site's routes.
     */
    public function getRoutes() {
        return $this->_routes;
    }

    /**
     * Set the site's title.
     *
     * @param string $title The new site title.
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * Set the site's relative root.
     *
     * @param string $root The site's new relative root.
     */
    public function setRoot($root)
    {
        $this->_root = $root;
    }

    /**
     * Set the site's routes.
     *
     * @param array $routes The site's new routes array.
     */
    public function setRoutes($routes)
    {
        $this->_routes = $routes;
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
