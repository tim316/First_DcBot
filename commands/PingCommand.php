<?php
declare(strict_types=1);
namespace commands;
use phpcord\channel\BaseTextChannel;
use phpcord\command\Command;
use phpcord\guild\GuildMessage;
use phpcord\task\Task;
use phpcord\Discord;

class PingCommand extends Command{

    public function __construct()
    {
        parent::__construct("ping");
    }

    public function execute(BaseTextChannel $channel, GuildMessage $message, array $args): void
    {
        $ping = Discord::getInstance()->getClient()->getPing();
        $message->reply("Dein Ping ist ". $ping);
    }
}