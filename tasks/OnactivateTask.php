<?php
use phpcord\task\Task;
use phpcord\client\Activity;
use phpcord\client\Client;
class OnactivateTask extends Task{
    public function __construct()
    {
        parent::__construct(3);
    }
    public function onRun(int $second): void{
        $activity = new Activity();
        $client = new Client();
        $activity->setPlaying("Sucht Tims Ehre");
        $client->setActivity($activity);

    }

}