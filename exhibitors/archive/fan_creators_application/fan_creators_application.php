<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/programming/">Programming</a></li>
  <li>Creator Spotlight Signup</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();

$optional_short_label = ab_optional_short_label();
$required_short_label = ab_required_short_label();
?>

<div class="page-body clearfix">
  <h1>Creator Spotlight Signup</h1>

  <p>
    For Anime Boston <?=$currentyear?>, the Fan Creations team is holding a Creator Spotlight event.
    Creator spotlights are a chance for AMV Editors attending Anime Boston to introduce themselves and show off a few of their videos to a receptive audience.
  </p>
  <strong>Format</strong>
  <ul>
    <li>Participants will be given 10-15* minutes to present during a creator spotlight block. This time is for you to organize how you like (but will be enforced so everyone involved can get their time). Most folks introduce themselves, say a few words about the videos they have, and then show them.</li>
    <li>Schedules are always subject to change, but, for purposes of planning, the Creator Spotlight event will tentatively be held sometime on Friday afternoon.</li>
  </ul>
  <p>* exact time TBD based on demand.</p>
  <strong>Rules</strong>
  <ul>
    <li>All content will be held to the same PG13 standards that govern the AMV contest.</li>
    <li>All videos to be shown should be provided to Fan Creations no later than 1 week prior to Anime Boston <?=$currentyear?> (we will work with you to get this done).</li>
    <li>No <?=$currentyear?> AMV Contest finalist videos should be shown.</li>
    <li>Signups will be considered in order of entry and limited to 9 participants. Additional people will be waitlisted as backups if they so choose.</li>
  </ul>

  <form class="form-horizontal" name="frm_fan_creators" action="/forms/fan_creators_application/" method="post">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required information</p>
    <div class="row form-group <?php echo ab_error_style("first_name"); ?>">
      <?=form_label('First Name *', 'first_name', $required_label)?>
      <div class="col-md-5">
        <input type="text" name="first_name" class="form-control" maxlength="120" value="<?php echo set_value("first_name", $first_name); ?>">
        <?php echo ab_error_message("first_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("last_name"); ?>">
      <?=form_label('Last Name *', 'last_name', $required_label)?>
      <div class="col-md-5">
        <input type="text" name="last_name" class="form-control" maxlength="120" value="<?php echo set_value("last_name", $last_name); ?>">
        <?php echo ab_error_message("last_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("creator_name"); ?>">
      <?=form_label('Creator Name', 'creator_name', $optional_label)?>
      <div class="col-md-5">
        <input type="text" name="creator_name" class="form-control" maxlength="120" value="<?php echo set_value("creator_name", $creator_name); ?>">
        <?php echo ab_error_message("creator_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("email"); ?>">
      <?=form_label('E-Mail Address *', 'email', $required_label)?>
      <div class="col-md-6">
        <input type="email" name="email" class="form-control" maxlength="120" value="<?php echo set_value("email", $email); ?>">
        <?php echo ab_error_message("email"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("email_confirm"); ?>">
      <?=form_label('Confirm E-Mail Address *', 'email_confirm', $required_label)?>
      <div class="col-md-6">
        <input type="email" name="email_confirm" class="form-control" maxlength="120" value="<?php echo set_value("email_confirm", $email_confirm); ?>">
        <?php echo ab_error_message("email_confirm"); ?>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Date of Birth *', '', $required_label)?>
      <div class="col-xs-9 form-inline">
        <label class="required">Month</label>
        <?php
        $options = array("" => "");
        for($month = 1; $month < 13; $month++)
        {
          $mon = sprintf('%02d',$month);
          $options[$mon] = $mon;
        }

        echo form_dropdown("birth_month", $options, $birth_month, ab_dropdown_class());
        ?>
        <label class="required">Day</label>
        <?php
        $options = array("" => "");
        for($day = 1; $day < 32; $day++)
        {
          $da = sprintf('%02d',$day);
          $options[$da] = $da;
        }

        echo form_dropdown("birth_day", $options, $birth_day, ab_dropdown_class());
        ?>
        <label class="required">Year</label>
        <?php
        $thisyear = date('Y');
        $thisyear = (int)$thisyear;
        $options = array("" => "");
        for($year = $thisyear; $year >= $thisyear - 80; $year--)
        {
          $options[$year] = $year;
        }

        echo form_dropdown("birth_year", $options, $birth_year, ab_dropdown_class());
        ?>
      </div>
    </div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit">
      <input type="reset" name="reset" class="btn btn-default" value="Reset">
    </div>
  </form>
</div>
