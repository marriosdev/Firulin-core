<?php

$listCommand = include("config.php");
$listCommand = $listCommand["sugestList"];

/**
 * [List commands class] 
 * In order for a new command to be recognized 
 * by Firulin, it is necessary to add it to the command switch
 */

Use Firulin\Captain;
use Firulin\Commands\Command;
use Firulin\Commands\Project;
use Firulin\Commands\Cli;
use Firulin\Commands\Hello;

function start($command)
{
    global $listCommand;
    $captain = new Captain();

    if(!in_array($command->type, $listCommand)){
        $command->type = Command::sugest($command->type, $listCommand);
    }

    /**
     * command switch
     */
    switch ($command->type) {
        case 'project':
            $captain->execute(Project::class, $command);                
            break;
        case 'cmd':
            $captain->execute(Cli::class, $command);                
            break;
    }
}


