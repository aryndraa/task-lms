<?php 

require_once "Person.php";
require_once "Notification.php";

class Member extends Person
{

    private string $memberID;
    private array $borrowedBooks = [];
    private  array $notifications = [];

    public function __construct(string $name, string $memberID)
    {
        parent::__construct($name);
        $this -> memberID = $memberID;

    }

    public function borrowBook(&$library, Book $book) 
    {
        if(array_search($book, $library->books)) {
            if($book->borrowBook()) {
                $this -> borrowedBooks[] = $book;
                $this -> notify(New Notification(
                    "Book <b class='text-base'>{$book -> getBookTitle()}</b> borrowed by {$this->name}", "MEMBER"
                ));

                return true;
            }

            $this -> notify(New Notification(
                "Book <b class='text-base'>{$book -> getBookTitle()}</b> Doesnt borrowed by {$this->name}, copy not available", "MEMBER"
            ));
        }
        
        $this -> notify(New Notification(
            "Book <b class='text-base'>{$book -> getBookTitle()}</b> Doesnt borrowed by {$this->name}, copy not available", "MEMBER"
        ));
    }

    public function returnBook(Book $book) 
    {
        $indexBook = array_search($book, $this->borrowedBooks);

        if($indexBook) {
            unset($this->borrowedBooks[$indexBook]);

            if($book->returnBook()) {
                $this -> notify(New Notification(
                    "Book <b class='text-base'>{$book -> getBookTitle()}</b> Returned by {$this->name}", "MEMBER"
                ));

                return true;
            }
            
            return false;
        }

        $this -> notify(new Notification(
            "Book <b class='text-base'>{$book -> getBookTitle()}</b> wasnt borrowed by {$this->name}", 'MEMBER'
        ));

        return false;
    }
    

    public function getMemberInfo() 
    {
        return [
            'name' => $this->name,
            'memberID' => $this->memberID,
            'borrowedBooks' => $this->borrowedBooks,
        ];
    }

    public function notify(Notification $notification) 
    {
        $this->notifications[] = $notification;
    }

    public function getNotifications() 
    {
        return $this->notifications;
    }

    public function getMemberID()
    {
        return $this->memberID;
    }

}