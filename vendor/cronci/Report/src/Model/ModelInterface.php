<?php

namespace Report\Model;

/**
 * Interfaccia per la gestione dati, è possibile collegare 
 * tale interfaccia ad una classe che legge i file oppure ad 
 * una classe che si gestisce un database
 *
 * @author Corrado
 */
interface ModelInterface {
    
    function getResultFromCustomerId($customerId);
}
