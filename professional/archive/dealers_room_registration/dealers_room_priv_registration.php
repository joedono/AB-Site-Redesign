<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/exhibits/">Exhibits</a></li>
  <li>Dealers' Room Registration</li>
</ul>

<?php
$optional_label = ab_optional_nonresponsive_label();
$required_label = ab_required_nonresponsive_label();
?>

<script type="text/javascript">
  function boothMap(booth_id)
  {
    //Gets the booth information
    var booth_space = document.getElementById('booth_' +booth_id);
    var booth_number = parseInt(booth_space.getAttribute('data-booth_number'));
    var booth_type = booth_space.getAttribute("data-booth_type");
    var booth_cost = parseInt(booth_space.getAttribute("data-booth_cost"));

    //Gets the information for the total booths list
    var total_list = document.getElementById('total_list');
    var total_row = document.getElementById('total_row');
    var total_row_index = total_row.rowIndex;
    var total_booths_cell = document.getElementById('total_booths');
    var total_booths = parseInt(total_booths_cell.getAttribute('data-total_booths'));
    var total_cost_cell = document.getElementById('total_cost');
    var total_cost = parseInt(total_cost_cell.getAttribute('data-total_cost'));

    if(booth_type == 'available')
    {
      //Adds the booth to a new row in the total table
      insert_index = total_row_index;
      var new_row = total_list.insertRow(insert_index);
      new_row.setAttribute('id','total_row_'+booth_id);
      new_cell1 = new_row.insertCell(0);
      new_cell2 = new_row.insertCell(1);
      hidden_input = '<input type="hidden" name="chosen_booths[]" value="' +booth_id + '">';
      new_cell1.innerHTML = hidden_input + '#' + booth_number;
      new_cell2.innerHTML = '$' + booth_cost.toFixed(2);

      //Updates the total number of booths
      total_booths = total_booths + 1;
      total_booths_cell.setAttribute('data-total_booths',total_booths);
      if(total_booths == 1)
      {
        total_booths_cell.innerHTML = 'Total: ' + total_booths + ' booth';
      }
      else
      {
        total_booths_cell.innerHTML = 'Total: ' + total_booths + ' booths';
      }

      //Updates the total cost in cell and attribute
      total_cost = total_cost + booth_cost;
      total_cost_cell.setAttribute('data-total_cost',total_cost);
      total_cost_cell.innerHTML = '$' + total_cost.toFixed(2);

      //Changes booth status to Selected
      booth_space.setAttribute('data-booth_type','selected');
      booth_space.style.backgroundColor = '#0000FF';
    }
    else if(booth_type == 'selected')
    {
      //Removes the booth from the total table
      total_row_id = 'total_row_' + booth_id;
      old_row = document.getElementById(total_row_id);
      old_row.parentNode.removeChild(old_row);

      //Updates the total number of booths
      total_booths = total_booths - 1;
      total_booths_cell.setAttribute('data-total_booths',total_booths);
      if(total_booths == 1)
      {
        total_booths_cell.innerHTML = 'Total: ' + total_booths + ' booth';
      }
      else
      {
        total_booths_cell.innerHTML = 'Total: ' + total_booths + ' booths';
      }

      //Updates the total cost in cell and attribute
      total_cost = total_cost - booth_cost;
      total_cost_cell.setAttribute('data-total_cost',total_cost);
      total_cost_cell.innerHTML = '$' + total_cost.toFixed(2);

      //Changes booth status to Available
      booth_space.setAttribute('data-booth_type','available');
      booth_space.style.backgroundColor = '#00FF00';
    }
  }
</script>

