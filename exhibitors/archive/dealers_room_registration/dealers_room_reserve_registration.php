<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/exhibits/">Exhibits</a></li>
  <li>Dealers' Room Registration</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<div class="page-body clearfix">
  <h1>Dealers' Room Registration</h1>
  <p>This is the registration for booth space in the Anime Boston <?=$currentyear?> Dealers' Room.</p>
  <p>This registration form is only for Dealers who have confirmed specific table space already.</p>
  <p>Please do not fill this form out if you have not been instructed to by Anime Boston Dealers' Room staff.</p>
  <form class="form-horizontal" action="/forms/dealers_room_reserve_registration/" method="post">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required information</p>
    <div class="row form-group <?php echo ab_error_style("company_name"); ?>">
      <?=form_label('Company Name *', 'company_name', $required_label)?>
      <div class="col-md-7">
        <span class="input-subtitle required">Please enter your company's legal name.</span>
        <input type="text" name="company_name" class="form-control" maxlength="250" value="<?php echo set_value("company_name", $company_name); ?>">
        <?php echo ab_error_message("company_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("display_name"); ?>">
      <?=form_label('Display Name', 'display_name', $optional_label)?>
      <div class="col-md-7">
        <span class="input-subtitle">How you would like your company to be presented as, if different from Company Name.</span>
        <input type="text" name="display_name" class="form-control" maxlength="250" value="<?php echo set_value("display_name", $display_name); ?>">
        <?php echo ab_error_message("display_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("first_name"); ?>">
      <?=form_label('Primary Contact\'s First Name *', 'first_name', $required_label)?>
      <div class="col-md-4">
        <input type="text" name="first_name" class="form-control" maxlength="150" value="<?php echo set_value("first_name", $first_name); ?>">
        <?php echo ab_error_message("first_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("last_name"); ?>">
      <?=form_label('Primary Contact\'s Last Name *', 'last_name', $required_label)?>
      <div class="col-md-4">
        <input type="text" name="last_name" class="form-control" maxlength="150" value="<?php echo set_value("last_name", $last_name); ?>">
        <?php echo ab_error_message("last_name"); ?>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Primary Contact\'s Date of Birth *', '', $required_label)?>
      <div class="col-md-8 form-inline">
        <span class="input-subtitle required">Primary contact must be 18 years of age as of <?php echo date('m/d/Y',$con_date); ?>.</span><br>
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
    <div class="row form-group <?php echo ab_error_style("email"); ?>">
      <?=form_label('E-Mail Address *', 'email', $required_label)?>
      <div class="col-md-5">
        <input type="email" name="email" class="form-control" maxlength="150" value="<?php echo set_value("email", $email); ?>">
        <?php echo ab_error_message("email"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("email_confirm"); ?>">
      <?=form_label('Confirm E-Mail Address *', 'email_confirm', $required_label)?>
      <div class="col-md-5">
        <input type="email" name="email_confirm" class="form-control" maxlength="150" value="<?php echo set_value("email_confirm", $email_confirm); ?>">
        <?php echo ab_error_message("email_confirm"); ?>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Mailing Address *', '', $required_label)?>
      <div class="col-md-8">
        <div class="form-inline <?php echo ab_error_style("address_1"); ?>">
          <label class="required">Address 1</label>
          <input type="text" name="address_1" class="form-control" maxlength="150" value="<?php echo set_value('address_1', $address_1); ?>">
          <?php echo ab_error_message("address_1"); ?>
        </div>
      </div>
      <div class="col-md-8 col-lg-push-3 col-md-push-4">
        <div class="form-inline <?php echo ab_error_style("address_2"); ?>">
          <label>Address 2</label>
          <input type="text" name="address_2" class="form-control" maxlength="150" value="<?php echo set_value('address_2', $address_2); ?>">
          <?php echo ab_error_message("address_2"); ?>
        </div>
      </div>
      <div class="col-md-8 col-lg-push-3 col-md-push-4">
        <div class="form-inline <?php echo ab_error_style("city"); ?>">
          <label class="required">City</label>
          <input type="text" name="city" class="form-control" maxlength="150" value="<?php echo set_value('city', $city); ?>">
          <?php echo ab_error_message("city"); ?>
        </div>
      </div>
      <div class="col-md-8 col-lg-push-3 col-md-push-4">
        <div class="form-inline <?php echo ab_error_style("state"); ?>">
          <label class="required">State</label>
          <input type="text" name="state" class="form-control" maxlength="150" size="2" value="<?php echo set_value('state', $state); ?>">
          <?php echo ab_error_message("state"); ?>
        </div>
      </div>
      <div class="col-md-8 col-lg-push-3 col-md-push-4">
        <div class="form-inline <?php echo ab_error_style("zip"); ?>">
          <label class="required">Zip Code</label>
          <input type="text" name="zip" class="form-control" maxlength="150" value="<?php echo set_value('zip', $zip); ?>">
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
      <?=form_label('Phone 1 *', 'phone1', $required_label)?>
      <div class="col-md-5 form-inline">
        <div class="<?php echo ab_error_style("phone1"); ?>">
          <input type="tel" name="phone1" class="form-control" maxlength="150" value="<?php echo set_value('phone1', $phone1); ?>">
          <?php
          $phone1options = array('Home' => 'Home', 'Work' => 'Work', 'Cell' => 'Cell');
          echo form_dropdown("phone1_type", $phone1options, $phone1_type, ab_dropdown_class());
          ?><br>
          <?php echo ab_error_message("phone1"); ?>
          <?php echo ab_error_message("phone1_type"); ?>
        </div>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Phone 2', 'phone2', $optional_label)?>
      <div class="col-md-5 form-inline">
        <div class="<?php echo ab_error_style("phone2"); ?>">
          <input type="tel" name="phone2" class="form-control" maxlength="150" value="<?php echo set_value('phone2', $phone2); ?>">
          <?php
          $phone2options = array('Cell' => 'Cell', 'Work' => 'Work', 'Home' => 'Home');
          echo form_dropdown("phone2_type", $phone2options, $phone2_type, ab_dropdown_class());
          ?><br>
          <?php echo ab_error_message("phone2"); ?>
          <?php echo ab_error_message("phone2_type"); ?>
        </div>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("website"); ?>">
      <?=form_label('Website', 'website', $optional_label)?>
      <div class="col-md-6">
        <span class="input-subtitle">Your website will be included on our Dealers' Room Listing page.</span>
        <input type="text" name="website" class="form-control" maxlength="150" value="<?php echo set_value("website", $website); ?>">
        <?php echo ab_error_message("website"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("website"); ?>">
      <?=form_label('Products *', 'products', $required_label)?>
      <div class="col-md-8">
        <span class="input-subtitle required">Please provide a brief list of the primary products you will be selling.</span>
        <textarea name="products" class="form-control" rows="5" cols="40"><?php echo set_value("products", $products); ?></textarea>
        <?php echo ab_error_message("website"); ?>
      </div>
    </div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit Registration">
      <input type="reset" name="reset" class="btn btn-default" value="Clear">
    </div>
  </form>
</div>
