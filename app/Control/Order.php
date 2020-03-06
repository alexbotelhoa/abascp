<?php

namespace SCP\Control;

class Order
{
    public static function getOrder($local, $sort)
    {
        if (!isset($_SESSION['LastField'])) {
            $_SESSION['LastField'] = "ASC";
        }
        if (!isset($_SESSION['SortProjectByOrder'])) {
            $_SESSION['SortProjectByOrder'] = "ASC";
        }
        if (!isset($_SESSION['SortTaskByOrder'])) {
            $_SESSION['SortTaskByOrder'] = "ASC";
        }
        if (!isset($_SESSION['SortLateByOrder'])) {
            $_SESSION['SortLateByOrder'] = "ASC";
        }
        if (!isset($_SESSION['SortNotLateByOrder'])) {
            $_SESSION['SortNotLateByOrder'] = "ASC";
        }

        if ($local == "projects") {
            ($_SESSION['LastField'] == $sort && $_SESSION['SortProjectByOrder'] == "ASC") ? $order = "DESC" : $order = "ASC";
            $_SESSION['SortProjectByOrder'] = $order;

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
                default:
                    $sort = false;
            }
        }

        if ($local == "tasks") {
            ($_SESSION['LastField'] == $sort && $_SESSION['SortTaskByOrder'] == "ASC") ? $order = "DESC" : $order = "ASC";
            $_SESSION['SortTaskByOrder'] = $order;

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
                default:
                    $sort = false;
            }
        }

        if ($local == "status") {
            ($_SESSION['LastField'] == $sort && $sort[0] == 's' && $_SESSION['SortLateByOrder'] == "ASC") ? $orderL = "DESC" : $orderL = "ASC";
            $_SESSION['SortLateByOrder'] = $orderL;

            ($_SESSION['LastField'] == $sort && $sort[0] == 'n' && $_SESSION['SortNotLateByOrder'] == "ASC") ? $orderNL = "DESC" : $orderNL = "ASC";
            $_SESSION['SortNotLateByOrder'] = $orderNL;

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
                default:
                    $sort = false;
            }
        }

        if ($sort != false) $_SESSION['LastField'] = $sort;

        (in_array($local, ['projects', 'tasks', 'status']) && $sort != false) ? $return = true : $return = false;

        return $return;
    }
}