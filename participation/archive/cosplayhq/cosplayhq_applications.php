<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/cosplay/">Cosplay</a></li>
  <li><a href="/cosplayhq/">Cosplay HQ</a></li>
  <li><?=$type_name?></li>
</ul>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<script type = "text/javascript">
  function show(x)
  {
    var elems = "app_master[" + x + "][group_members]";
    var intCount = document.CosplayHQ_Application.elements[elems].options.length;
    var intValue = document.CosplayHQ_Application.elements[elems].value;

    for(i = 1; i <= intValue; i++)
    {
      assoc = "app_master"+x+"_member"+i;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = '';
    }

    for(j = intCount - 1; j > intValue; j--)
    {
      assoc = "app_master" + x + "_member" + j;
      hidden_row_object = document.getElementById(assoc);
      hidden_row_object.style.display = 'none';
    }
  }

  function toggle(x)
  {
    var elems = "app_master[" + x + "][participate]";
    var divid = "event" + x + "_participate";
    var pvalue = document.CosplayHQ_Application.elements[elems].checked;

    if(pvalue == 1)
    {
      hidden_row_object = document.getElementById(divid);
      hidden_row_object.style.display = '';
    }
    else
    {
      hidden_row_object = document.getElementById(divid);
      hidden_row_object.style.display = 'none';
    }
  }

  function onMasqApplicationTypeChange(x)
  {
    var val = $("#masquerade_event_type_id_" + x + " option:selected").val();

    switch(val) {
      case "1": // Performance
        $("#event_participate_type_select_" + x).show();
        $(".masq_craft_" + x).hide();
        $(".masq_both_" + x).hide();
        $(".masq_exhibition_" + x).hide();
        $(".masq_perform_" + x).show();
        break;
      case "2": // Craftsmanship
        $("#event_participate_type_select_" + x).show();
        $(".masq_perform_" + x).hide();
        $(".masq_both_" + x).hide();
        $(".masq_exhibition_" + x).hide();
        $(".masq_craft_" + x).show();
        break;
      case "3": // Both
        $("#event_participate_type_select_" + x).show();
        $(".masq_perform_" + x).hide();
        $(".masq_craft_" + x).hide();
        $(".masq_exhibition_" + x).hide();
        $(".masq_both_" + x).show();
        break;
      case "4": // Exhibition
        $("#event_participate_type_select_" + x).show();
        $(".masq_perform_" + x).hide();
        $(".masq_craft_" + x).hide();
        $(".masq_both_" + x).hide();
        $(".masq_exhibition_" + x).show();
        break;
      default:
        $("#event_participate_type_select_" + x).hide();
        break;
    }
  }

  $(function() {
    <?php foreach($app_master as $event_id => $row) { ?>
      onMasqApplicationTypeChange(<?=$event_id?>);
    <?php } ?>
  });
</script>

