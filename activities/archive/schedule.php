<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/coninfo/">Convention Info</a></li>
  <li><?=$con_year?> Convention Schedule</li>
</ul>

<script type="text/javascript">
var categories = {
  <?php
  $jsCategories = array();
  foreach ($categories as $category)
  {
    array_push($jsCategories, $category["category_id"] . ': "#' . $category["category_color"] . '"');
  }

  echo implode(",", $jsCategories);
  ?>
};

function refreshCategoryHighlight() {
  var checkedCategoryIds = [];
  var checkedCategories = $(".category-check:checked");
  checkedCategories.each(function(index, item) {
    checkedCategoryIds.push($(item).data("value"));
  });

  $(".schedule-event").each(function(index, item) {
    setEventColor(this, checkedCategoryIds);
  });
}

function setEventColor(element, checkedCategoryIds) {
  element = $(element);
  var style = "";
  var colors = Array();
  var classes = element.attr("class").split(" ");

  if (checkedCategoryIds.length == 0) {
    checkedCategoryIds = Object.keys(categories);
  }

  checkedCategoryIds.forEach(function(checkedCategoryId, index) {
    if (classes.includes("fn-event-category-" + checkedCategoryId)) {
      colors.push(categories[checkedCategoryId]);
    }
  });

  if (colors.length == 1) {
    style += colors[0];
  } else if (colors.length > 1) {
    style += "linear-gradient(to bottom, ";
    style += colors.join(",");
    style += ")";
  }

  element.css("background", style);
}

$(function() { refreshCategoryHighlight(); });
</script>

