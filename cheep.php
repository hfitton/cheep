<!DOCTYPE HTML>
<html>
<body>
  <head>
  <link rel="stylesheet" href="cheepstyle.css">
  <title>Cheep</title>
     </head>
      <div class='header'>
        <h1>"Cheep!"</h1>
      </div>


      <div class="intro">
          <p>Welcome to Cheep, a place to share your thoughts with the world by entering chirps.</p>
          <p>(This is nothing like Twitter.  Honest.)</p>
      </div>
<div class="container">
      <div class = 'form'>


<!--building the form-->
        <p id='title'>Enter your chirp below.</p>
          <form action="" method='post'>
            Name: <input type='text' name='name'><br>
            Comment: <input type='text' name='comment' value = 'Add your comment here!'><br>
            Feeling: <select name ="feeling">
              <option value = "happy">Happy</option>
              <option value = "sad">Sad</option>
              <option value = "confused">Confused</option>
              <option value = "angry">Angry</option>
            </select><br>
    <button class="button" type='submit'>Submit</button>
    </form>
  </div>   <!--closed the form div-->
<!--the above builds a basic two entry form. -->
<!--next we build the php that will enter the data.-->
<?php


//first test I understand how the welcome message would work.
//echo "<h4>Welcome to this page, ".$_POST['name']. " .</h4>";
//next log into mysql
$mysqli = new mysqli('127.0.0.1', 'XXXX', 'XXXXXX', 'cheep');
//then insert the data
$sql = 'insert into chirps (name, comment, feeling) values ("'. $_POST["name"] . '", "' . $_POST["comment"] . '", "' . $_POST["feeling"] . '");';
//if you don't run the next bit, the data won't go into the table.
$mysqli->query($sql);
//next print out the results of the full table below
?>
  <div class = 'results'>
    <?php
    //setup query to select everything and return in descending order.
$sql = 'select * from chirps order by id desc;';
//first setup variable people to run a query against the database
$people = $mysqli->query($sql);
echo "<table>\n";
//create while loop to look for values
while ($person = $people->fetch_assoc()) {
  echo "<tr><td> " . $person['name'] . "</td><td> " . $person['comment'] . "</td><td> " . $person['feeling'] . "</td><td> " . $person['time'] ."</td>\n";
}
echo "</table>\n";
?>
</div>
</div>
</body>
</html>
