<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/staff/">Staff</a></li>
  <li><a href="/staffhq/">Staff HQ</a></li>
  <li>Legacy Application</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();

$optional_label_class = $optional_label["class"];
$required_label_class = $required_label["class"];
?>

<div class="page-body clearfix">
  <h1>Legacy Staff Application</h1>
  <div class="staffhq">
    <div class="staffhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('staffhq_menu.php'); ?>
    </div>
    <div class="staffhq-content col-lg-9 col-md-8 col-sm-8">
      <?php
      if($application_status != '')
      {
        $status_output = 'Error';
        if($application_status == 'Undecided')
        {
          $status_output = 'Pending Review';
        }
        else if($application_status == 'Approved'
             || $application_status == 'Waitlisted'
             || $application_status == 'Denied'
             || $application_status == 'Canceled')
        {
          $status_output = $application_status;
        }
      ?>
        <div style="margin: 0px 0px 10px 10px;">
          <b>Application Status:</b>
          <?=$status_output; ?>
        </div>
      <?php
      }

      if($years_needed)
      {
      ?>
        <div class="row has-error">
          <div class="col-xs-12 text-center">
            <label class="control-label required">Unable to submit application, seven years staffing is required.</label>
          </div>
        </div>
      <?php
      }
      ?>
      <p>Below you will find the application for Legacy Staff. In order to apply, you must have been on staff seven years for Anime Boston in good standing. Legacy Staff does not include food cards or hotel rooms.</p>
      <p>Please be aware that it may take several weeks to hear back regarding your application. Each Division processes their applications in a different pace, so time will vary.</p>

      <form class="form-horizontal" action="/staffhq/legacyapplication/" method="post">
        <?php echo ab_error_summary(); ?>
        <p><span class="required">*</span> = Required information</p>
        <div class="row form-group <?php echo ab_error_style("experience"); ?>">
          <?=form_label('Experience *', "experience", $required_label)?>
          <div class="col-md-8">
            <span class="input-subtitle">List all previous positions you have held with Anime Boston.</span><br />
            <textarea name="experience" class="form-control" rows="8" cols="40"><?php echo set_value('experience', $experience); ?></textarea>
            <?php echo ab_error_message("experience"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("other"); ?>">
          <?=form_label('Other Information', "other", $optional_label)?>
          <div class="col-md-8">
            <span class="input-subtitle">Use this space to share any other relevant information.</span><br />
            <textarea name="other" class="form-control" rows="8" cols="40"><?php echo set_value('other', $other); ?></textarea>
            <?php echo ab_error_message("other"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("age_verification"); ?>">
          <?=form_label('Verification *', "age_verification", $required_label)?>
          <div class="col-md-8">
            <label class="control-label">I am currently 18 years of age or older</label><br>
            <?php
            $ageyes = $age_verification == 'Y' ? "checked" : "";
            $ageno = $age_verification == 'N' ? "checked" : "";
            ?>
            <label><input type="radio" name="age_verification" value="Y" <?=$ageyes?>> Yes</label>
            <label><input type="radio" name="age_verification" value="N" <?=$ageno?>> No</label>
            <?php echo ab_error_message("age_verification"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("staff_guidelines"); ?>">
          <div class="col-xs-12 text-center">
            <label class="control-label required">I have read and agree to abide by the <a href="/staff/staff_guidelines/" target="_blank">staff guidelines</a></label><br>
            <?php
            $guideyes = $staff_guidelines == 'Y' ? "checked" : "";
            $guideno = $staff_guidelines == 'N' ? "checked" : "";
            ?>
            <label><input type="radio" name="staff_guidelines" value="Y" <?=$guideyes?>> I agree</label>
            <label><input type="radio" name="staff_guidelines" value="N" <?=$guideno?>> I do not agree</label>
            <?php echo ab_error_message("staff_guidelines"); ?>
          </div>
        </div>
        <div class="submit-buttons">
          <input type="submit" name="submit" class="btn btn-success" value="Submit">
        </div>
      </form>
    </div>
  </div>
</div>
