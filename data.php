<?php 

require_once "classes/Library.php";
require_once "classes/Librarian.php";
require_once "classes/Book.php";
require_once "classes/Member.php";


$library = new Library();

// Book init
$book1 = new Book("How To Be Juragan Iwak ", "Mr. Bassing Iskandar", "001", 2015, 2);
$book2 = new Book("Misteri Paku Tanah Jawa", "Edy Mesin Kasir", "002", 2024, 2);
$book3 = new Book("Alam Bawah Gaib", "Arya Negromanser", "003", 2008, 2);
$book4 = new Book("Teknik Lompat Jauh", "Devano Sigit Rendang", "004", 2021, 2);
$book5 = new Book("Ahli Kicau Mania", "Restu Cigago", "005", 2010, 2);
$book6 = new Book("100 Bintang", "Kiel Gorontalo", "006", 2020, 2); 
$book7 = new Book("Rahasia Tampan", "Charli Es Campur", "007", 2020, 2); 
$book8 = new Book("My Love Story", "Ningerrat", "008", 220, 2); 
$book9 = new Book("Daddy Rich", "Nando Sumatra", "009", 2020, 2); 
$book10 = new Book("Investasi Crypto", "Satya Sumargo", "010", 2020, 2); 

// Member init
$member1 = new Member("Agus Pinguin Madagaskar", "001");
$member2 = new Member("Ryan Skibidi", "002");
$member3 = new Member("Turah Metic", "003");
$member4 = new Member("Josan Cilacap", "004");
$member5 = new Member("Vincent Satorou", "005");
$member6 = new Member("Roby Pop Es", "006");
$member7 = new Member("Satya Pudding Coklat", "007");
$member8 = new Member("Gilang Israel", "008");
$member9 = new Member("Aris Baswedan", "009");

// Librarian init
$librarian1 = new Librarian("Cik Sucana", "L001");
$librarian2 = new Librarian("Ir. Murjana", "L002");
$librarian3 = new Librarian("Ekapabila Dispenser", "L003");
$librarian4 = new Librarian("Vinsen Cacing Alaska", "L004");

// Registering Book
$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);
$library->addBook($book4);
$library->addBook($book5);
$library->addBook($book6);
$library->addBook($book7);
$library->addBook($book8);
$library->addBook($book9);
$library->addBook($book10);

// Registering Member
$library->registerMember($member1);
$library->registerMember($member2);
$library->registerMember($member3);
$library->registerMember($member4);
$library->registerMember($member5);
$library->registerMember($member6);
$library->registerMember($member7);
$library->registerMember($member8);
$library->registerMember($member9);

// Registering Librarian
$library->registerLibrarian($librarian1);
$library->registerLibrarian($librarian2);
$library->registerLibrarian($librarian3);
$library->registerLibrarian($librarian4);

// Actions
$searchBook = [
    $library->findBookByISBN("008"),
    $library->findBookByISBN("002"),
    $library->findBookByISBN("002"),
];




