<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/Cosplay/">Cosplay</a></li>
  <li>Cosplay HQ</li>
</ul>

<div class="page-body clearfix">
  <h1>Cosplay HQ</h1>

  <?php
  if(isset($cosplayhq_setting))
  {
    if($cosplayhq_setting == 0)
    {
    echo '<p>Sorry, but the Cosplay HQ is currently not available. Please check back soon.</p>';
    }
    else
    {
      echo '<p>You must be logged into the Anime Boston forums to access the Cosplay HQ and sign up for Cosplay Events.</p>';
      echo '<p>Please <a href="https://forums.animeboston.com/ucp.php?mode=login">login to the forums</a> or <a href="https://forums.animeboston.com/ucp.php?mode=register">register for the forums</a> if you do not have an account.</p>';
    }
  }
  else
  {
    echo '<p>Sorry, but the Cosplay HQ is currently not available. Please check back soon.</p>';
  }
  ?>
</div>