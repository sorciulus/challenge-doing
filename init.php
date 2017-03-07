<?php

require_once __DIR__ .'/costants.php';
require_once __DIR__ .'/vendor/autoload.php';

use Report\Report;
use Currency\Currency;

$customerId = isset($argv[1]) ? $argv[1] : FALSE;
if(!$customerId || !is_numeric($customerId)){
    echo "Parametri non validi".PHP_EOL;
    echo "Utilizzo init.php {ID cliente (int)}".PHP_EOL;
    echo PHP_EOL;
    exit();
}else{    
    try {
        $report = new Report($customerId);
        if($report->searchReportCurrency()){       
           $table = new \Console_Table();       
           $table->setHeaders(["Customer ID","Data","Valore"]);
           $currency = new Currency();
            foreach ($report->getReport() as $row){
                try{
                    $convertObjValue = $currency->setCurrencyValue($row["value"])->convert();    
                    $row["value"] = $convertObjValue->convertCurrency();
                    $table->addRow($row);
                } catch (\Exception $ex) {
                    echo 'Caught exception: ',  $ex->getMessage(), "\n";                     
                }           
            }    
            echo $table->getTable();
        }else{
           echo "Nessun record trovato per il customer n. $customerId".PHP_EOL;
        } 
    } catch (\Exception $ex) {
        echo 'Caught exception: ',  $ex->getMessage(), "\n"; 
    }   
}