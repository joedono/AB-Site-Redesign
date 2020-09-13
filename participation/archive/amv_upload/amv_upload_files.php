<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/programming/">Programming</a></li>
  <li>Anime Music Video Contest - Upload</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<div class="page-body clearfix">
  <h1>Anime Music Video Contest - Upload</h1>

  <p>
    This is the upload section for the <?=$currentyear?> AMV Contest.
    You will be able to electronically submit your AMV submissions via a file upload process.
    To do this, you must have already submitted your contest information via the <a href="/forms/amv/">AMV Contest Form</a>.
    If you have not, you will not be able to upload your file.
  </p>
  <p>
    If any of your AMV information needs to be changed, please contact the
    <a href="/coninfo/contact/42" target="_blank">AMV Contest Coordinator</a>.
  </p>
  <hr>

  <p><b>AMV Upload File</b></p>

  <form class="form-horizontal" action="/forms/amv_upload/" enctype="multipart/form-data" method="post">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required information</p>
    <input type="hidden" name="amv_id" value="<?=$amv_id?>">
    <div class="row form-group">
      <?=form_label('AMV', '', $optional_label)?>
      <div class="col-md-8"><?=$amv_title?> by <?=$amv_credits?></div>
    </div>
    <div class="row form-group <?php echo ab_error_style("amv_id"); ?>">
      <?=form_label('File *', 'amv_id', $required_label)?>
      <div class="col-md-6">
        <input type="file" name="file_name">
        <span class="input-subtitle">Check <a href="/programming/amv_contest/" target="_new">AMV Contest Rules</a> for allowed file formats. File may not exceed 1GB in size.</span>
        <?php echo ab_error_message("amv_id"); ?>
        <?php echo ab_error_message("file_name"); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        Page may take several minutes to process, depending on file size.
        It is highly recommended to upload large files over a wired connection.
      </div>
    </div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Upload">
    </div>
  </form>

  <form class="form-horizontal pull-right" action="/forms/amv_upload/" method="post">
    <div class="submit-buttons">
      <input type="hidden" name="cancel" value="1">
      <input type="submit" name="submit" class="btn btn-danger" value="Cancel Upload">
    </div>
  </form>
</div>
