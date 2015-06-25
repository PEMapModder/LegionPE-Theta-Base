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

namespace legionpe\theta\command\override;

use legionpe\theta\BasePlugin;
use legionpe\theta\command\admin\ModeratorCommand;
use pocketmine\command\CommandSender;

class MBCommand extends ModeratorCommand{
	public function __construct(BasePlugin $main){
		parent::__construct($main, "mb", "Deprecated command, use /warn instead", "Deprecated command, use /warn instead", ["ban"]);
	}
	public function execute(CommandSender $sender, $commandLabel, array $args){
		return false;
	}
}
