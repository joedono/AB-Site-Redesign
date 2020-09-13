<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/staff/">Staff</a></li>
  <li><a href="/staff/staff_listing/">Staff Listing</a></li>
  <li>Staff Position Details</li>
</ul>

<div class="page-body clearfix">
  <h1>Staff Position Details</h1>

  <?php
  $title = $position['position_name'];
  $full_description = $position['full_description'];

  echo '<p><b>' .$title. '</b></p>';
  echo $full_description;
  ?>

  <p>
    All staff members are also required to adhere to the
    <a href="/staff/staff_guidelines/">Staff Guidelines</a>.
  </p>
</div>