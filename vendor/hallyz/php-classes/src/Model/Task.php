<?php

namespace Hallyz\Model;

use Hallyz\DB\Sql;
use Hallyz\Model;

class Task extends Model
{

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT *, a.dtstart, a.dtfinish FROM tb_tasks a INNER JOIN tb_projects b USING(idproject) ORDER BY destask");

    }

    public function save()
    {

        $sql = new Sql();

        $result = $sql->select("CALL sp_tasks_save(:idtask, :idproject, :destask, :dtstart, :dtfinish, :sttask)", array(
            ":idtask" => $this->getidtask(),
            ":idproject" => $this->getidproject(),
            ":destask" => $this->getdestask(),
            ":dtstart" => $this->getdtstart(),
            ":dtfinish" => $this->getdtfinish(),
            ":sttask" => $this->getsttask()
        ));

        if (count($result) > 0) {

            $this->setData($result[0]);

        }

    }

    public function get($idtask)
    {

        $sql = new Sql();

        $result = $sql->select("SELECT *, a.dtstart, a.dtfinish FROM tb_tasks a INNER JOIN tb_projects b USING(idproject) WHERE idtask = :IDTASK", array(
            ":IDTASK" => $idtask
        ));

        if (count($result) > 0) {

            $this->setData($result[0]);

        }

    }

    public function situation($idtask, $situation)
    {

        $sql = new Sql();

        $sql->query("UPDATE tb_tasks SET sttask = :STTASK WHERE idtask = :IDTASK", array(
            ":STTASK" => $situation,
            ":IDTASK" => $idtask
        ));

    }

    public function delete()
    {

        $sql = new Sql();

        $sql->query("DELETE FROM tb_tasks WHERE idtask = :IDTASK", array(
            ":IDTASK" => $this->getidtaskt()
        ));

    }

    public function getValues()
    {

        return parent::getValues();

    }

}