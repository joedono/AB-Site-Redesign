<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/exhibits/">Exhibits</a></li>
  <li>Charity Auction Listing</li>
</ul>

<div class="page-body clearfix">
  <h1>Charity Auction Listing</h1>

  <?php if($show_content == 0 || (count($auction_items) == 0 && count($raffle_baskets) == 0)) { ?>
    <p>Charity Auction information for Anime Boston <?=$currentyear?> will be available in the upcoming months. Please check back later for updates.</p>
  <?php } else { ?>
    <h2 name="auction">Charity Auction Items</h2>
    <p>
      This is not a complete listing of auction items, as more items are still being finalized and donated right up to convention time.
      Items are subject to change in both time and availabity. Please visit our booth in the dealers room for the most up to date
      information and to enter our raffles! If you have any questions, comments, or concerns feel free to reach out to charity@animeboston.com.
      Follow us on <a href="https://www.facebook.com/AnimeBostonCharity" target="_blank">https://www.facebook.com/AnimeBostonCharity</a>!
    </p>
    <?php
    $current_timeslot = "";
    foreach($auction_items as $auction_item) {
      $timeslot = $auction_item["timeslot"];
      if($current_timeslot != $timeslot)
      {
        $current_timeslot = $timeslot;
        echo "<h3>$current_timeslot</h3><hr>";
      }
    ?>
      <div class="row">
        <div class="col-sm-10">
          <p>
            <strong><?=$auction_item["title"]?></strong><br>
            <?=$auction_item["description"]?>
          </p>
        </div>
        <div class="col-sm-2">
          <?php if($auction_item["thumbnail_url"] != "") { ?>
            <a href="<?=$auction_item["image_url"]?>" class="thumbnail" target="_blank">
              <img class="img-responsive" src="<?=$auction_item["thumbnail_url"]?>">
            </a>
          <?php } ?>
        </div>
      </div>
      <hr>
    <?php } ?>

    <h2 name="raffle">Raffle Baskets</h2>

    <p>We feature several baskets that are raffled off on Saturday of the convention. Tickets are on sale at both our <strong>Registration Room Table</strong> and our <strong>Dealers Room Table</strong></p>

    Ticket pricing is
    <ul>
      <li>1 ticket for $1</li>
      <li>6 tickets for $5</li>
      <li>15 tickets for $10</li>
    </ul>

    <p>
      After purchasing a ticket, you must write on the back, a name and a phone number where you can be reached at the convention.
      If you are not present during the drawing, we will text you. We must hear back from you within 30 minutes after your ticket
      is drawn to confirm you will be picking it up. <strong>No raffle prizes will be mailed out</strong>.
      If we receive no response in the 30 minute time frame, a new winner will be drawn.
    </p>

    <p>All ticket sales benefit the National MS Society.</p>

    Baskets we are offering this year include:
    <ul>
      <?php foreach($raffle_baskets as $raffle_basket) { ?>
        <li><em><?=$raffle_basket["title"]?></em> - <?=$raffle_basket["description"]?></li>
      <?php } ?>
    </ul>
  <?php } ?>
</div>
