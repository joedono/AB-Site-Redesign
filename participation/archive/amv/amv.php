<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/programming/">Programming</a></li>
  <li>Anime Music Video Contest Submission</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();

$optional_short_label = ab_optional_short_label();
$required_short_label = ab_required_short_label();
?>

<script type = "text/javascript">
  function show()
  {
    var intCount = document.amv_submission_form.amv_total.options.length;
    var intValue = document.amv_submission_form.amv_total.value;

    for(i = 0; i < intValue; i++)
    {
      assoc = "amv"+i;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = '';
    }

    for(j = intCount - 1; j >= intValue; j--)
    {
      assoc = "amv"+j;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = 'none';
    }
  }
</script>

<div class="page-body clearfix">
  <h1>Anime Music Video Contest Submission</h1>
  <p>Please enter your information below to submit your entries to the <?=$currentyear?> Anime Music Video Contest.</p>
  <p class="text-danger"><b>DO NOT SUBMIT THIS FORM UNTIL YOU ARE READY TO SEND IN YOUR VIDEO!</b></p>
  <form class="form-horizontal" name="amv_submission_form" action="/forms/amv/" method="post">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required information</p>
    <div class="row form-group <?php echo ab_error_style("primary_first_name"); ?>">
      <?=form_label('First Name *', 'primary_first_name', $required_label)?>
      <div class="col-md-5">
        <input type="text" name="primary_first_name" class="form-control" maxlength="70" value="<?php echo set_value("primary_first_name", $primary_first_name); ?>">
        <span class="input-subtitle">Must be your real first name</span>
        <?php echo ab_error_message("primary_first_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("primary_last_name"); ?>">
      <?=form_label('Last Name *', 'primary_last_name', $required_label)?>
      <div class="col-md-5">
        <input type="text" name="primary_last_name" class="form-control" maxlength="70" value="<?php echo set_value("primary_last_name", $primary_last_name); ?>">
        <span class="input-subtitle">Must be your real last name</span>
        <?php echo ab_error_message("primary_last_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("other_contestants"); ?>">
      <?=form_label('Other Contestants', 'other_contestants', $optional_label)?>
      <div class="col-md-7">
        <textarea name="other_contestants" class="form-control" rows="8" cols="40"><?php echo set_value("other_contestants", $other_contestants); ?></textarea>
        <span class="input-subtitle">Please list the real first and last names of anyone else who worked on this video.<br>Separate each name with a semicolon (;)</span>
        <?php echo ab_error_message("other_contestants"); ?>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Mailing Address *', '', $required_label)?>
      <div class="col-md-8">
        <div class="form-inline <?php echo ab_error_style("address1"); ?>">
          <label class="required">Address 1</label>
          <input type="text" name="address1" class="form-control" maxlength="70" value="<?php echo set_value('address1', $address1); ?>">
          <?php echo ab_error_message("address1"); ?>
        </div>
      </div>
      <div class="col-md-8 col-lg-push-3 col-md-push-4">
        <div class="form-inline <?php echo ab_error_style("address2"); ?>">
          <label>Address 2</label>
          <input type="text" name="address2" class="form-control" maxlength="70" value="<?php echo set_value('address2', $address2); ?>">
          <?php echo ab_error_message("address2"); ?>
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
    <div class="row form-group <?php echo ab_error_style("age_confirmation"); ?>">
      <?=form_label('Age Confirmation *', 'age_confirmation', $required_label)?>
      <div class="col-md-5 checkbox">
        <label>
          <input type="checkbox" name="age_confirmation" value="1" <?php echo $age_confirmation ? "checked" : ""; ?>>
          <span class="input-subtitle required">I am 13 years old or older</span>
        </label>
        <?php echo ab_error_message("age_confirmation"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("phone1"); ?>">
      <?=form_label('Phone Number (Evenings or Weekend) *', 'phone1', $required_label)?>
      <div class="col-md-4">
        <input type="tel" name="phone1" class="form-control" maxlength="15" value="<?php echo set_value("phone1", $phone1); ?>">
        <span class="input-subtitle">Numbers only, no letters or characters</span>
        <?php echo ab_error_message("phone1"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("email"); ?>">
      <?=form_label('Contact E-Mail Address *', 'email', $required_label)?>
      <div class="col-md-6">
        <input type="email" name="email" class="form-control" maxlength="70" value="<?php echo set_value("email", $email); ?>">
        <span class="input-subtitle">You will be emailed a copy of this information and submission instructions, so please ensure this address is accurate</span>
        <?php echo ab_error_message("email"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("email_confirm"); ?>">
      <?=form_label('Confirm Contact E-Mail Address *', 'email_confirm', $required_label)?>
      <div class="col-md-6">
        <input type="email" name="email_confirm" class="form-control" maxlength="70" value="<?php echo set_value("email_confirm", $email_confirm); ?>">
        <?php echo ab_error_message("email_confirm"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("submission_style"); ?>">
      <?=form_label('Submission Method *', 'submission_style', $required_label)?>
      <div class="col-md-5">
        <?php
        $submissionoptions = array('' => 'Pick One', 'Online' => 'Electronic Submission (Online)');
        echo form_dropdown("submission_style", $submissionoptions, $submission_style, ab_dropdown_class());
        ?>
        <span class="input-subtitle">Submission instructions will be emailed to you</span>
        <?php echo ab_error_message("submission_style"); ?>
      </div>
    </div>
    <div class="row"><div class="col-xs-12"><hr></div></div>
    <div class="row form-group <?php echo ab_error_style("amv_total"); ?>">
      <?=form_label('Videos', 'amv_total', $optional_label)?>
      <div class="col-md-4">
        <span class="input-subtitle">How many videos are you submitting?</span><br>
        <select name="amv_total" class="form-control" onchange="show()">
          <?php
          $amvoptions = array();
          for($i = 1; $i <= $max_amv; $i++)
          {
            $amvoptions[$i] = $i;
          }

          foreach($amvoptions as $key => $value)
          {
            $selected = ($amv_total == $key) ? 'selected' : '';
            echo "<option value='$key' $selected>$value</option>";
          }
          ?>
        </select>
        <?php echo ab_error_message("amv_total"); ?>
      </div>
    </div>
    <div class="row"><div class="col-xs-12"><hr></div></div>
    <?php
    for($i = 0; $i < $max_amv; $i++)
      {
      $displaystyle = ($i < $amv_total)? 'block':'none';
      ?>
      <div id="amv<?=$i?>" class="row form-group" style="display:<?=$displaystyle?>">
        <?=form_label('Video ' . ($i+1) . ' *', '', $required_short_label)?>
        <div class="col-md-9">
          <div class="row form-group <?php echo ab_error_style("amv_title[$i]"); ?>">
            <?=form_label('Video Title *', "amv_title[$i]", $required_label)?>
            <div class="col-md-8">
              <input type="text" name="amv_title[<?=$i?>]" class="form-control" maxlength="70" value="<?php echo set_value("amv_title[$i]", $amv_title[$i]); ?>">
              <?php echo ab_error_message("amv_title[$i]"); ?>
            </div>
          </div>
          <div class="row form-group <?php echo ab_error_style("amv_song[$i]"); ?>">
            <?=form_label('Song Title *', "amv_song[$i]", $required_label)?>
            <div class="col-md-8">
              <input type="text" name="amv_song[<?=$i?>]" class="form-control" maxlength="70" value="<?php echo set_value("amv_song[$i]", $amv_song[$i]); ?>">
              <?php echo ab_error_message("amv_song[$i]"); ?>
            </div>
          </div>
          <div class="row form-group <?php echo ab_error_style("amv_artist[$i]"); ?>">
            <?=form_label('Song Artist(s) *', "amv_artist[$i]", $required_label)?>
            <div class="col-md-8">
              <input type="text" name="amv_artist[<?=$i?>]" class="form-control" maxlength="70" value="<?php echo set_value("amv_artist[$i]", $amv_artist[$i]); ?>">
              <?php echo ab_error_message("amv_artist[$i]"); ?>
            </div>
          </div>
          <div class="row form-group <?php echo ab_error_style("amv_sources[$i]"); ?>">
            <?=form_label('Anime Title(s) Used *', "amv_sources[$i]", $required_label)?>
            <div class="col-md-8">
              <textarea name="amv_sources[<?=$i?>]" class="form-control" rows="6" cols="40"><?php echo set_value("amv_sources[$i]", $amv_sources[$i]); ?></textarea>
              <span class="input-subtitle">Separate each title with a semicolon (;)</span>
              <?php echo ab_error_message("amv_sources[$i]"); ?>
            </div>
          </div>
          <div class="row form-group <?php echo ab_error_style("amv_credits[$i]"); ?>">
            <?=form_label('Name for Credits/Ballots', "amv_credits[$i]", $optional_label)?>
            <div class="col-md-8">
              <input type="text" name="amv_credits[<?=$i?>]" class="form-control" maxlength="70" value="<?php echo set_value("amv_credits[$i]", $amv_credits[$i]); ?>"><br>
              <span class="input-subtitle">If different from your first and last name</span>
              <?php echo ab_error_message("amv_credits[$i]"); ?>
            </div>
          </div>
          <div class="row form-group">
            <?=form_label('Completion Date *', '', $required_label)?>
            <div class="col-md-8 form-inline">
              <label class="required">Month</label>
              <?php
              $options = array("" => "");
              for($month = 1; $month < 13; $month++)
              {
                $mon = sprintf('%02d',$month);
                $options[$mon] = $mon;
              }

              echo form_dropdown("amv_month[$i]", $options, $amv_month[$i], ab_dropdown_class());
              ?>
              <label class="required">Day</label>
              <?php
              $options = array("" => "");
              for($day = 1; $day < 32; $day++)
              {
                $da = sprintf('%02d',$day);
                $options[$da] = $da;
              }

              echo form_dropdown("amv_day[$i]", $options, $amv_day[$i], ab_dropdown_class());
              ?>
              <label class="required">Year</label>
              <?php
              $thisyear = date('Y');
              $thisyear = (int)$thisyear;
              $options = array("" => "");
              for($year = $thisyear; $year >= $thisyear - 15; $year--)
              {
                $options[$year] = $year;
              }

              echo form_dropdown("amv_year[$i]", $options, $amv_year[$i], ab_dropdown_class());
              ?>
              <?php echo ab_error_message("amv_month[$i]"); ?>
              <?php echo ab_error_message("amv_day[$i]"); ?>
              <?php echo ab_error_message("amv_year[$i]"); ?>
            </div>
          </div>
          <div class="row form-group <?php echo ab_error_style("amv_category[$i]"); ?>">
            <?=form_label('Category *', "amv_category[$i]", $required_label)?>
            <div class="col-md-5">
              <?php echo form_dropdown("amv_category[$i]", $amv_categories, $amv_category[$i], ab_dropdown_class()); ?>
              <?php echo ab_error_message("amv_category[$i]"); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row"><div class="col-xs-12"><hr></div></div>
    <?php } ?>
    <div class="row form-group">
      <?=form_label('Proxy', '', $optional_label)?>
      <div class="col-md-8">
        <span class="input-subtitle">
          If you will not be attending the convention and would like a friend to act as a proxy and accept any award(s) you may win,
          please provide that person's name here. Your award(s) will not be handed over to anyone other than the people listed above or the proxy listed below.
          Please use their real name.
        </span>
      </div>
      <div class="col-md-8 col-lg-push-3 col-md-push-4">
        <div class="form-inline <?php echo ab_error_style("proxy_first"); ?>">
          <label>First Name</label>
          <input type="text" name="proxy_first" class="form-control" maxlength="70" value="<?php echo set_value("proxy_first", $proxy_first); ?>">
          <?php echo ab_error_message("proxy_first"); ?>
        </div>
      </div>
      <div class="col-md-8 col-lg-push-3 col-md-push-4">
        <div class="form-inline <?php echo ab_error_style("proxy_last"); ?>">
          <label>Last Name</label>
          <input type="text" name="proxy_last" class="form-control" maxlength="70" value="<?php echo set_value("proxy_last", $proxy_last); ?>">
          <?php echo ab_error_message("proxy_last"); ?>
        </div>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("staff_check"); ?>">
      <?=form_label('Staff Membership *', 'staff_check', $required_label)?>
      <div class="col-md-8">
        <?php
        $staffyes = ($staff_check == 'Yes') ? 'checked' : '';
        $staffno = ($staff_check == 'No') ? 'checked' : '';
        ?>
        <span class="required">Are you (or any other contestant) a staff member for Anime Boston <?=$currentyear?> or the NEAS?</span><br>
        <label><input type="radio" name="staff_check" value="Yes" <?=$staffyes?>> Yes</label>
        <label><input type="radio" name="staff_check" value="No" <?=$staffno?>> No</label><br>
        <span class="input-subtitle">AB and NEAS Staff may compete in the AMV Contests, except for those directly involved with planning and running the contests.</span>
        <?php echo ab_error_message("staff_check"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("read_rules"); ?>">
      <?=form_label('Contest Rules *', 'read_rules', $required_label)?>
      <div class="col-md-8">
        <?php
        $rulesyes = ($read_rules == 'Yes') ? 'checked' : '';
        $rulesno = ($read_rules == 'No') ? 'checked' : '';
        ?>
        <span class="required">Have you read and agree to the <a href="/programming/amv_contest/" target="_blank">AMV Contest Rules</a>?</span><br>
        <label><input type="radio" name="read_rules" value="Yes" <?=$rulesyes?>> Yes</label>
        <label><input type="radio" name="read_rules" value="No" <?=$rulesno?>> No</label><br>
        <?php echo ab_error_message("read_rules"); ?>
      </div>
    </div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit">
      <input type="reset" name="reset" class="btn btn-default" value="Reset">
    </div>
  </form>
</div>
