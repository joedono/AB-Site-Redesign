<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/staff/">Staff</a></li>
  <li><a href="/staffhq/">Staff HQ</a></li>
  <li><a href="/staffhq/foodcards/">Food Cards</a></li>
  <li>Food Cards Info</li>
</ul>

<?php include(APPPATH.'views/includes/scripts_datatables.php'); ?>
<script type="text/javascript">$(function() { initDataTable("#admin-table"); });</script>

<div class="page-body clearfix">
  <h1>Food Cards Info</h1>

  <div>
    <img src="/images/staffhq/food_gift_cards_map.jpg" alt="restaurant map" class="img-responsive" />
  </div>

  <table id="admin-table" class="admin-table table table-striped table-bordered">
    <thead>
      <tr>
        <th>Map</th>
        <th>Location</th>
        <th>Website</th>
        <th>Delivery?</th>
        <th>Online Order?</th>
        <th>Hours</th>
        <th>Address</th>
        <th>Amount</th>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($restaurants as $restaurant) { ?>
        <tr>
          <td><?=$restaurant["map_num"]?></td>
          <td><?=$restaurant["name"]?></td>
          <td><a href="<?=$restaurant["website"]?>" target="_blank">Link</a></td>
          <td><?=($restaurant["can_deliver"] == 1 ? "Yes" : "No")?></td>
          <td><?=($restaurant["can_order_online"] == 1 ? "Yes" : "No")?></td>
          <td><?=$restaurant["hours"]?></td>
          <td><?=$restaurant["address"]?></td>
          <td>$<?=$restaurant["gift_card_value"]?></td>
          <td><?=$restaurant["type"]?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
