<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/cosplay/">Cosplay</a></li>
  <li><a href="/cosplayhq/">Cosplay HQ</a></li>
  <li><a href="/cosplayhq/mycostumes/">My Costumes</a></li>
  <li><a href="/cosplayhq/mycostumes_photos/<?=$costume_id?>">Costume Photos</a></li>
  <li>Add Photo</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();

$cosplayer_id = $costume['cosplayer_id'];
$costume_name = $costume['costume_name'];
$character_name = $costume['character_name'];
$series_name = $costume['series_name'];
$series_genre = $costume['series_genre'];
$created_timestamp = $costume['created_timestamp'];
?>

<div class="page-body clearfix">
  <h1>Add Photo</h1>

  <div class="cosplayhq">
    <div class="cosplayhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('cosplayhq_menu.php'); ?>
    </div>
    <div class="cosplayhq-content col-lg-9 col-md-8 col-sm-8">
      <p>Use the field below to upload a new photo for this costume.</p>

      <h2>Costume: <?=$costume_name?></h2>
      <p>
        <label>Character Name:</label> <?=$character_name?><br>
        <label>Series Name:</label> <?=$series_name?><br>
        <label>Series Genre:</label> <?=$series_genre?><br>
        <label>Date Created:</label> <?php echo date('m-d-Y',strtotime($created_timestamp)); ?>
      </p>

      <b>Important Info:</b>
      <ul>
        <li>Each photo must be of <strong>YOU</strong> in the costume and not the original character or the costume alone.</li>
        <li>It is better to use a photo of just yourself and not a group photo.</li>
        <li>Photos must be .PNG, .JPG, or .GIF format.</li>
        <li>Photos must not be larger than 2MB in size.</li>
        <li>Sexually explicit or otherwise inappropriate photos are not allowed.</li>
      </ul>

      <form class="form-horizontal" action="/cosplayhq/mycostumes_photos_add/<?=$costume_id?>" enctype="multipart/form-data" method="post">
        <p><span class="required">*</span> = Required information</p>
        <div class="row form-group <?php echo ab_error_style("file_name"); ?>">
          <?=form_label('Photo File *', 'file_name', $required_label)?>
          <div class="col-md-6">
            <input type="file" name="file_name">
            <?php echo ab_error_message("file_name"); ?>
          </div>
        </div>
        <div class="submit-buttons">
          <input type="submit" name="submit" class="btn btn-success" value="Add Photo">
        </div>
      </form>
    </div>
  </div>
</div>
