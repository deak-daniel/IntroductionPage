<?php
require_once "./private/model/user.php";
require_once "./private/model/text.php";

class Database extends SQLite3{
    public function __construct(){
        $this->open(__DIR__ . '/../database/database.db');
    }
    public function add_user(User $user): void
    {
        $this->exec(query:
            "INSERT INTO users (name, passwordHash) 
            VALUES ('".$user->get_username()."', '".$user->get_passwordhash()."')"
        );
    }
    public function update_text(): void
    {
        
    }
    public function get_text()
    {
        $ret = $this->query(
            'SELECT * FROM texts'
        );
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
            echo "ID = ". $row['id'] . "\n";
            echo "Title = ". $row['page_title'] ."\n";
            echo "Intro = ". $row['introduction'] ."\n";
            echo "about = ".$row['about'] ."\n\n";
        }
    }
    public function get_text_in_language(string $lang)
    {
        $ret = $this->query(
            "SELECT * FROM texts where language = '".$lang."'"
        );
        return $ret->fetchArray(SQLITE3_ASSOC);
    }
}