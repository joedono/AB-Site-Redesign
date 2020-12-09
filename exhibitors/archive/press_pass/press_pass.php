<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/press/">Press</a></li>
  <li>Press Pass Application</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<script type = "text/javascript">
  function show()
  {
    var intCount = document.press_pass_form.person_total.options.length;
    var intValue = document.press_pass_form.person_total.value;

    for(i = 0; i < intValue; i++)
    {
      assoc = "person"+i;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = '';
    }

    for(j = intCount - 1; j >= intValue; j--)
    {
      assoc = "person"+j;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = 'none';
    }
  }
</script>

<div class="page-body clearfix">
  <h1>Press Pass Application</h1>
  <p>Please fill out the fields below to apply for a Press Pass for Anime Boston <?=$currentyear?>.</p>
  <p>Please note that all press passes must be requested and approved <i>prior</i> to the convention.</p>
  <form class="form-horizontal" name="press_pass_form" action="/forms/press_pass/" method="post">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required information</p>
    <div class="row form-group <?php echo ab_error_style("organization"); ?>">
      <?=form_label('Organization *', 'organization', $required_label)?>
      <div class="col-md-6">
        <input type="text" name="organization" class="form-control" maxlength="70" value="<?php echo set_value('organization', $organization)?>">
        <?php echo ab_error_message("organization"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("media_type"); ?>">
      <?=form_label('Media Type *', 'media_type', $required_label)?>
      <div class="col-md-4">
        <?php
        $mediaoptions = array(
          '' => 'Select One',
          'Fanzine' => 'Fan Magazine',
          'Film' => 'Film/Documentary',
          'Freelance' => 'Freelance Reporter',
          'Magazine' => 'Magazine',
          'Newspaper' => 'Newspaper',
          'Radio' => 'Radio',
          'Student' => 'Student Project',
          'TV' => 'Television',
          'Website' => 'Website',
          'Other' => 'Other'
        );

        echo form_dropdown("media_type", $mediaoptions, $media_type, ab_dropdown_class());
        ?>
        <?php echo ab_error_message("media_type"); ?>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Mailing Address *', '', $required_label)?>
      <div class="col-md-8">
        <div class="form-inline <?php echo ab_error_style("address1"); ?>">
          <label>Address 1</label>
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
          <input type="text" name="zip" class="form-control" maxlength="15" value="<?php echo set_value('zip', $zip); ?>">
          <?php echo ab_error_message("zip"); ?>
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
    <div class="row form-group <?php echo ab_error_style("site_url"); ?>">
      <?=form_label('Website URL *', 'site_url', $required_label)?>
      <div class="col-md-8">
        <input type="text" name="site_url" class="form-control" maxlength="70" value="<?php echo set_value("site_url", $site_url); ?>">
        <?php echo ab_error_message("site_url"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("facebook_url"); ?>">
      <?=form_label('Facebook', 'facebook_url', $optional_label)?>
      <div class="col-md-8">
        <input type="text" name="facebook_url" class="form-control" maxlength="70" value="<?php echo set_value("facebook_url", $facebook_url); ?>">
        <?php echo ab_error_message("facebook_url"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("twitter_url"); ?>">
      <?=form_label('Twitter', 'twitter_url', $optional_label)?>
      <div class="col-md-8">
        <input type="text" name="twitter_url" class="form-control" maxlength="70" value="<?php echo set_value("twitter_url", $twitter_url); ?>">
        <?php echo ab_error_message("twitter_url"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("other_url"); ?>">
      <?=form_label('Other', 'other_url', $optional_label)?>
      <div class="col-md-8">
        <input type="text" name="other_url" class="form-control" maxlength="70" value="<?php echo set_value("other_url", $other_url); ?>">
        <?php echo ab_error_message("other_url"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("press_attend"); ?>">
      <?=form_label('Have you attended Anime Boston previously as press? *', 'press_attend', $required_label)?>
      <div class="col-md-3">
        <?php
        $attend_options = array('' => 'Select One', 'Yes' => 'Yes', 'No' => 'No');
        echo form_dropdown("press_attend", $attend_options, $press_attend, ab_dropdown_class());
        ?>
        <br>
        If so, when?
        <?php
        $options = array("" => "Select One");
        for ($year = $currentyear; $year >= 2003; $year -= 1)
        {
          $options[$year] = $year;
        }
        echo form_dropdown("press_attend_year", $options, $press_attend_year, ab_dropdown_class());
        ?>
        <?php echo ab_error_message("press_attend"); ?>
        <?php echo ab_error_message("press_attend_year"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("past_coverage"); ?>">
      <?=form_label('Links to Past Coverage', 'past_coverage', $optional_label)?>
      <div class="col-md-8">
        <textarea name="past_coverage" class="form-control" rows="4" cols="40"><?php echo set_value("past_coverage", $past_coverage); ?></textarea>
        <span class="input-subtitle">Put each link on a separate line</span>
        <?php echo ab_error_message("past_coverage"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("other_info"); ?>">
      <?=form_label('Tell us about your organization and why you\'d like to attend as press for Anime Boston ' . $currentyear, 'other_info', $optional_label)?>
      <div class="col-md-8">
        <textarea name="other_info" class="form-control" rows="8" cols="40"><?php echo set_value("other_info", $other_info); ?></textarea>
        <?php echo ab_error_message("other_info"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("person_total"); ?>">
      <?=form_label('Number of Press Passes Desired *', 'person_total', $required_label)?>
      <div class="col-md-4">
        <select name="person_total" class="form-control" onchange="show()">
          <?php
          $passesoptions = array('1'=>'1','2'=>'2','3'=>'3');

          foreach($passesoptions as $key => $value)
          {
            $selected = ($person_total == $key) ? 'selected' : '';
            echo "<option value='$key' $selected>$value</option>";
          }
          ?>
        </select>
        <span class="input-subtitle">
          Press passes are only valid for those employed by your organization and working at the convention.
          (ie: camera operator, but not your daughter).
        </span>
        <?php echo ab_error_message("person_total"); ?>
      </div>
    </div>
    <?php
    for($i = 0; $i < $max_persons; $i++)
    {
      $displaystyle = ($i < $person_total || $i == 0) ? 'block' : 'none';
      ?>
      <div id="person<?=$i?>" class="row form-group" style="display:<?=$displaystyle?>;">
        <div class="col-xs-12"><hr></div>
        <?=form_label('Person #' . ($i+1) . ' *', '', $required_label)?>
        <div class="col-md-8">
          <div class="form-inline <?php echo ab_error_style("name[$i]"); ?>">
            <label class="required">Name</label>
            <input type="text" name="name[<?=$i?>]" class="form-control" maxlength="70" value="<?php echo set_value("name[$i]", $name[$i]); ?>">
            <?php echo ab_error_message("name[$i]"); ?>
          </div>
          <div class="form-inline <?php echo ab_error_style("alias[$i]"); ?>">
            <label>Alias</label>
            <input type="text" name="alias[<?=$i?>]" class="form-control" maxlength="70" value="<?php echo set_value("alias[$i]", $alias[$i]); ?>">
            <?php echo ab_error_message("alias[$i]"); ?>
          </div>
          <div class="form-inline <?php echo ab_error_style("position[$i]"); ?>">
            <label class="required">Position *</label>
            <input type="text" name="position[<?=$i?>]" class="form-control" maxlength="70" value="<?php echo set_value("position[$i]", $position[$i]); ?>">
            <?php echo ab_error_message("position[$i]"); ?>
          </div>
          <div class="form-inline <?php echo ab_error_style("email[$i]"); ?>">
            <label class="required">Email Address</label>
            <input type="email" name="email[<?=$i?>]" class="form-control" maxlength="100" value="<?php echo set_value("email[$i]", $email[$i]); ?>">
            <?php echo ab_error_message("email[$i]"); ?>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit">
      <input type="reset" name="reset" class="btn btn-default" value="Reset">
    </div>
  </form>
</div>