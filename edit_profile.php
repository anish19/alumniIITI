<?php 
  
  include('connect_db.php');
  session_start();
  if(!isset($_SESSION['id']) || $_SESSION['type']!="alumni")
  {
    header('Location:login.php');
  }
  else
  {
    if(!isset($_POST['firstname']))
    { $id=$_SESSION['id'];
      $query = "SELECT firstname, lastname, dob, email, degree, passing_year, address, occupation, city, state, phone, about, discipline,     avatar    FROM `alumni` WHERE id='$id' ";
      $query_run = mysql_query($query) or die('cannot execute query');
      $form_info = mysql_fetch_assoc($query_run);
      $avatar = $form_info['avatar'];

?>


      <!DOCTYPE HTML>
      <html>
      <head>
          <meta charset="utf-8"/>
          <title>Edit Profile</title>
          <link type="text/css" href="menu.css" rel="stylesheet" />
          <link type="text/css" rel="stylesheet" href="style.css"/ >
          <link type="text/css" rel="stylesheet" href="profile.css"/ >
          <link type="text/css" rel="stylesheet" href="edit_profile.css"/ >

          <script src="jquery.js"></script>
          <script type="text/javascript" src="menu.js"></script>
      </head>
      <body>
        
        <?php include('header.php'); ?>
        <div class="wrap_400">
          
          <div id="line">
            <p>Edit Profile
              <a href="edit_profile.php" id="edit">Edit Profile</a>
              <a href="change_password.php" id="change">Change password</a>
            </p>
      
          </div>  

          <div id="photoedit">
          
            <div class="drop-shadow raised" style="width:220px;height:300px;">
            <img src="<?php echo $avatar; ?>" width="180" height="250" style="height:250px;width:220px; background-color:#2D2D2D;"/> 
            <p> <?php echo $form_info['firstname'].' '.$form_info['lastname']; ?><br/>
                 <?php echo $form_info['degree'].', '.$form_info['passing_year']; ?> </p>        
            </div>
            <form action="mysettings.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
              <p> 
                Image Upload 
                <input type="file" name="ifile">
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <input name="Submit" type="submit" id="Submit" value="Upload">
              </p>
            <p><strong>Max 2 Mb, JPEG/PNG only. </strong></p>
            </form> 
          </div>

          <div id="profile">
            <form action="edit_profile.php" method="post">
              <table>
                <tr>
                  <td class="heading">  <label for="firstname"> Firstname </label>  </td>
                  <td>  <input type="text" name="firstname" value="<?php echo $form_info['firstname'] ?>" />  </td>
                </tr>
                <tr>
                  <td class="heading">   <label for="lastname"> Lastname </label>  </td>
                  <td>   <input type="text" name="lastname" value="<?php echo $form_info['lastname'] ?>" /> </td>
                </tr>
                <tr>
                   <td class="heading">   <label for="dob"> Date of Birth </label>  </td>
                   <td>   <input type="text" name="dob" value="<?php echo $form_info['dob'] ?>" placeholder="dd/mm/yyyy" /> </td>
                </tr>  
                <tr>
                    <td class="heading">  <label for="passing_year"> Passing Year</label> </td>
                    <td>  <input type="text" name="passing_year" value="<?php echo $form_info['passing_year'] ?>" placeholder="yyyy" /> </td>
                </tr>
                <tr>
                    <td class="heading">  <label for="email"> Email Id </label> </td>
                    <td>  <input type="text" name="email" value="<?php echo $form_info['email'] ?>" />  </td>
                </tr>
                <tr>
                    <td class="heading">  <label for="degree"> Degree</label> </td>
                    <td> <input type="text" name="degree" value="<?php echo $form_info['degree'] ?>" /> </td>
                </tr>
                <tr>
                    <td class="heading">  <label for="occupation"> Occupation </label>  </td>
                    <td>  <input type="text" name="occupation" value="<?php echo $form_info['occupation'] ?>" />  </td>
                </tr>
                <tr>
                    <td class="heading">  <label for="address"> Address </label>  </td>
                    <td>  <input type="text" name="address" value="<?php echo $form_info['address'] ?>" />  </td>
                </tr>
                <tr>
                    <td class="heading">  <label for="email"> Discipline </label> </td>
                    <td>  <input type="text" name="discipline" value="<?php echo $form_info['discipline'] ?>" />  </td>
                </tr>
                <tr>    
                    <td class="heading">  <label for="city"> City </label>  </td>
                    <td>  <input type="text" name="city" value="<?php echo $form_info['city'] ?>" />  </td>
                </tr>
                <tr>
                    <td class="heading">  <label for="state"> State </label>  </td>
                    <td>  <input type="text" name="state" value="<?php echo $form_info['state'] ?>" />  </td>
                </tr>
                <tr>  
                    <td class="heading">  <label for="phone"> Phone </label>  </td>
                    <td>  <input type="text" name="phone" value="<?php echo $form_info['phone'] ?>" />  <td>
                </tr>
                <tr>    
                    <td class="heading">  <label for="about"> About Me </label> </td>
                      
                    <td>  <textarea name="about"><?php echo $form_info['about'] ?></textarea> </td>
                </tr>
              </table>
              <p class="submit">
                <input type="submit" value="Save Profile"/>
              </p>
            </form>
          </div>

      </div>



      </body>
      </html>
<?php 
    }
    else
    {
      $id = $_SESSION['id'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $passing_year = $_POST['passing_year'];
      $email = $_POST['email'];
      $degree = $_POST['degree'];
      $occupation = $_POST['occupation'];
      $address = $_POST['address'];
      $discipline = $_POST['discipline'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $phone = $_POST['phone'];
      $about = $_POST['about'];
      $query=" UPDATE `alumni` SET firstname='$firstname', lastname='$lastname', dob='$dob', email='$email', passing_year='$passing_year', 
               degree='$degree', occupation='$occupation', address='$address', discipline='$discipline', city='$city', about='$about', 
               state='$state', phone='$phone' WHERE id='$id' ";
      $query_run = mysql_query($query) or die('cannot execute query');
      header('Location:alum_profile.php?flag=4');
    }  
  }
  ?>