<?php
declare(strict_types=1);
namespace commands;

use phpcord\channel\embed\MessageEmbed;
use phpcord\Discord;
use phpcord\channel\BaseTextChannel;
use phpcord\command\Command;
use phpcord\guild\GuildMessage;

class EmbedCommand extends Command{

    public function __construct()
    {
        parent::__construct("embed");
    }

    public function execute(BaseTextChannel $channel, GuildMessage $message, array $args): void
    {
        $embed = new MessageEmbed();
        $embed->setTitle("Extremer Zertstörer Test");
        $embed->setDescription("Der zerstört alles");
        $embed->setColor("BLUE");
        $embed->setThumbnail("https://toppng.com/uploads/preview/mentalfunny-discord-emoji-funny-discord-server-emojis-115629166650rckyxnyfk.png");
        $channel->send($embed);
    }
}