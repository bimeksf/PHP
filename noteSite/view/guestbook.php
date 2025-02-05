<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php require_once("../app.php")  ?>



  <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center  p-4">Guestbook entries</h2>

  <?php
  $guest = new Guestbook;
  $resutls = $guest->getData();

  foreach ($resutls as $result):  ?>

    <div class="flex flex-col items-center p-10">


      <p class="mt-4 text-xl font-bold text-indigo-600 dark:text-indigo-400"><?= $result["name"]  ?></p>
      <p class="flex flex-row items-center gap-2 font-mono p-1"><?= $result["email"]  ?></p>
      <p class="flex flex-row items-center gap-2 font-mono p-2"><?= $result["comments"]  ?></p>
      <p class="flex flex-row items-center gap-2 font-mono"><?= $result["reg_date"]  ?></p>
    </div>
  <?php endforeach ?>




</body>

</html>