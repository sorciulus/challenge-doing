<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userReport
 *
 * @author Corrado
 */
namespace Report\Model;

use Report\Helper\parseCsv;

class userReport {
    
    private $db;
    
    public function __construct() {
       
        try{
            $this->db = new parseCsv();
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }        
    }
}
