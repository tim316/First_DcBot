<?php
declare(strict_types=1);

use phpcord\Discord;
use phpcord\intents\IntentsManager;
use phpcord\task\TaskManager;
use phpcord\resource\YamlConfig;

require_once __DIR__ . "/src/phpcord/Discord.php";

$discord = new Discord([
    "debugMode" => true,
]);
$discord->setIntents(IntentsManager::allIntentsSum());

require "listener/MessageSendListener.php";
$discord->registerEvents(new \listener\MessageSendListener());
$discord->enableCommandMap();
$discord->getCommandMap()->addPrefix("!");
require "commands/TestCommand.php";
$discord->getCommandMap()->register(new \commands\TestCommand());
require "commands/PingCommand.php";
$discord->getCommandMap()->register(new \commands\PingCommand());
require "commands/EmbedCommand.php";
$discord->getCommandMap()->register(new \commands\EmbedCommand());
require "commands/TestCommand.php";
$discord->getCommandMap()->register(new \commands\TestCommand());
require "tasks/OnactivateTask.php";
TaskManager::getInstance()->submitTask(new OnactivateTask());
require "tasks/BroadcastTask.php";
TaskManager::getInstance()->submitTask(new BroadcastTask());
require "tasks/MemberListTask.php";
TaskManager::getInstance()->submitTask(new MemberListTask());


$discord->login("ODIwNzAwNTg3OTg0MTU4NzUw.YE4-_A.VuF88dBECveAYRN_PJqYZrFIP94");