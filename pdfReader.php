<?php

class pdfReader extends Module

{

    public function __construct()

    {

        $this->name = 'pdfReader';

        $this->tab = 'administration';

        $this->version = '1.0.0';

        $this->author = 'Chitiga Alexandru Gabriel';

        $this->bootstrap = true;



        parent::__construct();



        $this->displayName = $this->l('PDF Reader');

        $this->description = $this->l('Afiseaza un pdf sub forma de preview sub imaginile produsului');

        require_once(dirname(__FILE__).'/../../config/config.inc.php');
        require_once(dirname(__FILE__).'/pdfReader.php');
    }

    
    

    public function install()

    {
        $sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'saved_pdfs` (
            `id_product` int(10) unsigned NOT NULL,
            `pdf_name` varchar(50),
            PRIMARY KEY (`id_product`)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';
    
        if (!Db::getInstance()->execute($sql)) {
            return false;
        }
        
        return parent::install() &&

            $this->registerHook('displayAfterProductThumbs') &&
            $this->registerHook('displayAdminProductsExtra') &&
            $this->registerHook('actionProductUpdate');

    }



    public function uninstall()
    {

        $sql = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'saved_pdfs`';
        if (!Db::getInstance()->execute($sql)) {
            return false;
        }

        return parent::uninstall() &&
        $this->unregisterHook('displayAfterProductThumbs') &&
        $this->unregisterHook('displayAdminProductsExtra') &&
        $this->unregisterHook('actionProductUpdate');

    }

    public function hookActionProductUpdate($parms)
    {
        // $pdfread = new pdfReader();
        // $output = $pdfread->fetch(dirname(__FILE__). '/views/templates/product_save.tpl');
        // $output = file_get_contents(dirname(__FILE__). '/views/js/getpdf.js');
        // $response = '<script>' . $output . '</script>';
        //$content = Context::smarty()->fetch($output);
        //Context::smarty()->assign('pdfurl', $pdfurl);
        // $myValue = Context::getContext()->smarty->getTemplateVars('pdfurl');
        // $response = $_POST['pdfurl'];
        // var_dump($response);
        // exit;

    }

    public function hookDisplayAdminProductsExtra($params)
    {
        $productId = (int) Tools::getValue('id_product');

        return $this->display(__FILE__, 'views/templates/product_save.tpl');
    }

    public function hookDisplayAfterProductThumbs($params)
    {
        // $url = '/modules/pdfReader/views/pdfs/un-duce-doar-pentru-mine.pdf';
        $productId = (int) Tools::getValue('id_product');
        if($productId == 103)
            return $this->display(__FILE__, 'views/templates/carte.tpl');
    }

}