<?php

namespace Hallyz\Model;

use Hallyz\Model;

class Order extends Model
{

    public static function getOrder($local, $sort)
    {

        if ($local == "projects") {

            switch ($sort) {

                case "ordid":
                    $_SESSION['SortProjectByField'] = "idproject";
                    break;
                case "ordproj":
                    $_SESSION['SortProjectByField'] = "desproject";
                    break;
                case "ordini":
                    $_SESSION['SortProjectByField'] = "dtstart";
                    break;
                case "ordfim":
                    $_SESSION['SortProjectByField'] = "dtfinish";
                    break;
                case "ordrate":
                    $_SESSION['SortProjectByField'] = "rtproject";
                    break;
                case "ordlate":
                    $_SESSION['SortProjectByField'] = "stproject";
                    break;

            }

        }

        if ($local == "tasks") {

            switch ($sort) {

                case "ordid":
                    $_SESSION['SortTaskByField'] = "idtask";
                    break;
                case "ordtask":
                    $_SESSION['SortTaskByField'] = "destask";
                    break;
                case "ordproj":
                    $_SESSION['SortTaskByField'] = "desproject";
                    break;
                case "ordini":
                    $_SESSION['SortTaskByField'] = "a.dtstart";
                    break;
                case "ordfim":
                    $_SESSION['SortTaskByField'] = "a.dtfinish";
                    break;
                case "ordsit":
                    $_SESSION['SortTaskByField'] = "sttask";
                    break;

            }

        }

        if ($local == "status") {

            switch ($sort) {

                case "sordid":
                    $_SESSION['SortLateByField'] = "idproject";
                    break;
                case "sordproj":
                    $_SESSION['SortLateByField'] = "desproject";
                    break;
                case "sordini":
                    $_SESSION['SortLateByField'] = "dtstart";
                    break;
                case "sordfim":
                    $_SESSION['SortLateByField'] = "dtfinish";
                    break;
                case "sordrate":
                    $_SESSION['SortLateByField'] = "rtproject";
                    break;
                case "nordid":
                    $_SESSION['SortNotLateByField'] = "idproject";
                    break;
                case "nordproj":
                    $_SESSION['SortNotLateByField'] = "desproject";
                    break;
                case "nordini":
                    $_SESSION['SortNotLateByField'] = "dtstart";
                    break;
                case "nordfim":
                    $_SESSION['SortNotLateByField'] = "dtfinish";
                    break;
                case "nordrate":
                    $_SESSION['SortNotLateByField'] = "rtproject";
                    break;

            }

        }

        return true;

    }

}