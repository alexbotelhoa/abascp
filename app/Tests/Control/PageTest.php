<?php

namespace SCP\Tests\Control;

use PHPUnit\Framework\TestCase;
use SCP\Control\Page;

class PageTest extends TestCase
{
    /**
     * @test
     */
    public function shoulBeTrueWhenInstanciateClass()
    {
        $this->assertInstanceOf(Page::class, new Page(["header" => false, "footer" => false]));
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenSetTplNull()
    {
        $page = new Page([
            "header" => false,
            "footer" => false
        ],
            "C:/xampp/htdocs/abascp1/app/Views");

        $value = $page->setTpl('test', ["foo1" => '', "foo2" => ''], true);

        $this->assertNull($value);
    }
}
