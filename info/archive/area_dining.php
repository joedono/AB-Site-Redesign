<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/location/">Location</a></li>
  <li>Area Dining</li>
</ul>

<div class="page-body clearfix">
  <h1>Area Dining</h1>

  <?php
  foreach($categories as $cKey => $category)
  {
    $items = $category["items"];
    $is_restaurant_category = $category["is_restaurant_category"] == "1"
    ?>
    <p><b><a name="<?=$category["content_title"]?>"><?=$category["title"]?></a></b></p>

    <?php if($category["map_image_url"] != "") { ?>
      <p><center>
        <a href="<?php echo "/" . $category["map_image_url"]; ?>">
          <img style="max-width: 800px;" src="<?php echo "/" . $category["map_image_url"]; ?>" alt="[MAP <?=$cKey?>]" />
        </a>
      </center></p>
    <?php } else if($category["embed_map_url"] != "") { ?>
      <iframe src="<?php echo $category["embed_map_url"]; ?>" width="100%" height="640"></iframe>
    <?php } ?>

    <?php if($is_restaurant_category) { ?>
      <p>
        <center>      
          <table class="dining_table" border="0" cellspacing="10">
            <tr>
              <td nowrap valign="top">
                <?php
                foreach($amenities as $amenity) {
                  echo $amenity["description"] . "<br>";
                }
                ?>
              </td>
              <td nowrap valign="top">
                <?php
                foreach($costs as $cost) {
                  echo $cost["description"] . "<br>";
                }
                ?>
              </td>
              <td nowrap valign="top">
                <?php
                foreach($credit_cards as $credit_card) {
                  echo $credit_card["description"] . "<br>";
                }
                ?>
              </td>
            </tr>
          </table>
        </center>
      </p>
    <?php } ?>

    <?php if(count($items) > 0) { ?>
      <p>
        <table class="dining_table" border="1" cellspacing="0">
          <tr bgcolor="#000000">
            <td nowrap style="width: 8px;"><span style="color: rgb(255, 255, 255);">#</span></td>
            <th style="width: 99px;"><font color="#ffffff">
              <?php echo $is_restaurant_category ? "Restaurant Name" : "Name"; ?>
            </font></th>
            <th><font color="#ffffff">Location</font></th>
            <th><font color="#ffffff">Type</font></th>
            <?php if($is_restaurant_category) { ?>
              <th><font color="#ffffff">Cost</font></th>
            <?php } ?>
            <th><font color="#ffffff">Hours</font></th>
            <?php if($is_restaurant_category) { ?>
              <th><font color="#ffffff">Phone</font></th>
              <th><font color="#ffffff">Credit Cards</font></th>
              <th><font color="#ffffff">Amenities</font></th>
            <?php } ?>
          </tr>
          <?php
          foreach($items as $ikey => $item)
          {
            $bg_color = $ikey % 2 == 0 ? "#EEEEEE" : "#FFFFFF";
            $bg_color = "#EEEEEE";//TODO: Replace this once the styling is updated
            $location_url = "";
            if($item["website_url"] != "") {
            $location_url = $item["website_url"];

            if(strpos($location_url, "http") !== 0)
            {
              $location_url = "http://" . $location_url;
            }
          }

          ?>
          <tr bgcolor="<?=$bg_color?>">
            <td nowrap style="width: 8px; text-align: center;">
              <?=$item["location_number"]?>
            </td>
            <td nowrap style="width: 99px;" valign="top">
              <?php
              if($location_url != "")
              {
                echo "<a href='$location_url' target='_blank'>";
              }

              echo $item["location_name"];

              if($location_url != "")
              {
                echo "</a>";
              }
              ?>
            </td>
            <td nowrap valign="top"><?=$item["area_description"]?></td>
            <td nowrap align="center" valign="top"><?=$item["location_type"]?></td>
            <?php if($is_restaurant_category) { ?>
              <td nowrap align="center" valign="top"><?=$item["cost"]?></td>
            <?php } ?>
            <td align="center" valign="top"><?=$item["hours"]?></td>
            <?php if($is_restaurant_category) { ?>
              <td nowrap align="center" valign="top"><?=$item["phone"]?></td>
              <td nowrap align="center" valign="top"><?=$item["credit_cards"]?></td>
              <td nowrap align="center" valign="top"><?=$item["amenities"]?></td>
            <?php } ?>
          </tr>
          <?php } ?>
        </table>
      </p>
      <p><hr width="75%" style="align:center" /></p>
    <?php }
  } ?>
</div>