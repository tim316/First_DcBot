<?php

namespace phpcord\guild;

use phpcord\channel\ChannelType;

class IncompleteChannel {
	/** @var string $id */
	protected $id;
	
	/** @var string $name */
	protected $name;
	
	/** @var int $type */
	protected $type;
	
	/** @var string $guildId */
	protected $guildId;
	
	/**
	 * IncompleteChannel constructor.
	 *
	 * @param string $guildId
	 * @param string $id
	 * @param string $name
	 * @param int $type
	 */
	public function __construct(string $guildId, string $id, string $name, int $type = ChannelType::TYPE_TEXT) {
		$this->id = $id;
		$this->guildId = $guildId;
		$this->name = $name;
		$this->type = $type;
		$this->guildId = $guildId;
	}
	
	/**
	 * Returns the name of the channel
	 *
	 * @api
	 *
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * Returns the ID of the channel
	 *
	 * @api
	 *
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}
	
	/**
	 * Returns the type of the channel @see ChannelType
	 *
	 * @api
	 *
	 * @return int
	 */
	public function getType(): int {
		return $this->type;
	}
}