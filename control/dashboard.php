
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="../logic/insert.php" method="POST" enctype="multipart/form-data">

        <label for="title">Insert post title</label><br>
        <input type="text" id="title" name="title" value="Title"><br>
        <label for="content">Insert post content</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br>

        <input type="hidden" name="MAX_FILE_SIZE" value="2097152000000" />
        <input type="file" multiple="multiple" id="img" name="img[]" accept="image/*">

        <input type="submit" value="Submit" name="Submit">

      </form>




      <br><br>
      <form action="../logic/delete.php" method="POST">
        <label for="title">Delete post: title</label><br>
        <input type="text" id="title" name="title" value="Title"><br>
        <input type="submit" value="Submit" name="Submit">
      </form>


      <br><br>
      <br><br>
      <p>Abandoned feature</p>
      <form action="../logic/edit.php" method="POST"  enctype="multipart/form-data">

        <label for="title">Insert post title you want to edit</label><br>
        <input type="text" id="title" name="title" value="Title"><br>

        <label for="title">Insert new post title </label><br>
        <input type="text" id="newtitle" name="newtitle" value="newTitle"><br>
        
        
        <label for="content">Insert new post content</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br>

        
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152000000" />
        <label for="content">Insert new images</label><br>
        <input type="file" multiple="multiple" id="img" name="img[]" accept="image/*">
        <br>
        <input type="submit" value="Submit" name="Submit">
      </form>



      <br>
      <br>

      <form action = "../logic/imgCleanup.php" method="POST" >
        <label for="Submit">Img Cleanup</label>
        <input type="submit" value="SUBMIT" name="Submit">
      </form>


</body>
</html>