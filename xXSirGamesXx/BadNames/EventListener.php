<?php

namespace xXSirGamesXx\BadNames;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\Player;
use pocketmine\utils\TextFormat as C;

class EventListener implements Listener {
    private $owner;

    public function __construct(Main $plugin) {
        $this->owner = $plugin;
    }
	
    public function onPreLogin(PlayerPreLoginEvent $e) {
        $player = $e->getPlayer();
        $name = $player->getDisplayName();

        foreach ($this->owner->c->getAll(true) as $bannednames) {
            $checks = stripos($name, $bannednames);
            if($checks !== false) {
				$player->kick(C::RED . "That name is not allowed.");
			}else{
				return true;
            }
        }
    }
		
	
}