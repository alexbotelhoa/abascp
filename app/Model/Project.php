<?php

namespace SCP\Model;

use SCP\Model;
use SCP\Control\Sql;

class Project extends Model
{
    public static function listAll()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_projects ORDER BY desproject ASC");
    }

    public static function listAllLate($order = "idproject")
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_projects WHERE stproject = 1 ORDER BY " . $order . " ");
    }

    public static function listAllNotLate($order = "idproject")
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_projects WHERE stproject = 0 ORDER BY " . $order . " ");
    }

    public static function listProjectIndex()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_projects ORDER BY idproject DESC LIMIT 6");
    }

    public static function checkTask($idproject)
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_tasks WHERE idproject = :IDPROJECT", [
            ":IDPROJECT" => $idproject
        ]);
    }

    public static function updateRate($idproject)
    {
        $sql = new Sql();
        $result = $sql->select("
            SELECT 
                (
                    SELECT count(*)
                    FROM tb_tasks
                    WHERE sttask = 0 AND idproject = :IDPROJECT
                    GROUP BY sttask
                ) AS open,
                (
                    SELECT count(*)
                    FROM tb_tasks
                    WHERE sttask = 1 AND idproject = :IDPROJECT
                    GROUP BY sttask
                ) AS close                
            FROM tb_projects
            WHERE idproject = :IDPROJECT;
        ", [
            ":IDPROJECT" => $idproject
        ]);

        $qtdopen = 0;
        $qtdclose = 0;

        if (isset($result[0])) {$qtdopen = $result[0]['open']; $qtdclose = $result[0]['close'];}

        Project::callUpdateRate((int)$idproject, $qtdopen, $qtdclose);

        return $result;
    }

    public static function callUpdateRate($idproject, $qtdopen, $qtdclose)
    {
        (($qtdopen + $qtdclose) == 0 || $qtdclose == 0) ? $rate = 0 : $rate = round(($qtdclose * 100) / ($qtdopen + $qtdclose));

        $sql = new Sql();
        $result = $sql->select("CALL sp_rate_update(:idproject, :rtproject)", [
            ":idproject" => $idproject,
            ":rtproject" => (int)$rate
        ]);

        return $result;
    }

    public static function updateLate($idproject)
    {
        $sql = new Sql();
        $result =$sql->select("CALL sp_late_update(:idproject)", [
            ":idproject" => $idproject
        ]);

        return $result;
    }



  //************************************************************************************//
 //                                  FIM DOS STATICOS                                  //
//************************************************************************************//

    public function getValues()
    {
        return parent::getValues();
    }

    public function save($idproject = '')
    {
        if ($idproject == '') $idproject = $this->getidproject();

        $sql = new Sql();
        $result = $sql->select("CALL sp_projects_save(:idproject, :desproject, :dtstart, :dtfinish, :rtproject, :stproject)", [
            ":idproject" => $idproject,
            ":desproject" => $this->getdesproject(),
            ":dtstart" => $this->getdtstart(),
            ":dtfinish" => $this->getdtfinish(),
            ":rtproject" => $this->getrtproject(),
            ":stproject" => $this->getstproject()
        ]);

        if (count($result) > 0) $this->setData($result[0]);

        return $result;
    }

    public function get($idproject)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_projects WHERE idproject = :IDPROJECT", [
            ":IDPROJECT" => $idproject
        ]);

        if (count($result) > 0) $this->setData($result[0]);

        return $result;
    }

    public function delete()
    {
        $sql = new Sql();
        $result = $sql->query("DELETE FROM tb_projects WHERE idproject = :IDPROJECT", [
            ":IDPROJECT" => $this->getidproject()
        ]);

        return $result;
    }

    public static function checkList($list)
    {
        foreach ($list as &$row) {
            $p = new Project();
            $p->setData($row);
            $row = $p->getValues();
        }

        return $list;
    }

    public function getProjectPage($sort, $page = 1, $itemsPerPage = 6)
    {
        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();
        $resultProjects = $sql->select("
            SELECT SQL_CALC_FOUND_ROWS * 
            FROM tb_projects 
            ORDER BY " . $sort . " 
            LIMIT $start, $itemsPerPage");

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal");

        return [
            'data' => Project::checkList($resultProjects),
            'total' => (int)$resultTotal[0]['nrtotal'],
            'pages' => ceil($resultTotal[0]['nrtotal'] / $itemsPerPage)
        ];
    }
}