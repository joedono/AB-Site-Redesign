<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/programming/">Programming</a></li>
  <li>Panel Application</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<script type = "text/javascript">
  function show()
  {
    var intCount = document.panel_application_form.assoc_total.options.length;
    var intValue = document.panel_application_form.assoc_total.value;

    if(intValue > 0)
    {
      hidden_row_object = document.getElementById("assoc_info");
      hidden_row_object.style.display = '';
    }
    else
    {
      hidden_row_object = document.getElementById("assoc_info");
      hidden_row_object.style.display = 'none';
    }

    for(i = 0; i < intValue; i++)
    {
      assoc = "assoc"+i;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = '';
    }

    for(j = intCount - 2; j >= intValue; j--)
    {
      assoc = "assoc"+j;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = 'none';
    }
  }
</script>

<div class="page-body clearfix">
  <h1>Panel Application</h1>
  <p>Please fill out the fields below to apply to host a panel at Anime Boston <?=$currentyear?>. Panel Applications will be open through January 31, 2020.</p>
  <form class="form-horizontal" name="panel_application_form" action="/forms/panel_application/" method="post">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required information</p>
    <div class="row form-group <?php echo ab_error_style("panel_title"); ?>">
      <?=form_label('Panel Title *', 'panel_title', $required_label)?>
      <div class="col-md-7">
        <input type="text" name="panel_title" class="form-control" maxlength="70" value="<?php echo set_value('panel_title', $panel_title)?>">
        <?php echo ab_error_message("panel_title"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("first_name"); ?>">
      <?=form_label('Panel Organizer First Name *', 'first_name', $required_label)?>
      <div class="col-md-5">
        <input type="text" name="first_name" class="form-control" maxlength="70" value="<?php echo set_value('first_name', $first_name)?>">
        <span class="input-subtitle">Must be your real first name</span>
        <?php echo ab_error_message("first_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("last_name"); ?>">
      <?=form_label('Panel Organizer Last Name *', 'last_name', $required_label)?>
      <div class="col-md-5">
        <input type="text" name="last_name" class="form-control" maxlength="70" value="<?php echo set_value('last_name', $last_name)?>">
        <span class="input-subtitle">Must be your real last name</span>
        <?php echo ab_error_message("last_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("pg_name"); ?>">
      <?=form_label('Organizer Programming Guide Name', 'pg_name', $optional_label)?>
      <div class="col-md-6">
        <input type="text" name="pg_name" class="form-control" maxlength="70" value="<?php echo set_value('pg_name', $pg_name)?>">
        <span class="input-subtitle">Your name as you want to appear in the Programming Guide, if different from your first and last name</span>
        <?php echo ab_error_message("pg_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("org_email"); ?>">
      <?=form_label('Organizer Email Address *', 'org_email', $required_label)?>
      <div class="col-md-5">
        <input type="email" name="org_email" class="form-control" maxlength="70" value="<?php echo set_value('org_email', $org_email)?>">
        <?php echo ab_error_message("org_email"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("org_email_confirm"); ?>">
      <?=form_label('Confirm Organizer Email Address *', 'org_email_confirm', $required_label)?>
      <div class="col-md-5">
        <input type="email" name="org_email_confirm" class="form-control" maxlength="70" value="<?php echo set_value('org_email_confirm', $org_email_confirm)?>">
        <?php echo ab_error_message("org_email_confirm"); ?>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Organizer Phone Number &amp; Type *', 'phone1', $required_label)?>
      <div class="col-md-5">
        <div class="<?php echo ab_error_style("phone1"); ?>">
          <span class="input-subtitle">Numbers only, no letters or characters</span>
          <input type="tel" name="phone1" class="form-control" maxlength="15" value="<?php echo set_value('phone1', $phone1); ?>">
          <?php echo ab_error_message("phone1"); ?>
        </div>
        <div class="<?php echo ab_error_style("phone1_type"); ?>">
          <?php
          $homeyes = ($phone1_type == 'Home') ? 'checked' : '';
          $mobileyes = ($phone1_type == 'Mobile') ? 'checked' : '';
          ?>
          <label><input type="radio" name="phone1_type" value="Home" <?=$homeyes?>> Home</label>
          <label><input type="radio" name="phone1_type" value="Mobile" <?=$mobileyes?>> Mobile</label>
          <?php echo ab_error_message("phone1_type"); ?>
        </div>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Organizer Mailing Address *', '', $required_label)?>
      <div class="col-md-8">
        <div class="form-inline <?php echo ab_error_style("address1"); ?>">
          <label class="required">Address 1</label>
          <input type="text" name="address1" class="form-control" maxlength="40" value="<?php echo set_value('address1', $address1); ?>">
          <?php echo ab_error_message("address1"); ?>
        </div>
      </div>
      <div class="col-md-8">
        <div class="form-inline <?php echo ab_error_style("address2"); ?>">
          <label>Address 2</label>
          <input type="text" name="address2" class="form-control" maxlength="70" value="<?php echo set_value('address2', $address2); ?>">
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
      <?=form_label('Date of Birth *', '', $required_label)?>
      <div class="col-md-8 form-inline">
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
        <br>
        <?php echo ab_error_message("birth_month"); ?>
        <?php echo ab_error_message("birth_day"); ?>
        <?php echo ab_error_message("birth_year"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("con_reg"); ?>">
      <?=form_label('Convention Registration *', 'con_reg', $required_label)?>
      <div class="col-md-8">
        <?php
        $regyes = ($con_reg == 'Yes') ? 'checked' : '';
        $regno = ($con_reg == 'No') ? 'checked' : '';
        ?>
        <span class="required">Are you already registered for Anime Boston <?=$currentyear?>?</span><br>
        <label><input type="radio" name="con_reg" value="Yes" <?=$regyes?>> Yes</label>
        <label><input type="radio" name="con_reg" value="No" <?=$regno?>> No</label>
        <?php echo ab_error_message("con_reg"); ?>
      </div>
    </div>
    <div class="row"><div class="col-xs-12"><hr></div></div>
    <div class="row form-group <?php echo ab_error_style("panel_description"); ?>">
      <?=form_label('Panel Description *', 'panel_description', $required_label)?>
      <div class="col-md-8">
        <span class="input-subtitle">Please provide a description of what the panel would consist of</span>
        <textarea name="panel_description" class="form-control" rows="8" cols="40"><?php echo set_value("panel_description", $panel_description); ?></textarea>
        <?php echo ab_error_message("panel_description"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("pg_description"); ?>">
      <?=form_label('Programming Guide Description *', 'pg_description', $required_label)?>
      <div class="col-md-8">
        <span class="input-subtitle">How you would like the panel described in the Programming Guide (max 150 characters)</span>
        <input type="text" name="pg_description" class="form-control" maxlength="150" value="<?php echo set_value("pg_description", $pg_description); ?>">
        <?php echo ab_error_message("pg_description"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("web_description"); ?>">
      <?=form_label('Website Description *', 'web_description', $required_label)?>
      <div class="col-md-8">
        <span class="input-subtitle">How you would like the panel described on the website</span>
        <textarea name="web_description" class="form-control" rows="8" cols="40"><?php echo set_value("web_description", $web_description); ?></textarea>
        <?php echo ab_error_message("web_description"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("rating_id"); ?>">
      <?=form_label('Rating *', 'rating_id', $required_label)?>
      <div class="col-md-7">
        <?php
        $ratings = array('' => '');
        foreach($panel_ratings as $panel_rating)
        {
          $ratings[$panel_rating["rating_id"]] = $panel_rating["label"];
        }

        echo form_dropdown("rating_id", $ratings, $rating_id, ab_dropdown_class());
        ?>
        <small>
          <?php foreach($panel_ratings as $panel_rating) {
            echo '<b>' . $panel_rating["label"] . ':</b> ' . $panel_rating["description"] . '<br>';
          } ?>
        </small>
        <?php echo ab_error_message("rating_id"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("panel_length"); ?>">
      <?=form_label('Panel Length *', 'panel_length', $required_label)?>
      <div class="col-md-3">
        <?php
        $options = array(
            '' => '',
            '60' => '60 minutes',
            '90' => '90 minutes',
            '120' => '120 minutes',
        );

        echo form_dropdown("panel_length", $options, $panel_length, ab_dropdown_class());
        ?>
        <?php echo ab_error_message("panel_length"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("av_req"); ?>">
      <?=form_label('Audio &amp; Video Requirements', 'av_req', $optional_label)?>
      <div class="col-md-8">
        <input type="text" name="av_req" class="form-control" maxlength="70" value="<?php echo set_value("av_req", $av_req); ?>">
        <?php echo ab_error_message("av_req"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("room_req"); ?>">
      <?=form_label('Special Room Requests', 'room_req', $optional_label)?>
      <div class="col-md-8">
        <input type="text" name="room_req" class="form-control" maxlength="70" value="<?php echo set_value("room_req", $room_req); ?>">
        <?php echo ab_error_message("room_req"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("pref_time"); ?>">
      <?=form_label('Preferred Time Slot', 'pref_time', $optional_label)?>
      <div class="col-md-8">
        <span class="input-subtitle">Please list days as Fri, Sat, or Sun with time and AM/PM notation</span>
        <input type="text" name="pref_time" class="form-control" maxlength="70" value="<?php echo set_value("pref_time", $pref_time); ?>">
        <?php echo ab_error_message("pref_time"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("unav_time"); ?>">
      <?=form_label('Unavailable Time', 'unav_time', $optional_label)?>
      <div class="col-md-8">
        <span class="input-subtitle">Please list days as Fri, Sat, or Sun with time and AM/PM notation</span>
        <input type="text" name="unav_time" class="form-control" maxlength="70" value="<?php echo set_value("unav_time", $unav_time); ?>">
        <?php echo ab_error_message("unav_time"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("other_info"); ?>">
      <?=form_label('Other Information', 'other_info', $optional_label)?>
      <div class="col-md-8">
        <textarea name="other_info" class="form-control" rows="8" cols="40"><?php echo set_value("other_info", $other_info); ?></textarea>
        <?php echo ab_error_message("other_info"); ?>
      </div>
    </div>
    <div class="row"><div class="xol-cs-12"><hr></div></div>
    <div class="row form-group <?php echo ab_error_style("assoc_total"); ?>">
      <?=form_label('Associate Panelists', 'assoc_total', $optional_label)?>
      <div class="col-md-5">
        <span class="input-subtitle">How many associate panelists will there be?</span>
        <select name="assoc_total" class="form-control"onchange="show()">
          <?php
          $assocoptions = array();
          for($i = 0; $i <= $max_assoc; $i++)
          {
            $assocoptions[$i] = $i;
          }

          foreach($assocoptions as $key => $value)
          {
            $selected = ($assoc_total == $key) ? 'selected' : '';
            echo "<option value='$key' $selected>$value</option>";
          }
          ?>
        </select>
        <?php echo ab_error_message("assoc_total"); ?>
      </div>
    </div>
    <?php
    for($i = 0; $i < $max_assoc; $i++)
    {
      $displaystyle = ($i < $assoc_total) ? 'block' : 'none';
      $homeyes = ($assoc_phone1_type[$i] == 'Home' || $assoc_phone1_type[$i] == '') ? 'checked' : '';
      $mobileyes = ($assoc_phone1_type[$i] == 'Mobile') ? 'checked' : '';
      ?>
      <div id="assoc<?=$i?>" class="row form-group" style="display:<?=$displaystyle?>;">
        <div class="col-xs-12"><hr></div>
        <?=form_label('Associate Panelist ' . ($i+1) . ' *', '', $required_label)?>
        <div class="col-md-8">
          <div class="form-inline <?php echo ab_error_style("assoc_first_name[$i]"); ?>">
            <label class="required">First Name</label>
            <input type="text" name="assoc_first_name[<?=$i?>]" class="form-control" maxlength="100" value="<?php echo set_value("assoc_first_name[$i]", $assoc_first_name[$i]); ?>">
            <span class="input-subtitle">Must be their real first name</span>
            <?php echo ab_error_message("assoc_first_name[$i]"); ?>
          </div>
          <div class="form-inline <?php echo ab_error_style("assoc_last_name[$i]"); ?>">
            <label class="required">Last Name</label>
            <input type="text" name="assoc_last_name[<?=$i?>]" class="form-control" maxlength="100" value="<?php echo set_value("assoc_last_name[$i]", $assoc_last_name[$i]); ?>">
            <span class="input-subtitle">Must be their real last name</span>
            <?php echo ab_error_message("assoc_last_name[$i]"); ?>
          </div>
          <div class="form-inline <?php echo ab_error_style("assoc_pg_name[$i]"); ?>">
            <label>Programming Guide Name</label>
            <input type="text" name="assoc_pg_name[<?=$i?>]" class="form-control" maxlength="100" value="<?php echo set_value("assoc_pg_name[$i]", $assoc_pg_name[$i]); ?>">
            <span class="input-subtitle">If different from their first and last name</span>
            <?php echo ab_error_message("assoc_pg_name[$i]"); ?>
          </div>
          <div class="form-inline <?php echo ab_error_style("assoc_email[$i]"); ?>">
            <label>Email Address</label>
            <input type="email" name="assoc_email[<?=$i?>]" class="form-control" maxlength="100" value="<?php echo set_value("assoc_email[$i]", $assoc_email[$i]); ?>">
            <?php echo ab_error_message("assoc_email[$i]"); ?>
          </div>
          <div class="form-inline <?php echo ab_error_style("assoc_phone1[<?=$i?>]"); ?>">
            <label>Phone Number &amp; Type</label>
            <span class="<?php echo ab_error_style("assoc_phone1[$i]"); ?>">
              <input type="tel" name="assoc_phone1[<?=$i?>]" class="form-control" maxlength="15" value="<?php echo set_value("assoc_phone1[$i]", $assoc_phone1[$i]); ?>">
              <?php echo ab_error_message("assoc_phone1[$i]"); ?>
            </span>
            <span class="<?php echo ab_error_style("assoc_phone1_type[$i]"); ?>">
              <label><input type="radio" name="assoc_phone1_type[<?=$i?>]" value="Home" <?=$homeyes?>> Home</label>
              <label><input type="radio" name="assoc_phone1_type[<?=$i?>]" value="Mobile" <?=$mobileyes?>> Mobile</label>
              <?php echo ab_error_message("assoc_phone1_type[$i]"); ?>
            </span>
            <br>
            <span class="input-subtitle">Numbers only, no letters or characters</span>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php
    $info_style = ($assoc_total > 0) ? 'table-row' : 'none';
    $agreeyes = ($assoc_agree == 'Yes') ? 'checked' : '';
    $agreeno = ($assoc_agree == 'No' || $assoc_agree == '') ? 'checked' : '';
    $assocregyes = ($assoc_reg == 'Yes') ? 'checked' : '';
    $assocregno = ($assoc_reg == 'No' || $assoc_reg == '') ? 'checked' : '';
    ?>
    <div id="assoc_info" class="row form-group" style="display:<?=$info_style?>;">
      <div class="col-xs-12"><hr></div>
      <?=form_label('Other Associate Panelist Information', '', $optional_label)?>
      <div class="col-md-8">
        <div class="<?php echo ab_error_style("assoc_agree"); ?>">
          <label>Have all the associate panelists agreed to do the panel?</label><br>
          <label><input type="radio" name="assoc_agree" value="Yes" <?=$agreeyes?>> Yes</label>
          <label><input type="radio" name="assoc_agree" value="No" <?=$agreeno?>> No</label>
          <?php echo ab_error_message("assoc_agree"); ?>
        </div>
        <div class="<?php echo ab_error_style("assoc_reg"); ?>">
          <label>Have all the associate panelists pre-registered for Anime Boston <?=$currentyear?></label><br>
          <label><input type="radio" name="assoc_reg" value="Yes" <?=$assocregyes?>> Yes</label>
          <label><input type="radio" name="assoc_reg" value="No" <?=$assocregno?>> No</label>
          <?php echo ab_error_message("assoc_reg"); ?>
        </div>
      </div>
    </div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit">
      <input type="reset" name="reset" class="btn btn-default" value="Reset">
    </div>
  </form>
</div>
