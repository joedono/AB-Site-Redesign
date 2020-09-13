<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/artists/">Artists</a></li>
  <li><?=$con_year?> Artists' Alley Listing</li>
</ul>

<div class="page-body clearfix">

  <h1><?=$con_year?> Artists' Alley Listing</h1>

  <p>Please select a year to view its Artists' Alley listing:</p>
  <ul class="artists-years">
    <?php for($year = 2010; $year <= $currentyear; $year++) { ?>
      <li><a href="/artists/artists_alley_listing/<?=$year?>"><?=$year?></a></li>
    <?php } ?>
  </ul>

  <?php if(isset($artists) && count($artists) > 0) { ?>
    <p>
      <center>
        <a href="/images/artists/artists_alley_2019.png">
          <img src="/images/artists/artists_alley_2019_small.png" alt="Artists Alley Map" class="img-responsive">
          <em>Click for larger view.</em>
        </a>
      </center>
    </p>

    <?php
    $total = count($artists);
    $columns = 2;

    $rows = floor($total / $columns) - 1;
    $extra = $total % $columns;
    $counter = 0;

    if ($extra > 0)
    {
      $rows = $rows + 1;
    }
    ?>

    <div class="row">
      <?php for($i = 1; $i <= $columns; $i++) { ?>
        <div class="col-sm-6">
          <table class="table table-condensed table-bordered artists">
            <tr>
              <th>Row</th>
              <th>Table</th>
              <th>Artist Name</th>
            </tr>
            <?php for($j = 0; $j <= $rows; $j++) { ?>
            <tr>
              <td>
                <?php echo ($counter < $total) ? $artists[$counter]['booth_row'] : '&nbsp;'; ?>
              </td>
              <td>
                <?php echo ($counter < $total) ? $artists[$counter]['booth_table'] : '&nbsp;'; ?>
              </td>
              <td>
                <?php
                //Checks to make sure we're not past the number of entries. Otherwise it's a blank cell
                if($counter < $total)
                {
                  $listing = $artists[$counter]['listing'];
                  $show_listing = $artists[$counter]['show_listing'];
                  $url = $artists[$counter]['site_url'];
                  $output = '&nbsp';

                  //Checks if URL starts with http://. If not, adds it in, as long as URL isn't empty.
                  if($url != '' && substr($url,0,7) != 'http://' && substr($url,0,8) != 'https://')
                  {
                    $url = 'http://' .$url;
                  }

                  if(strcmp($show_listing, 'No') == 0)
                  {
                    $output = 'Anonymous';
                  }
                  else
                  {
                    if($url != '')
                    {
                      $output = "<a href='$url' target='_blank' onclick='return confirmLeavingSite();'>$listing</a>";
                    }
                    else
                    {
                      $output = $listing;
                    }
                  }
                }
                else
                {
                  $output ='&nbsp;';
                }
                ?>
                <?=$output?>
              </td>
            </tr>
            <?php $counter++; } ?>
          </table>
        </div>
      <?php } ?>
    </div>
  <?php } else { ?>
    <p>Sorry, but the Artists' Alley Listing for Anime Boston <?=$con_year?> is not yet available. Please check back soon.</p>
  <?php } ?>
</div>
