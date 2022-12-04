<?php
class View
{
    private $_file;
    private $_t;

    public function __construct($action)
    {
        $this->_file = 'views/view'/$action.'.php';
    }

    //génère et affiche la vue
    public function generate($data)
    {
        //partie spécifique de la vue (sans le header et le footer)
        $description = $this->generateFile($this->_file, $data);
        //template (header et footer)
        $view = $this->generateFile('views/template.php',array('t' => $this->_t, 'description' => $description));

        echo $view;
    }

    //génère un fichier vue et renvoie le résultat produit
    private function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);

            ob_start();

            require $file;
            
            return ob_get_clean();

        }
        else
            throw new Exception('Fichier '.$file.' introuvable');
    }
}