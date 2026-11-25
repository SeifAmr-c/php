<?php


class InMemoryUserRepository implements UserRepositoryInterface {
    private array $Users = [] ; 

    public function save( User $User) : void {
        $this->Users[] = $User ; 
    }
    
    public function FindByEmail(string $Email): ?User // return the user object if the email was found . 
    {
        foreach($this->Users as $User){
            if($User->GetEmail() === $Email){
                return $User ; 
            }
        }
        return null ; 
    }

    public function ExistsByEmail(string $Email): bool
    {
        $result = $this->FindByEmail($Email) ; 
        if($result){
            return TRUE; 
        }
        else{
            return FALSE; 
        }
    }
}