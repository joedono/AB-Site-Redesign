<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/cosplay/">Cosplay</a></li>
  <li><a href="/cosplayhq/">Cosplay HQ</a></li>
  <li>My Costumes</li>
</ul>

<div class="page-body clearfix">
  <h1>My Costumes</h1>

  <div class="cosplayhq">
    <div class="cosplayhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('cosplayhq_menu.php'); ?>
    </div>
    <div class="cosplayhq-content col-lg-9 col-md-8 col-sm-8">
      <p>Here is a list of all Costumes you have entered for participation in Cosplay Games at Anime Boston.</p>
      <ul>
        <li>Costumes are required to apply to participate in the Cosplay Games.</li>
        <li>You may Retire old costumes. This will keep them in the system for archiving, but they won't be available to apply to events with.</li>
        <li>You can always Activate a retired costume to use it again.</li>
        <li>Once the application phase closes for events, you will not be able to edit costume entries or make new ones until after the convention.</li>
      </ul>

      <?php cosplayhq_costume_lock(); ?>
      <?php cosplayhq_confirmation(); ?>

      <?php
      $active_total = count($active_costumes);
      $inactive_total = count($inactive_costumes);
      $total_costumes = $active_total + $inactive_total;
      ?>

      <div class="cosplayhq-costume-header">
        <a class="pull-right btn btn-primary" href="/cosplayhq/mycostume/">Create New Costume</a>
        Total Costumes: <?=$total_costumes?><br>
        <a href="#active">Active Costumes:</a> <?=$active_total?><br>
        <a href="#retired">Retired Costumes:</a> <?=$inactive_total?>
      </div>

      <h3><a name="active">Active Costumes</a></h3>
      <?php
      if($active_total > 0)
      {
        foreach($active_costumes as $row)
        {
          $costume_id = $row['costume_id'];
          $cosplayer_id = $row['cosplayer_id'];
          $costume_name = $row['costume_name'];
          $character_name = $row['character_name'];
          $series_name = $row['series_name'];
          $series_genre = $row['series_genre'];
          $created_timestamp = $row['created_timestamp'];
          $status = $row['status'];
          $other_info = $row['other_info'];

          if ($other_info == '')
          {
            $other_info = 'None.';
          }

          $cos_photos = array();

          foreach($photos as $row2)
          {
            $photo_id = $row2['photo_id'];
            $photo_costume_id = $row2['costume_id'];
            $file_name  = $row2['file_name'];
            $thumbnail_file_name  = $row2['thumbnail_file_name'];
            $submitted_timestamp = $row2['submitted_timestamp'];

            if($photo_costume_id == $costume_id)
            {
              $cos_photos[] = array(
                  'photo_id' => $photo_id,
                  'file_name' => $file_name,
                  'thumbnail_file_name' => $thumbnail_file_name,
                  'submitted_timestamp' => $submitted_timestamp
              );
            }
          }
          ?>
          <div class="cosplayhq-costume clearfix">
            <?php if(count($cos_photos) == 0) { ?>
              <div class="pull-right text-danger col-sm-5">
                You must add a photo for this costume to apply for Cosplay Events with it.
              </div>
            <?php } else { ?>
              <div class="pull-right">
                <?php
                for($i = 0; $i < count($cos_photos); $i++)
                {
                  $photo = $cos_photos[$i];

                  $file_name = $photo['file_name'];
                  $thumbnail_file_name = $photo['thumbnail_file_name'];
                  $folder_path = '/images/cosplayhq/costume_photos/' .$forum_id. '/';
                  $thumb_path = $folder_path . $thumbnail_file_name;
                  $pic_path = $folder_path . $file_name;

                  if($i > 0 && ($i % 2) == 0) { echo '<br>'; }
                  ?>
                  <a href="<?=$pic_path?>"><img style="margin:5px;" src="<?=$thumb_path?>"></a>
                <?php } ?>
              </div>
            <?php } ?>
            <h4><a name="cos<?=$costume_id?>">Costume: <?=$costume_name?></a></h4>
            <div class="cosplayhq-buttons">
              <a class="btn btn-default btn-xs" href="/cosplayhq/mycostume/<?=$costume_id?>">Edit Costume</a>
              <a class="btn btn-default btn-xs" href="/cosplayhq/mycostumes_photos/<?=$costume_id?>">Manage Photos</a>
              <?php if(strcmp($status,'Active') == 0) { ?>
                <a class="btn btn-danger btn-xs" href="/cosplayhq/mycostumes_retire/<?=$costume_id?>">Retire Costume</a>
              <?php } else { ?>
                <a class="btn btn-warning btn-xs" href="/cosplayhq/mycostumes_retire/<?=$costume_id?>">Activate Costume</a>
              <?php } ?>
            </div>

            <p>
              <label>Character Name:</label> <?=$character_name?><br>
              <label>Series Name:</label> <?=$series_name?><br>
              <label>Series Genre:</label> <?=$series_genre?><br>
              <label>Date Created:</label> <?php echo date('m-d-Y',strtotime($created_timestamp)); ?><br>
              <label>Status:</label> <?=$status?><br>
              <label>Other Info:</label> <?=$other_info?>
            </p>
          </div>
        <?php } ?>
      <?php } else { ?>
        <p>You currently have no active costumes. Please <a href="/cosplayhq/mycostumes_create/">Create a new costume</a> to apply to Cosplay Games.</p>
      <?php } ?>

      <h3><a name="retired">Retired Costumes</a></h3>
      <?php
      if($inactive_total > 0)
      {
        foreach($inactive_costumes as $row)
        {
          $costume_id = $row['costume_id'];
          $cosplayer_id = $row['cosplayer_id'];
          $costume_name = $row['costume_name'];
          $character_name = $row['character_name'];
          $series_name = $row['series_name'];
          $series_genre = $row['series_genre'];
          $created_timestamp = $row['created_timestamp'];
          $status = $row['status'];
          $other_info = $row['other_info'];

          if ($other_info == '')
          {
            $other_info = 'None.';
          }

          $cos_photos = array();

          foreach($photos as $row2)
          {
            $photo_id = $row2['photo_id'];
            $photo_costume_id = $row2['costume_id'];
            $file_name  = $row2['file_name'];
            $thumbnail_file_name  = $row2['thumbnail_file_name'];
            $submitted_timestamp = $row2['submitted_timestamp'];

            if($photo_costume_id == $costume_id)
            {
              $cos_photos[] = array(
                  'photo_id' => $photo_id,
                  'file_name' => $file_name,
                  'thumbnail_file_name' => $thumbnail_file_name,
                  'submitted_timestamp' => $submitted_timestamp
              );
            }
          }
          ?>
          <div class="cosplayhq-costume clearfix">
            <?php if(count($cos_photos) == 0) { ?>
              <div class="pull-right text-danger col-sm-5">
                You must add a photo for this costume to apply for Cosplay Events with it.
              </div>
            <?php } else { ?>
              <div class="pull-right">
                <?php
                for($i = 0; $i < count($cos_photos); $i++)
                {
                  $photo = $cos_photos[$i];

                  $file_name = $photo['file_name'];
                  $thumbnail_file_name = $photo['thumbnail_file_name'];
                  $folder_path = '/images/cosplayhq/costume_photos/' .$forum_id. '/';
                  $thumb_path = $folder_path . $thumbnail_file_name;
                  $pic_path = $folder_path . $file_name;

                  if($i > 0 && ($i % 2) == 0) { echo '<br>'; }
                  ?>
                  <a href="<?=$pic_path?>"><img style="margin:5px;" src="<?=$thumb_path?>"></a>
                <?php } ?>
              </div>
            <?php } ?>

            <h4><a name="cos<?=$costume_id?>">Costume: <?=$costume_name?></a></h4>
            <div class="cosplayhq-buttons">
              <a class="btn btn-default btn-xs"href="/cosplayhq/mycostume/<?=$costume_id?>">Edit Costume</a>
              <a class="btn btn-default btn-xs"href="/cosplayhq/mycostumes_photos/<?=$costume_id?>">Manage Photos</a>
              <?php if(strcmp($status,'Active') == 0) { ?>
                <a class="btn btn-danger btn-xs" href="/cosplayhq/mycostumes_retire/<?=$costume_id?>">Retire Costume</a>
              <?php } else { ?>
                <a class="btn btn-warning btn-xs" href="/cosplayhq/mycostumes_retire/<?=$costume_id?>">Activate Costume</a>
              <?php } ?>
            </div>

            <p>
              <label>Character Name:</label> <?=$character_name?><br>
              <label>Series Name:</label> <?=$series_name?><br>
              <label>Series Genre:</label> <?=$series_genre?><br>
              <label>Date Created:</label> <?php echo date('m-d-Y',strtotime($created_timestamp)); ?><br>
              <label>Status:</label> <?=$status?><br>
              <label>Other Info:</label> <?=$other_info?>
            </p>
          </div>
        <?php } ?>
      <?php } else { ?>
        <p>You currently have no retired costumes</p>
      <?php } ?>
    </div>
  </div>
</div>