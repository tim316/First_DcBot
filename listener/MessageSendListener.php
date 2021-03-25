<?php
declare(strict_types=1);

namespace listener;

use phpcord\event\EventListener;
use phpcord\event\message\MessageSendEvent;
use phpcord\guild\Emoji;
use phpcord\resource\Config;
use phpcord\resource\YamlConfig;


class MessageSendListener implements EventListener {

    public function onSend(MessageSendEvent $event)
    {
        if ($event->getMessage()->getMember()->isHuman()) {
            $pName = $event->getMessage()->getMember()->getId();
            require "ressources/Database.json";
            $json = file_get_contents("ressources/Database.json");
            $data = json_decode($json, true);
            $messages = $data["messages"] = $data["messages"] + 1;
            $newJson = json_encode($data);
            file_put_contents("ressources/Database.json", $newJson);
            $event->getMessage()->reply("Du hast " . $messages . " Nachrichten geschrieben! YEA BOYYY");



        }
    }
}