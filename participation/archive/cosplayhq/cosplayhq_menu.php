<?php
$username = $this->phpbb->getUserInfo('username');
$user_color = $this->phpbb->getUserInfo('user_colour');
$avatar = $this->phpbb->getUserInfo('user_avatar');
$avatar_type = $this->phpbb->getUserInfo('user_avatar_type');
$avatar_width = $this->phpbb->getUserInfo('user_avatar_width');
$avatar_height = $this->phpbb->getUserInfo('user_avatar_height');
$avatar_code = $this->phpbb->getUserAvatar($avatar, $avatar_type, $avatar_width, $avatar_height);

$session_id = $this->phpbb->session_id();
?>
<div class="cosplayhq-header">
  <div style="color:#<?=$user_color;?>;font-weight:bold"><?=$username;?></div>
  <?=$avatar_code?>
</div>
<div class="cosplay-menu list-group">
  <a class="list-group-item" href="/cosplayhq/">COSPLAY HQ</a>
  <a class="list-group-item" href="/cosplayhq/myinfo/">MY INFO</a>
  <a class="list-group-item" href="/cosplayhq/myhistory/">MY HISTORY</a>
  <a class="list-group-item" href="/cosplayhq/mycostumes/">MY COSTUMES</a>
  <a class="list-group-item" href="/cosplayhq/applications/1">COSPLAY GAMES</a>
  <a class="list-group-item" href="/cosplayhq/applications/2">MASQUERADE</a>
  <?php /* <a class="list-group-item" href="/cosplayhq/applications/3">HALL COSPLAY</a> */ ?>
  <?php /* <a class="list-group-item" href="/cosplayhq/applications/4">ARDA CONTEST</a> */ ?>
  <a class="list-group-item" href="/cosplayhq/applications/5">IDOL SHOWCASE</a>
  <a class="list-group-item" href="/cosplayhq/photoshoots">PHOTOSHOOTS</a>
  <a class="list-group-item" href="https://forums.animeboston.com/ucp.php">MY FORUM PROFILE</a>
  <a class="list-group-item" href="https://forums.animeboston.com/ucp.php?mode=logout&sid=<?=$session_id;?>">LOG OUT</a>
</div>