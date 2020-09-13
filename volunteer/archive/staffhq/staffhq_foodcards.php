<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/staff/">Staff</a></li>
  <li><a href="/staffhq/">Staff HQ</a></li>
  <li>Food Cards</li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<script type="text/javascript">
  function showMap() {
    $("#showMap").hide();
    $("#hideMap").show();
    $("#foodMap").show();
    return false;
  }

  function hideMap() {
    $("#showMap").show();
    $("#hideMap").hide();
    $("#foodMap").hide();
    return false;
  }
</script>

<div class="page-body clearfix">
  <h1>Food Cards</h1>

  <div class="staffhq">
    <div class="staffhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('staffhq_menu.php'); ?>
    </div>
    <div class="staffhq-content col-lg-9 col-md-8 col-sm-8">
      <?php staffhq_confirmation(); ?>

      <div class="alert alert-danger"><?=validation_errors()?></div>

      <p>
        Once again, we will be feeding staff through a food card system so that each of you have the
        flexibility within your dietary restrictions and to eat when your schedule accommodates.
        The list of restaurants and a map showing their locations is below, so you can review menus,
        hours, and delivery options if available.
      </p>
      <p>
        <b><u>Card selection will close on March 20th at 9:00am ET.</u></b>
        You will be able to change your selections up until that time, if you do not make any selections,
        you will be able to choose cards at Staff Resources when you arrive to check-in on a first come, first served basis.
      </p>
      <p>
        If you plan to utilize the Support Squad (formerly Volunteers) for food delivery,
        please note that they will NOT pick up food from Shaw's, Trader Joe's, Whole Foods
        and Domino's is delivery only. Please plan accordingly if you choose these cards!
      </p>

      <p><a href="/staffhq/foodcards_info" target="_blank">Map and Info</a></p>

      <h3>Please select from the choices below. Your total dollar amount must not exceed $60:</h3>
      <form class="form-horizontal" action="/staffhq/foodcards/" method="post">
        <?php for($big_index = 0; $big_index < 2; $big_index++) { ?>
          <div class="row form-group <?php echo ab_error_style("food_choices_big[$big_index]"); ?>">
            <?=form_label('Big Choice #' . ($big_index+1) . ' *', "food_choices_big[$big_index]", $optional_label)?>
            <div class="col-md-8">
              <?php
                $big_choice_id = 0;
                if($food_choices_big[$big_index]) {
                  $big_choice_id = $food_choices_big[$big_index];
                }
              ?>
              <select name="food_choices_big[<?=$big_index?>]" class="form-control food_choices_big" onchange="onSelectionChange();">
                <option value="">Select Food Card</option>
                <?php
                foreach($food_big as $row) {
                  $key = $row["food_gift_cards_big_id"];
                  $value = '$' . $row["value"] . ' - ' . $row["restaurant"];

                  $selected = ($key == $big_choice_id) ? "selected" : "";
                  echo "<option value='$key' $selected>$value</option>";
                }
                ?>
              </select>
              <?php echo ab_error_message("food_choices_big[$big_index]"); ?>
            </div>
          </div>
        <?php } ?>

        <?php for($small_index = 0; $small_index < 4; $small_index++) { ?>
          <div class="row form-group <?php echo ab_error_style("food_choices_small[$small_index]"); ?>">
            <?=form_label('Small Choice #' . ($small_index+1) . ' *', "food_choices_small[$small_index]", $optional_label)?>
            <div class="col-md-8">
              <?php
                $small_choice_id = 0;
                if($food_choices_small[$small_index]) {
                  $small_choice_id = $food_choices_small[$small_index];
                }
              ?>
              <select name="food_choices_small[<?=$small_index?>]" class="form-control food_choices_small" onchange="onSelectionChange();">
                <option value="">Select Food Card</option>
                <?php
                foreach($food_small as $row) {
                  $key = $row["food_gift_cards_small_id"];
                  $value = '$' . $row["value"] . ' - ' . $row["restaurant"];

                  $selected = ($key == $small_choice_id) ? "selected" : "";
                  echo "<option value='$key' $selected>$value</option>";
                }
                ?>
              </select>
              <?php echo ab_error_message("food_choices_small[$small_index]"); ?>
            </div>
          </div>
        <?php } ?>
        <div class="row form-group <?php echo ab_error_style("terms_and_conditions_accept"); ?>">
          <div class="col-xs-12">
            <label>
              <input type="checkbox" name="terms_and_conditions_accept" value="1" />
              I have read and agree to abide by the following rules:
            </label>
            <ol>
              <li>
                Staff members are not permitted to use food cards for the purchase of alcohol or tobacco.
                The purpose of these cards is to feed/hydrate you during the convention.
              </li>
              <li>
                Should a staff member need to leave during the convention, all food cards for future meals are forfeited.
              </li>
              <li>Anime Boston is not responsible for lost/stolen cards.</li>
            </ol>
          </div>
        </div>
        <div class="submit-buttons">
          <input type="submit" name="submit" class="btn btn-success" value="Submit"><br>
        </div>
      </form>
    </div>
  </div>
</div>
