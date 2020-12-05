<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/artists/">Artists</a></li>
  <li><a href="/artists/artists_alley/">Artists Alley</a></li>
  <li>Artists Alley Registration - Phase 2</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<div class="page-body clearfix">
  <h1>Artist Alley Registration - Phase 2</h1>

  <p>
    This is Phase 2 for the Anime Boston <?=$currentyear?> Artists' Alley registration.
    In this phase you will be able to <i>decrease</i> your desired table space (thus paying less for it),
    register your assistants and other artists at your table for the Artists' Alley
    <b>(does NOT include their convention registration, must be done separately for each assistant)</b>,
    and ultimately pay for your Artists' Alley table, and register <b>yourself</b>
    for Anime Boston <?=$currentyear?> if you have not already.
  </p>

  <?php aa_reg_warning(); ?>

  <hr>

  <form class="form-horizontal" action="/forms/artists_alley_registration/" method="post">
    <?php echo ab_error_summary(); ?>
    <p>Please enter your email address and the confirmation code you received from the Artists' Alley Manager.</p>
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

  <p>If you have any questions or problems, please <a href="/coninfo/contact/16" target="_blank">contact the Artists' Alley Manager</a>.</p>
</div>