<div class="page-body clearfix">
  <h1>Dealers' Room Registration</h1>
  <p>This is the registration for booth space in the Anime Boston <?=$currentyear?> Dealers' Room.</p>
  <p>
    Please be aware that booth space is on a <em>first-come, first-serve basis</em>.<br>
    This form will confirm that the booths you select are still available once you submit it.<br>
    If they are not, you will have to choose again.
  </p>
  <p>In the event no booth spaces are available, this form will serve as a wait list for any potential openings.</p>
  <form class="form-horizontal" action="/forms/dealers_room_priv_registration/<?=$priv_key?>" method="post">
    <div class="alert alert-danger"><?=validation_errors()?></div>
    <p><span class="required">*</span> = Required information</p>
    <p><b>Company Information</b> - Enter your company's information.</p>
    <div class="row form-group">
      <?=form_label('Company Name *', 'company_name', $required_label)?>
      <div class="col-xs-6">
        <span class="input-subtitle required">Please enter your company's legal name.</span>
        <input type="text" name="company_name" class="form-control" maxlength="250" value="<?php echo set_value("company_name", $company_name); ?>">
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Display Name', 'display_name', $optional_label)?>
      <div class="col-xs-6">
        <span class="input-subtitle">How you would like your company to be presented as, if different from Company Name.</span>
        <input type="text" name="display_name" class="form-control" maxlength="250" value="<?php echo set_value("display_name", $display_name); ?>">
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Primary Contact\'s First Name *', 'first_name', $required_label)?>
      <div class="col-xs-4">
        <input type="text" name="first_name" class="form-control" maxlength="150" value="<?php echo set_value("first_name", $first_name); ?>">
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Primary Contact\'s Last Name *', 'last_name', $required_label)?>
      <div class="col-xs-4">
        <input type="text" name="last_name" class="form-control" maxlength="150" value="<?php echo set_value("last_name", $last_name); ?>">
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Primary Contact\'s Date of Birth *', '', $required_label)?>
      <div class="col-xs-9 form-inline">
        <span class="input-subtitle required">Primary contact must be 18 years of age as of <?php echo date('m/d/Y', $con_date); ?>.</span><br>
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
    <div class="row form-group">
      <?=form_label('E-Mail Address *', 'email', $required_label)?>
      <div class="col-xs-6">
        <input type="email" name="email" class="form-control" maxlength="150" value="<?php echo set_value("email", $email); ?>">
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Confirm E-Mail Address *', 'email_confirm', $required_label)?>
      <div class="col-xs-6">
        <input type="email" name="email_confirm" class="form-control" maxlength="150" value="<?php echo set_value("email_confirm", $email_confirm); ?>">
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Mailing Address *', '', $required_label)?>
      <div class="col-xs-8">
        <div class="form-inline">
          <label class="required">Address 1</label>
          <input type="text" name="address_1" class="form-control" maxlength="150" value="<?php echo set_value('address_1', $address_1); ?>">
        </div>
      </div>
      <div class="col-xs-8 col-xs-push-3">
        <div class="form-inline">
          <label>Address 2</label>
          <input type="text" name="address_2" class="form-control" maxlength="150" value="<?php echo set_value('address_2', $address_2); ?>">
        </div>
      </div>
      <div class="col-xs-8 col-xs-push-3">
        <div class="form-inline">
          <label class="required">City</label>
          <input type="text" name="city" class="form-control" maxlength="150" value="<?php echo set_value('city', $city); ?>">
        </div>
      </div>
      <div class="col-xs-8 col-xs-push-3">
        <div class="form-inline">
          <label class="required">State</label>
          <input type="text" name="state" class="form-control" maxlength="150" size="2" value="<?php echo set_value('state', $state); ?>">
        </div>
      </div>
      <div class="col-xs-8 col-xs-push-3">
        <div class="form-inline">
          <label class="required">Zip Code</label>
          <input type="text" name="zip" class="form-control" maxlength="150" value="<?php echo set_value('zip', $zip); ?>">
        </div>
      </div>
      <div class="col-xs-8 col-xs-push-3">
        <div class="form-inline">
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
        </div>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Phone 1 *', 'phone1', $required_label)?>
      <div class="form-inline col-xs-9">
        <input type="tel" name="phone1" class="form-control" maxlength="150" value="<?php echo set_value("phone1", $phone1); ?>">
        <?php
        $phone1options = array('Home' => 'Home', 'Work' => 'Work', 'Cell' => 'Cell');
        echo form_dropdown("phone1_type", $phone1options, $phone1_type, ab_dropdown_class());
        ?>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Phone 2', 'phone2', $optional_label)?>
      <div class="form-inline col-xs-9">
        <input type="tel" name="phone2" class="form-control" maxlength="150" value="<?php echo set_value("phone2", $phone2); ?>">
        <?php
        $phone2options = array('Cell' => 'Cell', 'Work' => 'Work', 'Home' => 'Home');
        echo form_dropdown("phone2_type", $phone2options, $phone2_type, ab_dropdown_class());
        ?>
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Website', 'website', $optional_label)?>
      <div class="col-xs-6">
        <span class="input-subtitle">Your website will be included on our Dealers' Room Listing page.</span>
        <input type="text" name="website" class="form-control" maxlength="150" value="<?php echo set_value("website", $website); ?>">
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Products *', 'products', $required_label)?>
      <div class="col-xs-7">
        <span class="input-subtitle required">Please provide a brief list of the primary products you will be selling.</span>
        <textarea name="products" class="form-control" rows="5" cols="40"><?php echo set_value("products", $products); ?></textarea>
      </div>
    </div>
    <hr>
    <p><b>Booth Selection</b> - Choose your booths from available spaces.</p>
    <p>Currently availble booths are listed below. Each booth is 8 feet in length.</p>
    <p>
      Please be aware, booth space is on a <em>first-come, first-serve basis</em>.<br>
      This form will confirm that the booths you select are still available once you submit it.<br>
      If they are not, you will have to choose again.
    </p>

    <p>In the event no booth spaces are available, this form will serve as a wait list for any potential openings.</p>

    <?php if ($open_booth_count > 0) { ?>
      <div class="dealers-form-image">
        <?php
        if(count($map_master > 0))
        {
          foreach($map_master as $row)
          {
            $map_id = $row['map_id'];
            $map_file_name = $row['map_file_name'];
            $map_alt_text=  $row['map_alt_text'];
            $map_con_year = $row['map_con_year'];
            $all_booths = $row['all_booths'];

            $selected_cost = 0;

            echo '<img src="/images/dealers/'.$map_file_name.'" alt="'.$map_alt_text.'" border="0" usemap="#DR'.$map_id.'_map" style="user-select: none;user-select:-moz-none"';
            echo '<map name="DR'.$map_id.'_map">';

            if(count($all_booths) > 0)
            {
              foreach($all_booths as $row2)
              {
                $booth_id = $row2['booth_id'];
                $booth_number = $row2['booth_number'];
                $booth_width = $row2['booth_width'];
                $booth_length = $row2['booth_length'];
                $booth_cost = $row2['booth_cost'];
                $booth_type = $row2['booth_type'];
                $vendor_id = $row2['vendor_id'];
                $coord_shape = $row2['coord_shape'];
                $x_coord = $row2['x_coord'];
                $y_coord = $row2['y_coord'];
                $x_width = $row2['x_width'];
                $y_height = $row2['y_height'];

                //If there was a match between this booth and a chosen one.
                $matched_choice = FALSE;

                //Runs through chosen tables to see if the user has selected it already (previous page load)
                if(count($chosen_booths) > 0)
                {
                  foreach($chosen_booths as $row3)
                  {
                    $chosen_id = $row3;

                    if(($chosen_id == $booth_id) && ($vendor_id == ''))
                    {
                      $matched_choice = TRUE;
                      $selected_cost = $selected_cost + $booth_cost;
                    }
                  }
                }

                if($matched_choice && strcmp($booth_type,'Public') == 0)
                {
                  echo '<div id="booth_'.$booth_id.'" data-booth_number="'.$booth_number.'" data-booth_cost="'.$booth_cost.'" data-booth_type="selected" style="position:absolute;left:'.$x_coord.'px;top:'.$y_coord.'px;width:'.$x_width.'px;height:'.$y_height.'px;background-color:#0000FF;opacity:0.4;user-select: none;" onclick="boothMap('.$booth_id.'); void(0);" title="Booth: #'.$booth_number.'&#10;Status: Available&#10;Price: $'.$booth_cost.'"></div>';
                }
                else if($vendor_id == '' && strcmp($booth_type,'Public') == 0)
                {
                  echo '<div id="booth_'.$booth_id.'" data-booth_number="'.$booth_number.'" data-booth_cost="'.$booth_cost.'" data-booth_type="available" style="position:absolute;left:'.$x_coord.'px;top:'.$y_coord.'px;width:'.$x_width.'px;height:'.$y_height.'px;background-color:#00FF00;opacity:0.4;user-select: none;" onclick="boothMap('.$booth_id.'); void(0);" title="Booth: #'.$booth_number.'&#10;Status: Available&#10;Price: $'.$booth_cost.'"></div>';
                }
                else
                {
                  echo '<div id="booth_'.$booth_id.'" data-booth_number="'.$booth_number.'" data-booth_cost="'.$booth_cost.'" data-booth_type="reserved" style="position:absolute;left:'.$x_coord.'px;top:'.$y_coord.'px;width:'.$x_width.'px;height:'.$y_height.'px;background-color:#FF0000;opacity:0.4;user-select: none;" onclick="boothMap('.$booth_id.'); void(0);" title="Booth #'.$booth_number.'&#10;Status: Reserved"></div>';
                }
              }
            }
            else { echo 'no';}

            echo '</map>';
          }
        }
        else
        {
          echo '<br>map_error';
        }
        ?>
      </div>
      <table id="total_list" class="dealers-table table-striped table-bordered">
        <tr>
          <th>Booth</th>
          <th>Cost</th>
        </tr>
        <?php
        $selected_cost = 0;
        $selected_total = 0;

        if(count($chosen_booths) > 0)
        {
          foreach($chosen_booths as $chosen_id)
          {
            //Runs through chosen tables to see if the user has selected it already (previous page load)
            if(count($all_booths) > 0)
            {
              foreach($all_booths as $row2)
              {
                $booth_id = $row2['booth_id'];
                $booth_number = $row2['booth_number'];
                $booth_cost = $row2['booth_cost'];
                $vendor_id = $row2['vendor_id'];

                if($chosen_id == $booth_id && $vendor_id == '')
                {
                  $selected_cost = $selected_cost + $booth_cost;
                  $selected_total = $selected_total + 1;

                  echo '<tr id="total_row_'.$booth_id.'">';
                  echo '<td><input type="hidden" name="chosen_booths[]" value="'.$booth_id.'">#'.$booth_number.'</td>';
                  echo '<td>$'.$booth_cost.'</td>';
                  echo '</tr>';
                }
              }
            }
          }
        }
        ?>
        <tr id="total_row">
          <?php
          if($selected_total == 1)
          {
            echo '<th id="total_booths" data-total_booths='.$selected_total.'>Total: '.$selected_total.' booth</th>';
          }
          else
          {
            echo '<th id="total_booths" data-total_booths='.$selected_total.'>Total: '.$selected_total.' booths</th>';
          }
          ?>
          <th id="total_cost" data-total_cost="<?=$selected_cost?>"><?php echo money_format("$%.2n",$selected_cost); ?></th>
        </tr>
      </table>
    <?php } else { ?>
      <p class="text-danger"><strong>No booth spaces are currently available</strong> Please select below to join the Wait List.</p>
      <div class="row form-group">
        <?=form_label('Wait List *', 'waitlist', $required_label)?>
        <div class="col-xs-4">
          <span class="input-subtitle required">Please add me to the Wait List for any future openings.</span><br>
          <?php
          $wloptions = array('' => '', 'waitlist' => 'Yes');
          echo form_dropdown("waitlist", $wloptions, $waitlist, ab_dropdown_class());
          ?>
        </div>
      </div>
    <?php } ?>
    <br>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit Registration">
      <input type="reset" name="reset" class="btn btn-default" value="Clear">
    </div>
  </form>
</div>