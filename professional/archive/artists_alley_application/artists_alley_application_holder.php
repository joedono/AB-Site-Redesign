<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/artists/">Artists</a></li>
  <li>Artists' Alley Application</li>
</ul>

<div class="page-body clearfix">
  <h1>Artists' Alley Application</h1>

  <?php
  if(isset($aa_application))
  {
    if(strcmp($aa_application,'Pre-Open') == 0)
    {
      echo '<p>Sorry, but the Artists\' Alley Application is not open yet for the ' . $currentyear . ' convention. Please check the <a href="/artists/artists_alley/">Artists\' Alley page</a> for more information on when it will be open.';
    }
    if(strcmp($aa_application,'Post Pro, Pre Standard') == 0)
    {
      echo '<p>Applications for the ' . $currentyear . ' Artists\' Alley <a href="/artists/artists_alley_pro_row/">Pro Row</a> are now closed.</p>';
      echo '<p>The Applications for standard Artists\' Alley space will be open soon. Please check the <a href="/artists/artists_alley/">Artists\' Alley page</a> for more information.';
    }
    if(strcmp($aa_application,'Closed') == 0)
    {
      echo '<p>The Artists\' Alley Application for Anime Boston ' . $currentyear . ' are closed. Please check the <a href="/artists/artists_alley/">Artists\' Alley page</a> often for updates on when it will be open for the ' . ($currentyear + 1) . ' convention.';
    }
  }
  else
  {
    echo '<p>Sorry, but the Artists\' Alley Application is closed at this time. If you have any questions, please contact the <a href="/coninfo/contact/16">Artists\' Alley Manager</a>.</p>';
  }
  ?>
</div>