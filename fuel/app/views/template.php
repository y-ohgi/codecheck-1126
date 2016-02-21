<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <?php echo Asset::js('masonry.pkgd.min.js'); ?>
    <?php echo Asset::css('common.css'); ?>

    
     <title><?php echo $title?$title:"ポートフォリオアプリ"; ?></title>
  </head>
  <body>
    <div class="container row">

      <header>
     <a href="/">topへ</a>
     <hr/>

      </header>

      <main>
	<?php echo $content; ?>
      </main>

      <footer>
     <hr/>

     <ul>
     <li>作成: profiles/create</li>
     <li>新規登録: auth/mailregister</li>
     <li>ログイン: auth/signin</li>
     </ul>

      </footer>
      
    </div>

    <style type="text/css">
     .item{
       /* border: 1px solid gray;
       border-radius:5px; */
     }

     
    </style>
    
    <?php echo Asset::js('stickyelements-animate.js'); ?>
    <script>
     // $('.grid').masonry({
     // options...
     // itemSelector: '.grid-item',
     // columnWidth: 200
     // }); 

     // vanilla JS
     // init with element
     // var grid = document.querySelector('.grid');
     // var msnry = new Masonry( grid, {
     //   // options...
     //   itemSelector: '.grid-item',
     //   columnWidth: 200
     // });
     // 
     // // init with selector
     // var msnry = new Masonry( '.grid', {
     //   // options...
     // });
     
     stickyElements('.item', {stickiness: {x: 2, y: 5}});
    </script>
  </body>
</html>
