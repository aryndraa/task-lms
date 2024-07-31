<?php 
require "data.php";
$noList = 1;

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>

      <!-- Tailwind -->
      <script src="https://cdn.tailwindcss.com"></script>

  </head>
  <body class="bg-gradient-to-b from-slate-100 to-slate-300 bg-fixed">
    <header class="bg-gray-900 text-center text-slate-200 uppercase text-5xl font-medium py-7 mb-12">
      <h1 class="tracking-widest">Library Management System</h1>
    </header>  

    <!-- books -->

    <section class="flex justify-center flex-col mx-16 my-12 gap-5">
    <div class="flex justify-center gap-6">
      <!-- members -->
        <div class="relative overflow-x-auto flex-1">
          <h1 class="text-2xl font-semibold mb-4 text-slate-800 text-center">List Members</h1>
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-white uppercase bg-slate-800   ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Member Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Member ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Borrowed
                    </th>
                    
                </tr>
            </thead>
            <tbody>
              <?php foreach($library -> listMembers() as $member) :  ?>
                <tr class="bg-white bg-opacity-80 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrape">
                        <?= $member['name'];?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $member['memberID']; ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= count($member['borrowedBooks']); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <!-- Librarians -->
        <div class="flex gap-5">
          <div>
            <h1 class="text-2xl font-semibold mb-4 text-slate-800 text-center">List Librarians</h1>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
              <thead class="text-xs text-white  uppercase bg-slate-800   ">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Librarians Name
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Member ID
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($library -> listLibrarians() as $librarian) :  ?>
                  <tr class="bg-white bg-opacity-80 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrape">
                      <?= $librarian['name'];?>
                    </th>
                    <td class="px-6 py-4">
                      <?= $librarian['employeID']; ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>  
            </div>
          <div>
            <h1 class="text-2xl font-semibold mb-4 text-slate-800 text-center">Search Book</h1>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
              <thead class="text-xs text-white  uppercase bg-slate-800   ">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    ISBN
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Book Name
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($searchBook as $book) : ?>
                  <tr class="bg-white bg-opacity-80 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrape">
                      <?= $book->getBookISBN();?>
                    </th>
                    <td class="px-6 py-4">
                      <?= $book->getBookTitle();?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>  
          </div>
          </div>
        </div>
        <div>
          <h2 class="text-3xl font-medium mb-4">Notifications</h2>
          <table class=" h-fit text-sm text-left rtl:text-right text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">
                No
              </th>
              <th scope="col" class="px-6 py-3">
                Notification
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($library->listNotifications() as $notification) : ?>
              <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                  <?= $noList; ?>
                </th>
                <td class="px-6 py-4">
                  <?=  $notification->getMessage() . ' <b class="text-green-500" >(' . $notification->getType() . ')</b>' ?>
                </td>
              </tr>
              <?php $noList++;?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="mt-6">
          <h2 class="text-3xl font-medium mb-6">Books</h2>
          <div class="flex flex-wrap gap-5 ">
            <?php foreach($library -> listAvailableBooks() as $book) :  ?>
              <div class="p-6 w-[400px] bg-white bg-opacity-80">
                <h1 class="text-3xl font-semibold pb-2 border-b-2 border-slate-500 mb-6"><?= $book['title'];?></h1>
                <p class="flex justify-between"><span class="font-semibold">Author : </span><?= $book['author'];?></p>
                <p class="flex justify-between"><span class="font-semibold">ISBN : </span><?= $book['isbn']; ?></p>
                <p class="flex justify-between"><span class="font-semibold">Publication Year : </span><?= $book['publicationYear'];?></p>
                <p class="flex justify-between"><span class="font-semibold">Available Copies : </span><?= $book['availableCopies'];?></p>
              </div>
              <?php endforeach;?>
            </div>
        </div>
    </section>
  </body>
</html>