<!doctype html>
<html lang="ja">
  <!--

  やっつけです。時間なかったんです。
  
  -->
  
  <head>
    <meta charset="UTF-8"/>
    <title>ポートフォリオ</title>
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
    <style>

     main {
       width: 100%;

       height: 700px;
       background: url('images/gacha_top.jpg');
       background-size: 100%;
       -webkit-filter: grayscale(100%);
     }

     h1 {
       color: white;
       font-size: 2em;
       font-weight: bold;
       text-shadow: black 1px 2px;
     }

     p {
       color: white;
       text-shadow: black 1px 2px;
     }

     button {
       margin-top:12px;
       
       border: none;
       
       cursor: pointer;
       padding: 10px 20px;
       border-radius: 3px;
       background: #6AF9F2;
     }

     .center_text{
       position:absolute;
       left: 50%;
       top: 40%;

       transform: translateX(-50%);
       
       
       text-align: center;
     }
     
     
     footer {
       width:100%;
       height: 100px;

       background: #2F2F2F;
       color: #9E9E9E;
     }

     small {
           text-align: center;
           left: 50%;
           position: absolute;
           transform: translateX(-50%);
           margin-top: 50px;
     }
     a{
       text-decoration: none;
       color:#9E9E9E;
     }
    </style>
  </head>
  <body>
    <div class="container">

      <main>
	<div class="center_text">
	  <h1>PROFILE_APP</h1>
	  <p>ポートフォリオにガチャの仕組みを。 <br/>
	    普段目につかない様な僕のプロフィールもどうしたら見ていただけるか考えた結果です。</p>

	  <a href="gacha"><button>ガチャる</button></a>
	  <a href="profiles"><button>ポートフォリオ一覧</button></a>
	</div>
      </main>

      
      <footer>
	<small><a href="https://github.com/y-ohgi/codecheck-1126">github</a></small>
      </footer>

    </div>
  </body>
</html>
