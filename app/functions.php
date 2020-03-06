<?php

use SCP\Model\Project;

function project()
{
    return "/abascp1";
}

function formatDateS($date)
{
    return date('d/m/Y', strtotime($date));
}

function qtdTask($idproject)
{
    return count(Project::checkTask($idproject));
}

?>