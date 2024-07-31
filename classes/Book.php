<?php 

class Book 
{
    protected $title; 
    protected $author; 
    protected $isbn; 
    protected $publicationYear; 
    protected $availableCopies;
    
    public function __construct(string $title, string $author, 
    string $isbn, int $publicationYear, int $availableCopies) 
    {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->publicationYear = $publicationYear;
        $this->availableCopies = $availableCopies;
    }

    public function borrowBook() 
    {
        if ($this->availableCopies > 0 && $this->availableCopies != 0) {
            $this->availableCopies--;

            return true;
        }

        return false;
    }
    
    public function returnBook() 
    {
        $this->availableCopies++;

        return true;
    }

    public function getBookInfo() 
    {

        return [
            'title' => $this->title, 
            'author' => $this->author,
            'isbn' => $this->isbn,
            'publicationYear' => $this->publicationYear,
            'availableCopies' => $this->availableCopies
        ];
    }

    public function getBookTitle() 
    {
        
        return $this->title;
    }

    public function getBookISBN() 
    {
        
        return $this->isbn;
    }

}


