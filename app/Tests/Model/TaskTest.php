<?php

namespace SCP\Tests\Model;

use PHPUnit\Framework\TestCase;
use SCP\Model\Task;

class TaskTest extends TestCase
{
    private $task;

    public function setUp()
    {
        $this->task = new Task();
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenInstanciateClass()
    {
        $this->assertInstanceOf(Task::class, new Task());
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenListAllTrue()
    {
        $value = Task::listAll();

        $this->assertTrue(boolval($value));
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenListTaskIndexTrue()
    {
        $value = Task::listTaskIndex();

        $this->assertTrue(boolval($value));
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenCheckList()
    {
        $content = [
            [
                "foo0" => 'foo',
                "foo1" => 'foo',
                "foo2" => 'foo'
            ]
        ];

        $value = Task::checkList($content);

        $this->assertCount(3, $value[0]);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenSaveTaskCount()
    {
        $value = $this->task->save(0);

        $this->assertCount(6, $value[0]);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenGetTaskCount()
    {
        $value = $this->task->get(1);

        $this->assertCount(9, $value[0]);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenSituationTaskTrue()
    {
        $value = $this->task->situation('', 0);

        $this->assertTrue($value);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenDeleteTaskTrue()
    {
        $value = $this->task->delete();

        $this->assertTrue($value);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenGetTaskPageCount()
    {
        $value = $this->task->getTaskPage("idtask ASC", 1, 1);

        $this->assertCount(3, $value);
        $this->assertCount(9, $value['data'][0]);
    }
}