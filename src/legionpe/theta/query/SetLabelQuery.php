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

use legionpe\theta\Session;
use pocketmine\Server;

class SetLabelQuery extends AsyncQuery{
	/** @var Session */
	private $session;
	/** @var int */
	private $uid, $lid;
	public function __construct(Session $session, $lid){
		$this->session = $session;
		$this->uid = $session->getUid();
		$this->lid = $lid;
		parent::__construct($session->getMain());
	}
	public function getResultType(){
		return self::TYPE_RAW;
	}
	public function getQuery(){
		return "UPDATE users SET lid=$this->lid WHERE uid=$this->uid";
	}
	public function onCompletion(Server $server){
		$this->session->recalculateNametag();
	}
}
