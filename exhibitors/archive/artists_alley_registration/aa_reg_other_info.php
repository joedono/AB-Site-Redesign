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

<script type="text/javascript">
  function show()
  {
    var intCount = document.aa_reg_form.total_asst.options.length;
    var intValue = document.aa_reg_form.total_asst.value;

    for(i = 0; i < intValue; i++)
    {
      assoc = "asst"+i;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = '';
    }

    for(j = intCount - 1; j > intValue; j--)
    {
      assoc = "asst"+j;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = 'none';
    }
  }

  function ConfirmEntry()
  {
    return confirm('Are you sure you want to submit this information?');
  }
</script>

<div class="page-body clearfix">
  <h1>Artist Alley Registration - Phase 2</h1>

  <?php aa_reg_warning(); ?>

  <hr>

  <?php
  $first_name = $this->session->userdata('first_name');
  $last_name = $this->session->userdata('last_name');
  $email = $this->session->userdata('email');
  $country = $this->session->userdata('country');
  $phone1 = $this->session->userdata('phone1');
  $phone1_type = $this->session->userdata('phone1_type');
  $con_reg = $this->session->userdata('con_reg');

  $reg_table_type = $this->session->userdata('reg_table_type');
  $reg_table_size = $this->session->userdata('reg_table_size');
  $reg_table_price = $this->session->userdata('reg_table_price');
  $reg_max_asst = $this->session->userdata('reg_max_asst');
  ?>

  <p>
    Please enter the rest of the information for the Artists' Alley registration.
    Also include the name and Arists' Alley badge name for your assistants.
    Please note that your assistants <i>must register for Anime Boston <?=$currentyear?> separately</i>.
  </p>

  <form class="form-horizontal" name="aa_reg_form" action="/forms/artists_alley_registration/" method="post" onsubmit="return ConfirmEntry();">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required information</p>
    <div class="row form-group">
      <label class="col-lg-3 col-md-4">First Name</label>
      <div class="col-md-8"><?=$first_name?></div>
    </div>
    <div class="row form-group">
      <label class="col-lg-3 col-md-4">Last Name</label>
      <div class="col-md-8"><?=$last_name?></div>
    </div>
    <div class="row form-group">
      <label class="col-lg-3 col-md-4">Email</label>
      <div class="col-md-8"><?=$email?></div>
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
          <?=$country?>
        </div>
      </div>
    </div>
    <div class="row form-group">
      <label class="col-lg-3 col-md-4">Pre-Registered for <br> Anime Boston <?=$currentyear?></label>
      <div class="col-md-8"><?=$con_reg?></div>
    </div>
    <div class="row form-group">
      <label class="col-lg-3 col-md-4">Table Info</label>
      <div class="col-md-8">
        Type: <?=$reg_table_type?><br>
        Size: <?=$reg_table_size?> Feet<br>
        Price: $<?=$reg_table_price?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("badge_name"); ?>">
      <?=form_label('Badge Name', 'badge_name', $optional_label)?>
      <div class="col-md-6">
        <input type="text" name="badge_name" class="form-control" maxlength="70" value="<?php echo set_value('badge_name', $badge_name); ?>">
        <span class="input-subtitle">If different from your first name</span>
        <?php echo ab_error_message("badge_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("studio_name"); ?>">
      <?=form_label('Studio/Company Name', 'studio_name', $optional_label)?>
      <div class="col-md-6">
        <input type="text" name="studio_name" class="form-control" maxlength="70" value="<?php echo set_value('studio_name', $studio_name); ?>">
        <?php echo ab_error_message("studio_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("site_url"); ?>">
      <?=form_label('Website URL', 'site_url', $optional_label)?>
      <div class="col-md-7">
        <input type="text" name="site_url" class="form-control" maxlength="70" value="<?php echo set_value('site_url', $site_url); ?>">
        <span class="input-subtitle">For the AA Map Online</span>
        <?php echo ab_error_message("site_url"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("listing"); ?>">
      <?=form_label('Listing Entry *', 'listing', $required_label)?>
      <div class="col-md-6">
        <input type="text" name="listing" class="form-control" maxlength="70" value="<?php echo set_value('listing', $listing); ?>">
        <span class="input-subtitle">How to list your name/studio as</span>
        <?php echo ab_error_message("listing"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("show_listing"); ?>">
      <?=form_label('Show Listing *', 'show_listing', $required_label)?>
      <div class="col-md-4">
        <?php
        $listingoptions = array('' => 'Select One', 'Yes' => 'Yes', 'No' => 'No');
        echo form_dropdown("show_listing", $listingoptions, $show_listing, ab_dropdown_class());
        ?>
        <span class="input-subtitle">Do you want to be listed on the website and Program Guide?</span>
        <?php echo ab_error_message("show_listing"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("special_request"); ?>">
      <?=form_label('Special Requests', 'special_request', $optional_label)?>
      <div class="col-md-8">
        <textarea name="special_request" class="form-control" rows="8" cols="40"><?php echo set_value('special_request', $special_request); ?></textarea>
        <span class="input-subtitle">If you require electricty, want to be seated next to someone else, etc</span><br>
        <?php echo ab_error_message("special_request"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("all_days"); ?>">
      <?=form_label('Attendance *', 'all_days', $required_label)?>
      <div class="col-md-5">
        <span class="input-subtitle"><span class="required">Do you plan to be at your table all days of the convention?</span></span><br>
        <?php
        $attendoptions = array('' => 'Select One', 'Yes' => 'Yes', 'No' => 'No');
        echo form_dropdown("all_days", $attendoptions, $all_days, ab_dropdown_class());
        ?>
        <span class="input-subtitle">Please note, answering either way will NOT affect your Artists' Alley table registration. It is for statistical information only.</span>
        <?php echo ab_error_message("all_days"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("rules"); ?>">
      <?=form_label('Artists\' Alley FAQ *', 'rules', $required_label)?>
      <div class="col-md-8">
        <?php $ruleschecked = (strcmp($rules,'Yes') == 0) ? 'checked' : ''; ?>
        <label>
          <input type="checkbox" name="rules" value="Yes" <?=$ruleschecked?>>
          <span class="input-subtitle required">I have read and agree to all rules, instructions, and legal provisions set forth within the <a href="/artists/artists_alley_faq/" target="_blank">Artists' Alley FAQ</a>.</span>
        </label>
        <?php echo ab_error_message("rules"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("total_asst"); ?>">
      <?=form_label('Total Assistants *', '', $required_label)?>
      <div class="col-md-4">
        <span class="input-subtitle">How many assistants or other artists will you have?</span><br>
        <select name="total_asst" class="form-control" onchange="show()">
          <?php
          $asstoptions = array();
          for($i = 0; $i <= $reg_max_asst; $i++)
          {
            $asstoptions[$i] = $i;
          }

          foreach($asstoptions as $key => $value)
          {
            $selected = ($total_asst == $key) ? 'selected' : '';
            echo "<option value='$key' $selected>$value</option>";
          }
          ?>
        </select>
        <?php echo ab_error_message("total_asst"); ?>
      </div>
    </div>
    <?php
    for($i = 0; $i < $reg_max_asst; $i++)
    {
      $displaystyle = ($i < $total_asst) ? 'block' : 'none';
      ?>
      <div id="asst<?=$i?>" class="row form-group" style="display:<?=$displaystyle?>;">
        <div class="col-xs-12"><hr></div>
        <?=form_label('Assistant ' . ($i+1) . ' *', '', $required_label)?>
        <div class="col-md-8">
          <div class="form-inline <?php echo ab_error_style("asst_first_name[$i]"); ?>">
            <label class="required">First Name</label>
            <input type="text" name="asst_first_name[<?=$i?>]" class="form-control" maxlength="100" value="<?php echo set_value("asst_first_name[$i]", $asst_first_name[$i]); ?>">
            <span class="input-subtitle">Must be their real first name</span>
            <?php echo ab_error_message("asst_first_name[$i]"); ?>
          </div>
          <div class="form-inline <?php echo ab_error_style("asst_last_name[$i]"); ?>">
            <label class="required">Last Name</label>
            <input type="text" name="asst_last_name[<?=$i?>]" class="form-control" maxlength="100" value="<?php echo set_value("asst_last_name[$i]", $asst_last_name[$i]); ?>">
            <span class="input-subtitle">Must be their real last name</span>
            <?php echo ab_error_message("asst_last_name[$i]"); ?>
          </div>
          <div class="form-inline <?php echo ab_error_style("asst_badge_name[$i]"); ?>">
            <label>Badge Name</label>
            <input type="text" name="asst_badge_name[<?=$i?>]" class="form-control" maxlength="100" value="<?php echo set_value("asst_badge_name[$i]", $asst_badge_name[$i]); ?>">
            <span class="input-subtitle">If different from their first and last name</span>
            <?php echo ab_error_message("asst_badge_name[$i]"); ?>
          </div>
          <div class="form-inline">
            <label class="required">Date of Birth</label><br>
            <label class="required">Month</label>
            <?php
            $options = array("" => "");
            for($month = 1; $month < 13; $month++)
            {
              $mon = sprintf('%02d',$month);
              $options[$mon] = $mon;
            }

            echo form_dropdown("asst_birth_month[$i]", $options, $asst_birth_month[$i], ab_dropdown_class());
            ?>
            <label class="required">Day</label>
            <?php
            $options = array("" => "");
            for($day = 1; $day < 32; $day++)
            {
              $da = sprintf('%02d',$day);
              $options[$da] = $da;
            }
            echo form_dropdown("asst_birth_day[$i]", $options, $asst_birth_day[$i], ab_dropdown_class());
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
            echo form_dropdown("asst_birth_year[$i]", $options, $asst_birth_year[$i], ab_dropdown_class());
            ?>
            <br>
            <span class="input-subtitle">Asst must be 18 years of age by <?php echo date('m/d/Y', $con_start_date); ?> to participate in Artists' Alley</span>
            <?php echo ab_error_message("asst_birth_month[$i]"); ?>
            <?php echo ab_error_message("asst_birth_day[$i]"); ?>
            <?php echo ab_error_message("asst_birth_year[$i]"); ?>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="row"><div class="col-xs-12"><hr></div></div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit">
      <input type="reset" name="reset" class="btn btn-default" value="Reset">
    </div>
  </form>
</div>
