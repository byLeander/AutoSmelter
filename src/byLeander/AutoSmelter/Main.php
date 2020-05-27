<?php

namespace byLeander\AutoSmelter;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\Player;
use pocketmine\inventory\Inventory;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\level\sound\FizzSound;
use pocketmine\command\{
	Command,
	CommandSender,
	CommandMap
};
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {

	public function onEnable()
	{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
		if($command->getName() == "autosmelter"){
			$sender->sendMessage("§7-------------------------\n\n§7Plugin made and developed by §4byLeander\n\n§7-------------------------");
			return true;
		}
	}

	public function onBreak(BlockBreakEvent $event){
		$player = $event->getPlayer();
		if ($player->getGamemode() !== 1) {
				if ($event->getBlock()->getId() === 15) {
					$drops = array();
					$drops[] = Item::get(Item::IRON_INGOT, 0, 1);
					$event->setDrops($drops);
					$player->getLevel()->addSound(new FizzSound(new Vector3($player->getX(), $player->getY(), $player->getZ())));
				}
			}
		if($player->getGamemode() !== 1) {
				if ($event->getBlock()->getId() === 14) {
					$drops = array();
					$drops[] = Item::get(Item::GOLD_INGOT, 0, 1);
					$event->setDrops($drops);
					$player->getLevel()->addSound(new FizzSound(new Vector3($player->getX(), $player->getY(), $player->getZ())));
			}
		}
	}
}
