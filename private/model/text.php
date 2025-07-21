<?php
class Text{
    private string $title;
    private string $introduction;
    private string $about;
    
    public function __construct(){
        $this->title = "";
        $this->introduction = "";
        $this->about = "";
    }

    public function get_title(): string{
        return $this->title;
    }
    public function get_introduction(): string{
        return $this->introduction;
    }
    public function get_about(): string{
        return $this->about;
    }
    public function set_title(string $title): void{
        $this->title = $title;
    }
    public function set_introduction(string $intro): void{
        $this->introduction = $intro;
    }
    public function set_about(string $about): void{
        $this->about = $about;
    }
}