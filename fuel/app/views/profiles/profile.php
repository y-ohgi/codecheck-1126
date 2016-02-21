
  <div>
    <ul>
      <li><?php echo Html::img($prof['imagepath']?$prof['imagepath']:'images/gachaball.jpg', array('style'=>'max-width:300px'));?></li>
	<!-- <li><img style="max-width:180px;" src="<?php echo $prof['imagepath']?$prof['imagepath']:DOCROOT.'images/gachaball.jpg'?>" /></li> -->
      <li><?php echo $prof['id'] ?></li>
      <li><?php echo $prof['url'] ?></li>
      <li><?php echo $prof['title'] ?></li>
      <li><?php echo $prof['description'] ?></li>
      <li><?php echo $prof['imagepath'] ?></li>
    </ul>
    
  </div>

