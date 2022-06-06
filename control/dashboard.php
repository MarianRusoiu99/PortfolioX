   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/form.css">
    <title>Document</title>
</head>
<body>
    
    <form action="../logic/insert.php" method="POST" enctype="multipart/form-data">

        <label for="title">Insert post title</label><br>
        <input type="text" id="title" name="title" placeholder="Title"><br>
        <label for="content">Insert post content</label><br>
        <textarea id="content" name="content" rows="4" cols="50" placeholder="Content"></textarea><br>

        <input type="hidden" name="MAX_FILE_SIZE" value="2097152000000" />
        <input type="file" multiple="multiple" id="img" name="img[]" accept="image/*">

        <input type="submit" value="Submit" name="Submit">

      </form>




      <br><br>
      <form action="../logic/delete.php" method="POST">
        <label for="title">Delete post: title</label><br>
        <input type="text" id="title" name="title" placeholder="Title of the post you want to delete"><br>
        <input type="submit" value="Submit" name="Submit">
      </form>

      <br>
      <br>

      <form action = "../logic/imgCleanup.php" method="POST" >
        <label for="Submit">IMG CLEANUP</label>
        <input type="submit" value="SUBMIT" name="Submit">
      </form>


</body>
</html>