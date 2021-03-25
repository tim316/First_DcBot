<?php

namespace phpcord\intents\handlers;

use phpcord\Discord;
use phpcord\event\member\ReactionAddEvent;
use phpcord\event\member\ReactionRemoveAllEvent;
use phpcord\guild\Emoji;
use phpcord\event\member\ReactionRemoveEvent;
use phpcord\utils\MemberInitializer;
use function var_dump;

class ReactionHandler extends BaseIntentHandler {
	public function getIntents(): array {
		return ["MESSAGE_REACTION_ADD", "MESSAGE_REACTION_REMOVE", "MESSAGE_REACTION_REMOVE_ALL", "MESSAGE_REACTION_REMOVE_EMOJI",];
	}

	public function handle(Discord $discord, string $intent, array $data) {
		switch ($intent) {
			case "MESSAGE_REACTION_ADD":
				(new ReactionAddEvent(MemberInitializer::createMember($data["member"], $data["guild_id"] ?? $data["user_id"]), $data["message_id"], $data["channel_id"] ?? $data["user_id"], new Emoji($data["emoji"]["name"] ?? "", @$data["emoji"]["id"])))->call();
				break;

			case "MESSAGE_REACTION_REMOVE":
				(new ReactionRemoveEvent($data["user_id"], $data["message_id"], $data["guild_id"] ?? $data["user_id"] ?? "-", $data["guild_id"] ?? $data["user_id"] ?? "-", new Emoji($data["emoji"]["name"], @$data["emoji"]["id"])))->call();
				break;

			case "MESSAGE_REACTION_REMOVE_ALL":
				(new ReactionRemoveAllEvent($data["message_id"], $data["channel_id"] ?? $data["user_id"] ?? "-", $data["guild_id"] ?? $data["user_id"] ?? "-"))->call();
				break;

			case "MESSAGE_REACTION_REMOVE_EMOJI":

				break;
		}
	}
}


