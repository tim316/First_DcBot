<?php
use phpcord\task\Task;
use phpcord\Discord;
class CountdownTask extends Task{
    public $time = 10;

    public function __construct(int $delay = 0, bool $repeating = false, int $interval = 1)
    {
        parent::__construct($delay, $repeating, $interval);
    }


    public function onRun(int $second): void
    {
        $this->time--;
        Discord::getInstance()->getClient()->getGuild("820991884914589717")->getChannel("820991884914589720")->send($this->time);
        if ($this->time == 0){
            \phpcord\task\TaskManager::getInstance()->getTask()->cancel();
        }
    }
}