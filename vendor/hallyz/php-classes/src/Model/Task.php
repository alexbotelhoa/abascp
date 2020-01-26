<?php

namespace Hallyz\Model;

use Hallyz\DB\Sql;
use Hallyz\Model;

class Task extends Model
{

    public static function listAll($ordem)
    {

        $sql = new Sql();

        return $sql->select("SELECT *, a.dtstart, a.dtfinish FROM tb_tasks a INNER JOIN tb_projects b USING(idproject) ORDER BY " . $ordem . " ASC");

    }

    public static function listTaskIndex()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_tasks WHERE sttask = 0 ORDER BY dtfinish ASC LIMIT 6");

    }

    public static function checkList($list)
    {

        foreach ($list as &$row) {

            $p = new Task();

            $p->setData($row);

            $row = $p->getValues();

        }

        return $list;

    }


  //************************************************************************************//
 //                                  FIM DOS STATICOS                                  //
//************************************************************************************//

    public function save()
    {

        $sql = new Sql();

        $result = $sql->select("CALL sp_tasks_save(:idtask, :idproject, :destask, :dtstart, :dtfinish, :sttask)", [
            ":idtask" => $this->getidtask(),
            ":idproject" => $this->getidproject(),
            ":destask" => $this->getdestask(),
            ":dtstart" => $this->getdtstart(),
            ":dtfinish" => $this->getdtfinish(),
            ":sttask" => $this->getsttask()
        ]);

        if (count($result) > 0) {

            $this->setData($result[0]);

        }

    }

    public function get($idtask)
    {

        $sql = new Sql();

        $result = $sql->select("SELECT *, a.dtstart, a.dtfinish FROM tb_tasks a INNER JOIN tb_projects b USING(idproject) WHERE idtask = :IDTASK", [
            ":IDTASK" => $idtask
        ]);

        if (count($result) > 0) {

            $this->setData($result[0]);

        }

    }

    public function situation($idtask, $situation)
    {

        $sql = new Sql();

        $sql->query("UPDATE tb_tasks SET sttask = :STTASK WHERE idtask = :IDTASK", [
            ":STTASK" => $situation,
            ":IDTASK" => $idtask
        ]);

    }

    public function delete()
    {

        $sql = new Sql();

        $sql->query("DELETE FROM tb_tasks WHERE idtask = :IDTASK", [
            ":IDTASK" => $this->getidtask()
        ]);

    }

    public function getValues()
    {

        return parent::getValues();

    }

    public function getTaskPage($ordem, $page = 1, $itemsPerPage = 6)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

        $resultTasks = $sql->select("
            SELECT SQL_CALC_FOUND_ROWS *, a.dtstart, a.dtfinish 
            FROM tb_tasks a 
            INNER JOIN tb_projects b USING(idproject) 
            ORDER BY " . $ordem . " ASC 
            LIMIT $start, $itemsPerPage");

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal");

        return [
            'data' => Task::checkList($resultTasks),
            'total' => (int)$resultTotal[0]['nrtotal'],
            'pages' => ceil($resultTotal[0]['nrtotal'] / $itemsPerPage)
        ];

    }

}