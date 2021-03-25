<?php
namespace commands;
use phpcord\channel\BaseTextChannel;
use phpcord\command\Command;
use phpcord\guild\GuildMessage;
use phpcord\task\TaskManager;

class CountCommand extends Command{

    public function __construct(string $name, array $aliases = [])
    {
        parent::__construct("start");
    }

    public function execute(BaseTextChannel $channel, GuildMessage $message, array $args): void
    {
        require "tasks/CountdownTask.php";
        TaskManager::getInstance()->submitTask(new \CountdownTask());

    }
}