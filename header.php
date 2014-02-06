<?php $thisPage = isset($thisPage) ? $thisPage : NULL ; ?>
<head>
<script>
          $(document).ready(function(){
                $('#login-trigger').click(function(){
                    $(this).next('#login-content').slideToggle();
                    $(this).toggleClass('active');                  
                    
                    if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
                        else $(this).find('span').html('&#x25BC;')

                    document.details.elements.username.focus();
                    })
          });
</script>
</head>

<header>
 <div id="wrap">
  <div id="heading">
    

    <?php
      if(isset($_SESSION['id']))
      {
          if($_SESSION['type']=="alumni")
          {
            $query="SELECT firstname FROM `alumni` WHERE id='".$_SESSION['id']."' ";

            $query_run=mysql_query($query) or die('cannot execute query');

            if(mysql_num_rows($query_run)==1)
                { $query_row=mysql_fetch_assoc($query_run);
                  $firstname = $query_row['firstname'];
                }
            ?> 
            <nav>
              <ul>
                <li id="profile">
                  <a  href="alum_profile.php"> <?php echo $firstname ?> </a>
                </li>
                <li id="logout">
                  <a href="logout.php">Log Out </a>
                </li>
              </ul>
            </nav>              
    <?php }
          else
          {
      			if($_SESSION['type']=="student")
      			{
      				$query="SELECT firstname FROM `student` WHERE id='".$_SESSION['id']."' ";

      				$query_run=mysql_query($query) or die('cannot execute query');

      				if(mysql_num_rows($query_run)==1)
      					{ $query_row=mysql_fetch_assoc($query_run);
      					  $firstname = $query_row['firstname'];
      					}
    ?>
      				<nav>
      				  <ul>
      					<li id="profile">
      					  <a  href="student_profile.php"> <?php echo $firstname ?> </a>
      					</li>
      					
      					<li id="logout">
      					  <a href="logout.php"> Log Out </a>
      					</li>
      				  </ul>
      				</nav>  
    <?php	 
      			 }else
             {
			             $query="SELECT firstname FROM `admin` WHERE id='".$_SESSION['id']."' ";

                  $query_run=mysql_query($query) or die('cannot execute query');

                  if(mysql_num_rows($query_run)==1)
                    { $query_row=mysql_fetch_assoc($query_run);
                      $firstname = $query_row['firstname'];
                    }
    ?>
                  <nav>
                    <ul>
                    <li id="profile">
                      <a  href="admin_profile.php"> <?php echo $firstname ?> </a>
                    </li>
                    
                    <li id="logout">
                      <a href="logout.php"> Log Out </a>
                    </li>
                    </ul>
                  </nav>
      				
    <?php     }
            }
      }
      else 
      { 
      
      ?>
          <!-- Login Starts Here -->

          <nav>
          <ul>
              <li id="login">
                  <a id="login-trigger" href="#">
                      Log in <span>▼</span>
                  </a>
                  <div id="login-content">
                      <form action="userdetect.php" method="POST" name="details"> 
                          <fieldset id="inputs">
                              <input id="username" type="text" name="username" placeholder="Username" autofocus>   
                              <input id="password" type="password" name="password" placeholder="Password" required>
                          </fieldset>
                          <fieldset id="actions">
                              <input type="submit" id="submit" value="Log in">
                              <!--label><input type="checkbox" checked="checked"> Keep me signed in</label-->
                          </fieldset>
                      </form>
                  </div>                     
              </li>
              <li id="signup">
                  <a href="register.php">Register
                  </a>
              </li>

              
          </ul>
          </nav>    
          <!-- Login Ends Here -->
     <?php } ?>

     </div>  
    
      <div style="clear:both;"></div>
      <!-- Navigation menu starts here-->
      <div id="menu">
        <ul class="menu">

            <li<?php if ($thisPage=="home") echo " class=\"current\""; ?> id="home"><a href="home.php"><span>Home</span></a></li>
            <li<?php if ($thisPage=="announcements") echo " class=\"current\""; ?>><a href="announcements.php"><span>Announcements</span></a></li>
            <li<?php if ($thisPage=="achievements") echo " class=\"current\""; ?>><a href="achievements.php"><span>Achievements</span></a></li>
            <li<?php if ($thisPage=="contributions") echo " class=\"current\""; ?>><a href="contributions.php"><span>Contributions</span></a></li>
            <li<?php if ($thisPage=="search_alumni") echo " class=\"current\""; ?>><a href="search_alumni.php"><span>Search Alumni</span></a></li>
         </ul>
      </div>

      <div id="copyright">Copyright &copy; 2013 <a href="http://apycom.com/">Apycom jQuery Menus</a></div>
      <!-- Navigation menu ends here-->

      <!--wrap ends here-->
      </div>
  </header>