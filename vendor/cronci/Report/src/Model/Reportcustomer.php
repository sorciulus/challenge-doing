<?php

/**
 * Classe che restiuisce i dati dal db
 *
 * @author Corrado
 */
namespace Report\Model;

use Report\Helper;

class Reportcustomer extends Helper\Parsecsv{    
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Metodo wrapper per l'interfaccia selezionata
     * 
     * @param integer $customerId
     * @return array
     */
    function getReportFromCustomerId($customerId) {
        
        return $this->getResultFromCustomerId($customerId);       
    }
}
