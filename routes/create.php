<?php
$PageTitle = "Add New Employee";
$PageCss = '../CSS/create.css';
include_once('../templates/header.php');
require_once "../config.php";

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!get_magic_quotes_gpc()) {
    $id = addslashes($_POST['id']);
    $first_name = addslashes($_POST['first_name']);
    $last_name = addslashes($_POST['last_name']);
    $age = addslashes($_POST['age']);
    $gender = addslashes($_POST['gender']);
    $home_address = addslashes($_POST['home_address']);
    $contact_number = addslashes($_POST['contact_number']);
    $email_address = addslashes($_POST['email_address']);
    $company_position = addslashes($_POST['company_position']);
    $monthly_salary = addslashes($_POST['monthly_salary']);
  } else {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $home_address = $_POST['home_address'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $company_position = $_POST['company_position'];
    $monthly_salary = $_POST['monthly_salary'];
  }

  $sql = "INSERT INTO `employees` (
      `id` ,
      `first_name` ,
      `last_name` ,
      `age` ,
      `gender` ,
      `home_address` ,
      `contact_number` ,
      `email_address` ,
      `company_position` ,
      `monthly_salary`
      )
      VALUES (
      '$id' ,
      '$first_name', 
      '$last_name', 
      '$age', 
      '$gender', 
      '$home_address', 
      '$contact_number', 
      '$email_address', 
      '$company_position', 
      '$monthly_salary'
      );";


  if (mysqli_query($conn, $sql)) {
    echo '<div class="result_view_container">';
    echo '<div class="result_view">New record created successfully</div>';
    echo '<button class="btn-back" onclick="history.go(-2)">CONFIRM</button>';
    echo '</div>';

    exit();
  } else {
    echo '<center>';
    echo '<div class="result_view">Error: ID# ' . $id . ' already exists </div>';
    echo '</center>';
  }

  mysqli_close($conn);
}
?>




<div class="main">
  <div class="main-top">
    <p>ADD</p>
  </div>
  <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
    <center>
      <p style="color: #fee9ee; font-family: 'League Spartan'!important;">EMPLOYEE DETAILS</p>
    </center>
    <div class="main-mid">

      <div class="mid-left">
        <p class="p-main-mid">First Name</p>
        <input type="text" name="first_name" placeholder="First Name" required>

        <p class="p-main-mid">Last Name</p>
        <input type="text" name="last_name" placeholder="Last Name" required>

        <p class="p-main-mid">Age</p>
        <input type="text" name="age" placeholder="Age" required>
      </div>

      <div class="mid-right">
        <p class="p-main-mid">Gender</p>
        <input type="text" name="gender" placeholder="Gender" required>

        <p class="p-main-mid">Address</p>
        <input type="text" name="home_address" placeholder="Address" required>

        <p class="p-main-mid">Phone</p>
        <input type="text" name="contact_number" placeholder="Contact Number" required>
      </div>
    </div>

    <center>
      <p style="margin: 30px 0px 8px 0px; font-size: 15px;
  font-family: 'Glacial Indifference';
  color: aliceblue;">Employee ID</p>
      <input type="text" name="id" placeholder="ID" required>
    </center>
    <br /><br /><br /><br />
    <center>
      <p style="color: #fee9ee; font-family: 'League Spartan'!important;"> WORK INFORMATION </p>
    </center>
    <div class="main-bot">


      <p class="p-main-bot">Email Address</p>
      <input type="text" name="email_address" placeholder="Email Address" required>

      <p class="p-main-bot">Company Position</p>
      <input type="text" name="company_position" placeholder="Company Position" required>

      <p class="p-main-bot">Monthly Salary</p>
      <input type="text" name="monthly_salary" placeholder="Monthly Salary" required>


      <input type="submit" name="submit" value="ADD">

  </form>

</div>
<br /><br /><br />

<?php
include_once('../templates/footer.php');
?>