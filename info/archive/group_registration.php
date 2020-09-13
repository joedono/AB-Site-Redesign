<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/registration/">Registration</a></li>
  <li>Group Registration</li>
</ul>

<div class="page-body clearfix">
  <h1>Group Registration</h1>

  <?php if($show_content == 0) { ?>
    <p>Group registration information for Anime Boston <?=$currentyear?> will be available in the upcoming months. Please check back later for updates.</p>
  <?php } else { ?>
    <p class="text-danger"><b>Please read the following before filling out the registration request form!</b></p>

    <ul>
      <li>Only school or educational groups are eligible for a group discount. You are a school or educational group if your group is organized and/or recognized by your school/university and you have a member of the faculty or student president as your advisor/chaperone.</li>
      <li>The group discount is $5.00 off the current registration rate.</li>
        <ul>
          <li>From December 21, 2019 to January 31, 2020, groups get $5.00 off the $70.00 pre-registration rate for those attendees 13 years of age and over (making the cost per person $65.00).  Children 6 to 12 save $5.00 off the $60.00 pre-registration rate (making the cost per child $55.00).</li>
          <li>From February 1, 2020 to April 5, 2020, groups get $5.00 off the $75.00 pre-registration rate for those attendees 13 years of age and over (making the cost per person $70.00).  Children 6 to 12 save $5.00 off the $65.00 pre-registration rate (making the cost per child $60.00).</li>
        </ul>
      <li>We accept checks only for group discounts.</li>
      <li>You must have 10 or more people in your group to be eligible for the discount.</li>
      <li>Please fill out a group request form. Within 2 business days you will be informed if your group is approved and provided a spreadsheet for the registration process.</li>
      <li>We cannot add members into your group after you have registered so please make sure you have gathered everyone's information before registering.</li>
      <li>Please double check the forms for mistakes before sending them in.</li>
      <li>Before registering, please review the <a href="/registration/registration_policy/">Registration Policies</a>.</li>
      <li>If you have any questions, please visit the <a href="/registration/registration_faq/">Registration FAQ</a>.</li>
    </ul>

    <?php
    if($reg_group_setting == 1)
    {
      echo '<p><a class="btn btn-primary" href="/forms/reg_group/">Group Registration Request</a></p>';
    }
    else
    {
      echo '<p>The link to the group discount request form will be available from November 1, 2017 to March 16, 2018.</p>';
    }
    ?>

    <?php echo reg_fine_print(); ?>
  <?php } ?>
</div>
