<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/artists/">Artists</a></li>
  <li>Art Show Application</a></li>
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
    var intCount = document.art_show_form.pieces_total.options.length;
    var intValue = document.art_show_form.pieces_total.value;

    for(i = 0; i < intValue; i++)
    {
      assoc = "piece"+i;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = '';
    }

    for(j = intCount - 1; j >= intValue; j--)
    {
      assoc = "piece"+j;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = 'none';
    }
  }

  function disableThem(number)
  {
    var nosale = "nosale"+number;
    var minbid = "minbid" + number;
    var buyout = "buyout" + number;

    var minbidele = document.getElementById(minbid);
    var buyoutele = document.getElementById(buyout);

    if (document.getElementById(nosale).checked)
    {
      minbidele.setAttribute("disabled", "true");
      buyoutele.setAttribute("disabled", "true");
    }
    if (!document.getElementById(nosale).checked)
    {
      minbidele.removeAttribute("disabled");
      buyoutele.removeAttribute("disabled");
    }
  }
</script>

<div class="page-body clearfix">
  <h1>Art Show Application</h1>

  <p>Please fill out the fields below to apply to for the Anime Boston <?php echo $currentyear;?> Art Show.</p>

  <form class="form-horizontal" name="art_show_form" action="/forms/art_show/" method="post">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required information</p>
    <div class="row form-group <?php echo ab_error_style("first_name"); ?>">
      <?=form_label('First Name *', 'first_name', $required_label)?>
      <div class="col-md-6">
        <input type="text" name="first_name" class="form-control" maxlength="70" value="<?php echo set_value("first_name", $first_name); ?>">
        <span class="input-subtitle">Must be your real first name</span>
        <?php echo ab_error_message("first_name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("last_name"); ?>">
      <?=form_label('Last Name *', 'last_name', $required_label)?>
      <div class="col-md-6">
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
      <?=form_label('Phone Number &amp; Type *', 'phone1', $required_label)?>
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
    <div class="row form-group <?php echo ab_error_style("space_type"); ?>">
      <?=form_label('Space Type *', 'space_type', $required_label)?>
      <div class="col-md-5">
        <span class="input-subtitle"><span class="required">Which type of space do you want?</span></span>
        <select name="space_type" class="form-control">
          <?php
          $spaceoptions = array(
            '' => 'Select One',
            'Wall Space' => 'Wall Space',
            'Table Space' => 'Table Space'
          );

          foreach($spaceoptions as $key => $value)
          {
            $selected = ($space_type == $key) ? 'selected' : '';
            echo "<option value='$key' $selected>$value</option>";
          }
          ?>
        </select>
        <?php echo ab_error_message("space_type"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("pieces_total"); ?>">
      <?=form_label('Pieces *', 'pieces_total', $required_label)?>
      <div class="col-md-5">
        <span class="input-subtitle">How many pieces do you want to register?</span>
        <select name="pieces_total" class="form-control" onchange="show()">
          <?php
          $piecesoptions = array();
          for($i = 1; $i <= $pieces_max; $i++)
          {
            $piecesoptions[$i] = $i;
          }

          foreach($piecesoptions as $key => $value)
          {
            $selected = ($pieces_total == $key) ? 'selected' : '';
            echo "<option value='$key' $selected>$value</option>";
          }
          ?>
        </select>
        <?php echo ab_error_message("pieces_total"); ?>
      </div>
    </div>
    <div class="row"><div class="col-xs-12"><hr></div></div>
    <?php
    for($i = 0; $i < $pieces_max; $i++)
    {
      $displaystyle = ($i < $pieces_total || $i == 0) ? '' : 'none';
      $nosalechecked = ($piece_nosale[$i] == 'Yes') ? 'checked' : '';
      $minbiddisabled = ($piece_nosale[$i] == 'Yes') ? 'disabled' : '';
      $buyoutdisabled = ($piece_nosale[$i] == 'Yes') ? 'disabled' : '';
      ?>
      <div id="piece<?=$i?>" class="row form-group" style="display:<?=$displaystyle?>;">
        <?=form_label('Piece ' . ($i+1) . ' *', '', $required_short_label)?>
        <div class="col-md-9">
          <div class="row form-group <?php echo ab_error_style("piece_name[$i]"); ?>">
            <?=form_label('Piece Name *', "piece_name[$i]", $required_label)?>
            <div class="col-md-8">
              <input type="text" name="piece_name[<?=$i?>]" class="form-control" maxlength="70" value="<?php echo set_value("piece_name[$i]", $piece_name[$i]); ?>">
              <?php echo ab_error_message("piece_name[$i]"); ?>
            </div>
          </div>
          <div class="row form-group <?php echo ab_error_style("piece_nosale[$i]"); ?>">
            <?=form_label('Not For Sale', "piece_nosale[$i]", $optional_label)?>
            <div class="col-md-8">
              <label>
                <input type="checkbox" id="nosale<?=$i?>" name="piece_nosale[<?=$i?>]" value="Yes" onclick="disableThem(<?=$i?>)" <?=$nosalechecked?>>
                Check if the piece is not for sale
              </label>
              <?php echo ab_error_message("piece_nosale[$i]"); ?>
            </div>
          </div>
          <div class="row form-group <?php echo ab_error_style("piece_minbid[$i]"); ?>">
            <?=form_label('Starting Bid Price *', '"piece_minbid[$i]"', $required_label)?>
            <div class="col-md-6">
              <input type="text" id="minbid<?=$i?>" name="piece_minbid[<?=$i?>]" class="form-control" maxlength="10" value="<?php echo set_value("piece_minbid[$i]", $piece_minbid[$i]); ?>" <?=$minbiddisabled?>>
              <span class="input-subtitle">Not required if not for sale.</span>
              <?php echo ab_error_message("piece_minbid[$i]"); ?>
            </div>
          </div>
          <div class="row form-group <?php echo ab_error_style("piece_buyout[$i]"); ?>">
            <?=form_label('Buyout Price', "piece_buyout[$i]", $optional_label)?>
            <div class="col-md-6">
              <input type="text" id="buyout<?=$i?>" name="piece_buyout[<?=$i?>]" class="form-control" maxlength="10" value="<?php echo set_value("piece_buyout[$i]", $piece_buyout[$i]); ?>" <?=$buyoutdisabled?>>
              <?php echo ab_error_message("piece_buyout[$i]"); ?>
            </div>
          </div>
        </div>
        <div class="row"><div class="col-xs-12"><hr></div></div>
      </div>
    <?php } ?>
    <div class="row form-group <?php echo ab_error_style("con_reg"); ?>">
      <?=form_label('Convention Registration *', 'con_reg', $required_label)?>
      <div class="col-md-5">
        <?php
        $regyes = ($con_reg == 'Yes') ? 'checked' : '';
        $regno = ($con_reg == 'No') ? 'checked' : '';
        ?>
        <span class="input-subtitle"><span class="required">Are you registrated for the convention?</span></span><br>
        <label><input type="radio" name="con_reg" value="Yes" <?=$regyes?>> Yes</label>
        <label><input type="radio" name="con_reg" value="No" <?=$regno?>> No</label>
        <?php echo ab_error_message("con_reg"); ?>
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
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit">
      <input type="reset" name="reset" class="btn btn-default" value="Reset">
    </div>
  </form>
</div>