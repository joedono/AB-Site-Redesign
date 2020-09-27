<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/registration/">Registration</a></li>
  <li>Community/Convention Row Application</a></li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<div class="page-body clearfix">
  <h1>Community/Convention Row Application</h1>

  <form class="form-horizontal" action="/forms/community_row_application/" method="post">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required information</p>
    <div class="row form-group <?php echo ab_error_style("organization_name"); ?>">
      <?=form_label('Organization/Event Name *', 'organization_name', $required_label)?>
      <div class="col-md-6">
        <input type="text" name="organization_name" class="form-control" maxlength="255" value="<?php echo set_value('organization_name', $organization_name)?>">
        <?php echo ab_error_message("organization_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("location"); ?>">
      <?=form_label('Location', 'location', $optional_label)?>
      <div class="col-md-7">
        <input type="text" name="location" class="form-control" maxlength="500" value="<?php echo set_value('location', $location)?>">
        <?php echo ab_error_message("location"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("website"); ?>">
      <?=form_label('Organization/Event Website', 'website', $optional_label)?>
      <div class="col-md-5">
        <input type="text" name="website" class="form-control" maxlength="255" value="<?php echo set_value('website', $website)?>">
        <?php echo ab_error_message("website"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("contact_name"); ?>">
      <?=form_label('Point of Contact Name *', 'contact_name', $required_label)?>
      <div class="col-md-5">
        <input type="text" name="contact_name" class="form-control" maxlength="50" value="<?php echo set_value('contact_name', $contact_name)?>">
        <?php echo ab_error_message("contact_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("contact_email"); ?>">
      <?=form_label('Point of Contact Email *', 'contact_email', $required_label)?>
      <div class="col-md-5">
        <input type="text" name="contact_email" class="form-control" maxlength="50" value="<?php echo set_value('contact_email', $contact_email)?>">
        <?php echo ab_error_message("contact_email"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("age_confirmation"); ?>">
      <?=form_label('Age Confirmation *', 'age_confirmation', $required_label)?>
      <div class="col-md-5 checkbox">
        <label>
          <input type="checkbox" name="age_confirmation" value="1" <?php echo $age_confirmation ? "checked" : ""; ?>>
          <span class="input-subtitle required">I am 18 years old or older</span>
        </label>
        <?php echo ab_error_message("age_confirmation"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("description"); ?>">
      <?=form_label('Event/Organization Description *', 'description', $required_label)?>
      <div class="col-md-8">
        <small>Please provide a short paragraph describing your organization or event</small>
        <textarea name="description" class="form-control" rows="8" cols="40"><?php echo set_value("description", $description); ?></textarea>
        <?php echo ab_error_message("description"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("type"); ?>">
      <?=form_label('Event/Organization Type *', 'type', $required_label)?>
      <div class="col-md-8">
        <small>Which of the following best describes your organization or event?</small>
        <?php
          $educationalYes = $type == "Educational 501(c)(3) Non-Profit" ? "checked" : "";
          $otherCategoryYes = $type == "Other Category Non-Profit" ? "checked" : "";
          $forProfitYes = $type == "For-Profit" ? "checked" : "";
          $otherYes = $type == "Other" ? "checked" : "";
        ?>
        <label>
          <input type="radio" name="type" value="Educational 501(c)(3) Non-Profit" <?=$educationalYes?>/>
          Educational 501(c)(3) Non-Profit
        </label>
        <br>
        <label>
          <input type="radio" name="type" value="Other Category Non-Profit" <?=$otherCategoryYes?>/>
          Other Category Non-Profit
        </label>
        <br>
        <label>
          <input type="radio" name="type" value="For-Profit" <?=$forProfitYes?>/>
          For-Profit
        </label>
        <br>
        <label>
          <input type="radio" name="type" value="Other" <?=$otherYes?>/>
          Other
          <input type="text" name="type_other" class="form-control" maxlength="255" value="<?php echo set_value('type_other', $type_other)?>" style="width:auto; display:inline;">
        </label>
        <br>
        <?php echo ab_error_message("type"); ?>
        <?php echo ab_error_message("type_other"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("attendance"); ?>">
      <?=form_label('Number of Attendees *', 'attendance', $required_label)?>
      <div class="col-md-6">
        <small>If promoting an event, approximately how many people attend your event annually (please specify warm body count or turnstile when reporting your number)?</small>
        <input type="text" name="attendance" class="form-control" maxlength="120" value="<?php echo set_value('attendance', $attendance)?>">
        <?php echo ab_error_message("attendance"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("booth_features"); ?>">
      <?=form_label('Booth/Display Features *', 'booth_features', $required_label)?>
      <div class="col-md-8">
        <small>What do you plan to include as part of your display? Check all that apply</small>
        <?php
          if(count($booth_features) > 0)
          {
            foreach($booth_features as $booth_feature)
            {
              if($booth_feature == "Option to Pre-Register")
              {
                $preregisterYes = "checked";
              }
              else if($booth_feature == "Promotional Flyers/Giveaways")
              {
                $promotionalYes = "checked";
              }
              else if($booth_feature == "Video Display(s) With Audio")
              {
                $videoAndAudioYes = "checked";
              }
              else if($booth_feature == "Video Display(s) Without Audio")
              {
                $videoNoAudioYes = "checked";
              }
              else if($booth_feature == "Audio Only Displays")
              {
                $audioOnlyYes = "checked";
              }
              else if($booth_feature == "Decorative Lighting")
              {
                $decorativeLightingYes = "checked";
              }
              else if($booth_feature == "Raffles")
              {
                $rafflesYes = "checked";
              }
              else if($booth_feature == "Other Activities")
              {
                $otherYes = "checked";
              }
            }
          }
        ?>
        <label>
          <input type="checkbox" name="booth_features[]" value="Option to Pre-Register" <?=$preregisterYes?>/>
          Option to Pre-Register
        </label>
        <br>
        <label>
          <input type="checkbox" name="booth_features[]" value="Promotional Flyers/Giveaways" <?=$promotionalYes?>/>
          Promotional Flyers/Giveaways
        </label>
        <br>
        <label>
          <input type="checkbox" name="booth_features[]" value="Video Display(s) With Audio" <?=$videoAndAudioYes?>/>
          Video Display(s) With Audio
        </label>
        <br>
        <label>
          <input type="checkbox" name="booth_features[]" value="Video Display(s) Without Audio" <?=$videoNoAudioYes?>/>
          Video Display(s) Without Audio
        </label>
        <br>
        <label>
          <input type="checkbox" name="booth_features[]" value="Audio Only Displays" <?=$audioOnlyYes?>/>
          Audio Only Displays
        </label>
        <br>
        <label>
          <input type="checkbox" name="booth_features[]" value="Decorative Lighting" <?=$decorativeLightingYes?>/>
          Decorative Lighting
        </label>
        <br>
        <label>
          <input type="checkbox" name="booth_features[]" value="Raffles" <?=$rafflesYes?>/>
          Raffles
        </label>
        <br>
        <label>
          <input type="checkbox" name="booth_features[]" value="Other Activities" <?=$otherYes?>/>
          Other Activities
          <input type="text" name="booth_features_other" class="form-control" maxlength="255" value="<?php echo set_value('booth_features_other', $booth_features_other)?>" style="width:auto; display:inline;">
        </label>
        <br>
        <?php echo ab_error_message("booth_features"); ?>
        <?php echo ab_error_message("booth_features_other"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("promote_reason"); ?>">
      <?=form_label('Promotion Reason *', 'promote_reason', $required_label)?>
      <div class="col-md-8">
        <small>Why do you with to promote your organization/event at Anime Boston <?=$currentyear?>?</small>
        <textarea name="promote_reason" class="form-control" rows="8" cols="40"><?php echo set_value("promote_reason", $promote_reason); ?></textarea>
        <?php echo ab_error_message("promote_reason"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("table_swap"); ?>">
      <?=form_label('Table Swap', 'table_swap', $optional_label)?>
      <div class="col-md-3">
        <?php
        $options = array(
          "" => "",
          "Yes" => "Yes",
          "No" => "No",
          "Maybe" => "Maybe",
        );

        echo form_dropdown("table_swap", $options, $table_swap, ab_dropdown_class());
        ?>
        <?php echo ab_error_message("table_swap"); ?>
      </div>
    </div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit">
    </div>
  </form>
</div>