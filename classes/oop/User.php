<?php
/**
 * Class User
 * Represents a user with a name and email.
 */
class User {
    /**
     * @var string The name of the user.
     */
    public $name;

    /**
     * @var string The email address of the user.
     */
    public $email;

    /**
     * User constructor.
     *
     * @param string $myname  The name of the user.
     * @param string $myemail The email address of the user.
     */
    public function __construct(string $myname, string $myemail) {
        $this->name = $myname;
        $this->email = $myemail;
    }

    /**
     * Saves the user information to the provided storage.
     *
     * @param Storage $storage The storage instance where the data will be saved.
     * @return void
     */
    public function saveToStorage(Storage $storage) : void {
        $data = $this->name . " = " . $this->email ;
        $storage->save($data);
    }
}