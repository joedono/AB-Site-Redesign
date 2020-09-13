<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/coninfo/">Convention Info</a></li>
  <li><a href="/coninfo/schedule/<?=$con_year?>"><?=$con_year?> Convention Schedule</a></li>
  <li>Schedule Category</li>
</ul>

<div class="page-body clearfix">
  <h1>Schedule Category</h1>

  <?php
    $category_id = $category['category_id'];
    $category_name = $category['category_name'];
    $category_color = $category['category_color'];
    $category_description = html_entity_decode($category['category_description']);
  ?>

  <p><b><span style="background-color:#<?php echo $category_color; ?>"><?=$category_name?></span> - <?=$con_year?></b></p>

  <p><?=$category_description?></p>

  <?php if(count($unique_events) > 0) { ?>
    <p>
      <b>Events in this category for Anime Boston <?=$con_year?>:</b>
      <table class="category-info table table-striped">
        <tr>
          <th>Event</th>
          <th>Running Time</th>
          <th>Time/Locations</th>
        </tr>
        <?php
        foreach($unique_events as $row)
        {
          $panel_id = $row['panel_id'];
          $video_id = $row['video_id'];
          $event_title = $row['event_title'];
          $event_length = $row['event_length'];
          $match = 0;

          $event_id = '';

          if($panel_id != '')
          {
            $event_id = 'schedule_panel/' .$panel_id;
          }
          if($video_id != '')
          {
            $event_id = 'schedule_video/' .$video_id;
          }
          ?>
          <tr>
            <td><a href="/coninfo/<?=$event_id?>"><?=$event_title?></a></td>
            <td><?=$event_length?> minutes</td>
            <td>
              <?php
              foreach($sorted_assignments as $row2)
              {
                $assignment_panel_id = $row2['panel_id'];	
                $assignment_video_id = $row2['video_id'];	
                $building_name = $row2['building_name'];
                $room_name = $row2['room_name'];
                $con_date = $row2['con_date'];
                $start_time = $row2['start_time'];

                if(($panel_id == $assignment_panel_id) && ($video_id == $assignment_video_id))
                {
                  if($match == 1) echo '<br>';
                  ?>
                  <?=date('D, m/d/Y',strtotime($con_date))?> at <?=date('g:i A',$start_time)?> in <?=$building_name?>-<?=$room_name?>
                  <?php
                  $match = 1;
                }
              }
              ?>
            </td>
          </tr>
        <?php } ?>
      </table>
    </p>
  <?php } else { ?>
    <p>Sorry, but there are no <?=$category_name?> events for Anime Boston <?=$category_year?>.</p>
  <?php } ?>

  <?php schedule_disclaimer(); ?>
</div>