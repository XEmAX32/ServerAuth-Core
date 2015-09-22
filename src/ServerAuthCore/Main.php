<?php

namespace ServerAuthCore;

use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use ServerAuth\ServerAuth;

class Main extends PluginBase implements Listener{
  
public function onEnable(){
if(ServerAuth::getAPI()->getAPIVersion() == "1.1.0"){
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->getLogger()->info(TextFormat::GREEN . "ServerAuth-Core Enabled!")
}else{
$this->getPluginLoader()->disablePlugin($this);
}
}

public function onDisable(){
$this->getLogger()->info(TextFormat::RED . "ServerAuth-Core Disabled!");
}

public function onPlayerJoin(PlayerJoinEvent $e){
$player = $e->getPlayer();
if(!ServerAuth::getAPI()->isPlayerAuthenticated($player)){
  $player->hidePlayer();
     }
    }
  }
}
