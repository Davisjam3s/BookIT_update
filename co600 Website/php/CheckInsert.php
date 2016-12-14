<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php
if ($userType = 'ugtstudent') // this is checking what type the user is
{
  $databaseUT = 1; // set it to this
}
elseif ($userType = 'staff') 
{
  $databaseUT = 3;
}

$sql = "SELECT * FROM User WHERE UserUID ='$user'"; // does this user already exist
$result = mysqli_query($conn,$sql); // get the result
if(mysqli_num_rows($result)>=1) // if it already exists
  {
    $row = mysqli_fetch_assoc($result); // if it does exist let me get the rows
    $DBUserType = $row["UserTypeUID"]; // i only want this for now
    $DBUserAgreed = $row["UserAgreed"];
    if ($DBUserType == 1) {
      $DBUserType ="Student";
    }
    if ($DBUserAgreed == 0) {
      $DBUserAgreed = "Not Agreed";
    }
    echo "<div class='phpechoback'></div>
          <div class='phpechofront'>
          <img src='http://www.troll.me/images/futurama-fry/not-sure-if-this-is-a-bug-or-a-feature-thumb.jpg'>
          <br>
          Hello  $user with user type: $DBUserType, this site is still being made, this is also not a bug, dont worry, this is just used to make sure it works dont worry though, this wont be here, to remove the message click the area around this white box $DBUserAgreed
          </div>"; // this echo will be removed
  }
  else // oh no a new users
  {
    $sql = "INSERT INTO User (UserUID, UserTypeUID, UserEmail, UserAgreed) VALUES ('$user','$databaseUT','$email',0)"; // better put them into the db

if (mysqli_query($conn, $sql)) { // thats right, we will let them give us more info
    echo "<div class='phpechoback'></div>
<div class='phpechofront'>
    <h1 class='agreeTitle'>Welcome New User</h1>
    <h2>Please fill out the form below</h2>
    <form class='infoFormArea'>
        <input type='text' id='Fullname' class='FormItems' placeholder='Fullname'>
     
        <select class='FormItems' id='Campus' required>
            <option value='NULL' selected disabled >Campus</option>
            <option value='Canterbury'>Canterbury</option>
            <option value='Medway'>Medway</option>
        </select>
        <select class='FormItems' id='YearGroup' required>
            <option valeue='' selected disabled >Year Group</option>
            <option value='1'>year 1</option>
            <option value='2'>year 2</option>
            <option value='3'>year 3</option>
            <option value='4'>Post Grad</option>
        </select>
        <button id='button' class='FormItems'> Submit </button>
    </form>
</div>"; // form will need editing
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); // is there an error?
}
  }
mysqli_close($conn); // close our connection
?>
<!--below is the ajax that will will work for adding a new student into the database-->
<script>
	$('#button').click(function() { //wait for the button to be pressed, this will need a name change 
    var val1 = $('#Fullname').val(); // set val1 to the value in fullname
	  var val2 = $('#Campus').val(); // set val 2 to the value in campus
	  var val3 = $('#YearGroup').val(); // set val3 to the value in yeargroup
    if (val2 != 'Canterbury') {alert("nah fam");} else{alert("yeah fam");};
    $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'php/InsertUserInfo.php', // this is where we're posting 
        data: { Fullname: val1,Campus: val2, YearGroup: val3}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
        }
    });
});
</script>