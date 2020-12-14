<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of apex
 *
 * @author kpuni
 */
class apex {
    
   public function apex($userID, $userName, $gamerTag, $kills){
       $this->userID = $userID;
       $this->userName = $userName;
       $this->gamerTag = $gamerTag;
       $this->kills = $kills;
   }
   
   public function getUserID(){
        return $this->userID;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getGamerTag(){
        return $this->gamerTag;
    }
    public function getKills(){
        return $this->kills;
    }
     public function setUSerID($userID) {
        $this->userID = $userID;
    }
     public function setUserName($userName) {
        $this->userName = $userName;
    }
     public function setGamerTag($gamerTag) {
        $this->gamerTag = $gamerTag;
    }
     public function setKills($kills) {
        $this->kills = $kills;
    }
}
