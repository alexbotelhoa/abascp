<?php

namespace Hallyz\Model;

use Hallyz\DB\Sql;
use Hallyz\Model;

class Project extends Model
{

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_projects ORDER BY desproject");

    }

    public static function listAllLate()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_projects WHERE stproject = 1 ORDER BY desproject");

    }

    public static function listAllNotLate()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_projects WHERE stproject = 0 ORDER BY desproject");

    }

    public static function checkTask($idproject)
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_tasks WHERE idproject = :IDPROJECT", array(
            ":IDPROJECT" => $idproject
        ));

    }



  //************************************************************************************//
 //                                  FIM DOS STATICOS                                  //
//************************************************************************************//

    public function save()
    {

        $sql = new Sql();

        $result = $sql->select("CALL sp_projects_save(:idproject, :desproject, :dtstart, :dtfinish, :rtproject, :stproject)", array(
            ":idproject" => $this->getidproject(),
            ":desproject" => $this->getdesproject(),
            ":dtstart" => $this->getdtstart(),
            ":dtfinish" => $this->getdtfinish(),
            ":rtproject" => $this->getrtproject(),
            ":stproject" => $this->getstproject()
        ));

        if (count($result) > 0) {

            $this->setData($result[0]);

        }

    }

    public function get($idproject)
    {

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_projects WHERE idproject = :IDPROJECT", array(
            ":IDPROJECT" => $idproject
        ));

        if (count($result) > 0) {

            $this->setData($result[0]);

        }

    }

    public function delete()
    {

        $sql = new Sql();

        $sql->query("DELETE FROM tb_projects WHERE idproject = :IDPROJECT", array(
            ":IDPROJECT" => $this->getidproject()
        ));

    }

    public function getValues()
    {

        return parent::getValues();

    }

}