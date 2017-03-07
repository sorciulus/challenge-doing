<?php

namespace Currency;

use PHPUnit\Framework\TestCase;

/**
 * Description of CurrencyTest
 *
 * @author Corrado
 */

class CurrencyTest extends TestCase{
    
    
    /**
     * @covers            \Currency\setCurrencyValue
     * @uses              \Currency
     * @expectedException \Exception
     */    
    public function  testSetCurrencyValueExceptionInvalidValue(){
        $this->setExpectedException('Exception');
        $v = new Currency();
        $v->setCurrencyValue("%");
    }
    
    /**
     * @covers            \Currency\convert
     * @uses              \Currency
     * @expected          \Currency\Exchange\ExchangeInterface
     */     
    public function testConvertCurrencyReturnInstaceOfExchange(){
        
        $v = new Currency();
        $v->setCurrencyValue("€110.00");
        $this->assertInstanceOf('Currency\Exchange\ExchangeInterface', $v->convert());
    }
}
