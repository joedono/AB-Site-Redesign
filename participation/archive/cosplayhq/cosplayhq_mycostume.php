<?php $is_create = $costume_id == ''; ?>
<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/cosplay/">Cosplay</a></li>
  <li><a href="/cosplayhq/">Cosplay HQ</a></li>
  <li><a href="/cosplayhq/mycostumes">My Costumes</a></li>
  <li><?php echo $is_create ? "Create" : "Edit"; ?> Costume</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<div class="page-body clearfix">
  <h1><?php echo $is_create ? "Create" : "Edit"; ?> Costume</h1>

  <div class="cosplayhq">
    <div class="cosplayhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('cosplayhq_menu.php'); ?>
    </div>
    <div class="cosplayhq-content col-lg-9 col-md-8 col-sm-8">
      <?php if($is_create) { ?>
        <p>Enter information in the fields below to create a new costume.</p>
      <?php } else { ?>
        <p>You may alter the information for your costume in the fields below.</p>
      <?php } ?>

      <form class="form-horizontal" action="/cosplayhq/mycostume/<?php echo $is_create ? "" : $costume_id; ?>" method="post">
        <?php echo ab_error_summary(); ?>
        <p><span class="required">*</span> = Required information</p>
        <div class="row form-group <?php echo ab_error_style("costume_name"); ?>">
          <?=form_label('Costume Name *', 'costume_name', $required_label)?>
          <div class="col-md-6">
            <input type="text" name="costume_name" class="form-control" maxlength="70" value="<?php echo set_value('costume_name', $costume_name)?>">
            <?php echo ab_error_message("costume_name"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("character_name"); ?>">
          <?=form_label('Character Name *', 'character_name', $required_label)?>
          <div class="col-md-6">
            <input type="text" name="character_name" class="form-control" maxlength="70" value="<?php echo set_value('character_name', $character_name)?>">
            <?php echo ab_error_message("character_name"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("series_name"); ?>">
          <?=form_label('Series Name *', 'series_name', $required_label)?>
          <div class="col-md-6">
            <input type="text" name="series_name" class="form-control" maxlength="70" value="<?php echo set_value('series_name', $series_name)?>">
            <?php echo ab_error_message("series_name"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("series_genre"); ?>">
          <?=form_label('Series Genre *', 'series_genre', $required_label)?>
          <div class="col-md-4">
            <?php
            $genreoptions = array(
                '' => 'Select One',
                'Anime' => 'Anime',
                'Manga' => 'Manga',
                'Video Game' => 'Video Game',
                'Other' => 'Other'
            );
            echo form_dropdown("series_genre", $genreoptions, $series_genre, ab_dropdown_class());
            ?>
            <?php echo ab_error_message("series_genre"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("other_info"); ?>">
          <?=form_label('Other Info', 'other_info', $optional_label)?>
          <div class="col-md-8">
            <span class="input-subtitle">Any other relevent information about the costume.</span>
            <textarea name="other_info" class="form-control" rows="8" cols="40"><?php echo set_value('other_info', $other_info); ?></textarea>
            <?php echo ab_error_message("other_info"); ?>
          </div>
        </div>
        <?php if(!$is_create) { ?>
          <div class="row form-group <?php echo ab_error_style("other_info"); ?>">
            <?=form_label('Date Created', 'other_info', $optional_label)?>
            <div class="col-md-8"><?php echo date('m-d-Y',strtotime($created_timestamp)); ?></div>
          </div>
        <?php } ?>
        <div class="submit-buttons">
          <input type="submit" name="submit" class="btn btn-success" value="<?php echo $is_create ? "Create" : "Edit"; ?> Costume">
        </div>
      </form>
    </div>
  </div>
</div>
