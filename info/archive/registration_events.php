<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/registration/">Registration</a></li>
  <li>Registration Events</li>
</ul>

<div class="page-body clearfix">
  <h1>Registration Events</h1>

  <p>Anime Boston will be at local stores and conventions in and around the Boston area where you can come and register for Anime Boston. Please check below for upcoming events!</p>

  <b>Upcoming Registration Events</b>

  <?php if(count($future_events) > 0) { ?>
    <table class="table table-striped">
      <tr>
        <th>Event</th>
        <th>Location</th>
        <th>Date</th>
        <th>Time</th>
      </tr>
      <?php foreach($future_events as $row)
      {
        $event_id = $row['event_id'];
        $eventname = $row['event_name'];
        $con_year = $row['con_year'];
        $location = $row['location'];
        $is_con = $row['is_con'];
        $location_link = $row['location_link'];
        $location_map = $row['location_map'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
        $status = $row['status'];
        $total_reg = $row['total_reg'];
        ?>
        <tr>
          <td><a href="<?=$location_link?>" target="_blank"><?=$eventname?></a></td>
          <td><a href="<?=$location_map?>" target="_blank"><?=$location?></a></td>
          <td>
            <?php
            if($start_date == $end_date) {
              echo date('D, M j, Y',strtotime($start_date));
            } else {
              echo date('D, M j',strtotime($start_date)).'-<br>'. date('D, M j, Y',strtotime($end_date));
            }
            ?>
          </td>
          <td>
            <?php
            if($is_con == '1') {
              echo "Dealers' Room Hours";
            } else {
              echo date('g:i A',strtotime($start_time)).' - '.date('g:i A',strtotime($end_time));
            }
            ?>
          </td>
        </tr>
      <?php } ?>
    </table>
  <?php } else { ?>
    <br>There are currently no upcoming registration events listed for Anime Boston <?=$currentyear?></p>
  <?php } ?>

  <b>Past Registration Events</b>

  <?php if(count($past_events) > 0) { ?>
    <table class="table table-striped">
      <tr>
        <th>Event</th>
        <th>Location</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
      </tr>
      <?php
      foreach($past_events as $row)
      {
        $event_id = $row['event_id'];
        $eventname = $row['event_name'];
        $con_year = $row['con_year'];
        $location = $row['location'];
        $is_con = $row['is_con'];
        $location_link = $row['location_link'];
        $location_map = $row['location_map'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
        $status = $row['status'];
        $total_reg = $row['total_reg'];
        ?>
        <tr>
          <td><a href="<?=$location_link?>" target="_blank"><?=$eventname?></a></td>
          <td><a href="<?=$location_map?>" target="_blank"><?=$location?></a></td>
          <td>
            <?php
            if($start_date == $end_date)
            {
              echo date('D, M j, Y',strtotime($start_date));
            }
            else
            {
              echo date('D, M j',strtotime($start_date)).' -<br>'.date('D, M j, Y',strtotime($end_date));
            }
            ?>
          </td>
          <td>
            <?php
            //if the start or ending time isn't set, displays it as an All Day event
            if ($is_con == '1')
            {
              echo "Dealers' Room Hours";
            }
            else //otherwise displays time in format H:M AM - H:M PM, etc.
            {
              echo date('g:i A',strtotime($start_time)).' - '.date('g:i A',strtotime($end_time));
            }
            ?>
          </td>
          <td><?=$status?></td>
        </tr>
      <?php } ?>
    </table>
    <p><b>Past Events Status Key</b></p>
    <ul>
      <li>Pending: Awaiting Upload to Registration Server</li>
      <li>Processing: Currently Uploading to Server</li>
      <li>Complete: Uploaded to Server</li>
    </ul>
    <p><i>Please note, registration confirmation emails will only be sent once an event is Complete</i></p>
  <?php } else { ?>
    <br>There are no past registration events for Anime Boston <?=$currentyear?>.</p>
  <?php } ?>

  <?php echo reg_fine_print(); ?>
</div>