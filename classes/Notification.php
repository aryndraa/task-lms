<?php 

class Notification 
{
    private string $message;
    private string $type;

    public function __construct(string $message, string $type) {
        $this->message = $message;
        $this->type = $type;
    }

    public function getMessage() {

        return $this->message;
    }

    public function getType() {
        
        return $this->type;
    }

}