<?php

namespace SCP\Tests\Model;

use PHPUnit\Framework\TestCase;
use SCP\Model\Project;

class ProjectTest extends TestCase
{
    private $project;

    public function setUp()
    {
        $this->project = new Project();
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenInstanciateClass()
    {
        $this->assertInstanceOf(Project::class, new Project());
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenListAllTrue()
    {
        $value = Project::listAll();

        $this->assertTrue(boolval($value));
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenListAllLateTrue()
    {
        $value = Project::listAllLate();

        $this->assertTrue(boolval($value));
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenListAllNotLateTrue()
    {
        $value = Project::listAllNotLate();

        $this->assertTrue(boolval($value));
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenListProjectIndexTrue()
    {
        $value = Project::listProjectIndex();

        $this->assertTrue(boolval($value));
    }

    /**
     * @test
     * @dataProvider valueCheckTask
     */
    public function shoulBeTrueWhenCheckTask($id, $expected)
    {
        $result = Project::checkTask($id);

        $this->assertEquals($expected, boolval($result));
    }

    public function valueCheckTask()
    {
        return [
            'shoulBeTrueWhenCheckTaskEmpty' => ['id' => 'foo', 'expected' => false],
            'shoulBeTrueWhenCheckTaskFalse' => ['id' => 0, 'expected' => false],
            'shoulBeTrueWhenCheckTaskTrue' => ['id' => 1, 'expected' => true]
        ];
    }

    /**
     * @test
     * @dataProvider valueUpdateRate
     */
    public function shoulBeTrueWhenUpdateRate($id, $expected)
    {
        $result = Project::updateRate($id);

        $this->assertEquals($expected, boolval($result));
    }

    public function valueUpdateRate()
    {
        return [
            'shoulBeTrueWhenUpdateRateEmpty' => ['id' => 'foo', 'expected' => false],
            'shoulBeTrueWhenUpdateRateFalse' => ['id' => 0, 'expected' => false],
            'shoulBeTrueWhenUpdateRateTrue' => ['id' => 1, 'expected' => true]
        ];
    }

    /**
     * @test
     * @dataProvider valueUpdateRate
     */
    public function shoulBeTrueWhenUpdateLate($id, $expected)
    {
        $result = Project::updateLate($id);

        $this->assertEquals($expected, boolval($result));
    }

    public function valueUpdateLate()
    {
        return [
            'shoulBeTrueWhenUpdateLateEmpty' => ['id' => 'foo', 'expected' => false],
            'shoulBeTrueWhenUpdateLateFalse' => ['id' => 0, 'expected' => false],
            'shoulBeTrueWhenUpdateLateTrue' => ['id' => 1, 'expected' => true]
        ];
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenSaveProjectCount()
    {
        $value = $this->project->save(0);

        $this->assertCount(6, $value[0]);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenGetProjectCount()
    {
        $value = $this->project->get(1);

        $this->assertCount(6, $value[0]);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenDeleteProjectTrue()
    {
        $value = $this->project->delete();

        $this->assertTrue($value);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenCheckListCount()
    {
        $content = [
            [
                "foo0" => 'foo',
                "foo1" => 'foo',
                "foo2" => 'foo'
            ]
        ];

        $value = Project::checkList($content);

        $this->assertCount(3, $value[0]);
    }

    /**
     * @test
     */
    public function shoulBeTrueWhenGetProjectPageCount()
    {
        $value = $this->project->getProjectPage("idproject ASC", 1, 1);

        $this->assertCount(3, $value);
        $this->assertCount(6, $value['data'][0]);
    }
}