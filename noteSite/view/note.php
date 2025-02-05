<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php require_once("../app.php") ?>

  <div class="flex flex-col items-center justify-center h-screen light">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">

      <h2 class="text-2xl font-bold text-gray-800 mb-4">Leave a public Note</h2>


      <form action="../control/note.control.php" method="post" class="flex flex-col">

        <input type="text" id="name" name="name" placeholder="Full Name" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150">

        <input type="text" id="email" name="email" placeholder="Email" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150">

        <textarea name="message" id="message" cols="30" rows="10" name="message" placeholder="Leave a Note" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"></textarea>

        <button type="submit" class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-indigo-600 hover:to-blue-600 transition ease-in-out duration-150">Send Message</button>




      </form>

    </div>

  </div>

</body>

</html>