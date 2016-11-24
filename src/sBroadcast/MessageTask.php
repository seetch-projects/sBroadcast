<?php

namespace sBroadcast;

use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat;

class MessageTask extends PluginTask {

    private $prefix;
    private $messages;

    public function __construct(Loader $owner, $prefix, $messages) {
        parent::__construct($owner);
        $this->prefix = $prefix;
        $this->messages = $messages;
    }

    public function onRun($currentTick) {
        $message = current($this->messages);
        if(!is_string($message)) {
            reset($this->messages);
            $message = current($this->messages);
        }
        $this->getOwner()->getServer()->broadcastMessage($this->translateColors($this->prefix . " " . $message));
        next($this->messages);
    }

    public function translateColors($message) {
    	$message = str_replace("&0", TextFormat::BLACK, $message);
    	$message = str_replace("&1", TextFormat::DARK_BLUE, $message);
    	$message = str_replace("&2", TextFormat::DARK_GREEN, $message);
    	$message = str_replace("&3", TextFormat::DARK_AQUA, $message);
    	$message = str_replace("&4", TextFormat::DARK_RED, $message);
    	$message = str_replace("&5", TextFormat::DARK_PURPLE, $message);
    	$message = str_replace("&6", TextFormat::GOLD, $message);
    	$message = str_replace("&7", TextFormat::GRAY, $message);
    	$message = str_replace("&8", TextFormat::DARK_GRAY, $message);
    	$message = str_replace("&9", TextFormat::BLUE, $message);
    	$message = str_replace("&a", TextFormat::GREEN, $message);
    	$message = str_replace("&b", TextFormat::AQUA, $message);
    	$message = str_replace("&c", TextFormat::RED, $message);
    	$message = str_replace("&d", TextFormat::LIGHT_PURPLE, $message);
    	$message = str_replace("&e", TextFormat::YELLOW, $message);
    	$message = str_replace("&f", TextFormat::WHITE, $message);
    
    	$message = str_replace("&k", TextFormat::OBFUSCATED, $message);
    	$message = str_replace("&l", TextFormat::BOLD, $message);
    	$message = str_replace("&m", TextFormat::STRIKETHROUGH, $message);
    	$message = str_replace("&n", TextFormat::UNDERLINE, $message);
    	$message = str_replace("&o", TextFormat::ITALIC, $message);
    	$message = str_replace("&r", TextFormat::RESET, $message);
    
    	return $message;
    }

}