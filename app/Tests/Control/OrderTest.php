<?php

namespace SCP\Tests\Control;

use PHPUnit\Framework\TestCase;
use SCP\Control\Order;

class OrderTest extends TestCase
{
    /**
     * @test
     */
    public function shoulBeTrueWhenInstanciateClass()
    {
        $this->assertInstanceOf(Order::class, new Order());
    }

    /**
     * @test
     * @dataProvider valueProvider
     */
    public function shoukBeTrueWhenGetOrderEqual($local, $sort, $expected)
    {
        $result = Order::getOrder($local, $sort);

        $this->assertEquals($expected, $result);
    }

    public function valueProvider()
    {
        return [
            'shouldBeTrueWhenFooFooEqual' => ['local' => 'foo', 'sort' => 'foo', 'expected' => false],

            'shouldBeTrueWhenProjectsFooEqual' => ['local' => 'projects', 'sort' => 'foo', 'expected' => false],
            'shouldBeTrueWhenProjectsIdpprojectDEqual' => ['local' => 'projects', 'sort' => 'ordid', 'expected' => true],
            'shouldBeTrueWhenProjectsDesprojectEqual' => ['local' => 'projects', 'sort' => 'ordproj', 'expected' => true],
            'shouldBeTrueWhenProjectsDtstartEqual' => ['local' => 'projects', 'sort' => 'ordini', 'expected' => true],
            'shouldBeTrueWhenProjectsDtfinishEqual' => ['local' => 'projects', 'sort' => 'ordfim', 'expected' => true],
            'shouldBeTrueWhenProjectsRtprojectEqual' => ['local' => 'projects', 'sort' => 'ordrate', 'expected' => true],
            'shouldBeTrueWhenProjectsStprojectEqual' => ['local' => 'projects', 'sort' => 'ordlate', 'expected' => true],

            'shouldBeTrueWhenTasksFooEqual' => ['local' => 'tasks', 'sort' => 'foo', 'expected' => false],
            'shouldBeTrueWhenTasksIdtaskEqual' => ['local' => 'tasks', 'sort' => 'ordid', 'expected' => true],
            'shouldBeTrueWhenTasksDestaskEqual' => ['local' => 'tasks', 'sort' => 'ordtask', 'expected' => true],
            'shouldBeTrueWhenTasksDesprojectEqual' => ['local' => 'tasks', 'sort' => 'ordproj', 'expected' => true],
            'shouldBeTrueWhenTasksDtstartEqual' => ['local' => 'tasks', 'sort' => 'ordini', 'expected' => true],
            'shouldBeTrueWhenTasksDtfinishEqual' => ['local' => 'tasks', 'sort' => 'ordfim', 'expected' => true],
            'shouldBeTrueWhenTasksSttaskEqual' => ['local' => 'tasks', 'sort' => 'ordsit', 'expected' => true],

            'shouldBeTrueWhenStatusSFooEqual' => ['local' => 'status', 'sort' => 'foo', 'expected' => false],
            'shouldBeTrueWhenStatusSIdprojectEqual' => ['local' => 'status', 'sort' => 'sordid', 'expected' => true],
            'shouldBeTrueWhenStatusSDesprojectEqual' => ['local' => 'status', 'sort' => 'sordproj', 'expected' => true],
            'shouldBeTrueWhenStatusSDtstartEqual' => ['local' => 'status', 'sort' => 'sordini', 'expected' => true],
            'shouldBeTrueWhenStatusSDtfinishEqual' => ['local' => 'status', 'sort' => 'sordfim', 'expected' => true],
            'shouldBeTrueWhenStatusSRtprojectEqual' => ['local' => 'status', 'sort' => 'sordrate', 'expected' => true],
            'shouldBeTrueWhenStatusNIdprojectEqual' => ['local' => 'status', 'sort' => 'nordid', 'expected' => true],
            'shouldBeTrueWhenStatusNDesprojectEqual' => ['local' => 'status', 'sort' => 'nordproj', 'expected' => true],
            'shouldBeTrueWhenStatusNDtstartEqual' => ['local' => 'status', 'sort' => 'nordini', 'expected' => true],
            'shouldBeTrueWhenStatusNDtfinishEqual' => ['local' => 'status', 'sort' => 'nordfim', 'expected' => true],
            'shouldBeTrueWhenStatusNRtprojectEqual' => ['local' => 'status', 'sort' => 'nordrate', 'expected' => true]
        ];
    }
}