<div class="page-body clearfix">
  <h1><?=$type_name?></h1>

  <div class="cosplayhq">
    <div class="cosplayhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('cosplayhq_menu.php'); ?>
    </div>
    <div class="cosplayhq-content col-lg-9 col-md-8 col-sm-8">
      <p>Please fill out the information below to apply to <?=$type_name?> Events for Anime Boston <?=$currentyear?>.</p>
      <p>Once you've submitted an application, you may still edit it below.</p>

      <?php if(count($app_master) <= 0) { ?>
        Sorry, but there are currently no <?=$event_name?> events to apply to. Please check back soon.
      <?php } else { ?>
        <p><span class="required">*</span> = Required information</p>

        <?php cosplayhq_confirmation(); ?>

        <form class="form-horizontal" name="CosplayHQ_Application" action="/cosplayhq/applications/<?=$type_id?>" enctype="multipart/form-data" method="post">
          <?php echo ab_error_summary(); ?>
          <?php
          foreach($app_master as $event_id => $row) {
            $i = $event_id;

            $app_id = $row['app_id'];
            $event_name = $row['event_name'];
            $type_id = $row['type_id'];
            $event_description = $row['event_description'];
            $event_status = $row['event_status'];
            $age_requirement = $row['age_requirement'];
            $participate = $row['participate'];
            $group_members_max = $row['group_members_max'];
            $question_status = $row['question_status'];
            $question = $row['question'];
            $masquerade_event_type_id = $row['masquerade_event_type_id'];
            $stage_name = $row['stage_name'];
            $character_name = $row['character_name'];
            $character_series = $row['character_series'];
            $question_answer = $row['question_answer'];
            $craftmanship_judging = $row['craftmanship_judging'];
            $judging_time = $row['judging_time'];
            $division = $row['division'];
            $dietary_restrictions = $row['dietary_restrictions'];
            $skit_title = $row['skit_title'];
            $skit_description = $row['skit_description'];
            $skit_type = $row['skit_type'];
            $fashion_show = $row['fashion_show'];
            $group_members = $row['group_members'];
            $member_first_name = $row['member_first_name'];
            $member_last_name = $row['member_last_name'];
            $member_stage_name = $row['member_stage_name'];
            $member_character = $row['member_character'];
            $member_series = $row['member_series'];
            $status = $row['status'];
            $status_updated = $row['status_updated'];
            $submitted_timestamp = $row['submitted_timestamp'];
            $app_cos = $row['app_cos'];
            $app_files = $row['app_files'];
            $app_scripts = $row['app_scripts'];

            $disabled = '';
            ?>
            <div class="cosplayhq-application">
              <h2><a name="event<?=$event_id?>"><?=$event_name?></a></h2>

              <?php if($submitted_timestamp != '') { ?>
                <span class="text-danger">Application Submitted: <?php echo date('n-j-y',strtotime($submitted_timestamp)) . ", " . date('g:i A',strtotime($submitted_timestamp)); ?></span>
              <?php } ?>

              <p><b>Description:</b> <?=$event_description?></p>

              <?php
              if(strcmp($event_status,'Applications Locked') == 0) {
                $disabled = 'disabled';
                ?>
                <p class="text-danger">The Cosplay Event staff is currently reviewing applications for this event. Applications may no longer be submitted or editted.</p>
              <?php } ?>
              <input type="hidden" name="app_master[<?=$i?>][app_id]" value="<?=$app_id?>">
              <input type="hidden" name="app_master[<?=$i?>][event_name]" value="<?=$event_name?>">
              <input type="hidden" name="app_master[<?=$i?>][status]" value="<?=$status?>">
              <input type="hidden" name="app_master[<?=$i?>][group_members_max]" value="<?=$group_members_max?>">
              <input type="hidden" name="app_master[<?=$i?>][question_status]" value="<?=$question_status?>">

              <?php
              $of_age_trigger = FALSE;
              if($age_requirement > 0)
              {
                $con_start_date = strtotime($start_date);
                $min = strtotime('-'.$age_requirement.' years', $con_start_date);

                $birth_date = strtotime($dob);

                if($birth_date > $min)
                {
                  $of_age_trigger = TRUE;
                }
              }
              ?>

              <?php if($of_age_trigger) { ?>
                <p class="text-danger">
                  Sorry, but you must be at least <?=$age_requirement?>
                  years of age by <?php echo date('M j, Y',$con_start_date); ?>
                  to participate in this event.
                </p>
              <?php } else {
                $partyes = (strcmp($participate,'Yes') == 0) ? "checked" : "";
                $partstyle = (strcmp($participate,'Yes') == 0) ? 'block' : 'none';
                ?>
                <label>
                  <input type="checkbox" name="app_master[<?=$i?>][participate]" value="Yes" <?=$partyes?> onchange="toggle(<?=$i?>)" <?=$disabled?> />
                  Apply to this event
                </label>
                <div id="event<?=$i?>_participate" style="display:<?=$partstyle?>">
                  <?php if($type_id == 1) { // Cosplay Game Event ?>
                    <div class="form">
                      <p>Please select up to <?=$app_costume_max?> costumes:</p>
                      <?php
                      for($j = 0; $j < $app_costume_max; $j++) {
                        $app_cos_id = $app_cos[$j];
                        ?>
                        <div class="row form-group <?php echo ab_error_style("app_cos[$j]"); ?>">
                          <?php
                          if($j == 0) {
                            echo form_label('Costume ' . ($j+1) . ' *', "app_master[$i][app_cos][$j]", $required_label);
                          } else {
                            echo form_label('Costume ' . ($j+1), "app_master[$i][app_cos][$j]", $optional_label);
                          }
                          ?>
                          <div class="col-md-5">
                            <select name="app_master[<?=$i?>][app_cos][<?=$j?>]" class="form-control" <?=$disabled?>>
                              <option value="">Select One</option>
                              <?php
                              foreach ($costumes as $cos) {
                                $cos_id = $cos['costume_id'];
                                $cos_name = $cos['costume_name'];

                                $selected = ($cos_id == $app_cos_id) ? 'selected' : '';
                                echo "<option value='$cos_id' $selected>$cos_name</option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  <?php } ?>
                  <?php if($type_id == 2 || $type_id == 3) { // Masquerade Event ?>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][masquerade_event_type_id]"); ?>">
                      <?=form_label('Event *', "app_master[$i][masquerade_event_type_id]", $required_label)?>
                      <div class="col-md-4">
                        <select id="masquerade_event_type_id_<?=$i?>" name="app_master[<?=$i?>][masquerade_event_type_id]" class="form-control" onchange="onMasqApplicationTypeChange(<?=$i?>);">
                          <option value="">Select an Event</option>
                          <?php
                          $options = array(
                              1 => "Performance",
                              2 => "Craftsmanship",
                              3 => "Performance and Craftsmanship",
                              4 => "Exhibition"
                          );

                          /*
                          if($app_id == "" || $app_id == 0)
                          {
                            $options = array(
                                1 => "Performance",
                                3 => "Performance and Craftsmanship",
                                4 => "Exhibition"
                            );
                          }
                          */

                          if($app_id > 0 && ($masquerade_event_type_id == 1 || $masquerade_event_type_id == 4))
                          {
                            $options = array(
                                1 => "Performance",
                                4 => "Exhibition"
                            );
                          }

                          foreach ($options as $key => $value) {
                              $selected = ($masquerade_event_type_id == $key) ? 'selected' : '';
                              echo "<option value='$key' $selected>$value</option>";
                            }
                          ?>
                        </select>
                        <?php echo ab_error_message("app_master[$i][masquerade_event_type_id]"); ?>
                      </div>
                    </div>
                    <?php $parttypestyle = $masquerade_event_type_id > 0 ? 'block' : 'none'; ?>
                    <div id="event_participate_type_select_<?=$i?>" style="display:<?=$parttypestyle?>;">
                      <div class="row form-group <?php echo ab_error_style("app_master[$i][stage_name]"); ?>">
                        <?=form_label('Stage Name', "app_master[$i][stage_name]", $optional_label)?>
                        <div class="col-md-6">
                          <input type="text" name="app_master[<?=$i?>][stage_name]" class="form-control" maxlength="70" value="<?=$stage_name?>" <?=$disabled?>>
                          <?php echo ab_error_message("app_master[$i][stage_name]"); ?>
                        </div>
                      </div>
                      <div class="row form-group <?php echo ab_error_style("app_master[$i][character_name]"); ?>">
                        <?=form_label('Leader Character Name *', "app_master[$i][character_name]", $required_label)?>
                        <div class="col-md-6">
                          <input type="text" name="app_master[<?=$i?>][character_name]" class="form-control" maxlength="70" value="<?=$character_name?>" <?=$disabled?>>
                          <?php echo ab_error_message("app_master[$i][character_name]"); ?>
                        </div>
                      </div>
                      <div class="row form-group <?php echo ab_error_style("app_master[$i][character_series]"); ?>">
                        <?=form_label('Leader Character Series *', "app_master[$i][character_series]", $required_label)?>
                        <div class="col-md-6">
                          <input type="text" name="app_master[<?=$i?>][character_series]" class="form-control" maxlength="70" value="<?=$character_series?>" <?=$disabled?>>
                          <?php echo ab_error_message("app_master[$i][character_series]"); ?>
                        </div>
                      </div>
                      <div class="row form-group masq_perform_<?=$i?> masq_both_<?=$i?> masq_exhibition_<?=$i?> <?php echo ab_error_style("app_master[$i][skit_title]"); ?>">
                        <?=form_label('Skit Title *', "app_master[$i][skit_title]", $required_label)?>
                        <div class="col-md-8">
                          <input type="text" name="app_master[<?=$i?>][skit_title]" class="form-control" maxlength="70" value="<?=$skit_title?>" <?=$disabled?>>
                          <?php echo ab_error_message("app_master[$i][skit_title]"); ?>
                        </div>
                      </div>
                      <div class="row form-group masq_perform_<?=$i?> masq_both_<?=$i?> masq_exhibition_<?=$i?> <?php echo ab_error_style("app_master[$i][skit_description]"); ?>">
                        <?=form_label('Skit Description *', "app_master[$i][skit_description]", $required_label)?>
                        <div class="col-md-8">
                          <textarea name="app_master[<?=$i?>][skit_description]" class="form-control" rows="3" cols="40" <?=$disabled?>><?=$skit_description?></textarea>
                          <?php echo ab_error_message("app_master[$i][skit_description]"); ?>
                        </div>
                      </div>
                      <div class="row form-group masq_perform_<?=$i?> masq_both_<?=$i?> masq_exhibition_<?=$i?> <?php echo ab_error_style("app_master[$i][skit_type]"); ?>">
                        <?=form_label('Skit Type *', "app_master[$i][skit_type]", $required_label)?>
                        <div class="col-md-3">
                          <select name="app_master[<?=$i?>][skit_type]" class="form-control" <?=$disabled?>>
                            <?php
                            $skitoptions = array(
                                '' => 'Select One',
                                'Action' => 'Action',
                                'Comedy' => 'Comedy',
                                'Cross-Over' => 'Cross-Over',
                                'Dance' => 'Dance',
                                'Drama' => 'Drama',
                                'Other' => 'Other',
                                'Parody' => 'Parody'
                            );

                            foreach($skitoptions as $key => $value) {
                              $selected = (strcmp($skit_type,$key) == 0) ? 'selected' : '';
                              echo "<option value='$key' $selected>$value</option>";
                            }
                            ?>
                          </select>
                          <?php echo ab_error_message("app_master[$i][skit_type]"); ?>
                        </div>
                      </div>
                      <div class="row form-group masq_perform_<?=$i?> masq_both_<?=$i?> <?php echo ab_error_style("app_master[$i][craftmanship_judging]"); ?>">
                        <?=form_label('Craftmanship Judging *', "app_master[$i][craftmanship_judging]", $required_label)?>
                        <div class="col-md-3">
                          <select name="app_master[<?=$i?>][craftmanship_judging]" class="form-control" <?=$disabled?>>
                            <?php
                            $craftoptions = array(''=>'Select One','Yes'=>'Yes','No'=>'No');

                            foreach($craftoptions as $key => $value) {
                              $selected = (strcmp($craftmanship_judging,$key) == 0) ? 'selected' : '';
                              echo "<option value='$key' $selected>$value</option>";
                            }
                            ?>
                          </select>
                          <?php echo ab_error_message("app_master[$i][craftmanship_judging]"); ?>
                        </div>
                      </div>
                      <div class="row form-group masq_craft_<?=$i?> <?php echo ab_error_style("app_master[$i][fashion_show]"); ?>">
                        <?=form_label('Fashion Show *', "app_master[$i][fashion_show]", $required_label)?>
                        <div class="col-md-6">
                          <span class="input-subtitle">Do you want to participate in the Fashion Show during the Masquerade?</span><br>
                          <select name="app_master[<?=$i?>][fashion_show]" class="form-control" <?=$disabled?>>
                            <?php
                            $fashoptions = array(''=>'Select One','Yes'=>'Yes','No'=>'No');

                            foreach($fashoptions as $key => $value) {
                              $selected = (strcmp($fashion_show,$key) == 0) ? 'selected' : '';
                              echo "<option value='$key' $selected>$value</option>";
                            }
                            ?>
                          </select>
                          <?php echo ab_error_message("app_master[$i][fashion_show]"); ?>
                        </div>
                      </div>
                      <div class="row form-group masq_craft_<?=$i?> masq_both_<?=$i?> <?php echo ab_error_style("app_master[$i][judging_time]"); ?>">
                        <?=form_label('Judging Time *', "app_master[$i][judging_time]", $required_label)?>
                        <div class="col-md-4">
                          <select name="app_master[<?=$i?>][judging_time]" class="form-control" <?=$disabled?>>
                            <?php
                            $timeoptions = array(
                                '' => 'Select One',
                                'N/A' => 'Not Applicable',
                                'Friday Afternoon' => 'Friday Afternoon',
                                'Friday Evening' => 'Friday Evening',
                                'Friday Night' => 'Friday Night',
                                'Saturday Morning' => 'Saturday Morning',
                                'Saturday Afternoon' => 'Saturday Afternoon'
                            );

                            foreach($timeoptions as $key => $value) {
                              $selected = (strcmp($judging_time,$key) == 0) ? 'selected' : '';
                              echo "<option value='$key' $selected>$value</option>";
                            }
                            ?>
                          </select>
                          <?php echo ab_error_message("app_master[$i][judging_time]"); ?>
                        </div>
                      </div>
                      <div class="row form-group masq_perform_<?=$i?> masq_craft_<?=$i?> masq_both_<?=$i?> <?php echo ab_error_style("app_master[$i][division]"); ?>">
                        <?=form_label('Division *', "app_master[$i][division]", $required_label)?>
                        <div class="col-md-3">
                          <select name="app_master[<?=$i?>][division]" class="form-control" <?=$disabled?>>
                            <?php
                            $divoptions = array(
                                '' => 'Select One',
                                'Youth' => 'Youth',
                                'Novice' => 'Novice',
                                'Intermediate' => 'Intermediate',
                                'Master' => 'Master'
                            );

                            foreach($divoptions as $key => $value) {
                              $selected = (strcmp($division,$key) == 0) ? 'selected' : '';
                              echo "<option value='$key' $selected>$value</option>";
                            }
                            ?>
                          </select>
                          <?php echo ab_error_message("app_master[$i][division]"); ?>
                        </div>
                      </div>
                      <div class="row form-group <?php echo ab_error_style("app_master[$i][dietary_restrictions]"); ?>">
                        <?=form_label('Dietary Restrictions', "app_master[$i][dietary_restrictions]", $optional_label)?>
                        <div class="col-md-8">
                          <input type="checkbox" name="app_master[<?=$i?>][dietary_restrictions]" <?php echo ($dietary_restrictions == "on" ? "checked" : ""); ?>>
                          <?php echo ab_error_message("app_master[$i][dietary_restrictions]"); ?>
                        </div>
                      </div>
                      <div class="row form-group masq_perform_<?=$i?> masq_both_<?=$i?> masq_exhibition_<?=$i?> <?php echo ab_error_style("file[$i]"); ?>">
                        <?=form_label('A/V File', "file[$i]", $optional_label)?>
                        <div class="col-md-8">
                          <span class="input-subtitle">This is to upload a background audio or video file for your performance.</span>
                          <?php
                          if(count($app_files)> 0) {
                            foreach($app_files as $file) {
                              $target_dir = '/files/cosplayhq/masq_files/'.$forum_id.'/';
                              $target_path = $target_dir.$file['file_name'];
                              ?>
                              <p>
                                File Name: <a href="<?=$target_path?>" target="_blank">'<?php echo $file['file_name']; ?></a><br>
                                Size: <?php echo number_format($file['file_size']/1048576,2); ?>MB<br>
                                Uploaded: <?php echo date('m-d-Y',strtotime($file['file_uploaded_timestamp'])); ?>
                              </p>
                            <?php
                            }
                          }
                          ?>
                          <span class="input-subtitle">You may <?php echo (count($app_files) > 0) ? "upload a new" : "replace with a new AV"; ?> file below:</span>
                          <input type="file" name="file[<?=$i?>]" <?=$disabled?>>
                          <span class="input-subtitle">
                            File may not exceed 500MB in size.<br>
                            It is highly advised that large files be uploaded over a wired connection to avoid timeouts.
                          </span>
                          <?php echo ab_error_message("file[$i]"); ?>
                        </div>
                      </div>
                      <div class="row form-group masq_perform_<?=$i?> masq_both_<?=$i?> masq_exhibition_<?=$i?> <?php echo ab_error_style("script[$i]"); ?>">
                        <?=form_label('Script File', "script[$i]", $optional_label)?>
                        <div class="col-md-8">
                          <span class="input-subtitle">This is to upload a script file for your performance.</span>
                          <?php
                          if(count($app_scripts) > 0) {
                            foreach($app_scripts as $script) {
                              $target_dir = '/files/cosplayhq/masq_scripts/'.$forum_id.'/';
                              $target_path = $target_dir.$script['file_name'];
                              ?>
                              <p>
                                File Name: <a href="<?=$target_path?>" target="_blank">'<?php echo $script['file_name']; ?></a><br>
                                Size: <?php echo number_format($script['file_size']/1024,2); ?>KB<br>
                                Uploaded: <?php echo date('m-d-Y',strtotime($script['file_uploaded_timestamp'])); ?>
                              </p>
                            <?php
                            }
                          }
                          ?>
                          <span class="input-subtitle">You may <?php echo (count($app_scripts) > 0) ? "upload" : "replace with"; ?> a new script file below:</span>
                          <input type="file" name="script[<?=$i?>]" <?=$disabled?>>
                          <span class="input-subtitle">File may not exceed 5MB in size.</span>
                          <?php echo ab_error_message("script[$i]"); ?>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  <?php if($type_id == 4) { // Sponsored Cosplay Contest?>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][stage_name]"); ?>">
                      <?=form_label('Stage Name', "app_master[$i][stage_name]", $optional_label)?>
                      <div class="col-md-8">
                        <input type="text" name="app_master[<?=$i?>][stage_name]" class="form-control" maxlength="70" value="<?=$stage_name?>" <?=$disabled?>>
                        <?php echo ab_error_message("app_master[$i][stage_name]"); ?>
                      </div>
                    </div>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][character_name]"); ?>">
                      <?=form_label('Leader Character Name *', "app_master[$i][character_name]", $required_label)?>
                      <div class="col-md-8">
                        <input type="text" name="app_master[<?=$i?>][character_name]" class="form-control" maxlength="70" value="<?=$character_name?>" <?=$disabled?>>
                        <?php echo ab_error_message("app_master[$i][character_name]"); ?>
                      </div>
                    </div>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][character_series]"); ?>">
                      <?=form_label('Leader Character Series *', "app_master[$i][character_series]", $required_label)?>
                      <div class="col-md-8">
                        <input type="text" name="app_master[<?=$i?>][character_series]" class="form-control" maxlength="70" value="<?=$character_series?>" <?=$disabled?>>
                        <?php echo ab_error_message("app_master[$i][character_series]"); ?>
                      </div>
                    </div>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][judging_time]"); ?>">
                      <?=form_label('Judging Time *', "app_master[$i][judging_time]", $required_label)?>
                      <div class="col-md-4">
                        <select name="app_master[<?=$i?>][judging_time]" class="form-control" <?=$disabled?>>
                          <?php
                          $timeoptions = array(
                              '' => 'Select One',
                              'N/A' => 'Not Applicable',
                              'Friday Afternoon' => 'Friday Afternoon',
                              'Friday Evening' => 'Friday Evening',
                              'Friday Night' => 'Friday Night',
                              'Saturday Morning' => 'Saturday Morning',
                              'Saturday Afternoon' => 'Saturday Afternoon'
                          );

                          foreach($timeoptions as $key => $value) {
                            $selected = (strcmp($judging_time,$key) == 0) ? 'selected' : '';
                            echo "<option value='$key' $selected>$value</option>";
                          }
                          ?>
                        </select>
                        <?php echo ab_error_message("app_master[$i][judging_time]"); ?>
                      </div>
                    </div>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][dietary_restrictions]"); ?>">
                      <?=form_label('Dietary Restrictions', "app_master[$i][dietary_restrictions]", $optional_label)?>
                      <div class="col-md-8">
                        <input type="checkbox" name="app_master[<?=$i?>][dietary_restrictions]" <?php echo ($dietary_restrictions == "on" ? "checked" : ""); ?>>
                        <?php echo ab_error_message("app_master[$i][dietary_restrictions]"); ?>
                      </div>
                    </div>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][fashion_show]"); ?>">
                      <?=form_label('Fashion Show *', "app_master[$i][fashion_show]", $required_label)?>
                      <div class="col-md-6">
                        <span class="input-subtitle">Do you want to participate in the Fashion Show during the Masquerade?</span><br>
                        <select name="app_master[<?=$i?>][fashion_show]" class="form-control" <?=$disabled?>>
                          <?php
                          $fashoptions = array(''=>'Select One','Yes'=>'Yes','No'=>'No');

                          foreach($fashoptions as $key => $value) {
                            $selected = (strcmp($fashion_show,$key) == 0) ? 'selected' : '';
                            echo "<option value='$key' $selected>$value</option>";
                          }
                          ?>
                        </select>
                        <?php echo ab_error_message("app_master[$i][fashion_show]"); ?>
                      </div>
                    </div>
                  <?php } else if($type_id == 5) { // Idol Showcase ?>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][stage_name]"); ?>">
                      <?=form_label('Stage Name', "app_master[$i][stage_name]", $optional_label)?>
                      <div class="col-md-6">
                        <input type="text" name="app_master[<?=$i?>][stage_name]" class="form-control" maxlength="70" value="<?=$stage_name?>" <?=$disabled?>>
                        <?php echo ab_error_message("app_master[$i][stage_name]"); ?>
                      </div>
                    </div>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][character_name]"); ?>">
                      <?=form_label('Leader Character Name *', "app_master[$i][character_name]", $required_label)?>
                      <div class="col-md-6">
                        <input type="text" name="app_master[<?=$i?>][character_name]" class="form-control" maxlength="70" value="<?=$character_name?>" <?=$disabled?>>
                        <?php echo ab_error_message("app_master[$i][character_name]"); ?>
                      </div>
                    </div>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][character_series]"); ?>">
                      <?=form_label('Leader Character Series *', "app_master[$i][character_series]", $required_label)?>
                      <div class="col-md-6">
                        <input type="text" name="app_master[<?=$i?>][character_series]" class="form-control" maxlength="70" value="<?=$character_series?>" <?=$disabled?>>
                        <?php echo ab_error_message("app_master[$i][character_series]"); ?>
                      </div>
                    </div>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][skit_title]"); ?>">
                      <?=form_label('Performance Title ', "app_master[$i][skit_title]", $required_label)?>
                      <div class="col-md-8">
                        <input type="text" name="app_master[<?=$i?>][skit_title]" class="form-control" maxlength="70" value="<?=$skit_title?>" <?=$disabled?>>
                        <?php echo ab_error_message("app_master[$i][skit_title]"); ?>
                      </div>
                    </div>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][skit_description]"); ?>">
                      <?=form_label('Performance Description *', "app_master[$i][skit_description]", $required_label)?>
                      <div class="col-md-8">
                        <textarea name="app_master[<?=$i?>][skit_description]" class="form-control" rows="3" cols="40" <?=$disabled?>><?=$skit_description?></textarea>
                        <?php echo ab_error_message("app_master[$i][skit_description]"); ?>
                      </div>
                    </div>
                    <div class="row form-group masq_perform_<?=$i?> masq_both_<?=$i?> masq_exhibition_<?=$i?> <?php echo ab_error_style("file[$i]"); ?>">
                      <?=form_label('A/V File', "file[$i]", $optional_label)?>
                      <div class="col-md-8">
                        <span class="input-subtitle">This is to upload a background audio or video file for your performance.</span>
                        <?php
                        if(count($app_files)> 0) {
                          foreach($app_files as $file) {
                            $target_dir = '/files/cosplayhq/masq_files/'.$forum_id.'/';
                            $target_path = $target_dir.$file['file_name'];
                            ?>
                            <p>
                              File Name: <a href="<?=$target_path?>" target="_blank">'<?php echo $file['file_name']; ?></a><br>
                              Size: <?php echo number_format($file['file_size']/1048576,2); ?>MB<br>
                              Uploaded: <?php echo date('m-d-Y',strtotime($file['file_uploaded_timestamp'])); ?>
                            </p>
                          <?php
                          }
                        }
                        ?>
                        <span class="input-subtitle">You may <?php echo (count($app_files) > 0) ? "upload a new" : "replace with a new AV"; ?> file below:</span>
                        <input type="file" name="file[<?=$i?>]" <?=$disabled?>>
                        <span class="input-subtitle">
                          File may not exceed 500MB in size.<br>
                          It is highly advised that large files be uploaded over a wired connection to avoid timeouts.
                        </span>
                        <?php echo ab_error_message("file[$i]"); ?>
                      </div>
                    </div>
                  <?php } ?>
                  <?php if($group_members_max > 0) { ?>
                    <div class="row form-group <?php echo ab_error_style("group_members"); ?>">
                      <?=form_label('Additional Group Members', 'group_members', $optional_label)?>
                      <div class="col-md-8 form-inline">
                        <span class="input-subtitle">How many <em>other</em> members of the group will there be?</span><br>
                        <?php if($type_id == 1) { // Cosplay Games Event ?>
                          <span class="input-subtitle">Each group member should submit their own application for this event. Please list them below however, to be marked together.</span><br>
                        <?php } else { ?>
                          <span class="input-subtitle">Only submit this application for your group for this event.</span><br>
                        <?php } ?>

                        <select name="app_master[<?=$i?>][group_members]" class="form-control" onchange="show(<?=$i?>)" <?=$disabled?>>
                          <?php
                          $membersoptions = array();
                          for($z= 0; $z <= $group_members_max; $z++) {
                            $membersoptions[$z] = $z;
                          }

                          foreach($membersoptions as $key => $value) {
                            $selected = ($group_members == $key) ? 'selected' : '';
                            echo "<option value='$key' $selected>$value</option>";
                          }
                          ?>
                        </select>
                        <?php echo ab_error_message("group_members"); ?>
                      </div>
                    </div>
                    <?php
                    for($y = 0; $y < $group_members_max; $y++) {
                      $displaystyle = ($y < $group_members) ? 'block' : 'none';
                      ?>
                      <div id="app_master<?=$i?>_member<?=($y+1)?>" class="row form-group" style="display:<?=$displaystyle?>;">
                        <div class="col-xs-12"><hr></div>
                        <?=form_label('Member ' . ($y+1) . ' *', '', $required_label)?>
                        <div class="col-md-8">
                          <div class="form-inline <?php echo ab_error_style("app_master[$i][member_first_name][$y]"); ?>">
                            <label class="required">First Name</label>
                            <input type="text" name="app_master[<?=$i?>][member_first_name][<?=$y?>]" class="form-control" maxlength="70" value="<?=$member_first_name[$y]?>" <?=$disabled?>>
                            <?php echo ab_error_message("app_master[$i][member_first_name][$y]"); ?>
                          </div>
                          <div class="form-inline <?php echo ab_error_style("app_master[$i][member_last_name][$y]"); ?>">
                            <label class="required">Last Name</label>
                            <input type="text" name="app_master[<?=$i?>][member_last_name][<?=$y?>]" class="form-control" maxlength="70" value="<?=$member_last_name[$y]?>" <?=$disabled?>>
                            <?php echo ab_error_message("app_master[$i][member_last_name][$y]"); ?>
                          </div>
                          <div class="form-inline <?php echo ab_error_style("app_master[$i][member_stage_name][$y]"); ?>">
                            <label>Stage Name</label>
                            <input type="text" name="app_master[<?=$i?>][member_stage_name][<?=$y?>]" class="form-control" maxlength="70" value="<?=$member_stage_name[$y]?>" <?=$disabled?>>
                            <?php echo ab_error_message("app_master[$i][member_stage_name][$y]"); ?>
                          </div>
                          <div class="form-inline <?php echo ab_error_style("app_master[$i][member_character][$y]"); ?>">
                            <label class="required">Character Name</label>
                            <input type="text" name="app_master[<?=$i?>][member_character][<?=$y?>]" class="form-control" maxlength="70" value="<?=$member_character[$y]?>" <?=$disabled?>>
                            <?php echo ab_error_message("app_master[$i][member_character][$y]"); ?>
                          </div>
                          <div class="form-inline <?php echo ab_error_style("app_master[$i][member_series][$y]"); ?>">
                            <label class="required">Series</label>
                            <input type="text" name="app_master[<?=$i?>][member_series][<?=$y?>]" class="form-control" maxlength="70" value="<?=$member_series[$y]?>" <?=$disabled?>>
                            <?php echo ab_error_message("app_master[$i][member_series][$y]"); ?>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  <?php } ?>
                  <?php if(strcmp($question_status, 'On') == 0) { ?>
                    <div class="row form-group <?php echo ab_error_style("app_master[$i][question_answer]"); ?>">
                      <?=form_label('Other Info', "app_master[$i][question_answer]", $required_label)?>
                      <div class="col-md-8">
                        <span class="input-subtitle"><?=$question?></span>
                        <textarea name="app_master[<?=$i?>][question_answer]" class="form-control" rows="4" cols="40" <?=$disabled?>><?=$question_answer?></textarea>
                        <?php echo ab_error_message("app_master[$i][question_answer]"); ?>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          <?php } ?>
          <div class="cosplayhq-application">
            <?php $rulesyes = (strcmp($rules,'Yes') == 0) ? "checked" : ""; ?>
            <h2>RULES</h2>
            <p class="required">
              <label>
                <input name="rules" value="Yes" type="checkbox" <?=$rulesyes?>>
                I have read and agree to abide by all rules, directions, and polices of Anime Boston and the Anime Boston Cosplay Events as linked from the
                <a href="/cosplay/" target="_blank">Cosplay page</a>.
              </label>
              <?php echo ab_error_message("rules"); ?>
            </p>
          </div>
          <div class="submit-buttons">
            <input type="submit" name="submit" class="btn btn-success" value="Submit Applications">
          </div>
        </form>
      <?php } ?>
    </div>
  </div>
</div>
