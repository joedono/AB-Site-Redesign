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

  <p class="text-danger">The AMV Upload form will be down each day 4:45am - 5:00am EST for maintenance.</p>

  <hr>

  <form class="form-horizontal" action="/forms/amv_upload/" method="post">
    <?php echo ab_error_summary(); ?>
    <p>Please enter your email address and the confirmation code you received from the AMV Contest Coordinator.</p>
    <div class="row form-group <?php echo ab_error_style("login_email"); ?>">
      <?=form_label('Email Address', 'login_email', $optional_label)?>
      <div class="col-md-5">
        <input type="email" name="login_email" class="form-control" value="<?php echo set_value("login_email", $login_email); ?>">
        <?php echo ab_error_message("login_email"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("login_conf_code"); ?>">
      <?=form_label('Confirmation Code', 'login_conf_code', $optional_label)?>
      <div class="col-md-5">
        <input type="text" name="login_conf_code" class="form-control" value="<?php echo set_value("login_conf_code", $login_conf_code); ?>">
        <?php echo ab_error_message("login_conf_code"); ?>
      </div>
    </div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit">
    </div>
  </form>
</div>
