<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/programming/">Programming</a></li>
  <li>Anime Music Video Contest - Upload</li>
</ul>

<div class="page-body clearfix">
  <h1>Anime Music Video Contest - Upload</h1>

  <p>Entry Num: <?=$entry_num?></p>
  <p>
    This is the upload section for the <?=$currentyear?> AMV Contest.
    You will be able to electronically submit your AMV submissions via a file upload process.
    To do this, you must have already submitted your contest information via the <a href="/forms/amv/">AMV Contest Form</a>.
    If you have not, you will not be able to upload your file.
  </p>
  <p>
    If any of your AMV information needs to be changed, please contact the
    <a href="/coninfo/contact/42" target="_blank">AMV Contest Coordinator</a>.
  </p>
  <hr>

  <?php amv_confirmation(); ?>

  <?php
  $entry_num = $amv['entry_num'];
  $primary_first_name = $amv['primary_first_name'];
  $primary_last_name = $amv['primary_last_name'];
  $other_contestants = $amv['other_contestants'];
  $email = $amv['email'];
  $proxy_first = $amv['proxy_first'];
  $proxy_last = $amv['proxy_last'];
  $staff_check = $amv['staff_check'];
  $submission_style = $amv['submission_style'];
  $submitted_timestamp = $amv['submitted_timestamp'];
  $con_year = $amv['con_year'];

  $amv_id = array();
  $amv_title = array();
  $amv_song = array();
  $amv_artist = array();
  $amv_sources = array();
  $amv_credits = array();
  $amv_date = array();
  $amv_category = array();
  $upload_status = array();
  $upload_timestamp = array();
  $file_checksum = array();
  $file_name = array();

  $amv_total = count($amv_files);

  foreach($amv_files as $row)
  {
    $amv_id[] = $row['amv_id'];
    $amv_title[] = $row['amv_title'];
    $amv_song[] = $row['amv_song'];
    $amv_artist[] = $row['amv_artist'];
    $amv_sources[] = $row['amv_sources'];
    $amv_credits[] = $row['amv_credits'];
    $amv_date[] = $row['amv_date'];
    $amv_category[] = $row['amv_category'];
    $upload_status[] = $row['upload_status'];
    $uploaded_timestamp[] = $row['uploaded_timestamp'];
    $file_checksum[] = $row['file_checksum'];
    $file_name_original[] = $row['file_name_original'];
  }
  ?>

  <p>Here is a summary of your previously entered information:</p>

  <div class="row">
    <div class="col-sm-8 col-xs-12">
      <div class="table-responsive">
        <table class="table table-condensed table-bordered">
          <tr>
            <th>First Name:</th>
            <td><?=$primary_first_name?></td>
          </tr>
          <tr>
            <th>Last Name:</th>
            <td><?=$primary_last_name?></td>
          </tr>
          <tr>
            <th>Other Contestants:</th>
            <td>
              <?php 
              $contestants = explode(';',$other_contestants);
              if(count($contestants) > 0)
              {
                for($i = 0; $i < count($contestants); $i++)
                {
                  echo '-' .trim($contestants[$i]);
                  echo '<br>';
                }
              }
              ?>
            </td>
          </tr>		
          <tr>
            <th>Email:</th>
            <td><?=$email?></td>
          </tr>
          <tr>
            <th>Preferred Submission Method:</th>
            <td><?=$submission_style?></td>
          </tr>
          <tr>
            <th>Is AB/NEAS Staff:</th>
            <td><?=$staff_check?></td>
          </tr>	
          <tr>
            <th>Proxy:</th>
            <td><?=$proxy_first . ' ' . $proxy_last?></td>
          </tr>
          <tr>
            <th>Submitted Time:</th>
            <td><?php echo date('m-d-y',strtotime($submitted_timestamp)). ', ' .date('H:i:s',strtotime($submitted_timestamp)); ?></td>
          </tr>
          <tr>
            <th>Convention Year:</th>
            <td><?=$con_year?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <p>These are the AMVs you have entered:</p>

  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-condensed table-bordered">
          <tr>
            <th>AMVs:</th>
            <td>Total AMVs: <?=$amv_total?></td>
          </tr>
          <?php for($i = 0; $i < $amv_total; $i++) { ?>
          <tr>
            <th>AMV <?=($i+1)?>:</th>
            <td>
              <u>Title</u>: <?=$amv_title[$i]?><br>
              <u>Song(s)</u>: <?=$amv_song[$i]?><br>
              <u>Artist(s)</u>: <?=$amv_artist[$i]?><br>
              <u>Footage Sources</u>:<br>
              <?php
              $sources = explode(';',$amv_sources[$i]);
              foreach($sources as $source)
              {
                if($source != '')
                {
                  echo '&nbsp;&nbsp;-' .trim($source);
                  echo '<br>';
                }
              }
              ?>
              <label>Date Completed:</label> <?php echo date('m-d-y',strtotime($amv_date[$i])); ?><br>
              <label>Category:</label> <?=$amv_category[$i]?><br>
              <label>Credited Name:</label> <?=$amv_credits[$i]?><br>
              <label>Upload Status:</label> <b><?=$upload_status[$i]?></b>

              <?php if(strcmp($upload_status[$i],'Completed') == 0) { ?>
                <br>
                <label>File:</label> <?=$file_name_original[$i]?><br>
                <label>Uploaded At:</label> <?php echo date('m/d/Y',strtotime($uploaded_timestamp[$i])). ' at ' .date('g:i A',strtotime($uploaded_timestamp[$i])); ?><br>
                <label>MD5 Checksum:</label> <?=$file_checksum[$i]?>
                <span class="input-subtitle"><a href="/programming/amv_contest_faq/#19" target="_new">(info)</a></span>
                <form action="/forms/amv_upload/" method="post">
                  <input type="hidden" name="amv_id" value="<?=$amv_id[$i]?>">
                  <input type="hidden" name="action" value="delete">
                  <input type="submit" class="btn btn-danger" value="Delete AMV File">
                </form>
              <?php } ?>

              <?php if(strcmp($upload_status[$i],'Open') == 0) { ?>
                <br>
                <form action="/forms/amv_upload/" method="post">
                  <input type="hidden" name="amv_id" value="<?=$amv_id[$i]?>">
                  <input type="hidden" name="action" value="upload">
                  <input type="submit" class="btn btn-primary" value="Upload AMV">
                </form>
              <?php } ?>
            </td>
          <tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>

  <p>If you have any questions or problems, please contact the <a href="/coninfo/contact/42" target="_blank">AMV Contest Coordinator</a>.</p>
</div>