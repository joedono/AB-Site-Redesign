<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/artists/">Artists</a></li>
  <li><?=$con_year?> Artists' Alley Listing Preview</li>
</ul>

<script type = "text/javascript">
  function ConfirmEntry() {
    return confirm('You are now leaving the Anime Boston website. Anime Boston is not responsible for the content of external websites. It is possible that some exhibitor sites may feature adult (18+) content. View at your own risk. \r\n\nClick OK to continue, or Cancel to remain on Anime Boston. ');
  }
</script>

<div class="page-body clearfix">
  <h1><?=$con_year?> Artists' Alley Listing Preview</h1>

  <p style="color:#FF0000">This is a preview of the <?=$con_year?> Artists' Alley layout. This is CONFIDENTIAL information and not to be given out.</p>

  <?php if(isset($artists) && count($artists) > 0) { ?>
    <p class="text-center">
        <a href="/images/artists/artists_alley_2019.png"><img src="/images/artists/artists_alley_2019_small.png"></a><br>
        <em>Click for larger view.</em>
    </p>
    <?php
      $total = count($artists);
      $columns = 3;

      $rows = floor($total / $columns) - 1;
      $extra = $total % $columns;

      $counter = 0;

      if ($extra > 0)
      {
        $rows = $rows + 1;
      }
    ?>
    <table class="exhibitors_master">
      <tr>
        <?php for($i = 1; $i <= $columns; $i++) { ?>
        <td>
          <table class="exhibitors">
            <tr>
              <th>Row</th>
              <th>Table</th>
              <th>Artist Name</th>
            </tr>
            <?php for($j = 0; $j <= $rows; $j++) { ?>
              <tr>
                <td class="exhibitor_num">
                  <?php echo ($counter < $total) ? $artists[$counter]['booth_row'] : '&nbsp;'; ?>
                </td>
                <td class="exhibitor_num">
                  <?php echo ($counter < $total) ? $artists[$counter]['booth_table'] : '&nbsp;'; ?>
                </td>
                <td class="exhibitor_name">
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

                    //If Show Listing is No, it'll just be Anonymous
                    if(strcmp($show_listing, 'No') == 0)
                    {
                      $output = 'Anonymous';
                    }
                    else
                    {
                      if($url != '')
                      {
                        $output = "<a href='$url' target='_blank' onclick='return ConfirmEntry();'>$listing</a>";
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
        </td>
        <?php } ?>
      </tr>
    </table>
  <?php } else { ?>
    <p>Sorry, but the Artists' Alley Listing for Anime Boston <?=$con_year?> is not yet available. Please check back soon.</p>
  <?php } ?>
</div>
