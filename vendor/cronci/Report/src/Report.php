<?php

/**
 * Classe principale della libreria
 * è possibile ampliare la funzionalità aggiungendo più tipologie di report
 *
 * @author Corrado
 */
namespace Report;

use Report\Model\Reportcustomer;
use Report\Helper\Parsecsv;

class Report {
    
    /**
     * @var integer
     */
    private $customerId;
    /**
     * @var integer[]
     */
    private $report;
    
    /**
     * @param  integer  $customerId    
     * @throws \InvalidArgumentException
     */
    public function __construct($customerId) {
        
        if(!is_numeric($customerId)){
            throw new \InvalidArgumentException("L'id customer inserito non è valido");
        }
        $this->customerId = $customerId;              
    }
    
    /**
     * Metodo per la ricerca di record nel db
     *
     * Se il file non può essere letto o in un ipotetico caso la connessione al db non dovesse avvenire
     * il metodo restituisce una Exception
     *
     * @return bool
     * @throws \Exception
     */
    function searchReportCurrency(){
               
        $report = new Reportcustomer(); 
        $this->report = $report->getReportFromCustomerId($this->customerId);       
        if($this->report){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }
    
    /**
     * Ritorna il report trovato sotto forma di array.
     *
     * @return array
     */
    function getReport() {
        return $this->report;
    }

    
}
