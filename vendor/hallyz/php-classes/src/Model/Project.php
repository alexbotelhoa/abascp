<?php

namespace Hallyz\Model;

use Hallyz\DB\Sql;
use Hallyz\Model;

class Project extends Model
{

    public static function listAll($ordem = "desproject")
    {

        switch ($ordem) {

            case "ordid":
                $ordem = "idproject";
                break;
            case "ordproj":
                $ordem = "desproject";
                break;
            case "ordini":
                $ordem = "dtstart";
                break;
            case "ordfim":
                $ordem = "dtfinish";
                break;
            case "ordrate":
                $ordem = "rtproject";
                break;
            case "ordlate":
                $ordem = "stproject";
                break;

        }

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_projects ORDER BY " . $ordem . " ASC");

    }

    public static function listAllLate($ordem = "idproject")
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_projects WHERE stproject = 1 ORDER BY " . $ordem . " ASC");

    }

    public static function listAllNotLate($ordem = "idproject")
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_projects WHERE stproject = 0 ORDER BY " . $ordem . " ASC");

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

        if (isset($result[0])) {$qtdopen = $result[0]['open']; $qtdclose = $result[0]['close'];} else {$qtdopen = 0; $qtdclose = 0;}

        if (($qtdopen + $qtdclose) === 0) {

            $rate = 0;

        } else {

            $rate = round(($qtdclose * 100) / ($qtdopen + $qtdclose));

        }

        $sql->select("CALL sp_rate_update(:idproject, :rtproject)", [
            ":idproject" => $idproject,
            ":rtproject" => (int)$rate
        ]);

    }



  //************************************************************************************//
 //                                  FIM DOS STATICOS                                  //
//************************************************************************************//

    public function save()
    {

        $sql = new Sql();

        $result = $sql->select("CALL sp_projects_save(:idproject, :desproject, :dtstart, :dtfinish, :rtproject, :stproject)", [
            ":idproject" => $this->getidproject(),
            ":desproject" => $this->getdesproject(),
            ":dtstart" => $this->getdtstart(),
            ":dtfinish" => $this->getdtfinish(),
            ":rtproject" => $this->getrtproject(),
            ":stproject" => $this->getstproject()
        ]);

        if (count($result) > 0) {

            $this->setData($result[0]);

        }

    }

    public function get($idproject)
    {

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_projects WHERE idproject = :IDPROJECT", [
            ":IDPROJECT" => $idproject
        ]);

        if (count($result) > 0) {

            $this->setData($result[0]);

        }

    }

    public function delete()
    {

        $sql = new Sql();

        $sql->query("DELETE FROM tb_projects WHERE idproject = :IDPROJECT", [
            ":IDPROJECT" => $this->getidproject()
        ]);

    }

    public function getValues()
    {

        return parent::getValues();

    }

}