<div class="page-body clearfix">
  <h1><?=$con_year?> Convention Schedule</h1>

  <p>Please select a year to view its Convention Schedule:</p>

  <ul class="schedule-years">
    <?php for($year = 2010; $year <= $currentyear; $year++) { ?>
      <li><a href="/coninfo/schedule/<?=$year?>"><?=$year?></a></li>
    <?php } ?>
  </ul>

  <?php if(count($each_day) > 0) { ?>
    <?php if($con_year == $currentyear) { ?>
      <p><b>Quick Links</b></p>
      <ul>
        <li><a href="#hours">Hours of Operation</a></li>
        <li><a href="#maps">Hynes and Sheraton Floor Maps</a></li>
        <li><a href="#legend">Schedule Legend</a></li>
        <li><a href="#Fri">Friday Schedule</a></li>
        <li><a href="#Sat">Saturday Schedule</a></li>
        <li><a href="#Sun">Sunday Schedule</a></li>
        <li><a href="/coninfo/autographs">Autograph Schedule</a></li>
      </ul>

      <a name="hours" class="btn btn-primary" role="button" data-toggle="collapse" href="#hoursofoperation" style="margin-bottom: 10px;">View Hours of Operation</a>
      <div id="hoursofoperation" class="collapse">
        <?php include('hours_of_operation.php'); ?>
      </div>

      <p>
        <span class="schedule-title"><a name="maps">Hynes &amp; Sheraton Floor Maps:</a></span><br>
        <span class="input-subtitle">Please note that the Hynes will close at 2AM each night.</span>
        <ul>
          <li><a href="/images/maps/Hynes_First_Floor_2019.jpg" target="_blank">Hynes: 1st Floor</a></li>
          <li><a href="/images/maps/Hynes_Second_Floor_2019.jpg" target="_blank">Hynes: 2nd Floor</a></li>
          <li><a href="/images/maps/Hynes_Third_Floor_2019.jpg" target="_blank">Hynes: 3rd Floor</a></li>
          <li><a href="/images/maps/Sheraton_Second_Floor_2019.jpg" target="_blank">Sheraton: 2nd Floor</a></li>
          <li><a href="/images/maps/Sheraton_Third_Floor_2019.jpg" target="_blank">Sheraton: 3rd Floor</a></li>
          <li><a href="/images/maps/Sheraton_Fifth_Floor_2019.jpg" target="_blank">Sheraton: 5th Floor</a></li>
        </ul>
      </p>
    <?php } else { ?>
      <ul>
        <li><a href="#legend">Schedule Legend</a></li>
        <li><a href="#Fri">Friday Schedule</a></li>
        <li><a href="#Sat">Saturday Schedule</a></li>
        <li><a href="#Sun">Sunday Schedule</a></li>
        <li><a href="/coninfo/autographs/<?=$con_year?>">Autograph Schedule</a></li>
      </ul>
    <?php } ?>

    <?php
    if(count($categories) > 0)
    {
      $cats = array();

      //Needs to re-sort the categories, just to be safe. Caching seems to mess up the order
      foreach ($categories as $key=>$value)
      {
        $keyarray[$key] = $value['category_name'];
      }

      //Sorts the array based on their keys
      asort($keyarray);

      //Makes a new array in order of the keys
      foreach ($keyarray as $key=>$value)
      {
        $cats[] = $categories[$key];
      }
      ?>

      <p>
        <span class="schedule-title"><a name="legend">Schedule Legend:</a></span><br>
        <span class="input-subtitle">Click on a category to view all events for it.</span>
      </p>
      <div class="clearfix">
        <div class="schedule-legend col-sm-4">
          <ul>
            <?php for($i = 0; $i < count($cats); $i++) { ?>
              <li>
                <label class="schedule-category-label">
                  <input type="checkbox" data-value="<?=$cats[$i]['category_id']?>" class="category-check" onchange="refreshCategoryHighlight()" />
                  <?=$cats[$i]['category_name']?>
                </label>
              </li>
              <?php if(($i + 1) % 4 == 0) { ?>
              </ul></div><div class="schedule-legend col-sm-4"><ul>
              <?php } ?>
            <?php } ?>
          </ul>
        </div>
      </div>

      <?php
      foreach($each_day as $day)
      {
        $con_date = $day['con_date'];
        $last_modified = $day['last_modified'];
        $daily_times = $day['daily_times'];
        $daily_buildings = $day['daily_buildings'];
        $daily_rooms = $day['daily_rooms'];
        $daily_blocks = $day['daily_blocks'];

        $room_total = count($daily_rooms);
        $room_width = (1/$room_total);
        $column_width = floor($room_width * 100);
      ?>
      <p>
        <span class="schedule-title"><a name="<?=date('D',$con_date)?>"><?=date('l, F jS, Y',$con_date)?></a></span><br>
        <span class="input-subtitle">Last Updated: <?=date('D, m/d/Y, g:i a', $last_modified)?></span><br>
        <?php schedule_disclaimer(); ?>
      </p>

      <table class="schedule-table">
        <tr>
          <th rowspan="2" class="schedule-filler">&nbsp;</th>
          <?php foreach($daily_buildings as $building) { ?>
            <th colspan="<?=$building['count']?>" class="schedule-building">
              <?=$building['building_name']?>
            </th>
          <?php } ?>
          <th rowspan="2" class="schedule-filler">&nbsp;</th>
        </tr>
        <tr>
          <?php foreach($daily_rooms as $room) { ?>
          <th class="schedule-room">
            <?=$room['room_name']?>
          </th>
          <?php } ?>
        </tr>
        <?php foreach($daily_times as $time) { ?>
        <tr>
          <th class="schedule-time"><?=date('g:i a',$time)?></th>
          <?php
          foreach($daily_rooms as $room)
          {
            $room_id = $room['room_id'];

            if(isset($daily_blocks[$room_id][$time]))
            {
              $block = $daily_blocks[$room_id][$time];

              if(is_array($block))
              {
                $panel_id = $block['panel_id'];
                $video_id = $block['video_id'];
                $event_title = html_entity_decode($block['event_title'],ENT_QUOTES);
                $rating = $block['rating'];
                $span = $block['block_span'];

                $category_classes = array_map(function($category_id) {
                    return 'fn-event-category-' . $category_id;
                }, $block['category_ids']);

                if($panel_id != '')
                {
                  $event = 'schedule_panel/' .$panel_id;
                }

                if($video_id != '')
                {
                  $event = 'schedule_video/' .$video_id;
                }
                ?>
                <td title="<?=$event_title?>" rowspan="<?=$span?>" class="schedule-event <?=implode(' ', $category_classes)?>" onclick="window.location.href='/coninfo/<?=$event?>'">
                  <?php echo preg_replace('/([^\s]{8})(?=[^\s])/m', '$1 ', $event_title); ?>
                  <?php if($rating != '') echo ' (' .$rating. ')'; ?>
                </td>
              <?php } else { ?>
                <td>&nbsp;</td>
              <?php
              }
            }
          }
          ?>
          <th class="schedule-time"><?=date('g:i a',$time)?></th>
        <?php } ?>
        </tr>
        <tr>
          <th rowspan="2" class="schedule-filler">&nbsp;</th>
          <?php foreach($daily_rooms as $room) { ?>
            <th class="schedule-room">
              <?=$room['room_name']?>
            </th>
          <?php } ?>
          <th rowspan="2" class="schedule-filler">&nbsp;</th>
        </tr>
        <tr>
          <?php foreach($daily_buildings as $building) { ?>
            <th colspan="<?=$building['count']?>" class="schedule-building">
              <?=$building['building_name']?>
            </th>
          <?php } ?>
        </tr>
      </table>
      <?php } ?>
    <?php } else { ?>
      Sorry, but the programming schedule for Anime Boston <?=$con_year?> is not currently available.
    <?php } ?>
  <?php } else { ?>
    Sorry, but the programming schedule for Anime Boston <?=$con_year?> is not currently available.
  <?php } ?>
</div>
