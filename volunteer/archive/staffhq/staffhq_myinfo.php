<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/staff/">Staff</a></li>
  <li><a href="/staffhq/">Staff HQ</a></li>
  <li>My Info</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<script type="text/javascript">
  function onHotelNightChange()
  {
    var h1 = document.getElementById("h1");
    var h2 = document.getElementById("h2");
    var h3 = document.getElementById("h3");
    var h4 = document.getElementById("h4");
    var h5 = document.getElementById("h5");
    var h6 = document.getElementById("h6");
    var h7 = document.getElementById("h7");

    // h1.removeAttribute("disabled");
    h2.removeAttribute("disabled");
    h3.removeAttribute("disabled");
    h4.removeAttribute("disabled");
    h5.removeAttribute("disabled");
    h6.removeAttribute("disabled");
    h7.removeAttribute("disabled");

    if(h1.checked || h2.checked || h3.checked || h4.checked || h5.checked)
    {
      h6.setAttribute("disabled", "true");
      h7.setAttribute("disabled", "true");
    }

    if(h6.checked || h7.checked)
    {
      // h1.setAttribute("disabled", "true");
      h2.setAttribute("disabled", "true");
      h3.setAttribute("disabled", "true");
      h4.setAttribute("disabled", "true");
      h5.setAttribute("disabled", "true");

      if(h6.checked) h7.setAttribute("disabled", "true");
      if(h7.checked) h6.setAttribute("disabled", "true");
    }
  }
</script>

