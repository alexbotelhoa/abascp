<?php

namespace SCP\Tests\Control;

use PHPUnit\Framework\TestCase;
use SCP\Control\Message;

class MessageTest extends TestCase
{
    /**
     * @test
     */
    public function shoulBeTrueWhenInstanciateClass()
    {
        $this->assertInstanceOf(Message::class, new Message());
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenSetErrorEqual()
    {
        $msg = Message::setError("foo");

        $this->assertEquals("foo", $msg);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenGetErrorEqual()
    {
        $msg = Message::getError();

        $this->assertEquals("foo", $msg);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenClearErrorEqual()
    {
        $msg = Message::clearError();

        $this->assertNull($msg);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenSetSuccessEqual()
    {
        $msg = Message::setSuccess("foo");

        $this->assertEquals("foo", $msg);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenGetSuccessEqual()
    {
        $msg = Message::getSuccess();

        $this->assertEquals("foo", $msg);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenClearSuccessEqual()
    {
        $msg = Message::clearSuccess();

        $this->assertNull($msg);
    }
}
