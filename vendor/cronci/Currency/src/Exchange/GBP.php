<?php

namespace Currency\Exchange;

/**
 * Classe per la conversione da GBP a EUR
 *
 * @author Corrado
 */
class GBP implements ExchangeInterface{
    
     /**
     * @var float
     */
    private $change = 1.195; 
     /**
     * @var float
     */
    private $value;
    
    /**
     * @param  string  $value    
    */
    public function __construct($value) {
             
        $this->value = (float) preg_replace('/[^\w+|,|\.]/', '', $value);          
    }
    
    /**
     * Metodo che effettua la conversione della valùta
     *
     * @return string      
     */
    function convertCurrency(){
        
        $convert =  (float) number_format($this->value * $this->change, 2);                
        return "€".$convert;
    }
}