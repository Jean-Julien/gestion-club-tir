<?php

/**
 * Classe des vues
 * Undocumented class
 */
class View
{
    private $template;

    /**
     * Constructeur vue
     *
     * @param [type] $template
     */
    public function __construct($template = null)
    {
        $this->template = $template;
    }

    /**
     * Construction de la page client.
     * 
     * @param [type] $params
     * @return void
     */
    public function render($params = null)
    {
        $template = $this->template;

        ob_start();
        include(VIEW . 'pages/' . $template . '.php');
        $contentPage = ob_get_clean();
        include_once(VIEW . '_gabarit.php');
    }
    
    /**
     * renderLogin
     *
     * @return void
     */
    public function renderLogin()
    {
        include_once(PAGES . 'login.php');
    }

    public function render404() {

        include_once(PAGES . '404.php');
    }

    /**
     * construction de la page de redirection
     *
     * @param [type] $route
     * @return void
     */
    public function redirect($route)
    {

        header('location: index.php?r='.$route);
    }
}