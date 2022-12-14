<?php
require_once('views/view.php');
class ControllerAdmin
{
    private $_productsManager;
    private $_view;

    public function __construct($url)
    {

        $this->_productsManager = new ProductsManager();

        // 1) Vérifie la validité de l'url
        if (isset($url) && count($url)>1) // -- INFO : Source d'erreur à vérifier
        {
            throw new Exception('Page introuvable');
        }
        
        // 2) Paramètre la vue
        $this->_view = new View('Admin');

        // 3) Initialisation des données envoyées à la vue
        $data = array();

        // 4) Récupère les informations nécessaires
        $products = $this->products();

        // 5) Charge les données
        $data['products'] = $products;

        // 6) Génère la vue
        $this->_view->generate($data);
    }

    /**
     * Récupère la liste des articles
     */
    private function products()
    {
        $this->_productsManager = new ProductsManager();

        $products = $this->_productsManager->getProducts();

        return $products;
    }
}
