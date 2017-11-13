<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Word search game</title>
    <link rel="stylesheet" href="css/wordsearch.min.css" />
    <link rel="stylesheet" href="css/style.min.css" />
  </head>
  
  


  
  <body>
  
  
  
  
  
  
  
  
  
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wordgame";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
<?php
$sql = "SELECT * FROM lists";
$result = $conn->query($sql);

echo"<form action='select.php' method='post'>";
echo "<select id='topic' name='topic' onChange='getSelect(this)'>";


/*echo "<select id='topic' name='topic'>";
*/
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
//Loop Content... Example:-

**<li><?php echo "<option value='" . $row['topic'] . "'>" . $row['topic'] . "</option>";; ?></li>**

<?php
}};

echo "</select> <input type='submit'> </form>";




if (isset($_POST["topic"]))
{
  $user = $_POST["topic"];
  echo $user;
  echo " is your username";
} 
else 
{
  $user = null;
  echo "no username supplied";
}


?>
  
  
  
  
    
    <div class="wrap">
      <h1 class="logo">Word search game</h1>
      <section id="ws-area"></section>
      <ul class="ws-words"></ul>
    </div>
    <div class="wrap">
	<form action="insert.php" method = "POST">
	Topic <input type="text" name="Heading" id="Heading"></br>
	
	<textarea rows="4" cols="50" name="list",id="list">
	</textarea>
	<input type='submit'>
	</form>
	
	
	
	<Button>Button 1</Button>
	<Button>Button 2</Button>
	<Button>Button 3</Button>
	</div>
    
    <script src="js/utility.min.js"></script>
    <script src="js/wordsearch.min.js"></script>
    <script type="text/javascript">
	
	
	  var topic;
    function getSelect(thisValue){
        console.log(thisValue.options[thisValue.selectedIndex].text);
		topic=thisValue.options[thisValue.selectedIndex].text;
    }
  
	

	
	
      var gameAreaEl = document.getElementById('ws-area');
      var gameobj = gameAreaEl.wordSearch();

      // Put words into `.ws-words`
      //var words = gameobj.settings.wordsList,
	  var words = gameobj.settings.wordsList,      
        wordsWrap = document.querySelector('.ws-words');
      for (i in words) {
        var liEl = document.createElement('li');
        liEl.setAttribute('class', 'ws-word');
        liEl.innerText = words[i];
        wordsWrap.appendChild(liEl);
      }
    </script>
  </body>
</html>