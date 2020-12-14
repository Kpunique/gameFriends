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
   public function following( $follower, $following, $followID = -1){
       $this->followID = $followID;
       $this->follower = $follower;
       $this->following = $following;
       
   }
   
   public function getFollowID(){
        return $this->followID;
    }
    public function getFollower(){
        return $this->follower;
    }
   
    public function getFollowing(){
        return $this->following;
    }
     public function setFollowID($followID) {
        $this->followID = $followID;
    }
     public function setFollower($follower) {
        $this->follower = $follower;
    }
   
     public function setFollowing($following) {
        $this->following = $following;
    }
}
