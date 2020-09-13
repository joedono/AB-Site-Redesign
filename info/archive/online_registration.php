<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/registration/">Registration</a></li>
  <li>Online Registration</li>
</ul>

<div class="page-body clearfix">
  <h1>Online Registration</h1>

  <?php if($show_content == 0) { ?>
    <p>Online registration information for Anime Boston <?=$currentyear?> will be available in the upcoming months. Please check back later for updates.</p>
    <p>For Online Registration Rates and Prices, please check the <a href="/registration/registration_rates/#pre-reg">Registration Rates</a> page.</p>
  <?php } else { ?>
    <p class="text-danger"><b>Before you Pre-Register, please read this information!</b></p>

    <ol>
      <li>
        <b>We accept credit cards, checks, and money orders.</b> 
        <ol>
          <li>For credit cards we accept Visa, MasterCard, American Express, and Discover. We no longer process payments through Paypal.</li>
          <li>If you wish to pay by money order, please select the check option when you are selecting your payment and you will still be able to send us a money order.  Please remember to send a copy of the confirmation page along with your payment!</li>
        </ol>
      </li>
      <li><b>All registrations are processed on an individual basis!</b> This means you must register everyone individually; however, the person paying can be different from the person registering.</li>
      <li><b>Special group discounts will be available for educational or school groups only. This special student discount will be $5 off each registration when the rate increases to $70. For more information, please visit the <a href="/registration/group_registration/">Group Registration</a> page.</li>
      <li><b>Special consideration for children under 13:</b> We still require parental/guardian permission for personal data to be transmitted online for children under 13; however this will now be processed online. Once you enter the child's birth date, a permission slip form will come up.  Furthermore, when you fill out this form you must enter the confirmation code of an 18+ Guardian, so it's easier to register the 18+ chaperone before registering any children under 13. (The chaperone does not necessarily need to be a parent, just someone who is 18+ and attending with the child). If you have any questions regarding this policy, please <a href="/coninfo/contact/127">contact Registration Customer Service</a>.</li>
      <li><b>When you register you will receive the express pass barcode.</b> While not required to pick up your registration, (at the very least you need a photo ID) it will help make your registration experience go much faster and smoother.</li>
      <li class="text-danger"><b>DO NOT REFRESH OR GO BACK ON YOUR BROWSER ONCE YOU HAVE PAID, THIS COULD RESULT IN GETTING CHARGED TWICE.</b></li>
      <li><b>If you have any questions about these policies,</b> please <a href="/coninfo/contact/127">contact Registration Customer Service</a>.</li>
    </ol>

    <p>
      <b>Online Registration Checkout:</b>
      <?php
      if($reg_online_setting == 1)
      {
        echo '<a href="' . $reg_link_setting . '" target="_blank">CLICK HERE TO SEE RATES AND REGISTER ONLINE FOR ANIME BOSTON ' . $currentyear . '.</a></span>';
      }
      else
      {
        echo 'Sorry, but online registration for Anime Boston ' . $currentyear . ' is not currently available. If you have any questions, please contact <a href="/about/contact/127">Registration Customer Service</a>.';
      }
      ?>
    </p>

    <?php echo reg_fine_print(); ?>
  <?php } ?>
</div>