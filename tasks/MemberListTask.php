<?php

use phpcord\task\Task;
use phpcord\Discord;
class MemberListTask extends Task
{
    public function __construct()
    {
        parent::__construct(20, true, 600);
    }

    public function onRun(int $second): void
    {
        $users = [];
        $members = [];
        foreach (Discord::getInstance()->getClient()->getGuild("820991884914589717")->getMembers() as $guildMember) {
            if ($guildMember->isHuman()) {
                $users[] = $guildMember;
            }
            $members[] = $guildMember;
        }
        Discord::getInstance()->getClient()->getGuild("820991884914589717")->getChannel("821492678374064210")->setName("Members: ".count($users));
        Discord::getInstance()->getClient()->getGuild("820991884914589717")->getChannel("821492707041738794")->setName("All Members: ".count($members));
        Discord::getInstance()->getClient()->getGuild("820991884914589717")->getChannel("821492678374064210")->update();
        Discord::getInstance()->getClient()->getGuild("820991884914589717")->getChannel("821492707041738794")->update();
    }

}
