<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/coninfo/">Convention Info</a></li>
  <li><a href="/coninfo/schedule/<?=$con_year?>"><?=$con_year?> Convention Schedule</a></li>
  <li>Schedule Panel</li>
</ul>

<?php
  $panel_id = $panel['panel_id'];
  $panel_title = $panel['panel_title'];
  $pg_name = $panel['pg_name'];
  $web_description = html_entity_decode($panel['web_description']);
  $panel_length = $panel['panel_length'];
  $adult_only = $panel['adult_only'];
  $category_ids = array_map('trim', explode(",", $panel['category_ids']));
  $category_names = array_map('trim', explode(",", $panel['category_names']));
  $category_colors = array_map('trim', explode(",", $panel['category_colors']));
  $producer_id = $panel['producer_id'];
  $producer_name = $panel['producer_name'];
  $con_year = $panel['con_year'];
?>

<div class="page-body clearfix">
  <h1>Schedule Panel</h1>

  <p>
    <b><?=$panel_title?></b>
    <br><span class="input-subtitle">Hosted by <?=$pg_name?></span>
    <?php if($producer_id != '') { ?>
      <br><span class="input-subtitle">Presented by <?=$producer_name?></span>
    <?php } ?>
  </p>

  <p><?=$web_description?></p>

  <p>
    <label>Running Time:</label> <?=$panel_length?> minutes<br>
    <label>Categories:</label>
    <?php for($i = 0; $i < count($category_ids); $i++) { ?>
      <a href="/coninfo/schedule_category/<?=$category_ids[$i]?>/<?=$con_year?>" class="schedule-category" style="background-color:#<?=$category_colors[$i]?>;">
        <?=$category_names[$i]?>
      </a>
    <?php } ?>
    <?php if(strcmp($adult_only,'Yes') == 0) { ?>
      <br><span class="input-subtitle"><font color="#FF0000">You must be at least 18 years of age to attend this event, and present a government-issued photo-ID to enter.</font></span>
    <?php } ?>
  </p>

  <p>
    <label>Showing Times:</label>
    <?php
    foreach($assignments as $row)
    {
      $building_name = $row['building_name'];
      $room_name = $row['room_name'];
      $con_date = $row['con_date'];
      $start_time = $row['start_time'];
      $end_time = $row['end_time'];
      ?>
      <br>
      <?=date('D, m/d/Y',strtotime($con_date))?> at <?=date('g:i A',strtotime($start_time))?> in <?=$building_name?> - <?=$room_name?>
    <?php } ?>
  </p>

  <?php schedule_disclaimer(); ?>
</div>
