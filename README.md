# Firulin-core v1

## From Firulin-core you can create a CLI any way you want, adding new commands easily.
<hr>

### Requeriments

> PHP 7.4^
>
> Composer

<br>
<br>

## Get started

```bash
    composer install
```
<br>

##  Creating new command

## Step 1


###  To create a new command, you can run the command: php firulin cmd: create

<br>

### ex:
```bash
    php firulin cmd:create Hello
```

### Right after this command is executed, a file called "Hello.php" will be created in CLI/src/Commands. And in it we will create a new function called "world"

```php
<?php

namespace Firulin\Commands;

use Firulin\Messages\MessageNormal;
use Firulin\Messages\MessageSuccess;
use Firulin\Messages\MessageError;

class Hello extends Command
{
    //
    public function world()
    {
        echo "Hello World";
    }
}
```

### We just created a new command called "hello" and a subcommand called "world". It is already running? No! We still need to do some little things

<br>

## Step 2


### Now let's go into the config.php file and add some things

### Let's add the command and the subcommand to the "commands" array


```php

    /**
     *  Before creating a new command, you must add it 
     *  to the "commands" array, and to the "suggestList" array
     */
   
    "commands"=>[
        //Command
        "project"=>[
            // SubCommand
            "create"
        ],
        "cmd"=>[
            "create"
        ],
        "hello"=>[
            "world"
        ]
    ]

```

### And then add the command to the "suggestList" array


```php
    /**
     * Command suggestion list
     */
    "suggestList"=>[
        "project",
        "cmd",
        "hello"
    ],
```


<!-- AQUI -->

<br>


## Step 3


### Now in the boundary.php file, let's add the Hello class

```php
Use Firulin\Captain;
use Firulin\Commands\Command;
use Firulin\Commands\Project;
use Firulin\Commands\Cli;
//
use Firulin\Commands\Hello;

```

### And add a case to the switch with the "hello" command and call your class

```php
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
        case 'hello':
            $captain->execute(Hello::class, $command);                
            break;
    }
```

<br>

### Now just run the command: php firulin hello:world. And you will receive:

```bash
    Hello world
```
