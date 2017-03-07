<?php

namespace Currency\Exchange;

/**
 * Classe per la conversione da EUR a EUR
 *
 * @author Corrado
 */
namespace Currency\Exchange;

class EUR implements ExchangeInterface{
    
    /**
     * @var integer
     */
    private $change = 1;  
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
        
        $convert = number_format($this->value * $this->change, 2);
        return "€".$convert;
    }
}
