<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/exhibits/">Exhibits</a></li>
  <li>Exhibitor Tax ID Submission</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<div class="page-body clearfix">
  <h1>Exhibitor Tax ID Submission</h1>
  <p>Please fill out the fields below to submit your Massachusetts DOR Tax ID as an exhibitor for the Anime Boston <?=$currentyear?>.</p>
  <p>
    <b>Please Note:</b><br>
    This Massachusetts DOR Tax ID submission does not guarantee space in the Dealers' Room, Artists' Alley,
    or any other Exhibitor space for Anime Boston <?=$currentyear?>.
    You must complete all other required registration processes.
  </p>
  <p>Each person or company selling their own products at your space must submit their Massachusetts State Sales Tax ID separately.</p>
  <p>
    If you submit your Tax ID but ultimately do not participate as an Exhibitor at Anime Boston <?=$currentyear?>,
    please <a href="/coninfo/contact/6">contact the Director of Exhibits</a> to have your Exhibitor Tax ID submission deleted.
    Otherwise it will be reported to the Massachusetts DOR.
  </p>
  <form class="form-horizontal" action="/forms/exhibitor_taxid/" method="post">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required information</p>
    <div class="row form-group">
      <?=form_label('Name *', '', $required_label)?>
      <div class="col-md-8">
        <span class="input-subtitle required">Please enter your personal name or company name as registered with the MA Dept of Revenue.</span>
        <div class="form-inline <?php echo ab_error_style("first_name"); ?>">
          <label>First Name</label>
          <input type="text" name="first_name" class="form-control" maxlength="70" value="<?php echo set_value('first_name', $first_name); ?>">
          <?php echo ab_error_message("first_name"); ?>
        </div>
        <div class="form-inline <?php echo ab_error_style("last_name"); ?>">
          <label>Last Name</label>
          <input type="text" name="last_name" class="form-control" maxlength="70" value="<?php echo set_value('last_name', $last_name); ?>">
          <?php echo ab_error_message("last_name"); ?>
        </div>
        <div class="row"><div class="input-subtitle required col-sm-8" style="text-align:center;">OR</div></div>
        <div class="form-inline <?php echo ab_error_style("company_name"); ?>">
          <label>Company Name</label>
          <input type="text" name="company_name" class="form-control" maxlength="70" value="<?php echo set_value('company_name', $company_name); ?>">
          <?php echo ab_error_message("company_name"); ?>
        </div>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("email"); ?>">
      <?=form_label('Email Address *', 'email', $required_label)?>
      <div class="col-md-5">
        <input type="email" name="email" class="form-control" maxlength="70" value="<?php echo set_value('email', $email)?>">
        <?php echo ab_error_message("email"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("email_confirm"); ?>">
      <?=form_label('Confirm Email Address *', 'email_confirm', $required_label)?>
      <div class="col-md-5">
        <input type="email" name="email_confirm" class="form-control" maxlength="70" value="<?php echo set_value('email_confirm', $email_confirm)?>">
        <?php echo ab_error_message("email_confirm"); ?>
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
          <input type="text" name="address_2" class="form-control" maxlength="200" value="<?php echo set_value('address_2', $address_2); ?>">
          <?php echo ab_error_message("address_2"); ?>
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
        <div class="form-inline <?php echo ab_error_style("zip_code"); ?>">
          <label class="required">Zip Code</label>
          <input type="text" name="zip_code" class="form-control" maxlength="15" value="<?php echo set_value('zip_code', $zip_code); ?>">
          <?php echo ab_error_message("zip_code"); ?>
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
          <span class="input-subtitle required">I am 18 years old or older</span>
        </label>
        <?php echo ab_error_message("age_confirmation"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("exhibitor_type"); ?>">
      <?=form_label('Exhibitor Type *', 'exhibitor_type', $required_label)?>
      <div class="col-md-3">
        <?php
        $exhibitoroptions = array('' => '', 'Dealers Room' => 'Dealers\' Room', 'Artists Alley' => 'Artists\' Alley');
        echo form_dropdown("exhibitor_type", $exhibitoroptions, $exhibitor_type, ab_dropdown_class());
        ?>
        <?php echo ab_error_message("exhibitor_type"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("tax_id"); ?>">
      <?=form_label('MA State Tax ID *', 'tax_id', $required_label)?>
      <div class="col-md-7">
        <input type="text" name="tax_id" class="form-control" maxlength="9" value="<?php echo set_value('tax_id', $tax_id); ?>">
        <span class="input-subtitle">
          The 9-digit Sales Tax ID (EIN) as provided to you by the MA Dept of Revenue.<br>
          Numbers only, no spaces or dashes.
        </span>
        <?php echo ab_error_message("tax_id"); ?>
      </div>
    </div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit">
      <input type="reset" name="reset" class="btn btn-default" value="Reset">
    </div>
  </form>
</div>
