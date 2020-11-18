<?php


class member {
       public function member($firstName, $lastName, $userName, $gamerTag, $password, $isAdmin , $ID = -1) {
        $this->ID = $ID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $userName;
        $this->gamerTag = $gamerTag;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getID() {
        return $this->ID;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getGamerTag() {
        return $this->gamerTag;
    }
    
    public function getisAdmin(){
        return $this->isAdmin;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setGamerTag($gamerTag) {
        $this->gamerTag = $gamerTag;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function setisAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
    }


}

