<?php

/**
 * Classe di conversione della valùta
 *
 * @author Corrado
 */
namespace Currency;

use Currency\Exchange\USD;
use Currency\Exchange\EUR;
use Currency\Exchange\GBP;

class Currency {
   
    /**
     * @var string
     */
    private $currencyValue;  
    /**
     * @var string
     */
    private $currency;    
      
    /**
     * Ritorna il valore iniziale della valùta.
     *
     * @return string
     */
    function getCurrencyValue() {
        return $this->currencyValue;
    } 
    
    /**
     * Questo metodo imposta la proprietà currencyValue e controlla
     * sia gestita valùta in ingresso
     * 
     * Se la valùta inserita non è gestita il metodo restituisce una Exception
     * 
     * @param string $value
     * @return static
     * @throws Exception
     */
    function setCurrencyValue($value) {       
        if(self::getCurrency($value)){
            $this->currencyValue = $value;                        
        }else{
            throw new \Exception('La valùta inserita non è stata gestita');
        }          
        return $this;
    }
    
    /**
     * Questo metodo converte la valùta 
     * 
     * Se la valùta inserita non è gestita il metodo restituisce una Exception
     *    
     * @return \Currency\Exchange\ExchangeInterface
     * @throws Exception
     */
    function convert(){        
        
        switch ($this->currency){
            case "€" :
                $exchange = new EUR($this->currencyValue);
                break;
            case "$" :                
                $exchange = new USD($this->currencyValue);
                break;
            case "£" :
                $exchange = new GBP($this->currencyValue);
                break; 
            default :
                throw new \Exception('La valùta inserita non è stata gestita');
        } 
        
        return $exchange;         
    }
    
    /**
     * Questo metodo controlla la proprietà currencyValue passata come parametro
     * e salva nella proprietà currency il simbolo della moneta
     * 
     * @param string $value
     * @return bool      
     */
    private function getCurrency($currentValue){
        $this->currency = NULL;
        $this->currencyValue = NULL;        
        if(preg_match('/€|\$|£/', $currentValue, $matches)){            
            $this->currency = $matches[0];
            return TRUE;
        }else{
            return FALSE;
        }               
        
    }
}
