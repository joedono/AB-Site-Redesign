<?php
$show_list = count($podcast) > 1;
$show_episode = count($podcast) == 1;
$base_dir = 'files/media/podcast/';

if($show_episode)
{
  foreach($podcast as $row)
  {
    $podcast_id = $row['podcast_id'];
    $podcast_episode = $row['podcast_episode'];
    $podcast_title = $row['podcast_title'];
    $podcast_description = $row['podcast_description'];
    $publish_date = $row['publish_date'];

    $file_name = $base_dir . 'anime_boston_concast_ep' . $podcast_episode . '.mp3';
  }
}
?>
<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/media/">Media</a></li>
  <?php if($show_episode) { ?>
    <li><a href="/media/concast/">AB Concast</a></li>
    <li>Episode <?php echo $podcast_episode;?></li>
  <?php } else { ?>
    <li>AB Concast</li>
  <?php } ?>
</ul>

<div class="page-body clearfix">
  <h1>AB Concast <?php if($show_episode) echo "Episode $podcast_episode"; ?></h1>

  <?php if($show_episode) { ?>
    <script type="text/javascript" src="/scripts/vendor/jwplayer.js"></script>

    <p>
      <b>Ep <?=$podcast_episode?>: <?=$podcast_title?></b><br>
      <span class="input-subtitle">Published: <?=date('m-d-Y', strtotime($publish_date))?></span>
    </p>
    <p><?=$podcast_description?></p>
    <div id="container">Loading the player...</div>
    <script type="text/javascript">
      jwplayer("container").setup({
        'flashplayer': '/files/player.swf',
        'file': '<?=$file_name?>',
        'width': '300',
        'height': '120',
        'volume': '100',
        'controlbar': 'bottom',
        'provider': 'sound',
        'image': '/images/media/podcast/ABConcast_Banner.png'
      });
    </script>
    <br>
    <a href="<?=$file_name?>" class="btn btn-primary">Direct Download File</a>
  <?php } else if($show_list) { ?>
    <p>Welcome to our new podcast, ABC: Anime Boston Concast. This podcast is produced by the staff members of Anime Boston. We'll cover the latest convention news and developments, as well as discussions about anime, manga, and fandom.</p>

    <p>Please select an episode below to stream or download.</p>
    <div class="row">
      <div class="col-md-6 col-md-push-6">
        <img class="img-responsive" src="/images/media/podcast/ABConcast_Thumbnail_Large.png" alt="Concast Logo">
        <p>
          <a href="https://itunes.apple.com/us/podcast/abc-anime-boston-concast/id704938404" target="_blank">
            <img src="/images/media/podcast/ABConcast_iTunes.png" style="vertical-align:middle">
            Subscribe on iTunes
          </a>
          <br>
          <a href="/media/concast_rss/">
            <img src="/images/media/podcast/rss_icon.png" style="vertical-align:middle">
            Follow on RSS Feed
          </a>
        </p>
      </div>
      <div class="col-md-6 col-md-pull-6">
        <?php
        foreach($podcast as $row)
        {
          $podcast_id = $row['podcast_id'];
          $podcast_episode = $row['podcast_episode'];
          $podcast_title = $row['podcast_title'];
          $publish_date = $row['publish_date'];

          $file_name = $base_dir.'anime_boston_concast_ep'.$podcast_episode.'.mp3';

          //Checks that the actual .mp3 file is on the server before showing the episode link
          if(file_exists($file_name))
          {
            echo "<p><a href='/media/concast/$podcast_id'>Episode $podcast_episode: $podcast_title</a>";
            echo '<br><span class="input-subtitle">Published: '.date('m-d-Y',strtotime($publish_date)).'</span></p>';
          }
        }
        ?>
      </div>
    </div>
  <?php } else { ?>
    <p>Welcome to the new Anime Boston podcast, the Concast.</p>
    <p>Sorry, but there are currently no podcasts available.</p>
  <?php } ?>
</div>