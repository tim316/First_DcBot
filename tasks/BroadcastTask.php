<?php
use phpcord\task\Task;
use phpcord\Discord;
class BroadcastTask extends Task{

    public function __construct()
    {
        parent::__construct(5, true, 5000);
    }
    public function onRun(int $second): void
    {
        Discord::getInstance()->getClient()->getGuild("820991884914589717")->getChannel("820991884914589720")->send(":)");
    }

}