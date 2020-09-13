<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/staff/">Staff</a></li>
  <li>Staff HQ</li>
</ul>

<div class="page-body clearfix">
  <h1>Staff HQ</h1>

  <div class="staffhq">
    <div class="staffhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('staffhq_menu.php'); ?>
    </div>
    <div class="staffhq-content col-lg-9 col-md-8 col-sm-8">
      <?php staffhq_confirmation();?>
      <p>
        Welcome, <?php echo $username; ?> to the Staff HQ.
        The Staff HQ is our new portal to manage your information and applications for Anime Boston Staff.
      </p>
      <?php
      if(isset($assignments) && count($assignments) > 0)
      {
        echo '<p><b>Current Assignments</b></p>';

        foreach($assignments as $row)
        {
          $position_id = $row['position_id'];
          $position_name = $row['position_name'];
          $division_name = $row['division_name'];
          $con_year = $row['con_year'];

          echo '<p>';
          echo 'Division: '.$division_name;
          echo '<br>Position: '.$position_name;
          echo '<br>Con Year: '.$con_year;
          echo '</p>';
        }
        echo '<hr>';
      }
      ?>
      <p>
        This new portal allows you to enter your personal information once and keep it updated throughout the convention year.
        You can also apply to multiple staff positions.
      </p>

      <p>
        Staff HQ is tied into your login for the Anime Boston forums.
        To access Staff HQ, you must be logged into the Anime Boston forums.
        If you remain logged into the forums, <em>please be aware that you will also remain logged into Staff HQ</em>.
      </p>

      <p>Here is a brief rundown of the sections of Staff HQ</p>
      <ul>
        <li><label>My Info:</label> This is where your personal information will be entered. Specifically contact information, date of birth, and any other info we need. This section will need to be reviewed and updated every convention year.</li>
        <li><label>My History:</label> Tracks your participation as Staff of previous Anime Boston conventions.</li>
        <li><label>Staff Applications:</label> Submit and view the status of applications to Anime Boston Staff.</li>
        <li><label>My Forum Profile:</label> The User Control Panel for the Anime Boston forums. Here you may change your forum username, password, avatar, and other settings.</li>
        <li><label>Log Out:</label> Will log you out of the Staff HQ and the Anime Boston forums.</li>
      </ul>
      <p>Please keep in mind that Staff HQ is a new system and as such there may be some bugs left to iron out. If you encounter any problems or have questions, please <a href="/coninfo/contact/68">contact the Webmaster</a>.</p>
      <p>Thank you,<br>-The Anime Boston Web Team</p>
    </div>
  </div>
</div>