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
class following {
   public function following($userID, $userName, $followUserName){
       $this->userID = $userID;
       $this->userName = $userName;
       $this->followUserName = $followUserName;
       
   }
   
   public function getUserID(){
        return $this->userID;
    }
    public function getUserName(){
        return $this->userName;
    }
   
    public function getFollowUserName(){
        return $this->followUserName;
    }
     public function setUSerID($userID) {
        $this->userID = $userID;
    }
     public function setUserName($userName) {
        $this->userName = $userName;
    }
   
     public function setFollowUserName($followUserName) {
        $this->followUserName = $followUserName;
    }
}
