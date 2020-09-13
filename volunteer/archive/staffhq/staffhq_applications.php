<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/staff/">Staff</a></li>
  <li><a href="/staffhq/">Staff HQ</a></li>
  <li>Staff Applications</li>
</ul>

<div class="page-body clearfix">
  <h1>Staff Applications</h1>

  <div class="staffhq">
    <div class="staffhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('staffhq_menu.php'); ?>
    </div>
    <div class="staffhq-content col-lg-9 col-md-8 col-sm-8">
      <?php if($easter) { ?>
        <p class="bg-danger" style="padding: 5px;">
          <strong>WARNING</strong>: Anime Boston <?=$currentyear?> occurs on Easter.
          If your religious or family obligations will impact your ability to perform your staff duties,
          we encourage you to try again in the future. Unfortunately, the dates of Anime Boston are booked out years in advance and often fall on a holiday or holiday weekend.
        </p>
      <?php } ?>
      <p>Below you will find any existing applications you have for this convention year. You may create a new application for each position you would like to apply to.</p>
      <p>Please be aware that it may take several weeks to hear back regarding your application. Each Division processes their applications in a different pace, so time will vary.</p>
      <?php foreach($applications as $application) { ?>
        <h2><?=$application['position_name']?></h2>
        <div class="row">
          <div class="col-sm-9">
            <span class="text-danger">
              Application Submitted: <?php echo date('n-j-y, g:i A', strtotime($application['submitted_timestamp'])); ?>
            </span><br>
            <b>Application Status:</b>
            <?php
            $application_status = $application['application_status'];

            if(strcmp($application_status,'Undecided') == 0)
            {
              echo 'Pending Review';
            }
            else if(strcmp($application_status,'Approved') == 0)
            {
              echo 'Approved';
            }
            else if(strcmp($application_status,'Waitlisted') == 0)
            {
              echo 'Waitlisted';
            }
            else if(strcmp($application_status,'Denied') == 0)
            {
              echo 'Denied';
            }
            else if(strcmp($application_status,'Canceled') == 0)
            {
              echo 'Canceled';
            }

            if(strcmp($application_status,'Undecided') != 0)
            {
              echo '<br><b>Status Updated: </b>'.date('m-d-Y, h:m:s A', strtotime($application['status_timestamp']));
            }
            ?>
            <br><b>Description:</b> <?=$application['brief_description']?>
          </div>
          <?php if(strcmp($application_status, 'Undecided') == 0) { ?>
            <div class="action-buttons col-sm-3">
              <a class="btn btn-default" href="/staffhq/application/<?=$application["application_id"]?>">Edit</a>
              <form action="/staffhq/application_cancel/" method="post">
                <input type="hidden" name="application_id" value="<?=$application["application_id"]?>">
                <input type="submit" class="btn btn-danger" value="Cancel">
              </form>
            </div>
          <?php } ?>
        </div>
        <hr>
      <?php } ?>
      <a class="btn btn-primary pull-right" href="/staffhq/application">New Application</a>
    </div>
  </div>
</div>