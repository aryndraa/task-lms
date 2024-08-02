<?php 

class Library 
{
    public $books = [];
    private $members = [];
    private $librarians = [];
    private $memberNotifications = [];
    private $librarianNotifications = [];
    private array $notifications = [];

    public function removeBook(Book $book) 
    {
        if (isset($this->books[$book->getBookInfo()['isbn']])) {
            unset($this->books[$book->getBookInfo()['isbn']]);

            return true;
        } 

        return false;   
    }

    public function addBook(Book $book) 
    {
        $this->books[$book->getBookInfo()['isbn']] = $book;
    }


    public function registerMember(Member $member) 
    {
        $this->members[$member->getMemberID()] = $member;
        $this->memberNotifications[$member->getMemberID()] = $member->getNotifications();
    }

    public function registerLibrarian(Librarian $librarian)
    {
        $this->librarians[$librarian->getLibrarianID()] = $librarian;
        $this->librarianNotifications[$librarian->getLibrarianID()] = $librarian->getNotifications();
    }

    public function findBookByISBN($isbn) 
    {
        if (isset($this->books[$isbn])) {
            return $this->books[$isbn];
        } 

        throw new Exception("Book not found.");
        
    }

    public function listAvailableBooks() 
    {
        $availableBooks = [];

        foreach ($this->books as $book) {
            if ($book->getBookInfo()['availableCopies'] > 0) {
                $availableBooks[] = $book->getBookInfo();
            }
        }

        return $availableBooks;
    }

    public function listMembers() 
    {
        $memberList = [];

        foreach ($this->members as $member) {
            $memberList[] = $member->getMemberInfo();
        }

        return $memberList;
    }

    public function listLibrarians()
    {
        $librarianList = [];

        foreach ($this->librarians as $librarian) {
            $librarianList[] = $librarian->getLibrarianInfo();
        }

        return $librarianList;
    }

    public function listNotifications()
    {
        $notificationList = [];

        foreach ($this->members as $member) {
            $notifications = $member->getNotifications();

            if (is_array($notifications)) {
                $notificationList = array_merge($notificationList, $notifications);
            }
        }

        foreach ($this->librarians as $librarian) {
            $notifications = $librarian->getNotifications();

            if (is_array($notifications)) {
                $notificationList = array_merge($notificationList, $notifications);
            }
        }

        return $notificationList;
    }

    public function updateNotifications() 
    {
        foreach ($this->members as $member) {
            $this->memberNotifications[$member->getMemberID()] = $member->getNotifications();
        }

        foreach ($this->librarians as $librarian) {
            $this->librarianNotifications[$librarian->getLibrarianID()] = $librarian->getNotifications();
        }
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
