<?php
declare(strict_types=1);
namespace commands;
use phpcord\channel\BaseTextChannel;
use phpcord\command\Command;
use phpcord\guild\GuildMessage;

class TestCommand extends Command{
    public function __construct()
    {
        parent::__construct("test");
    }

    public function execute(BaseTextChannel $channel, GuildMessage $message, array $args): void
    {
        $message->reply("Dein Cock ist riesig man!");
    }
}