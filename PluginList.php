<?php

/*
__PocketMine Plugin__
name=Plugins List
description=Gives a list of Plugins
version=1.0
author=Potatoman9374
class=plugins
apiversion=10,11,12
*/

class plugins implements Plugin
{
   private $api;

   public function __construct(ServerAPI $api, $server = false){
     $this->api = $api;
   }

   public function init()
   {
        $this->api->console->register("plugins","Broadcasts Plugins On The Server", array($this, "send"));
        $this->api->ban->cmdwhitelist("plugins");
    }
    public function send($cmd,$args,$issuer) {

        $list = "";

        foreach($this->api->plugin->getList() as $plugin)
        {
            $list .= $plugin["name"] . ", ";
        }
        console($list);
    }
    public function __destruct() 
        {

    }

}
?>
    
