<?php $is_create = ($application_id == ''); ?>
<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/staff/">Staff</a></li>
  <li><a href="/staffhq/">Staff HQ</a></li>
  <li><a href="/staffhq/applications/">Staff Applications</a></li>
  <li>Application</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();

$optional_label_class = $optional_label["class"];
$required_label_class = $required_label["class"];
?>

<div class="page-body clearfix">
  <h1>Staff Applications</h1>

  <div class="staffhq">
    <div class="staffhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('staffhq_menu.php'); ?>
    </div>
    <div class="staffhq-content col-lg-9 col-md-8 col-sm-8">
      <?php if($easter) { ?>
        <p class="bg-danger" style="padding: 5px;">
          <strong>WARNING</strong>: Anime Boston <?=$currentyear?> occurs on Easter.
          If your religious or family obligations will impact your ability to perform your staff duties,
          we encourage you to try again in the future. Unfortunately, the dates of Anime Boston are booked out years in advance and often fall on a holiday or holiday weekend.
        </p>
      <?php } ?>
      <p>Below you will find any existing applications you have for this convention year. You may create a new application for each position you would like to apply to.</p>
      <p>Please be aware that it may take several weeks to hear back regarding your application. Each Division processes their applications in a different pace, so time will vary.</p>

      <form class="form-horizontal" action="/staffhq/application/<?php echo $is_create ? "" : $application_id; ?>" method="post">
        <?php echo ab_error_summary(); ?>
        <input type="hidden" name="application_id" value="<?php echo set_value('application_id', $application_id); ?>">
        <p><span class="required">*</span> = Required information</p>
        <div class="row form-group <?php echo ab_error_style("position_id"); ?>">
          <?=form_label('Position *', "position_id", $required_label)?>
          <div class="col-md-8">
            <select name="position_id" class="form-control">
              <option value="">Select One</option>
              <?php
              $current_div = 0;

              if (isset($positions) && count($positions) > 0)
              {
                $current_division = '';

                foreach ($positions as $row2)
                {
                  $pos_id = $row2['position_id'];
                  $pos_name = $row2['position_name'];
                  $pos_brief_description = $row2['brief_description'];
                  $pos_division_id = $row2['division_id'];
                  $pos_max_population = $row2['max_population'];
                  $pos_division_name = $row2['division_name'];
                  $pos_filled = $row2['filled'];

                  $selected = ($position_id == $pos_id) ? 'selected' : '';

                  $open_spaces = $pos_max_population - $pos_filled;

                  if ($open_spaces > 0 || $position_id == $pos_id)
                  {
                    if(strcmp($current_division,$pos_division_name) != 0)
                    {
                      $current_division = $pos_division_name;
                      echo '<option value="" disabled>-'.$pos_division_name.' Division</option>';
                    }

                    //Prints out the position option
                    echo '<option value="'.$pos_id.'" '.$selected.'> &nbsp;&nbsp;&nbsp;'.$pos_name.'</option>';
                  }
                }
              }
              ?>
            </select>
            <?php echo ab_error_message("position_id"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("experience"); ?>">
          <?=form_label('Experience *', "experience", $required_label)?>
          <div class="col-md-8">
            List any previous experience you may have with this type of position and/or convention staffing in general.<br>
            <textarea name="experience" class="form-control" rows="8" cols="40"><?php echo set_value('experience', $experience); ?></textarea>
            <?php echo ab_error_message("experience"); ?>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('References *', '', $required_label)?>
          <div class="col-md-8">
            Please provide <em>at least two references</em> we can contact
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("ref1_name"); ?>">
          <?=form_label('First Referer Name *', "ref1_name", $required_label)?>
          <div class="col-md-8">
            <input type="text" name="ref1_name" class="form-control" maxlength="70" value="<?php echo set_value('ref1_name', $ref1_name); ?>">
            <?php echo ab_error_message("ref1_name"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("ref1_contact"); ?>">
          <?=form_label('E-Mail or Phone *', "ref1_contact", $required_label)?>
          <div class="col-md-8">
            <input type="text" name="ref1_contact" class="form-control" maxlength="70" value="<?php echo set_value('ref1_contact', $ref1_contact); ?>">
            <?php echo ab_error_message("ref1_contact"); ?>
          </div>
        </div>
        <div class="row"><div class="col-xs-12"><hr></div></div>
        <div class="row form-group <?php echo ab_error_style("ref2_name"); ?>">
          <?=form_label('Second Referer Name *', "ref2_name", $required_label)?>
          <div class="col-md-8">
            <input type="text" name="ref2_name" class="form-control" maxlength="70" value="<?php echo set_value('ref2_name', $ref2_name); ?>">
            <?php echo ab_error_message("ref2_name"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("ref2_contact"); ?>">
          <?=form_label('E-Mail or Phone *', "ref2_contact", $required_label)?>
          <div class="col-md-8">
            <input type="text" name="ref2_contact" class="form-control" maxlength="70" value="<?php echo set_value('ref2_contact', $ref2_contact); ?>">
            <?php echo ab_error_message("ref2_contact"); ?>
          </div>
        </div>
        <div class="row"><div class="col-xs-12"><hr></div></div>
        <div class="row form-group <?php echo ab_error_style("ref3_name"); ?>">
          <?=form_label('Third Referer Name', "ref3_name", $optional_label)?>
          <div class="col-md-8">
            <input type="text" name="ref3_name" class="form-control" maxlength="70" value="<?php echo set_value('ref3_name', $ref3_name); ?>">
            <?php echo ab_error_message("ref3_name"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("ref3_contact"); ?>">
          <?=form_label('E-Mail or Phone', "ref3_contact", $optional_label)?>
          <div class="col-md-8">
            <input type="text" name="ref3_contact" class="form-control" maxlength="70" value="<?php echo set_value('ref3_contact', $ref3_contact); ?>">
            <?php echo ab_error_message("ref3_contact"); ?>
          </div>
        </div>
        <div class="row"><div class="col-xs-12"><hr></div></div>
        <div class="row form-group <?php echo ab_error_style("other"); ?>">
          <?=form_label('Other Information', "other", $optional_label)?>
          <div class="col-md-8">
            Use this space to share any other relevant information.
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
          <div class="col-xs-12" style="text-align:center;">
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
