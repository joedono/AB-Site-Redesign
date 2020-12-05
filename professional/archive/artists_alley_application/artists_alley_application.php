<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/artists/">Artists</a></li>
  <li>Artists' Alley Application</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<div class="page-body clearfix">
  <h1>Artist' Alley Application</h1>

  <?php
  if(strcmp($aa_application,'Pro Row Open') == 0)
  {
    echo '<p>Enter your information below to apply for space in the ' . $currentyear . ' Artists\' Alley <a href="/artists/artists_alley_pro_row/">Pro Row</a>.</p>';
  }
  if(strcmp($aa_application,'Standard Open') == 0)
  {
    echo '<p>Enter your information below to apply for a standard space in the <a href="/artists/artists_alley/">Artists\' Alley</a>.';
  }
  if(strcmp($aa_application,'Standard Waitlist') == 0)
  {
    echo '<p class="text-danger">Please Note: Spaces for the ' . $currentyear . ' <a href="/artists/artists_alley/">Artists\' Alley</a> are full at this time.</p>';
    echo '<p>You may still enter your information below to apply on the <strong>Waitlist</strong>. Please note that applicants on the Waitlist will be contacted <em>only</em> if room becomes available for them.';
  }
  ?>

  <?php recaptcha_theme(); ?>

  <form class="form-horizontal" action="/forms/artists_alley_application/" method="post">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required information</p>
    <div class="row form-group <?php echo ab_error_style("first_name"); ?>">
      <?=form_label('First Name *', 'first_name', $required_label)?>
      <div class="col-md-5">
        <input type="text" name="first_name" class="form-control" maxlength="70" value="<?php echo set_value("first_name", $first_name); ?>">
        <span class="input-subtitle">Must be your real first name</span>
        <?php echo ab_error_message("first_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("last_name"); ?>">
      <?=form_label('Last Name *', 'last_name', $required_label)?>
      <div class="col-md-5">
        <input type="text" name="last_name" class="form-control" maxlength="70" value="<?php echo set_value("last_name", $last_name); ?>">
        <span class="input-subtitle">Must be your real last name</span>
        <?php echo ab_error_message("last_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("email"); ?>">
      <?=form_label('E-Mail Address *', 'email', $required_label)?>
      <div class="col-md-6">
        <input type="email" name="email" class="form-control" maxlength="70" value="<?php echo set_value("email", $email); ?>">
        <?php echo ab_error_message("email"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("email_confirm"); ?>">
      <?=form_label('Confirm E-Mail Address *', 'email_confirm', $required_label)?>
      <div class="col-md-6">
        <input type="email" name="email_confirm" class="form-control" maxlength="70" value="<?php echo set_value("email_confirm", $email_confirm); ?>">
        <?php echo ab_error_message("email_confirm"); ?>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Date of Birth *', '', $required_label)?>
      <div class="col-md-8 form-inline">
        <span class="input-subtitle required">You must be 18 years of age as of today, <?php echo date('m/d/Y'); ?> to participate in Artists' Alley.</span><br>
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
    <div class="row form-group <?php echo ab_error_style("country"); ?>">
      <?=form_label('Country *', 'country', $required_label)?>
      <div class="col-md-5">
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
    <div class="row form-group">
      <?=form_label('Phone Number *', 'phone1', $required_label)?>
      <div class="col-md-8">
        <div class="form-inline <?php echo ab_error_style("phone1"); echo ab_error_style("phone1_type"); ?>">
          <input type="tel" name="phone1" class="form-control" maxlength="15" value="<?php echo set_value('phone1', $phone1); ?>">
          <?php
          $phone1options = array('Cell' => 'Cell', 'Home' => 'Home', 'Work' => 'Work');
          echo form_dropdown("phone1_type", $phone1options, $phone1_type, ab_dropdown_class());
          ?>
          <?php echo ab_error_message("phone1"); ?>
          <?php echo ab_error_message("phone1_type"); ?>
        </div>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("app_size"); ?>">
      <?=form_label('Preferred Table Size *', 'app_size', $required_label)?>
      <div class="col-md-6">
        <?php
        $options = array("" => "Select One");
        foreach($tables as $value)
        {
          $table_id = $value['table_id'];
          $table_size = $value['table_size'];
          $table_price = $value['table_price'];
          $options[$table_id] = "$table_size Feet - $$table_price";
        }
        echo form_dropdown("app_size", $options, $app_size, ab_dropdown_class());
        ?>
        <?php echo ab_error_message("app_size"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("app_size_min"); ?>">
      <?=form_label('Table Size Minimum *', 'app_size_min', $required_label)?>
      <div class="col-md-6">
        <?php
        $options = array("" => "Select One");
        foreach($tables as $value)
        {
          $table_id = $value['table_id'];
          $table_size = $value['table_size'];
          $table_price = $value['table_price'];
          $options[$table_id] = "$table_size Feet - $$table_price";
        }
        echo form_dropdown("app_size_min", $options, $app_size_min, ab_dropdown_class());
        ?>
        <span class="input-subtitle">
          This is the minimum table space you're interested in.
          Due to high demand of Artists' Alley tables, your preferred table size may not be available.
          If we do not have the space to meet your minimum request, we will not contact you to offer a spot.
        </span>
        <?php echo ab_error_message("app_size_min"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("table_confirm"); ?>">
      <?=form_label('Table Size Confirmation *', 'table_confirm', $required_label)?>
      <div class="col-md-8">
        <?php
        $tableyes = ($table_confirm == 'Yes') ? "checked" : "";
        $tableno = ($table_confirm == 'No') ? "checked" : "";
        ?>
        <span class="required">I am sure that's how much table space I want</span><br>
        <span class="input-subtitle">Please note you can request to decrease your space later, but <b>not</b> to increase it.</span><br>
        <label><input type="radio" name="table_confirm" value="Yes" <?=$tableyes?>> Yes</label>
        <label><input type="radio" name="table_confirm" value="No" <?=$tableno?>> No</label><br>
        <?php echo ab_error_message("table_confirm"); ?>
      </div>
    </div>
    <?php if(isset($table_type) && strcmp($table_type,'Pro Row') == 0) { ?>
      <div class="row form-group <?php echo ab_error_style("site_url"); ?>">
        <?=form_label('Website URL *', 'site_url', $required_label)?>
        <div class="col-md-7">
          <input type="text" name="site_url" class="form-control" maxlength="500" value="<?php echo set_value('site_url', $site_url); ?>">
          <span class="input-subtitle required">Please enter your Website URL for review purposes.</span><br>
          <?php echo ab_error_message("site_url"); ?>
        </div>
      </div>
    <?php } ?>
    <div class="row form-group <?php echo ab_error_style("con_reg"); ?>">
      <?=form_label('Convention Registration *', 'con_reg', $required_label)?>
      <div class="col-md-6">
        <span class="required">Are you registered for Anime Boston <?=$currentyear?> yet?</span><br>
        <span class="input-subtitle">(If yes, we'll pass on special instructions; if no, <b>do not register</b> until we contact you.)</span>
        <?php
        $regoptions = array('' => 'Select One', 'Yes' => 'Yes', 'No' => 'No');
        echo form_dropdown("con_reg", $regoptions, $con_reg, ab_dropdown_class());
        ?>
        <?php echo ab_error_message("con_reg"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("accepted_rules"); ?>">
      <?=form_label('Rules *', 'accepted_rules', $required_label)?>
      <div class="col-md-6">
        <span class="required">I have read and understand the <a href="/artists/artists_alley_faq/" target="_blank">rules for the Anime Boston <?=$currentyear?> Artists' Alley</a>?</span><br>
        <input type="checkbox" name="accepted_rules" value="1" <?php echo $accepted_rules ? "checked" : ""; ?>>
        <?php echo ab_error_message("accepted_rules"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("g-recaptcha-response"); ?>">
      <?=form_label('Security Validation *', 'g-recaptcha-response', $required_label)?>
      <div class="col-md-8">
        <?php echo recaptcha_get_html($this->config->item('public_key')); ?>
        <?php echo ab_error_message("g-recaptcha-response"); ?>
      </div>
    </div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit">
      <input type="reset" name="reset" class="btn btn-default" value="Reset">
    </div>
  </form>
</div>