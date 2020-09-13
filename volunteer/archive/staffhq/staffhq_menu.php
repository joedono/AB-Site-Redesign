<?php
$username = $this->phpbb->getUserInfo('username');
$user_color = $this->phpbb->getUserInfo('user_colour');
$avatar = $this->phpbb->getUserInfo('user_avatar');
$avatar_type = $this->phpbb->getUserInfo('user_avatar_type');
$avatar_width = $this->phpbb->getUserInfo('user_avatar_width');
$avatar_height = $this->phpbb->getUserInfo('user_avatar_height');
$rankID = $this->phpbb->getUserInfo('user_rank');
$rank_title = $this->phpbb->getRankByID($rankID);
$avatar_code = $this->phpbb->getUserAvatar($avatar, $avatar_type, $avatar_width, $avatar_height);
$session_id = $this->phpbb->session_id();
$member_id = $this->session->UserData('member_id');

//Checks if the user is a member of the Staff Alumni Group
$phpbbStaffAlumni = $this->phpbb->isGroupMember('AB Staff Alumni');

//Checks if the user is a member of the Staff Group
$phpbbStaff = $this->phpbb->isGroupMember('AB Staff');
?>
<div class="staffhq-header">
  <span class="staffhq-name"><?=$username?></span><br>
  <?=$rank_title?><br>
  <?=$avatar_code?>
</div>
<div class="staff-menu list-group">
  <a class="list-group-item" href="/staffhq/">STAFF HQ</a>
  <a class="list-group-item" class="list-group-item" href="/staffhq/myinfo/">MY INFO</a>
  <a class="list-group-item" href="/staffhq/myhistory/">MY HISTORY</a>
  <a class="list-group-item" href="/staffhq/applications/">STAFF APPLICATIONS</a>
  <?php echo $active_staff_member ? '<a class="list-group-item" href="/staffhq/foodcards/">FOOD CARDS</a>' : ''; ?>
  <?php echo (staffhq_is_active_staff($member_id) == TRUE) ? '<a class="list-group-item" href="/staffhq/policies/">NEAS POLICIES</a>' : ''; ?>
<?php if ($phpbbStaffAlumni) { ?>
 <a class="list-group-item" href="/staffhq/legacyapplication/">LEGACY STAFF APPLICATION</a>
<?php } ?>
  <a class="list-group-item" href="https://forums.animeboston.com/ucp.php">MY FORUM PROFILE</a>
  <?php echo ($phpbbStaffAlumni == TRUE || $phpbbStaff == TRUE) ? '<a class="list-group-item" href="https://forums.animeboston.com/viewforum.php?f=19">STAFF FORUMS</a>' : ''; ?>
  <?php
  $convention_email = $this->session->userdata('convention_email');
  echo (isset($convention_email) && $convention_email != '') ? '<a class="list-group-item" href="http://mail.google.com/a/animeboston.com">STAFF EMAIL</a>' : '';
  echo ($phpbbStaff == TRUE) ? '<a class="list-group-item" href="https://www.facebook.com/groups/802404273176794/">'.$currentyear.' FACEBOOK</a>' : '';
  echo ($phpbbStaffAlumni == TRUE || $phpbbStaff == TRUE) ? '<a class="list-group-item" href="https://www.facebook.com/groups/2563380287/">ALUMNI FACEBOOK</a>' : '';
  ?>
  <a class="list-group-item" href="https://forums.animeboston.com/ucp.php?mode=logout&sid=<?=$session_id;?>">LOG OUT</a>
</div>