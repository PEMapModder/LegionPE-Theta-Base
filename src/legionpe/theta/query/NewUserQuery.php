<?php

/**
 * Theta
 * Copyright (C) 2015 PEMapModder
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace legionpe\theta\query;

use legionpe\theta\BasePlugin;
use pocketmine\Player;
use pocketmine\Server;

class NewUserQuery extends NextIdQuery{
//	/** @var BasePlugin */
//	private $main;
	/** @var int */
	private $sesId;
	public function __construct(BasePlugin $plugin, Player $player){
		$this->sesId = $player->getId();
		parent::__construct($plugin, self::USER);
	}
	public function onCompletion(Server $server){
//		$main = $this->main;
		$main = BasePlugin::getInstance($server);
		$result = $this->getResult();
		$uid = $result["result"]["id"];
		foreach($main->getServer()->getOnlinePlayers() as $player){
			if($player->getId() === $this->sesId){
				break;
			}
		}
		if(!isset($player)){
			return;
		}
		$main->newSession($player, BasePlugin::getDefaultLoginData($uid, $player));
	}
}
