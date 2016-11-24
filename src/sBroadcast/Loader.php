<?php

namespace sBroadcast;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Loader extends PluginBase {

    public function onEnable() {
        if(!is_dir($this->getDataFolder())) @mkdir($this->getDataFolder());
        $this->saveResource("config.yaml");
         $this->getLogger()->info("§2▪ §fПлагин включен!");
        $config = (new Config($this->getDataFolder() . "config.yaml"))->getAll();
        $this->getServer()->getScheduler()->scheduleRepeatingTask(new MessageTask($this, $config["prefix"], $config["messages"]), (int) $config["seconds"] * 20);
    }

}