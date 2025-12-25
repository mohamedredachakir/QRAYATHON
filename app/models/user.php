

<?php 
abstract class user {
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    protected $password;
    public $role;
    public function __construct($id,$firstName,$lastName,$email,$password,$role)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->role = $role;
    }

}

class reader extends user {
    public $borrowbooks = [];
}

class admin extends user {
    public $managebooks= true;
}
?>