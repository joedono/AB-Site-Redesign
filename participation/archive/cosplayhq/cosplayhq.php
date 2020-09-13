<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/cosplay/">Cosplay</a></li>
  <li>Cosplay HQ</li>
</ul>

<div class="page-body clearfix">
  <h1>Cosplay HQ</h1>

  <div class="cosplayhq">
    <div class="cosplayhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('cosplayhq_menu.php'); ?>
    </div>
    <div class="cosplayhq-content col-lg-9 col-md-8 col-sm-8">
      <p>Welcome, <?=$username?> to Cosplay HQ. The Cosplay HQ is our new system to manage your applications to different Cosplay Events at Anime Boston.</p>

      <?php if(count($app_master) > 0) { ?>
        <h2>Current Applications</h2>
        <?php
        foreach($app_master as $row)
        {
          $app_id = $row['app_id'];
          $event_id = $row['event_id'];
          $event_name = $row['event_name'];
          $type_id = $row['type_id'];
          $masquerade_event_type_id = $row['masquerade_event_type_id'];
          $masquerade_event_type = $row['masquerade_event_type'];
          $event_description = $row['event_description'];
          $event_status = $row['event_status'];
          $pub_timestamp = $row['pub_timestamp'];
          $selected_costume = $row['selected_costume'];
          $character_name = $row['character_name'];
          $character_series = $row['character_series'];
          $division = $row['division'];
          $skit_title = $row['skit_title'];
          $skit_description = $row['skit_description'];
          $skit_type = $row['skit_type'];
          $status = $row['status'];
          $status_updated = $row['status_updated'];
          $submitted_timestamp = $row['submitted_timestamp'];
          $app_cos = $row['app_cos'];
          ?>
          <div class="cosplayhq-application">
            <h3><?=$event_name?></h3>
            <a class="btn btn-default pull-right" href="/cosplayhq/applications/<?=$type_id?>#event<?=$event_id?>">View Full Application</a>

            <?php if($type_id == 1) { // Type 1 is Cosplay Games ?>
              <h4>Costumes</h4>
              <div class="row">
                <?php
                foreach ($app_cos as $cos)
                {
                  $costume_id = $cos['costume_id'];
                  $costume_name = $cos['costume_name'];
                  $character_name = $cos['character_name'];
                  $series_name = $cos['series_name'];
                  $series_genre = $cos['series_genre'];
                  $file_name = $cos['file_name'];
                  $thumbnail_file_name = $cos['thumbnail_file_name'];
                  $folder_path = '/images/cosplayhq/costume_photos/' .$forum_id. '/';
                  $thumb_path = $folder_path . $thumbnail_file_name;
                  $pic_path = $folder_path . $file_name;
                  ?>

                  <div class="col-xs-12">
                    <label>Costume:</label> <a href="/cosplayhq/mycostumes/#cos<?=$costume_id?>"><?=$costume_name?></a><br>
                    <label>Character:</label> <?=$character_name?><br>
                    <label>Series:</label> <i><?=$series_name?></i><br>
                    <?php if($pub_timestamp != '' && $selected_costume == $costume_id) { ?>
                      <label style="color:#FF0000">***Costume Chosen***</label><br>
                    <?php } ?>
                    <a href="<?=$pic_path?>" target="_blank"><img src="<?=$thumb_path?>" style="margin:5px;"></a>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>
            <?php if($type_id == 2 || $type_id == 3) { //Type 2 is Masquerade. Type 3 is Hall Cosplay Contest ?>
              <div class="row">
                <label class="col-xs-4">Application Type:</label>
                <div class="col-xs-8"><?=$masquerade_event_type?></div>
              </div>
              <div class="row">
                <label class="col-xs-4">Leader Character Name:</label>
                <div class="col-xs-8"><?=$character_name?></div>
              </div>
              <div class="row">
                <label class="col-xs-4">Leader Character Series: </label>
                <div class="col-xs-8"><?=$character_series?></div>
              </div>
              <?php if($masquerade_event_type_id == 1 || $masquerade_event_type_id == 3) { ?>
                <div class="row">
                  <label class="col-xs-4">Skit Title:</label>
                  <div class="col-xs-8"><?=$skit_title?></div>
                </div>
                <div class="row">
                  <label class="col-xs-4">Skit Description:</label>
                  <div class="col-xs-8"><?=$skit_description?></div>
                </div>
                <div class="row">
                  <label class="col-xs-4">Skit Type:</label>
                  <div class="col-xs-8"><?=$skit_type?></div>
                </div>
              <?php } ?>
              <div class="row">
                <label class="col-xs-4">Judging Division:</label>
                <div class="col-xs-8"><?=$division?></div>
              </div>
            <?php } ?>
            <p>
              <label>Submitted:</label> <?php echo date('m-d-Y, h:m:s A', strtotime($submitted_timestamp)); ?>
              <?php
              if($pub_timestamp != '')
              {
                echo '<br><label>Application Status:</label> ' . $status;
                if(strcmp($status,'Submitted') != 0)
                {
                  echo '<br><label>Status Updated:</label> ' . date('m-d-Y, h:m:s A', strtotime($status_updated));
                }
              }
              else
              {
                echo '<br><label>Application Status:</label> Pending Review ';
              }
              ?>
            </p>
          </div>
        <?php
        }
      }
      else
      {
        ?>
        <p>
          Previously cosplayers would have to fill out a form for each of the different events.
          Filling them out was somewhat tedious, as the forms were all very similar.
          This new system is designed to reduce the times you must input the same information.
          It will also allow our Cosplay Events Staff to track and organize event participants more efficiently.
        </p>

        <p>
          Cosplay HQ is tied into your login for the Anime Boston forums.
          To access Cosplay HQ, you must be logged into the Anime Boston forums.
          If you remain logged into the forums, <em>please be aware that you will also remain logged into Cosplay HQ</em>.
        </p>

        <p>Here is a brief rundown of the sections of Cosplay HQ:</p>
        <ul>
          <li><label>My Info:</label> This is where your personal information will be entered. Specifically contact information, date of birth, and any other info we need. This section will need to be reviewed and updated every convention year.</li>
          <li><label>My History:</label> Tracks your participation of previous Anime Boston Cosplay Events. Events prior to 2013 will need to be manually entered by you.</li>
          <li><label>My Costumes:</label> Allows you to input and track your costumes for applying to Cosplay Games with. This makes it easier to apply to Cosplay Games, as you only have to enter your costume's information once.</li>
          <li><label>Cosplay Games:</label> Here you may view Cosplay Games occurring this year at Anime Boston and apply for them.</li>
          <li><label>Masquerade:</label> Apply for you and your group to participate in this year's Masquerade. Please note that Hall Cosplay has been merged with the Masquerade this year.</li>
          <?php /* <li><b>Hall Cosplay:</b> Sign up for you and your group to be in the Hall Cosplay Contest. This event is first-come, first-serve with a small waitlist.</li> */ ?>
          <?php /* <li><label>Arda Contest:</label> Apply for you and up to one other person to participate in this year's special Arda Wigs Cosplay Contest.</li> */ ?>
          <li><label>My Forum Profile:</label> The User Control Panel for the Anime Boston forums. Here you may change your forum username, password, avatar, and other settings.</li>
          <li><label>Log Out:</label> Will log you out of the Cosplay HQ and the Anime Boston forums.</li>
        </ul>
      <?php } ?>

      <p>
        Please keep in mind that Cosplay HQ is a new system and as such there may be some bugs left to iron out.
        If you encounter any problems or have questions, please post in
        <a href="https://forums.animeboston.com/viewtopic.php?t=16195">this thread on our forums</a>.
      </p>

      <p>Thank you,<br>-The Anime Boston Cosplay Events Staff</p>
    </div>
  </div>
</div>