<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/staff/">Staff</a></li>
  <li>Staff Listing</li>
</ul>

<div class="page-body clearfix">
  <h1>Staff Listing</h1>

  <p>
    This is the staff listing for Anime Boston <?=$currentyear?>.
    Hovering over a position will show a brief description for it.
    You may click on the Details link to see more information about a position.
    If there are openings for a staff position, you will find a link to apply to it.
  </p>

  <?php
   echo '<h2>Executive Committee</h2>';
   child_print($execs, $assignments, 0);
   echo '<br><br>';
   echo '<h2>Division Staffers</h2>';
   child_print($positions, $assignments, 1);
   echo '<br><br>';
   echo '<h2>New England Anime Society</h2>';
   child_print($neas, $assignments, 0);
  ?>
</div>
