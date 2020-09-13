<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/cosplay/">Cosplay</a></li>
  <li><a href="/cosplayhq/">Cosplay HQ</a></li>
  <li><a href="/cosplayhq/mycostumes/">My Costumes</a></li>
  <li>Costume Photos</li>
</ul>

<div class="page-body clearfix">
  <h1>Costume Photos</h1>

  <div class="cosplayhq">
    <div class="cosplayhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('cosplayhq_menu.php'); ?>
    </div>
    <div class="cosplayhq-content col-lg-9 col-md-8 col-sm-8">
      <p>Below you may add or remove photos for your costume. You may have up to <?=$cosplayhq_costume_photos_max?> for a costume.</p>
      <?php
      $costume_id = $costume['costume_id'];
      $cosplayer_id = $costume['cosplayer_id'];
      $costume_name = $costume['costume_name'];
      $character_name = $costume['character_name'];
      $series_name = $costume['series_name'];
      $series_genre = $costume['series_genre'];
      $created_timestamp = $costume['created_timestamp'];
      ?>

      <div class="alert alert-danger"><?=validation_errors()?></div>

      <h2>Costume: <?=$costume_name?></h2>
      <p>
        <label>Character Name:</label> <?=$character_name?><br>
        <label>Series Name:</label> <?=$series_name?><br>
        <label>Series Genre:</label> <?=$series_genre?><br>
        <label>Date Created:</label> <?php echo date('m-d-Y',strtotime($created_timestamp)); ?><br>
        <?php if(count($photos) < $cosplayhq_costume_photos_max) { ?>
          <a class="btn btn-primary" href="/cosplayhq/mycostumes_photos_add/<?=$costume_id?>">Add Photo</a>
        <?php } ?>
      </p>

      <?php cosplayhq_confirmation(); ?>

      <?php if(count($photos) > 0) { ?>
        <form action="/cosplayhq/mycostumes_photos/<?=$costume_id?>" method="post">
          <table class="table table-striped table-bordered">
            <tr>
              <th>Delete</th>
              <th>Primary</th>
              <th>Photo</th>
              <th>Date Uploaded</th>
            </tr>
            <?php
            foreach($photos as $row)
            {
              $photo_id = $row['photo_id'];
              $costume_id = $row['costume_id'];
              $file_name = $row['file_name'];
              $original_file_name = $row['original_file_name'];
              $thumbnail_file_name = $row['thumbnail_file_name'];
              $submitted_timestamp = $row['submitted_timestamp'];
              $folder_path = '/images/cosplayhq/costume_photos/' .$forum_id. '/';
              $thumb_path = $folder_path . $thumbnail_file_name;
              $pic_path = $folder_path . $file_name;

              $delete_checked = '';
              if(isset($delete[$photo_id]))
              {
                $delete_checked = ($delete[$photo_id] == 1) ? 'checked' : '';
              }
              ?>
              <tr>
                <td><input type="checkbox" name="delete[<?=$photo_id?>]" class="form-control input-sm" value="1" <?=$delete_checked?>></td>
                <td><input type="radio" name="is_primary" value="<?=$photo_id?>"class="form-control input-sm"  <?php echo $is_primary == $photo_id ? "checked" : ""; ?>></td>
                <td><a href="<?=$pic_path?>" target="_blank"><img src="<?=$thumb_path?>" style="margin:5px;"></a></td>
                <td><?php echo date('m/d/Y', strtotime($submitted_timestamp)); ?></td>
              </tr>
            <?php } ?>
          </table>
          <div class="submit-buttons">
            <input type="submit" name="submit" class="btn btn-success" value="Submit">
          </div>
        </form>
      <?php } else { ?>
        <p class="text-danger">You currently have no photos for this costume. You cannot apply for Cosplay Events with this costume until you add a photo.</p>
      <?php } ?>
    </div>
  </div>
</div>