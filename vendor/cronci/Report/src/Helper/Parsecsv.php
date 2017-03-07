<?php

/**
 * Classe per legge file da un file csv
 *
 * @author Corrado
 */
namespace Report\Helper;

class Parsecsv implements \Report\Model\ModelInterface {
    
    /**
     * @var integer[]
     */
    private $result;
    /**
     * @var string
     */
    private $file;
    
    /**
    *  Se la costante ABS non è definita o il file non esiste
    *  il metodo ritorna una Exception 
    * 
    * @throws \Exception
    */
    public function __construct() {
        
        if(defined("ABS")){
            $file = ABS.DIRECTORY_SEPARATOR."data.csv";            
            if(file_exists($file) ){
                $this->file = $file;
                $this->parse();
            }else{
                throw new \Exception('File data.csv non trovato in '.ABS);
            }
        }else{
            throw new \Exception('Path assoluto non trovato');
        }
        
    }
    
    /**
     * Metodo per la lettura e il salvataggio del file csv
     *
     * Questo metodo legge il file e lo memorizza nella proprietà $result 
     * 
     * Se il file non può essere letto il metodo restituisce una Exception
     *
     *
     * @return void
     * @throws \Exception
     */
    private function parse(){
                
        $resource = fopen($this->file, 'r') or die("Impossibile aprire il file $this->file");
        $headers = fgetcsv($resource, 0, ';');       

        $data = [];
        while (!feof($resource)){
            $row_temp = fgetcsv($resource, 0, ';');
            if(!$row_temp){
                continue;
            }
            foreach ($headers as $key => $header){
                if(isset($row_temp[$key])){
                    $row[$header] = $row_temp[$key];
                }
            }
            array_push($data, $row);
        }
        fclose($resource);        
        $this->result = $data;
        
    }
    
    
    /**
     * Metodo per la ricerca del valore 'customer'
     *
     * Questo metodo ricerca il valore nella proprietà $result restituendo un array
     * 
     * Se la ricerca non produce risultati il metodo restituisce un array vuoto
     *
     * @param integer $customerId
     * @return array
     */
    function getResultFromCustomerId($customerId){
        
        $data = [];
        if($this->result){            
            foreach ($this->result as $row){
                if($row["customer"] == $customerId){
                    $data[] = $row;
                }
            }
        }
        return $data;
    }        
    
    
}
