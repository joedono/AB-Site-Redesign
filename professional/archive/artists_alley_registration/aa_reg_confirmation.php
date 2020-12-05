<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/artists/">Artists</a></li>
  <li><a href="/artists/artists_alley/">Artists Alley</a></li>
  <li>Artists Alley Registration - Phase 2</li>
</ul>

<div class="page-body clearfix">
  <h1>Artist Alley Registration - Phase 2</h1>

  <?php aa_reg_warning(); ?>

  <hr>

  <p>Thank you for submitting your Artists' Alley registration information.</p>

  <?php if($reg_link == '') { ?>
    <p>You may now close this page.</p>
  <?php } else { ?>
    <p>Please continue and complete the registration and payment process by immediately going to this link:</p>
    <p style="text-align:center"><a href="<?=$reg_link?>"><?=$reg_link?></a></p>
  <?php } ?>
</div>