<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/cosplay/">Cosplay</a></li>
  <li><a href="/cosplayhq/">Cosplay HQ</a></li>
  <li>My History</li>
</ul>

<div class="page-body clearfix">
  <h1>My History</h1>

  <div class="cosplayhq">
    <div class="cosplayhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('cosplayhq_menu.php'); ?>
    </div>
    <div class="cosplayhq-content col-lg-9 col-md-8 col-sm-8">
      <p>Please enter your participation information for previous Anime Boston Cosplay Events, if not already entered.</p>

      <p>When selecting an entry, please keep in mind the following options:</p>
      <ul>
        <li><b>Major Award:</b> You received any award that starts with the words "Best," "Most," "First," "Second," or "Runner-Up.".</li>
        <li><b>Minor Award:</b> You received a non-Major award, such as "Honorable Mention."</li>
        <li><b>Participated (Minor Role):</b> You briefly appeared on stage during the event.</li>
        <li><b>Participated:</b> You took part in the event in an otherwise normal manner.</li>
        <li><b>Didn't Participate:</b> You had no part in the actual event, regardless whether or not you applied to participate.</li>
      </ul>

      <p>You will only be able to enter in your history once. If you make a mistake, please <a href="/coninfo/contact/93">contact the Cosplay Games Coordinator</a> for assistance.</p>

      <?php
      if(count($history_master) < 1)
      {
        echo 'Sorry, but there are no previous events. Thanks for checking!';
      }
      else
      {
        ?>

        <?php cosplayhq_confirmation();?>

        <div class="alert alert-danger"><?=validation_errors()?></div>

        <form method="post" action="/cosplayhq/myhistory/">
          <p><span class="required">*</span> = Required information</p>
          <?php foreach($history_master as $con_year => $year_events) { ?>
            <div class="cosplayhq-history">
              <div class="row">
                <div class="col-xs-12">
                  <h3><?=$con_year?></h3>
                </div>
                <?php
                $i = $con_year;

                foreach($year_events as $event_id => $event)
                {
                  $j = $event_id;

                  $hist_id = $event['hist_id'];
                  $event_id = $event['event_id'];
                  $event_name = $event['event_name'];
                  $type_id = $event['type_id'];
                  $type_name = $event['type_name'];
                  $status = $event['status'];
                  $event_year = $event['con_year'];
                  $submitted_timestamp = $event['submitted_timestamp'];
                  ?>
                  <div class="col-sm-4">
                    <input type="hidden" name="history_master[<?=$i?>][<?=$j?>][hist_id]" value="<?=$hist_id?>">
                    <input type="hidden" name="history_master[<?=$i?>][<?=$j?>][event_id]" value="<?=$event_id?>">
                    <input type="hidden" name="history_master[<?=$i?>][<?=$j?>][event_name]" value="<?=$event_name?>">
                    <input type="hidden" name="history_master[<?=$i?>][<?=$j?>][con_year]" value="<?=$con_year?>">
                    <?php if($hist_id == '') { ?>
                      <?=$event_name?> <span class="required">*</span><br>
                      <?php
                      if($type_id == 2 || $type_id == 3)
                      {
                        $histoptions = array(
                            'Did Not Participate' => 'Did Not Participate',
                            'Major Award' => 'Major Award',
                            'Minor Award' => 'Minor Award',
                            'Participated' => 'Participated'
                        );
                      }
                      else
                      {
                        $histoptions = array(
                            'Did Not Participate' => 'Did Not Participate',
                            'Participated' => 'Participated',
                            'Participated (Minor Role)' => 'Participated (Minor Role)'
                        );
                      }

                      echo form_dropdown("history_master[$i][$j][status]", $histoptions, $status, ab_dropdown_class());
                    } else { ?>
                      <?=$event_name?><br>
                      <select name="history_master[<?=$i?>][<?=$j?>][status]" class="form-control" disabled>
                        <option value="<?=$status?>" selected><?=$status?></option>
                      </select>
                    <?php } ?>
                  </div>
                <?php } ?>
              </div>
            </div>
            <?php
            $i = $con_year;
          }
          ?>
          <div class="submit-buttons">
            <input type="submit" name="submit" class="btn btn-success" value="Update History">
          </div>
        </form>
      <?php } ?>
    </div>
  </div>
</div>
