<?php

use SCP\Model\Project;

function formatDateS($date)
{
    return date('d/m/Y', strtotime($date));
}

function qtdTask($idproject)
{
    return count(Project::checkTask($idproject));
}

?>