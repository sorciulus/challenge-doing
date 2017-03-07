<?php

namespace Report\Helper;

use PHPUnit\Framework\TestCase;

/**
 * Description of ReportHelperTest
 *
 * @author Corrado
 */
class ReportHelperTest extends TestCase{
    
    
    /**
     * @covers            \Report\Helper\Parsecsv::__construct
     * @uses              \Report\Parsecsv
     * @expectedException \Exception
     */    
    public function  testExceptionIsRaisedForMissedConstantDeclaration(){
        $this->setExpectedException('Exception');
        new Parsecsv();
    }
}
