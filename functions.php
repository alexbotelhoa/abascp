<?php

use Hallyz\Model\Project;

function formatDate($date)
{
    return date('d/m/Y', strtotime($date));
}

function qtdTask($idproject)
{

    return count(Project::checkTask($idproject));

}

?>