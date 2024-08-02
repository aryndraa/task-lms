<?php 

require_once "Person.php";

class Librarian extends Person 
{ 
    private string $employeId;
    private array $notifications = [];

    public function __construct(string $name, string $employeId)
    {
        parent::__construct($name);
        $this->employeId = $employeId;
    }

    public function removeBook(&$library, Book $book) 
    {
        if($library->removeBook($book)) {
            $this->notify(new Notification(
                "Book <b class='text-base'>{$book->getBookTitle()}</b> 
                removed by {$this->name}", 'LIBRARIAN'
            ));
        } else {
            $this->notify(new Notification(
                "Book <b class='text-base'>{$book->getBookTitle()}</b> 
                was removed", 'LIBRARIAN'
            ));
        }     
    }

    public function addBook(&$library, Book $book) 
    {
        $library->addBook($book);
        $this->notify(new Notification(
            "Book <b class='text-base'>{$book -> getBookTitle()}</b> added by {$this->name}", 'LIBRARIAN'
        ));
    }

    public function getLibrarianInfo() 
    {
        return [
            'name'      => $this->getName(),
            'employeID' => $this->employeId,
        ];
    }

    public function getLibrarianID()
    {
        return $this->employeId;
    }

    public function notify(Notification $notification)
     {
        $this->notifications[] = $notification;
    }

    public function getNotifications()
    {
        return $this->notifications;
    }
}
