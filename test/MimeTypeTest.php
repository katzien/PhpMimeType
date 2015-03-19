<?php

class MimeTypeTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function returnsCorrectMimeType()
    {
        $this->assertEquals('application/pdf' ,\MimeType\MimeType::getType('file.pdf'));
        $this->assertEquals('application/pdf' ,\MimeType\MimeType::getType('file.PDF'));
        $this->assertEquals('application/pdf' ,\MimeType\MimeType::getType('file.PdF'));
    }

    /** @test */
    public function returnsDefaultIfMimeTypeNotRecognised()
    {
        $this->assertEquals(\MimeType\MimeType::DEFAULT_MIME_TYPE ,\MimeType\MimeType::getType('file.foobar'));
        $this->assertEquals(\MimeType\MimeType::DEFAULT_MIME_TYPE ,\MimeType\MimeType::getType('0'));
    }

    /**
     * @test
     * @expectedException Exception
     * @throws Exception
     */
    public function throwsExceptionIfNoFileNameGiven()
    {
        \MimeType\MimeType::getType('');
    }

    /**
     * @test
     * @dataProvider notAString
     * @expectedException Exception
     * @param mixed $notAString
     * @throws Exception
     */
    public function throwsExceptionIfFileNameNotAString($notAString)
    {
        \MimeType\MimeType::getType($notAString);
    }

    /** Data provider */
    public function notAString()
    {
        return array(
            array(true),
            array(1),
            array(1.5),
            array(new StdClass()),
            array(null),
            array(array('get', 'up')),
            array(-5),
        );
    }
}