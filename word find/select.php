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


$x="tarun varun casad";
echo $x;

if (isset($_POST["topic"]))
{
  
   echo $_POST['topic']; 
   $topic=$_POST['topic'];
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wordgame";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = $sql = "SELECT list FROM lists where topic='".$topic."'";
$result = $conn->query($sql);






if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

//echo $row['list'];

$pieces = explode(",", $row['list']);


for($i=0;$i<count($pieces);$i=$i+1)
echo $pieces[$i]."</br>"; // piece1

}
};


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
      var words = "<?php echo $x ?>",
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