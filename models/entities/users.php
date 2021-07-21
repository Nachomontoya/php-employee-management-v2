<?php

class User
{

    function __construct(
        string $id,
        string $name,
        string $email,
        string $password
    ) {
        $this->name = $id;
        $this->lastName = $name;
        $this->email = $email;
        $this->gender = $password;
    }
}
