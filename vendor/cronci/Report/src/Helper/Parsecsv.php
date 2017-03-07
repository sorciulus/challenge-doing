<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of parseCsv
 *
 * @author Corrado
 */
namespace Report\Helper;

class Parsecsv {
    
    private $result;
    
    public function __construct() {
        
        if(defined("ABS")){
            if(file_exists(ABS.DIRECTORY_SEPARATOR."data.csv") ){
                $this->parse();                      
            }else{
                throw new \Exception('File data.csv non trovato in '.ABS);
            }
        }else{
            throw new \Exception('Path assoluto non trovato');
        }
        
    }
    
    private function parse(){
        
        $resource = fopen($filename, 'r');
        $headers = fgetcsv($resource, 1024, ';');       

        $data = [];
        while (!feof($resource)){
            $row_temp = fgetcsv($resource, 1024, ';');
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
    
    function getResult() {
        return $this->result;
    }

    function getResultObject(){
        return (object) $this->result;
    }
}
