<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/cosplay/">Cosplay</a></li>
  <li><a href="/cosplayhq/">Cosplay HQ</a></li>
  <li>My Info</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<div class="page-body clearfix">
  <h1>My Info</h1>

  <div class="cosplayhq">
    <div class="cosplayhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('cosplayhq_menu.php'); ?>
    </div>
    <div class="cosplayhq-content col-lg-9 col-md-8 col-sm-8">
      <p>Below is your personal information used when applying to Cosplay Events at Anime Boston.</p>

      <?php cosplayhq_confirmation(); ?>

      <?php if($update_required) { ?>
        <p class="required">
          NOTICE: Our records indicate your information has not been updated for <?=$currentyear?>.<br>
          Please ensure that your information is accurate and up-to-date.
        </p>
      <?php } ?>

      <?php
      if($this->session->userdata('myinfo_updated') !== FALSE)
      {
        if($this->session->userdata('myinfo_updated') == 1)
        {
          echo '<p class="required">NOTICE: Your information has been successfully updated. Thank you.</p>';
          $this->session->unset_userdata('myinfo_updated');
        }
      }
      ?>

      <form method="post" name="CosplayHQ_MyInfo" action="/cosplayhq/myinfo/">
        <?php echo ab_error_summary(); ?>
        <p><span class="required">*</span> = Required information</p>
        <div class="row form-group <?php echo ab_error_style("first_name"); ?>">
          <?=form_label('First Name *', 'first_name', $required_label)?>
          <div class="col-md-5">
            <input type="text" name="first_name" class="form-control" maxlength="70" value="<?php echo set_value('first_name', $first_name)?>">
            <span class="input-subtitle">Must be your real first name.</span>
            <?php echo ab_error_message("first_name"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("last_name"); ?>">
          <?=form_label('Last Name *', 'last_name', $required_label)?>
          <div class="col-md-5">
            <input type="text" name="last_name" class="form-control" maxlength="70" value="<?php echo set_value('last_name', $last_name)?>">
            <span class="input-subtitle">Must be your real last name.</span>
            <?php echo ab_error_message("last_name"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("preferred_name"); ?>">
          <?=form_label('Preferred Name', 'preferred_name', $optional_label)?>
          <div class="col-md-5">
            <input type="text" name="preferred_name" class="form-control" maxlength="200" value="<?php echo set_value('preferred_name', $preferred_name)?>">
            <span class="input-subtitle">If different from your legal name.</span>
            <?php echo ab_error_message("preferred_name"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("pseudonym"); ?>">
          <?=form_label('Pseudonym', 'pseudonym', $optional_label)?>
          <div class="col-md-5">
            <input type="text" name="pseudonym" class="form-control" maxlength="70" value="<?php echo set_value('pseudonym', $pseudonym)?>">
            <span class="input-subtitle">Any nickname or stagename you go by.</span>
            <?php echo ab_error_message("pseudonym"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("email"); ?>">
          <?=form_label('Email Address *', 'email', $required_label)?>
          <div class="col-md-6">
            <input type="email" name="email" class="form-control" maxlength="70" value="<?php echo set_value('email', $email)?>">
            <?php echo ab_error_message("email"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("email_confirm"); ?>">
          <?=form_label('Confirm Email Address *', 'email_confirm', $required_label)?>
          <div class="col-md-6">
            <input type="email" name="email_confirm" class="form-control" maxlength="70" value="<?php echo set_value('email_confirm', $email_confirm)?>">
            <?php echo ab_error_message("email_confirm"); ?>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Date of Birth *', '', $required_label)?>
          <div class="col-md-8 form-inline">
            <span class="input-subtitle required">Some events may require you to be 18 years of age to participate.</span><br>
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
            <?php echo ab_error_message("birth_month"); ?>
            <?php echo ab_error_message("birth_day"); ?>
            <?php echo ab_error_message("birth_year"); ?>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Parent/Guardian Signature', '', $optional_label)?>
          <div class="col-md-8">
            <div class="form-inline <?php echo ab_error_style("parent_name"); ?>">
              <span class="input-subtitle">If you are under the age of 18, please fill in your parent/guardian's name, phone number, and their consent for us to store your information and allow you to participate in Cosplay Events.</span><br>
              <label>Name</label>
              <input type="text" name="parent_name" class="form-control" maxlength="70" value="<?php echo set_value('parent_name', $parent_name); ?>">
              <?php echo ab_error_message("parent_name"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("parent_phone"); ?>">
              <label>Phone Number</label>
              <input type="tel" name="parent_phone" class="form-control" maxlength="15" value="<?php echo set_value('parent_phone', $parent_phone); ?>">
              <?php echo ab_error_message("parent_phone"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="checkbox <?php echo ab_error_style("parent_consent"); ?>">
              <label>
                <input type="checkbox" name="parent_consent" value="1" <?php echo $parent_consent ? "checked" : ""; ?>>
                I consent to allow Anime Boston to store this information and to let my son/daughter participate in Cosplay Events
              </label>
              <?php echo ab_error_message("parent_consent"); ?>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Mailing Address *', '', $required_label)?>
          <div class="col-md-8">
            <div class="form-inline <?php echo ab_error_style("address_1"); ?>">
              <label class="required">Address 1</label>
              <input type="text" name="address_1" class="form-control" maxlength="70" value="<?php echo set_value('address_1', $address_1); ?>">
              <?php echo ab_error_message("address_1"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("address_2"); ?>">
              <label>Address 2</label>
              <input type="text" name="address_2" class="form-control" maxlength="70" value="<?php echo set_value('address_2', $address_2); ?>">
              <?php echo ab_error_message("address_2"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("city"); ?>">
              <label class="required">City</label>
              <input type="text" name="city" class="form-control" maxlength="70" value="<?php echo set_value('city', $city); ?>">
              <?php echo ab_error_message("city"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("state"); ?>">
              <label class="required">State</label>
              <input type="text" name="state" class="form-control" maxlength="3" size="2" value="<?php echo set_value('state', $state); ?>">
              <?php echo ab_error_message("state"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("zip"); ?>">
              <label class="required">Zip Code</label>
              <input type="text" name="zip" class="form-control" maxlength="10" value="<?php echo set_value('zip', $zip); ?>">
              <?php echo ab_error_message("zip"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("country"); ?>">
              <label class="required">Country</label>
              <?php
              $countryoptions = array('' => '');
              foreach ($countries as $row)
              {
                $country_name = $row['country_name'];
                $countryoptions[$country_name] = $country_name;
              }

              echo form_dropdown("country", $countryoptions, $country, ab_dropdown_class());
              ?>
              <?php echo ab_error_message("country"); ?>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Phone Number *', 'phone_number', $required_label)?>
          <div class="col-md-8">
            <div class="form-inline <?php echo ab_error_style("phone_number"); echo ab_error_style("phone_type"); ?>">
              <input type="tel" name="phone_number" class="form-control" maxlength="25" value="<?php echo set_value('phone_number', $phone_number); ?>">
              <?php
              $phoneoptions = array(
                '' => 'Select Type',
                'Mobile' => 'Mobile',
                'Home' => 'Home',
                'Work' => 'Work'
              );
              echo form_dropdown("phone_type", $phoneoptions, $phone_type, ab_dropdown_class());
              ?>
              <?php echo ab_error_message("phone_number"); ?>
              <?php echo ab_error_message("phone_type"); ?>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Height *', 'height_feet', $required_label)?>
          <div class="col-md-8">
            <div class="form-inline <?php echo ab_error_style("height_feet"); echo ab_error_style("height_inches"); ?>">
              <label class="required">Feet</label>
              <?php
              $options = array("" => "");
              for($feet = 1; $feet < 13; $feet++)
              {
                $ft = sprintf('%01d',$feet);
                $options[$ft] = $ft;
              }

              echo form_dropdown("height_feet", $options, $height_feet, ab_dropdown_class());
              ?>
              <label class="required">Inches</label>
              <?php
              $options = array("" => "");
              for($inches = 0; $inches < 12; $inches++)
              {
                $in = sprintf('%01d',$inches);
                $options[$in] = $in;
              }
              echo form_dropdown("height_inches", $options, $height_inches, ab_dropdown_class());
              ?>
              <?php echo ab_error_message("height_feet"); ?>
              <?php echo ab_error_message("height_inches"); ?>
            </div>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("con_reg"); ?>">
          <?=form_label('Convention Registration *', 'con_reg', $required_label)?>
          <div class="col-md-6">
            <span class="required">Are you already registered for Anime Boston <?php echo $currentyear; ?>?</span><br>
            <?php
            $regoptions = array('' => 'Select One', 'Yes' => 'Yes','No' => 'No');
            echo form_dropdown("con_reg", $regoptions, $con_reg, ab_dropdown_class());
            ?>
            <?php echo ab_error_message("con_reg"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("other_info"); ?>">
          <?=form_label('Other Information', 'other_info', $optional_label)?>
          <div class="col-md-8">
            <span class="input-subtitle">Any other information about yourself you may feel is relevant.</span>
            <textarea name="other_info" class="form-control" rows="8" cols="40"><?php echo set_value('other_info', $other_info); ?></textarea>
            <?php echo ab_error_message("other_info"); ?>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Emergency Contact *', '', $required_label)?>
          <div class="col-md-8">
            <div class="form-inline <?php echo ab_error_style("emergency_contact"); ?>">
              <span class="required">For safety purposes, please submit an emergency contact.</span><br>
              <label class="required">Name</label>
              <input type="text" name="emergency_contact" class="form-control" maxlength="70" value="<?php echo set_value('emergency_contact', $emergency_contact); ?>">
              <?php echo ab_error_message("emergency_contact"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("emergency_contact_relation"); ?>">
              <label class="required">Relation</label>
              <?php
              $emeroptions = array(
                '' => 'Select One',
                'Parent' => 'Parent',
                'Legal Guardian' => 'Legal Guardian',
                'Sibling' => 'Sibling',
                'Spouse' => 'Spouse',
                'Significant Other' => 'Significant Other',
                'Extended Family' => 'Extended Family',
                'Other' => 'Other'
              );
              echo form_dropdown("emergency_contact_relation", $emeroptions, $emergency_contact_relation, ab_dropdown_class());
              ?>
              <?php echo ab_error_message("emergency_contact_relation"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("emergency_contact_phone"); ?>">
              <label class="required">Phone Number</label>
              <input type="tel" name="emergency_contact_phone" class="form-control" maxlength="15" value="<?php echo set_value('emergency_contact_phone', $emergency_contact_phone); ?>">
              <?php echo ab_error_message("emergency_contact_phone"); ?>
            </div>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("medical_info"); ?>">
          <?=form_label('Medical Information', 'medical_info', $optional_label)?>
          <div class="col-md-8">
            <span class="input-subtitle">
              Please list any medical conditions or concerns you may have.
              Please note that this is only for in the event of an emergency at the convention
              and will have absolutely no effect on your applications to any Cosplay Events.
            </span><br>
            <textarea name="medical_info" class="form-control" rows="8" cols="40"><?php echo set_value("medical_info", $medical_info); ?></textarea>
            <?php echo ab_error_message("medical_info"); ?>
          </div>
        </div>
        <div class="submit-buttons">
          <input type="submit" name="submit" class="btn btn-success" value="Update Info">
        </div>
      </form>
    </div>
  </div>
</div>
