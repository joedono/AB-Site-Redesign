<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/exhibits/">Exhibits</a></li>
  <li><?php echo $con_year;?> Dealers Listing</li>
</ul>

<div class="page-body clearfix">
  <h1><?=$con_year?> Dealers Listing</h1>

  <p>Please select a year to view its Dealers listing:</p>

  <ul class="dealers-years">
    <?php for($year = 2009; $year <= $currentyear; $year++) { ?>
      <li><a href="/exhibits/dealers_listing/<?=$year?>"><?=$year?></a></li>
    <?php } ?>
  </ul>

  <?php if(isset($dealers) && count($dealers) > 0) { ?>
    <p>
      <center>
        <a href="/images/dealers/dealers_room_<?=$con_year?>.png"><img class="img-responsive" src="/images/dealers/dealers_room_<?=$con_year?>_small.png"></a><br>
        <em>Click for larger view.</em>
      </center>
    </p>

    <?php
    $total = count($dealers);
    $columns = 3;

    $rows = floor($total / $columns) - 1;
    $extra = $total % $columns;

    $counter = 0;

    if ($extra > 0)
    {
      $rows = $rows + 1;
    }
    ?>

    <?php for($i = 0; $i < $columns; $i++) { ?>
      <div class="col-sm-4">
        <table class="table table-condensed exhibitors">
          <tr>
            <th>Exhibitor Name</th>
            <th>Booth Number</th>
          </tr>
          <?php for($j = 0; $j <= $rows; $j++) { ?>
            <tr>
              <td>
                <?php 
                //Checks to make sure we're not past the number of entries. Otherwise it's a blank cell
                if($counter < $total)
                {
                  $exname = $dealers[$counter]['display_name'];
                  $durl = $dealers[$counter]['website'];

                  if($durl != '')
                  {
                    echo '<a href="' . $durl . '" target="_blank" onclick="return confirmLeavingSite();">' .$exname. '</a>';
                  }
                  else
                  {
                    echo $exname;
                  }
                }
                ?>
              </td>
              <td>
                <?php
                if ($counter < $total)
                {
                  $boothnum = $dealers[$counter]['final_booth_number'];
                  echo $boothnum;
                }
                ?>
              </td>
            </tr>
            <?php $counter++; ?>
          <?php } ?>
        </table>
      </div>
    <?php } ?>
  <?php } else { ?>
    <p>Sorry, but the Dealers Listing for Anime Boston <?=$con_year?> is not yet available. Please check back soon.</p>
  <?php } ?>
</div>