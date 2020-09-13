<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/manga/">Manga Library</a></li>
</ul>

<?php include(APPPATH.'views/includes/scripts_datatables.php'); ?>
<script type="text/javascript">$(function() { initDataTable("#admin-table"); });</script>

<div class="page-body clearfix">
  <h1>The Todd MacDonald Memorial Manga Library</h1>


  <p>Todd MacDonald was a dedicated Anime Boston staffer from 2003-2009 who loved to read as much as he loved anime. We have named the Manga Library in his honor as a way of saying thank you to him for all that he has done for our convention.</p>
  <p>When you need a quiet place to read, or to take a break from the convention hustle, the Manga Library is the perfect escape. With over 2400 titles and comfy bean bags, you’re sure to find a new favorite, or revisit an old friend.<p>
  <p>The Manga Library is located in the Fairfax Room on the 3rd floor of the Sheraton</p>
  <p>Hours:<br>
  Friday: 10:00am–12:00am<br>
  Saturday: 9:00am–12:00am<br>
  Sunday: 9:00am–2:00pm<br></p>

  <p>This is the current listing for manga included in Anime Boston's Manga Library:</p>

  <?php if (count($manga) > 0) { ?>
    <table id="admin-table" class="admin-table table table-striped table-bordered">
      <thead>
        <tr>
          <th>Title</th>
          <th>Volume</th>
          <th>Artist</th>
          <th>Author</th>
          <th>Genre(s)</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($manga as $row)
        {
          $title = $row['title'];
          $volume = $row['volume'];
          $author = $row['author'];
          $artist = $row['artist'];
          $genres = $row['genres'];
          ?>
          <tr>
            <td><?=$title?></td>
            <td><?=$volume?></td>
            <td><?=$author?></td>
            <td><?=$artist?></td>
            <td><?=$genres?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } ?>
</div>