<div class="page-body clearfix">
  <h1>My Info</h1>

  <div class="staffhq">
    <div class="staffhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('staffhq_menu.php'); ?>
    </div>
    <div class="staffhq-content col-lg-9 col-md-8 col-sm-8">
      Below is your personal information used for applying to Anime Boston Staff.

      <p>
        All information will be kept confidential and will not be made public.
        Information entered here is strictly for administrative purposes and will have no
        bearing on the approval or denial of any application to Anime Boston Staff.
      </p>

      <?php staffhq_confirmation(); ?>

      <form class="form-horizontal" action="/staffhq/myinfo/" method="post">
        <?php echo ab_error_summary(); ?>
        <p><span class="required">*</span> = Required information</p>
        <div class="row form-group <?php echo ab_error_style("first_name"); ?>">
          <?=form_label('First Name *', 'first_name', $required_label)?>
          <div class="col-md-8">
            <input type="text" name="first_name" class="form-control" maxlength="100" value="<?php echo set_value('first_name', $first_name); ?>">
            <?php echo ab_error_message("first_name"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("last_name"); ?>">
          <?=form_label('Last Name *', 'last_name', $required_label)?>
          <div class="col-md-8">
            <input type="text" name="last_name" class="form-control" maxlength="100" value="<?php echo set_value('last_name', $last_name); ?>">
            <span class="input-subtitle">Your legal name will be used for our Staff Listing. If you'd prefer another name be used, please contact your Director.</span>
            <?php echo ab_error_message("last_name"); ?>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Forum Account', '', $optional_label)?>
          <div class="col-md-8">
            <?=$forum_username?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("personal_email"); ?>">
          <?=form_label('Email Address *', 'personal_email', $required_label)?>
          <div class="col-md-8">
            <input type="email" name="personal_email" class="form-control" maxlength="200" value="<?php echo set_value('personal_email', $personal_email); ?>">
            <?php echo ab_error_message("personal_email"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("personal_email_confirm"); ?>">
          <?=form_label('Confirm Email Address *', 'personal_email_confirm', $required_label)?>
          <div class="col-md-8">
            <input type="email" name="personal_email_confirm" class="form-control" maxlength="200" value="<?php echo set_value('personal_email_confirm', $personal_email_confirm); ?>">
            <?php echo ab_error_message("personal_email_confirm"); ?>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Convention Email Address', '', $optional_label)?>
          <div class="col-md-8">
            <?php echo ($convention_email == '') ? 'None' : $convention_email; ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("discord_username"); ?>">
          <?=form_label('Discord Username', 'discord_username', $optional_label)?>
          <div class="col-md-8">
            <input type="text" name="discord_username" class="form-control" maxlength="255" value="<?php echo set_value('discord_username', $discord_username); ?>">
            <?php echo ab_error_message("discord_username"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("gender"); ?>">
          <?=form_label('Gender *', 'gender', $required_label)?>
          <div class="col-md-6">
            <?php
            $genderoptions = array('' => '', 'Male' => 'Male', 'Female' => 'Female');
            echo form_dropdown("gender", $genderoptions, $gender, ab_dropdown_class());
            ?>
            <span class="input-subtitle">For purposes of hotel booking and liability, please use the gender on your Government photo ID.</span>
            <?php echo ab_error_message("gender"); ?>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Mailing Address *', '', $required_label)?>
          <div class="col-md-8">
            <div class="form-inline <?php echo ab_error_style("address1"); ?>">
              <label class="required">Address 1</label>
              <input type="text" name="address1" class="form-control" maxlength="200" value="<?php echo set_value('address1', $address1); ?>">
              <?php echo ab_error_message("address1"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("address2"); ?>">
              <label>Address 2</label>
              <input type="text" name="address2" class="form-control" maxlength="200" value="<?php echo set_value('address2', $address2); ?>">
              <?php echo ab_error_message("address2"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("city"); ?>">
              <label class="required">City</label>
              <input type="text" name="city" class="form-control" maxlength="20" value="<?php echo set_value('city', $city); ?>">
              <?php echo ab_error_message("city"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("state"); ?>">
              <label class="required">State</label>
              <input type="text" name="state" class="form-control" maxlength="2" size="2" value="<?php echo set_value('state', $state); ?>">
              <?php echo ab_error_message("state"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("zip"); ?>">
              <label class="required">Zip Code</label>
              <input type="text" name="zip" class="form-control" maxlength="15" value="<?php echo set_value('zip', $zip); ?>">
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
          <?=form_label('Phone Number *', 'phone1', $required_label)?>
          <div class="col-md-8">
            <div class="form-inline <?php echo ab_error_style("phone1"); echo ab_error_style("phone1_type"); ?>">
              <label class="required">#1</label>
              <input type="tel" name="phone1" class="form-control" maxlength="15" value="<?php echo set_value('phone1', $phone1); ?>">
              <?php
              $phone1options = array('Cell' => 'Cell', 'Home' => 'Home', 'Work' => 'Work');
              echo form_dropdown("phone1_type", $phone1options, $phone1_type, ab_dropdown_class());
              ?>
              <?php echo ab_error_message("phone1"); ?>
              <?php echo ab_error_message("phone1_type"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("phone2"); echo ab_error_style("phone2_type"); ?>">
              <label>#2</label>
              <input type="tel" name="phone2" class="form-control" maxlength="15" value="<?php echo set_value('phone2', $phone2); ?>">
              <?php
              $phone2options = array('' => '', 'Cell' => 'Cell', 'Home' => 'Home', 'Work' => 'Work');
              echo form_dropdown("phone2_type", $phone2options, $phone2_type, ab_dropdown_class());
              ?>
              <?php echo ab_error_message("phone2"); ?>
              <?php echo ab_error_message("phone2_type"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("phone3"); echo ab_error_style("phone3_type"); ?>">
              <label>#3</label>
              <input type="tel" name="phone3" class="form-control" maxlength="15" value="<?php echo set_value('phone3', $phone3); ?>">
              <?php
              $phone3options = array('' => '', 'Cell' => 'Cell', 'Home' => 'Home', 'Work' => 'Work');
              echo form_dropdown("phone3_type", $phone3options, $phone3_type, ab_dropdown_class());
              ?>
              <?php echo ab_error_message("phone3"); ?>
              <?php echo ab_error_message("phone3_type"); ?>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Staff Shirt *', 'shirt_size', $required_label)?>
          <div class="col-md-8">
            <div class="form-inline <?php echo ab_error_style("shirt_size"); ?>">
              <label class="required">Size *</label>
              <?php
              $shirtsizeoptions = array(
                '' => '',
                'S' => 'Small',
                'M' => 'Medium',
                'L' => 'Large',
                'XL' => 'Extra Large',
                '2XL' => '2XL',
                '3XL' => '3XL',
                '4XL' => '4XL',
                '5XL' => '5XL'
              );
              echo form_dropdown("shirt_size", $shirtsizeoptions, $shirt_size, ab_dropdown_class());
              ?>
              <?php echo ab_error_message("shirt_size"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("shirt_quantity"); ?>">
              <label class="required">Quantity *</label>
              <?php
              $shirtquantityoptions = array('' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4');
              echo form_dropdown("shirt_quantity", $shirtquantityoptions, $shirt_quantity, ab_dropdown_class());
              ?>
              <?php echo ab_error_message("shirt_quantity"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <span class="input-subtitle">All Staff receive 1 free Staff Shirt. Extra shirts are $8 each.</span>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Emergency Contact *', '', $required_label)?>
          <div class="col-md-8">
            <div class="form-inline <?php echo ab_error_style("emergency_contact"); ?>">
              <label class="required">Name</label>
              <input type="text" name="emergency_contact" class="form-control" maxlength="225" value="<?php echo set_value('emergency_contact', $emergency_contact); ?>">
              <?php echo ab_error_message("emergency_contact"); ?>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-inline <?php echo ab_error_style("emergency_contact_phone"); ?>">
              <label class="required">Phone</label>
              <input type="tel" name="emergency_contact_phone" class="form-control" maxlength="50" value="<?php echo set_value('emergency_contact_phone', $emergency_contact_phone); ?>">
              <?php echo ab_error_message("emergency_contact_phone"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-3 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("emergency_contact_relation"); ?>">
              <label class="required">Relation</label>
              <?php
              $erelationoptions = array(
                '' => '',
                'Parent' => 'Parent',
                'Sibling' => 'Sibling',
                'Spouse' => 'Spouse',
                'Significant Other' => 'Significant Other',
                'Extended Family' => 'Extended Family',
                'Friend' => 'Friend'
              );

              echo form_dropdown("emergency_contact_relation", $erelationoptions, $emergency_contact_relation, ab_dropdown_class());
              ?>
              <?php echo ab_error_message("emergency_contact_relation"); ?>
            </div>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("allergies"); ?>">
          <?=form_label('Allergies', 'allergies', $optional_label)?>
          <div class="col-md-8">
            <textarea name="allergies" class="form-control" rows="2" cols="40"><?php echo set_value('allergies', $allergies); ?></textarea>
            <span class="input-subtitle">In case of emergency at the convention.</span>
            <?php echo ab_error_message("allergies"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("medical"); ?>">
          <?=form_label('Other Medical Notes', 'medical', $optional_label)?>
          <div class="col-md-8">
            <textarea name="medical" class="form-control" rows="2" cols="40"><?php echo set_value('medical', $medical); ?></textarea>
            <span class="input-subtitle">In case of emergency at the convention.</span>
            <?php echo ab_error_message("medical"); ?>
          </div>
        </div>
        <div class="row form-group <?php echo ab_error_style("radio_preference"); ?>">
          <?=form_label('Radio Preference', 'radio_preference', $optional_label)?>
          <div class="col-md-8">
            <?php
            $radio_preference_options = array(
              '' => 'Select Preference',
              'No Accessory' => 'No Accessory',
              'Headset' => 'Headset',
              'Speaker Microphone or Squak Box' => 'Speaker Microphone or Squak Box',
              'Surveillance Set' => 'Surveillance Set',
              'I have a Special Need' => 'I have a Special Need'
            );

            echo form_dropdown("radio_preference", $radio_preference_options, $radio_preference, ab_dropdown_class());
            ?>
            <span class="input-subtitle">If you are assigned a radio, what is your preferred accessory?</span>
            <?php echo ab_error_message("radio_preference"); ?>
          </div>
        </div>
        <div class="row form-group">
          <?=form_label('Hotel Information', '', $optional_label)?>
          <?php if(!$is_create) { ?>
            <div class="col-md-8">
              <div class="form-inline <?php echo ab_error_style("hotel_weds"); ?>">
                <?php
                $weds = ($hotel_weds == '1') ? 'checked' : '';
                $thurs = ($hotel_thurs == '1') ? 'checked' : '';
                $fri = ($hotel_fri == '1') ? 'checked' : '';
                $sat = ($hotel_sat == '1') ? 'checked' : '';
                $sun = ($hotel_sun == '1') ? 'checked' : '';
                $commute = ($hotel_no_commute == '1') ? 'checked' : '';
                $reserve = ($hotel_no_reserve_own == '1') ? 'checked' : '';

                $thursdis = ($hotel_no_commute == '1' || $hotel_no_reserve_own == '1') ? 'disabled' : '';
                $fridis = ($hotel_no_commute == '1' || $hotel_no_reserve_own == '1') ? 'disabled' : '';
                $satdis = ($hotel_no_commute == '1' || $hotel_no_reserve_own == '1') ? 'disabled' : '';
                $sundis = ($hotel_no_commute == '1' || $hotel_no_reserve_own == '1') ? 'disabled' : '';
                $commutedis = ($hotel_no_reserve_own == '1' || $hotel_thurs == '1' || $hotel_fri == '1' || $hotel_sat == '1' || $hotel_sun == '1') ? 'disabled' : '';
                $reservedis = ($hotel_no_commute == '1' || $hotel_thurs == '1' || $hotel_fri == '1' || $hotel_sat == '1' || $hotel_sun == '1') ? 'disabled' : '';

                $mixedyes = ($hotel_mixed_room == 1) ? 'checked' : '';
                $mixedno = ($hotel_mixed_room == 0 || $hotel_mixed_room == '') ? 'checked' : '';
                ?>
                <label class="radio-label"><input id="h1" type="checkbox" value="1" onchange="onHotelNightChange()" name="hotel_weds" disabled <?php echo $weds; ?>> Wednesday (Director approved only)</label><br>
                <label class="radio-label"><input id="h2" type="checkbox" value="1" onchange="onHotelNightChange()" name="hotel_thurs" <?php echo $thurs . ' ' . $thursdis; ?>> Thursday</label><br>
                <label class="radio-label"><input id="h3" type="checkbox" value="1" onchange="onHotelNightChange()" name="hotel_fri" <?php echo $fri . ' ' . $fridis; ?>> Friday</label><br>
                <label class="radio-label"><input id="h4" type="checkbox" value="1" onchange="onHotelNightChange()" name="hotel_sat" <?php echo $sat . ' ' . $satdis; ?>> Saturday</label><br>
                <label class="radio-label"><input id="h5" type="checkbox" value="1" onchange="onHotelNightChange()" name="hotel_sun" <?php echo $sun . ' ' . $sundis; ?>> Sunday</label><br>
                <label class="radio-label"><input id="h6" type="checkbox" value="1" onchange="onHotelNightChange()" name="hotel_no_commute" <?php echo $commute . ' ' . $commutedis; ?>> No room; will commute</label><br>
                <label class="radio-label"><input id="h7" type="checkbox" value="1" onchange="onHotelNightChange()" name="hotel_no_reserve_own" <?php echo $reserve . ' ' . $reservedis; ?>> Reserving own room</label>
                <?php echo ab_error_message("hotel_weds"); ?>
              </div>
            </div>
            <div class="col-md-8 col-lg-push-2 col-md-push-4">
              <div class="form-inline <?php echo ab_error_style("hotel_mixed_room"); ?>">
                <label class="required label-separate">Is a mixed-gender room ok?</label><br>
                <label class="radio-label"><input type="radio" name="hotel_mixed_room" value="1" <?=$mixedyes?>> Yes</label>
                <label class="radio-label"><input type="radio" name="hotel_mixed_room" value="0" <?=$mixedno?>> No</label>
                <?php echo ab_error_message("hotel_mixed_room"); ?>
              </div>
            </div>
            <div class="col-md-8 col-lg-push-2 col-md-push-4">
              <div class="form-inline <?php echo ab_error_style("hotel_preferred"); ?>">
                <label class="required label-separate">Preferred Hotel</label>
                <?php
                $hoteloptions = array(
                    '' => '',
                    'No Preference' => 'No Preference',
                    'Sheraton' => 'Sheraton',
                    'Marriott' => 'Marriott',
                    'Hilton' => 'Hilton',
                    'Colonnade' => 'Colonnade'
                );
                echo form_dropdown("hotel_preferred", $hoteloptions, $hotel_preferred, ab_dropdown_class());
                ?>
                <?php echo ab_error_message("hotel_preferred"); ?>
              </div>
            </div>
            <div class="col-md-8 col-lg-push-2 col-md-push-4">
              <div class="<?php echo ab_error_style("hotel_roommates"); ?>">
                <label class="label-separate">Roommates</label>
                <input type="text" name="hotel_roommates" class="form-control" maxlength="250" value="<?php echo set_value('hotel_roommates', $hotel_roommates); ?>">
                <span class="input-subtitle">
                  List up to 3 staff members (accepted or applying) that you would like to room with at-con.
                  Give full names, separated by commas.
                  Please note that non-staff members may not stay in staff hotel rooms.
                </span>
                <?php echo ab_error_message("hotel_roommates"); ?>
              </div>
            </div>
            <div class="col-md-8 col-lg-push-2 col-md-push-4">
              <div class="<?php echo ab_error_style("hotel_request"); ?>">
                <label class="label-separate">Special Requests</label>
                <textarea name="hotel_request" class="form-control" rows="4" cols="40"><?php echo set_value('hotel_request', $hotel_request); ?></textarea>
                <span class="input-subtitle">List any special requests or conditions for your staff hotel room. All Sheraton Boston hotel rooms are non-smoking, including staff rooms.</span>
                <?php echo ab_error_message("hotel_request"); ?>
              </div>
            </div>
          <?php } ?>
          <div class="col-md-8 col-lg-push-2 col-md-push-4">
            <div class="form-inline <?php echo ab_error_style("dead_dog_attend"); ?>">
              <label class="required label-separate">Attend Dead Dog Party</label>
              <?php
              $ddpoptions = array('' => '', 'Yes' => 'Yes', 'No' => 'No');
              echo form_dropdown("dead_dog_attend", $ddpoptions, $dead_dog_attend, ab_dropdown_class());
              ?>
              <?php echo ab_error_message("dead_dog_attend"); ?>
            </div>
          </div>
          <div class="col-md-8 col-lg-push-2 col-md-push-4">
            <div class="form-inline" <?php echo ab_error_style("reduced_position_accept"); ?>>
              <label>
                <input type="checkbox" name="reduced_position_accept" value="1" />
                I understand that my participation on Anime Boston staff is voluntary, and it is possible my position may be reduced or removed due to performance, budget constraints, or otherwise.
              </label>
              <?php echo ab_error_message("reduced_position_accept"); ?>
            </div>
          </div>
        </div>
        <div class="submit-buttons">
          <input type="submit" name="submit" class="btn btn-success" value="Update Info"><br>
          <i>Entering or Updating your Info does not guarantee acceptance to Anime Boston staff.</i>
        </div>
      </form>
    </div>
  </div>
</div>
