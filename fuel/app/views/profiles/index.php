<div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 20}'>

  <?php foreach($profiles as $prof): ?>
    <div class="item grid-item" style="width:200px">
      <a href="profiles/<?php echo $prof['id']?>" >
	<ul>
	  <li><img style="max-width:180px;" class=".profthum" src="<?php echo $prof['imagepath']?$prof['imagepath']:'./images/gachaball.jpg'?>" /></li>
	  <li><?php echo $prof['id'] ?></li>
	  <li><?php echo $prof['url'] ?></li>
	  <li><?php echo $prof['title'] ?></li>
	  <li><?php echo $prof['description'] ?></li>
	  <li><?php echo $prof['imagepath'] ?></li>
	</ul>
      </a>
    </div>
  <?php endforeach; ?>
</div>
