<?php require_once 'header.php'; ?>
<?php
  require_once 'Model/VideoModel.php';
  require_once 'Objects/Video.php';

  $videoModel = new VideoModel();

 ?>

 <style media="screen">
 html, body{
     background-image: url(img/textura.JPG);
     background-size: 100% 100%;
 }
 </style>


<section id="wrap_galerias" class="fu">
    <h2>Galería de Videos</h2>
    <?php foreach ($videoModel->getAll() as $video): ?>
        <a class="fancybox-media" href="https://www.youtube.com/watch?v=<?php echo $video->Url ?>">
            <img src="https://i.ytimg.com/vi/<?php echo $video->Url ?>/mqdefault.jpg" alt="" />
        </a>
      <?php endforeach; ?>
</section>

<script type="text/javascript">

$('.fancybox-media').fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    helpers : {
        media : {}
    }
});

</script>


<?php require_once 'footer.php'; ?>
