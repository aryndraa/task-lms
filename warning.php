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
  <body class="bg-gradient-to-b from-slate-100 to-slate-300">
    <header class="bg-gray-900 text-center text-slate-200 uppercase text-5xl font-medium py-7 mb-12">
      <h1 class="tracking-widest">Library Management System</h1>
    </header>  

    <section class="min-h-screen mx-16 my-20 flex justify-between">
      <div>
        <h2 class="text-3xl text-center">Member Notifications</h2>
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
                  <?=  $notification->getMessage() . ' (' . $notification->getType() . ') - ' . $notification->getTimestamp() . PHP_EOL ?>
                </td>
              </tr>
              <?php $noList++;?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
    </section>
  </body>
</html>