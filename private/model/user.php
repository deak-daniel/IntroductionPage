<?php
class User
{
    private string $username;
    private string $passwordhash;
    public function __construct(string $username, string $passwordhash)
    {
        $this->username = $username;
        $this->passwordhash = $passwordhash;
    }
    public function get_username(): string
    {
        return $this->username;
    }
    public function get_passwordhash(): string
    {
        return $this->passwordhash;
    }
}