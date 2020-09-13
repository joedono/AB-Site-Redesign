<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/staff/">Staff</a></li>
  <li><a href="/staffhq/">Staff HQ</a></li>
  <li>My History</li>
</ul>

<div class="page-body clearfix">
  <h1>My History</h1>

  <div class="staffhq">
    <div class="staffhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('staffhq_menu.php'); ?>
    </div>
    <div class="staffhq-content col-lg-9 col-md-8 col-sm-8">
      <p>
        Below you will your participation history for previous Anime Boston conventions.
        Information for Anime Boston 2003-2009 will be added in the future.
        If you find your information is not accurate, please
        <a href="http://www.animeboston.com/coninfo/contact/68">contact the Webmaster</a>.
      </p>

      <?php
      if(count($assignments) > 0)
      {
        $currentPositionId = 0;

        foreach($assignments as $row)
        {
          $position_id = $row['position_id'];
          $position_name = $row['position_name'];
          $con_year = $row['con_year'];
          $division_name = $row['division_name'];

          if($currentPositionId != $position_id)
          {
            if($currentPositionId != 0)
            {
              echo '<br />';
            }

            $currentPositionId = $position_id;
            echo '<strong>' . $position_name . '</strong><br />';
            echo $division_name. ' Division<br />';
          }

          echo $con_year . '<br />';
        }
      }
      else
      {
        echo 'You have no previous Anime Boston staff assignments.';
      }
      ?>
    </div>
  </div>
</div>