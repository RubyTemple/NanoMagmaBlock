<?php

namespace ItsGabry\MagmaBlock;


use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\math\Vector3;

class MagmaBlockTask extends Task{
    /** @var Server*/
    private $server;


    /**
     * @param Server $server
     */
    public function __construct(Server $server){
        $this->server = $server;
    }

    public function onRun(int $currentTick) {
        foreach($this->server->getOnlinePlayers() as $player){
            if ($player->getPosition()->getLevel()->getBlock(new Vector3($player->getX(), $player->getY()-1, $player->getZ()))->getId() == 213){
                $player->attack(new EntityDamageEvent($player, EntityDamageEvent::CAUSE_FIRE,1));

            }
        }
    }
}