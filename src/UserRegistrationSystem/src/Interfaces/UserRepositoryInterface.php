<?php

interface UserRepositoryInterface{
    public function save(User $user):void ; // does not return anything
    public function FindByEmail(string $Email) :?User; //  if found otherwise return null
    public function ExistsByEmail(string $Email) : bool; // return true or false 
}

