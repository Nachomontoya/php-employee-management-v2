<?php

require_once(MODELS . '/entities/user.php');

class UserList
{

    private $list;

    function __construct(User ...$user)
    {
        $this->list = $user;
    }

    public function add(User $user): void
    {
        $this->list[] = $user;
    }

    public function all(): array
    {
        return $this->list;
    }
}
