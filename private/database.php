<?php
require_once "./private/model/user.php";

class Database{
    private SQLite3 $connection;
    public function __construct(){
        $this->connection = new SQLite3("./../database/database.db");
        $this->create_tables();
    }
    private function create_tables(): void{
        $this->connection->exec(query:
            "CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            passwordHash TEXT
        )");
    }   
    public function add_user(User $user): void
    {
        $this->connection->exec(query:
            "INSERT INTO users (name, passwordHash) 
            VALUES ('".$user->get_username()."', '".$user->get_passwordhash()."')"
        );
    }
}