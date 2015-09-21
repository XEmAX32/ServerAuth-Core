<?php

namespace ServerAuthCore;

use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use ServerAuth\ServerAuth;

class Main extends PluginBase implements Listener{
  
public function onEnable(){
if(ServerAuth::getAPI()->getAPIVersion() == ""){
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->getLogger()->info(TextFormat::GREEN . "ServerAuth-Core Enabled!")
}else{
$this->getPluginLoader()->disablePlugin($this);
}
}

public function onDisable(){
$this->getLogger()->info(TextFormat::RED . "ServerAuth-Core Disabled!");
}

public function onJoin(){
$player = $e->getPlayer();
$name = $player->getName();
if(!isPlayerRegistered($player)){
foreach($this->getServer()->getOnlinePlayers() as $ps){
$ps->sendMessage(TextFormat::BLUE .  "Welcome $name to this server!");
$effect = Effect::getEffect(Effect::INVISIBLE);
$effect->setVisible(false);
$effect->setAmplifier(1); 
$effect->setDuration(30 * 10 * 3);
$player->addEffect($effect);
     }
    }
  }
}
