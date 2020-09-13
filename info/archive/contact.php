<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/coninfo/">Convention Info</a></li>
  <li>Contact Us</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<div class="page-body clearfix">
  <h1>Contact Us</h1>

  <p>Please use the form below to contact a specific staff member for Anime Boston. If you are unsure of whom to contact, please direct questions to the Social Media Coordinator and they will be routed accordingly.</p>

  <div class="text-danger">

    <?php /* // Remove this comment line when staff are on-site
    <p><b>Please be aware, Convention Staff are currently on-site at the Hynes and may not be able to answer their emails.</b></p>

    <p>If you have urgent questions or issues about your registration or badge, please visit Registration Customer Service in the Sheraton Registration hall. All other inquiries can be brought to an Info Desk (Sheraton or Hynes) and they will assist you the best they are able to.</p>
    // Remove this comment line when staff are on-site */ ?>

    <?php /*
    <p>Can't get to an Info Desk? Try our <strong>Virtual Info Desk</strong> at animeboston.desk.com. It is a FAQ full of questions that you may have. There are live chats live at the hours listed bellow. Or email your questions and we'll respond ASAP during open hours. We're bringing the Info Desk to you!</p>

    <p>
      Hours for Live Chat:
      <ul>
        <li>Thursday: 12pm to 9pm</li>
        <li>Friday and Saturday: 8am to 11pm</li>
        <li>Sunday: 8am to 4pm</li>
      </ul>
    </p>
    */ ?>
  </div>

  <?php recaptcha_theme(); ?>

  <form class="form-horizontal" action="/coninfo/contact/" method="post">
    <?php echo ab_error_summary(); ?>
    <p><span class="required">*</span> = Required Information</p>
    <div class="row form-group <?php echo ab_error_style("contact_id"); ?>">
      <?=form_label('To: *', 'contact_id', $required_label)?>
      <div class="col-md-6">
        <?php
          $options = array("" => "Select One");
          foreach ($positions as $row)
          {
            $title_id = $row['position_id'];
            $title = $row['position_name'];
            $options[$title_id] = $title;
          }
          echo form_dropdown("contact_id", $options, $contact_id, ab_dropdown_class());
        ?>
        <?php echo ab_error_message("contact_id"); ?>
        <span class="input-subtitle">To avoid delays, please select the appropriate person to form.</span><br>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("name"); ?>">
      <?=form_label('Your Name: *', 'name', $required_label)?>
      <div class="col-md-5">
        <input type="text" name="name" class="form-control" maxlength="70" value="<?php echo set_value('name'); ?>">
        <?php echo ab_error_message("name"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("email"); ?>">
      <?=form_label('Your E-Mail: *', 'email', $required_label)?>
      <div class="col-md-5">
        <input type="email" name="email" class="form-control" maxlength="70" value="<?php echo set_value('email'); ?>">
        <?php echo ab_error_message("email"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("email_confirm"); ?>">
      <?=form_label('Confirm E-Mail: *', 'email_confirm', $required_label)?>
      <div class="col-md-5">
        <input type="email" name="email_confirm" class="form-control" maxlength="70" value="<?php echo set_value('email_confirm'); ?>">
        <?php echo ab_error_message("email_confirm"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("subject"); ?>">
      <?=form_label('Subject: *', 'subject', $required_label)?>
      <div class="col-md-7">
        <input type="text" name="subject" class="form-control" maxlength="70" value="<?php echo set_value('subject'); ?>">
        <?php echo ab_error_message("subject"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("message"); ?>">
      <?=form_label('Message: *', 'message', $required_label)?>
      <div class="col-md-7">
        <textarea name="message" class="form-control" rows="8" cols="60"><?php echo set_value('message'); ?></textarea>
        <?php echo ab_error_message("message"); ?>
      </div>
    </div>
    <div class="row form-group <?php echo ab_error_style("g-recaptcha-response"); ?>">
      <?=form_label('Security Validation: *', 'g-recaptcha-response', $required_label)?>
      <div class="col-md-7">
        <?php echo recaptcha_get_html($this->config->item('public_key')); ?>
        <?php echo ab_error_message("g-recaptcha-response"); ?>
      </div>
    </div>
    <div class="submit-buttons">
      <input type="submit" name="submit" class="btn btn-success" value="Send This Message">
      <input type="reset" class="btn btn-default" value="Clear">
    </div>
  </form>
</div>
