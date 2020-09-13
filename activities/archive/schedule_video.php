<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/coninfo/">Convention Info</a></li>
  <li><a href="/coninfo/schedule/<?=$con_year?>"><?=$con_year?> Convention Schedule</a></li>
  <li>Schedule Video</li>
</ul>

<?php
  $video_id = $video['video_id'];
  $video_title = $video['video_title'];
  $video_description = html_entity_decode($video['video_description']);
  $audio_format = $video['audio_format'];
  $episodes = $video['episodes'];
  $video_length = $video['video_length'];
  $category_ids = array_map('trim', explode(",", $video['category_ids']));
  $category_names = array_map('trim', explode(",", $video['category_names']));
  $category_colors = array_map('trim', explode(",", $video['category_colors']));
  $producer_id = $video['producer_id'];
  $producer_name = $video['producer_name'];
  $rating = $video['rating'];
  $con_year = $video['con_year'];
?>

<div class="page-body clearfix">
  <h1>Schedule Video</h1>

  <p>
    <b><?=$video_title?></b><br>
    <span class="input-subtitle">Presented by <?=$producer_name?></span>
  </p>
  <p><?=$video_description; ?></p>
  <p>
    <label>Running Time:</label> <?=$video_length?> minutes
    <?php if($episodes != '') { ?>
      <br><label>Episodes:</label> <?=$episodes?>
    <?php } ?>
    <br><label>Audio Format:</label> <?=$audio_format?>
    <br><label>Rated:</label> <?=$rating?>

    <?php if(strcmp($rating,'18+') == 0) { ?>
      <br><span class="input-subtitle"><font color="#FF0000">You must be at least 18 years of age to attend this event, and present a government-issued photo-ID to enter.</font></span>
    <?php } ?>

    <br>
    <label>Categories:</label>
    <?php for($i = 0; $i < count($category_ids); $i++) { ?>
      <a href="/coninfo/schedule_category/<?=$category_ids[$i]?>/<?=$con_year?>" class="schedule-category" style="background-color:#<?=$category_colors[$i]?>;">
        <?=$category_names[$i]?>
      </a>
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
      <?=date('D, m/d/y',strtotime($con_date))?> at <?=date('g:i A',strtotime($start_time))?>
      in <?=$building_name?> - <?=$room_name?>
    <?php } ?>
  </p>

  <?php schedule_disclaimer(); ?>
</div>
