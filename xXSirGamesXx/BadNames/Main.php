<?php

namespace xXSirGamesXx\BadNames;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;

class Main extends PluginBase{

	public function onEnable(){
		@mkdir($this->getDataFolder());

		$this->saveDefaultConfig();
        $this->reloadConfig();		
		$this->getLogger()->info("Hello World!");
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->c = new Config($this->getDataFolder() . "names.txt", Config::ENUM);
	}

	public function onDisable(){
		$this->getLogger()->info("Bye");
	}
}