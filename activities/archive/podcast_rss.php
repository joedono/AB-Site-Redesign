<?php echo @header("Content-Type: text/xml"); ?>
<?php echo '<?xml version="1.0" encoding="iso-8859-1"?>'; ?>
<?php echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd">'; ?>

<channel>

<title><?=$feed_name?></title>
<link><?=$feed_url?></link>
<description><?=$page_description?></description>
<language><?=$page_language?></language>
<category><?=$category?></category>
<atom:link href="http://www.animeboston.com/media/concast_rss/" rel="self" type="application/rss+xml" />

<itunes:author>Anime Boston</itunes:author>
<itunes:subtitle><?=$feed_subtitle?></itunes:subtitle>
<itunes:image href="http://www.animeboston.com/images/media/podcast/ABConcast_Thumbnail_Large.png" />
<itunes:keywords>anime, manga, convention, cosplay</itunes:keywords>
<itunes:explicit>no</itunes:explicit>

<itunes:category text="Arts">
  <itunes:category text="Visual Arts" />
</itunes:category>
<itunes:category text="Games &amp; Hobbies">
  <itunes:category text="Other Games" />
  <itunes:category text="Video Games" />
</itunes:category>
<itunes:category text="TV &amp; Film"></itunes:category>

<?php
if(count($podcasts) > 0)
{
  $base_dir = 'http://www.animeboston.com/files/media/podcast/';

  foreach($podcasts as $row)
  {
    $podcast_id = $row['podcast_id'];
    $podcast_episode = $row['podcast_episode'];
    $podcast_title = $row['podcast_title'];
    $podcast_description = $row['podcast_description'];

    $publish_date = strtotime($row['publish_date']);
    $podcast_length = $row['podcast_length'];
    $con_year = $row['con_year'];

    $podcast_title = html_entity_decode($podcast_title);
    $podcast_title = strip_tags($podcast_title);
    $podcast_title = htmlspecialchars($podcast_title,ENT_NOQUOTES,'ISO-8859-1',FALSE);

    $podcast_description = html_entity_decode($podcast_description);
    $podcast_description = strip_tags($podcast_description);
    $podcast_description = htmlspecialchars($podcast_description,ENT_NOQUOTES,'ISO-8859-1',FALSE);

    $podcast_url = $file_name = $base_dir . 'anime_boston_concast_ep' . $podcast_episode . '.mp3';

    echo "<item>";
    echo "<title>ABC - $podcast_title</title>";
    echo "<description>$podcast_description</description>";
    echo "<pubDate>" . date(DATE_RSS, $publish_date) . "</pubDate>";
    echo '<enclosure url="' . $podcast_url . '" length="' . $podcast_length . '" type="audio/mpeg"/>';
    echo "<itunes:description>$podcast_description</itunes:description>";
    echo "<itunes:summary>$podcast_description</itunes:summary>";
    echo "<itunes:subtitle>$podcast_description</itunes:subtitle>";
    echo "<guid>$podcast_url</guid>";
    echo "</item>";
  }
}
?>
</channel>
</rss> 