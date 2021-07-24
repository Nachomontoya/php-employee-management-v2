<?php

class Employee
{

    function __construct(
        int $id,
        string $name,
        string $lastName,
        string $email,
        string $gender,
        int $age,
        string $streetAddress,
        string $city,
        string $state,
        int $postalCode,
        string $phoneNumber
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->gender = $gender;
        $this->age = $age;
        $this->streetAddress = $streetAddress;
        $this->city = $city;
        $this->state = $state;
        $this->postalCode = $postalCode;
        $this->phoneNumber = $phoneNumber;
    }
}
