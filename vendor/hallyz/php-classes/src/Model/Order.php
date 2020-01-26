<?php

namespace Hallyz\Model;

use Hallyz\Model;

class Order extends Model
{

    public static function getOrder($local, $order)
    {

        if ($local == "projects") {

            switch ($order) {

                case "ordid":
                    $_SESSION['ordemproject'] = "idproject";
                    break;
                case "ordproj":
                    $_SESSION['ordemproject'] = "desproject";
                    break;
                case "ordini":
                    $_SESSION['ordemproject'] = "dtstart";
                    break;
                case "ordfim":
                    $_SESSION['ordemproject'] = "dtfinish";
                    break;
                case "ordrate":
                    $_SESSION['ordemproject'] = "rtproject";
                    break;
                case "ordlate":
                    $_SESSION['ordemproject'] = "stproject";
                    break;

            }

        }

        if ($local == "tasks") {

            switch ($order) {

                case "ordid":
                    $_SESSION['ordemtask'] = "idtask";
                    break;
                case "ordtask":
                    $_SESSION['ordemtask'] = "destask";
                    break;
                case "ordproj":
                    $_SESSION['ordemtask'] = "desproject";
                    break;
                case "ordini":
                    $_SESSION['ordemtask'] = "a.dtstart";
                    break;
                case "ordfim":
                    $_SESSION['ordemtask'] = "a.dtfinish";
                    break;
                case "ordsit":
                    $_SESSION['ordemtask'] = "sttask";
                    break;

            }

        }

        if ($local == "status") {

            switch ($order) {

                case "sordid":
                    $_SESSION['ordemlate'] = "idproject";
                    break;
                case "sordproj":
                    $_SESSION['ordemlate'] = "desproject";
                    break;
                case "sordini":
                    $_SESSION['ordemlate'] = "dtstart";
                    break;
                case "sordfim":
                    $_SESSION['ordemlate'] = "dtfinish";
                    break;
                case "sordrate":
                    $_SESSION['ordemlate'] = "rtproject";
                    break;
                case "nordid":
                    $_SESSION['ordemnotlate'] = "idproject";
                    break;
                case "nordproj":
                    $_SESSION['ordemnotlate'] = "desproject";
                    break;
                case "nordini":
                    $_SESSION['ordemnotlate'] = "dtstart";
                    break;
                case "nordfim":
                    $_SESSION['ordemnotlate'] = "dtfinish";
                    break;
                case "nordrate":
                    $_SESSION['ordemnotlate'] = "rtproject";
                    break;

            }

        }

        return true;

    }

}