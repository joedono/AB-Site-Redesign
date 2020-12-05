<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/artists/">Artists</a></li>
  <li><a href="/artists/artists_alley/">Artists Alley</a></li>
  <li>Artists Alley Registration - Phase 2</li>
</ul>

<script type = "text/javascript">
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
  $address1 = $this->session->userdata('address1');
  $address2 = $this->session->userdata('address2');
  $city = $this->session->userdata('city');
  $state = $this->session->userdata('state');
  $zip = $this->session->userdata('zip');
  $country = $this->session->userdata('country');
  $phone1 = $this->session->userdata('phone1');
  $phone1_type = $this->session->userdata('phone1_type');
  $con_reg = $this->session->userdata('con_reg');
  $app_size = $this->session->userdata('app_size');
  $app_size_min = $this->session->userdata('app_size_min');
  $reg_max_size = $this->session->userdata('reg_max_size');
  $reg_max_size_id = $this->session->userdata('reg_max_size_id');
  ?>

  <p>Below is the information entered for the Artists' Alley Application.</p>

  <p>
    <span class="text-danger">If your Convention Pre-Registration status is incorrect, you must <a href="/coninfo/contact/16">contact the Artists' Alley Manager</a> <b>immediately!</b></span>
    You will be directed away from this page, and may re-start the Artists' Alley Registration process after being told to do so by the Artists' Alley Manager.
    Incorrect information will result in Artists' Alley registration being incomplete.
  </p>

  <form class="form-horizontal" action="/forms/artists_alley_registration/" method="post" onsubmit="return ConfirmEntry();">
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
      <label class="col-lg-3 col-md-4">Country</label>
      <div class="col-md-8"><?=$country?></div>
    </div>
    <div class="row form-group">
      <label class="col-lg-3 col-md-4">Phone Number</label>
      <div class="col-md-8"><?php echo ($phone1 != '') ? $phone1_type.': ' .$phone1 : ''; ?></div>
    </div>
    <div class="row form-group">
      <label class="col-lg-3 col-md-4">Pre-Registered for<br>Anime Boston <?=$currentyear?></label>
      <div class="col-md-8">
        <?=$con_reg?><br>
        <span class="text-danger"><small>If your Pre-Registration status is incorrect, you must <a href="/coninfo/contact/16">contact the Artists' Alley Manager</a> <b>immediately!</b></small></span>
      </div>
    </div>
    <div class="row form-group">
      <label class="col-lg-3 col-md-4">Orginal Table Space Request</label>
      <div class="col-md-8"><?=$app_size?> Feet</div>
    </div>
    <div class="row form-group">
      <label class="col-lg-3 col-md-4">Orginal Requested Minimum</label>
      <div class="col-md-8">
        <?=$app_size_min?> Feet<br>
        <span class="input-subtitle">This is what you posted as the minimum space you'd be interested in.</span>
      </div>
    </div>
    <div class="row form-group">
      <label class="col-lg-3 col-md-4">Offered Table Space</label>
      <div class="col-md-8">
        <?=$reg_max_size?> Feet<br>
        <span class="input-subtitle">This is the maximum table space you have been allocated. You may select to take less space if desired.</span>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("reg_size"); ?>">
      <label class="col-lg-3 col-md-4 control-label">Final Table Space Request</label>
      <div class="col-md-5">
        <span class="input-subtitle"><span class="text-danger">You may <b>reduce</b> your requested table size:</span></span>
        <?php
        $options = array();
        foreach($tables as $value)
        {
          $tid = $value['table_id'];
          $type = $value['table_type'];
          $size = $value['table_size'];
          $price = $value['table_price'];
          $options[$tid] = "$type - $size Feet - $$price";
        }
        echo form_dropdown("reg_size", $options, ab_dropdown_class());
        ?>
        <?php echo ab_error_message("reg_size"); ?>
      </div>
    </div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Submit">
    </div>
    <div class="row">
      <div class="col-xs-12">
        <p>If you have any questions or problems, please <a href="/coninfo/contact/16" target="_blank">contact the Artists' Alley Manager</a>.</p>
      </div>
    </div>
  </form>
</div>