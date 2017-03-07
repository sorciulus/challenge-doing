<?php

namespace Currency\Exchange;

/**
 * Classe per la conversione da USD a EUR
 *
 * @author Corrado
 */
class USD implements ExchangeInterface{
    
    /**
     * @var integer
     */
    private $change = 0.8966;  
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