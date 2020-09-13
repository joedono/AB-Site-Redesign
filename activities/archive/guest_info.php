<?php $con_year = $guest['con_year']; ?>
<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/guests/">Guests</a></li>
  <li><a href="/guests/guest_listing/<?=$con_year?>"><?=$con_year?> Guest Listing</a></li>
  <li>Guest Info</li>
</ul>

<?php
$guest_id = $guest['guest_id'];
$name = $guest['name'];
$job_title = $guest['job_title'];
$body = html_entity_decode($guest['body']);

$pictures = array();
if(count($photos) > 0)
{
  foreach($photos as $row)
  {
    $file_name = $row['file_name'];
    $alt = $row['alt'];

    $pic_path = base_url() . "images/guests/$con_year/$guest_id/$file_name";
    $pic = array('pic_path' => $pic_path, 'alt' => $alt);

    $pictures[] = $pic;
  }
}
?>

<script type="text/javascript">
  function changeImgSrc(file_path, alt_text)
  {
      var img = eval((navigator.appName.indexOf('Netscape', 0) != -1) ? 'document.main_pic' : 'document.all.main_pic');
      if(img) {
          img.alt = alt_text;
          img.src = file_path;
      }
  }
</script>

<div class="page-body clearfix">
  <h1>Guest Info</h1>

  <h2><?=$name?></h2>
  <i><?=$job_title?></i>

  <?php if(isset($pictures[0])) { ?>
    <div align="center"><img src="<?=$pictures[0]['pic_path']?>" class="img-responsive" name="main_pic" alt="<?=$pictures[0]['alt']?>"></div>
  <?php } ?>

  <div class="media">
    <div class="media-left">
      <?php foreach($pictures as $item)
      {
        $file_name = $item['pic_path'];
        $alt = $item['alt'];
      ?>
        <a href="javascript:changeImgSrc('<?=$file_name?>', '<?=$alt?>');">
          <img src="<?=$file_name?>" alt="<?=$alt?>" class="img-thumbnail media-object" width="125px">
        </a>
      <?php } ?>
    </div>
    <div class="media-body"><?=$body?></div>
  </div>
</div>