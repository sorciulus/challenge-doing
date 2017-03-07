<?php

/**
 * Test della classe Report
 *
 * @author Corrado
 */
namespace Report;

use PHPUnit\Framework\TestCase;

class ReportTest extends TestCase{
    
    /**
     * @covers            \Report\Report\Money::__construct
     * @uses              \Report\Report
     * @expectedException \InvalidArgumentException
     */    
    public function  testExceptionIsRaisedForInvalidConstructorArguments(){
        $this->setExpectedException('InvalidArgumentException');
        new Report(NULL);
    }
    
}
