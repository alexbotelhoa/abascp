<?php

namespace SCP\Tests\Control;

use PHPUnit\Framework\TestCase;
use SCP\Control\Sql;

class SqlTest extends TestCase
{
    private $sql;

    public function setUp()
    {
        $this->sql = new Sql();
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenInstanciateClass()
    {
        $this->assertInstanceOf(Sql::class, new Sql());
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenQueryConnectDBTrue()
    {
        $result = $this->sql->query("SELECT * FROM tb_projects");

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenSelectConnectDBTrue()
    {
        $result = $this->sql->select("SELECT * FROM tb_projects");

        $this->assertTrue(boolval($result));
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenSelectConnectDBCount()
    {
        $result = $this->sql->select("SELECT * FROM tb_projects");

        $this->assertCount(6, $result[0]);
    }
}