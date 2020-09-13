<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/guests/">Guests</a></li>
  <li><?=$con_year?> Guest Listing</li>
</ul>

<div class="page-body clearfix">
  <h1><?=$con_year?> Guest Listing</h1>

  <p>Please select a year to view its Guests of Honor:</p>

  <ul class="guest-years">
    <?php for ($year = 2003; $year <= $currentyear; $year++) { ?>
      <li><a href="/guests/guest_listing/<?=$year?>"><?=$year?></a></li>
    <?php } ?>
  </ul>

  <?php
  if(count($guests) > 0)
  {
    $current_type = 0;
    $index = 0;

    foreach ($guests as $row)
    {
      $guest_id = $row['guest_id'];
      $name = $row['name'];
      $title = $row['job_title'];
      $guest_type_id = $row['guest_type_id'];
      $guest_type_name = $row['guest_type_name'];

      $guest_photo_url = base_url() . "images/guests/$con_year/$guest_id/" . $guest_photos[$guest_id]["file_name"];
      $guest_photo_alt = $guest_photos[$guest_id]["alt"];

      if ($guest_type_id != $current_type)
      {
        $index = 0;

        if($current_type != 0)
        {
          echo '</div>';
        }

        echo "<h2>$guest_type_name</h2>";
        echo '<div class="row">';

        $current_type = $guest_type_id;
      }
      ?>
      <div class="col-xs-3 text-center guest-row">
        <a href='/guests/guest_info/<?=$guest_id?>'>
          <img class="img-responsive" src="<?=$guest_photo_url?>" alt=<?=$guest_photo_alt?>>
          <strong><?=$name?></strong>
        </a><br>
        <em><?=$title?></em>
      </div>
      <?php
      if($index != 0 && $index % 4 == 3)
      {
        echo '</div><div class="row">';
      }
      $index++;
    }

    echo '</div>';
  }
  else
  {
    echo "<p>There are currently no guests announced for Anime Boston $currentyear, but please check back often.</p>";
  }
  ?>
</div>
