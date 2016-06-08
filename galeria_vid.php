<?php require_once 'header.php'; ?>
<?php
  require_once 'Model/VideoModel.php';
  require_once 'Objects/Video.php';

  $videoModel = new VideoModel();

 ?>

 <?php foreach ($videoModel->getAll() as $video): ?>

   <?php echo $video->Url?>
   <iframe width="100%" height="100%"
    src="<?php echo $video->Url ?>"  frameborder="0" allowfullscreen>
  </iframe>



  <?php
  $url = $video->Url;

  $vidArray = explode('/', $url);
  $size = count($vidArray) - 1;
  $vidID = $vidArray[$size];

  // $thumb_default = file_get_contents("http://img.youtube.com/vi/$vidID/default.jpg");
  //
  // $thumb1 = file_get_contents("http://img.youtube.com/vi/$vidID/0.jpg");
  // $thumb2 = file_get_contents("http://img.youtube.com/vi/$vidID/1.jpg");
  // $thumb3 = file_get_contents("http://img.youtube.com/vi/$vidID/2.jpg");
  // $thumb4 = file_get_contents("http://img.youtube.com/vi/$vidID/3.jpg");
  echo "<img src='http://img.youtube.com/vi/$vidID/default.jpg' alt='' />";

  ?>



 <?php endforeach; ?>
<?php require_once 'footer.php'; ?>
