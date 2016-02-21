<!doctype html>
<html lang="ja">
  <!-----
  見ていただいても時間が無いから手に馴染んだjQueryで力技です。Angularやりたかった。
  ------->
  
  <head>
    <meta charset="UTF-8"/>
    <title>ガチャ</title>


    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js/jquery.leanModal.min.js"></script>
    <script>

     // とても隠したい関数
     function resultHtmlGen(imgpath, title, desc, url){
       imgpath?imgpath:imgpath = "images/gachaball.jpg";
       return "<table><tr><td colspan=2><img style='max-height:300px' src=" + imgpath +"></td></tr> <tr><th>タイトル: </th><td>"+title+"</td></tr> <tr><th>説明: </th><td>"+desc+"</td></tr> <tr><th>URL: </th><td>"+url+"</td></tr> </table>";
     }
     
     $(document).ready(function(){


       $("#gacha").click(function(){

	 $("#result").fadeOut(function(){
	   
	   $.ajax({
	     url: "api/gacha"
	   }).done(function(data){
	     $("#result").empty();
	     console.log(data);

	     data = data.shift();
	     
	     
	     $("#result").append(resultHtmlGen(data['imagepath'], data['title'], data['desc'], data['url']));
	     
	     $("#result").show();
	   }).fail(function(data){
	     alert("error");
	     console.log(data);
	   });

	 });
       });
       
     });
    </script>

    <style>

     html, body{
       height: 100%;
     }

     /***
      * header
     */
     header {
       text-align:center;
       color: white;
       font-weight: bold;
       font-size: 1.2em;
       
       width: 100%;
       height: 40px;

       background: black;
       border-bottom: 1px solit white;
     }


     /***
      * main content
      */
     .container {
       height: 100%;
       
       background: gray;
     }
     
     .gacha_box{
       position: absolute;
       top: 20%;
       left: 50%;
       transform: translateX(-50%);
     }

     button#gacha {
       position: absolute;
       left: 50%;
       top: 30%;
       transform: translateX(-50%);
       border: none;
       padding: 20px 50px;
       border-radius: 2px;
       background: #E4FCFF;
       box-shadow: gray 2px 2px 2px 2px;
       font-size: 1.2em;
       font-weight: bold;
       color: currentColor;
       text-shadow: white 1px 2px;
     }

     

     /* モーダル計 */
     .result{
       display:none;
     }

     #lean_overlay{
       position: fixed; z-index:100;
       top: 0px;
       left: 0px;
       height: 100%;
       width: 100%;
       background: #000;
       display: none;
     }
     #result{
       background: none repeat scroll 0 0 #FFFFFF;
       box-shadow: 0 0 4px rgba(0, 0, 0, 0.7);
       display: none;
       padding: 30px;
       width: 780px;
     }
    </style>

    
  </head>
  
  <body>
    <header>
      <h1>ポートフォリオガチャ</h1>
    </header>

    <div class="container">
      <img alt="" src="images/gachagacha.png" class="gacha_box"/>
      <button rel="leanModal" href="#result" id="gacha">ガチャる</button>
    </div>

    <div class="result" id="result">
      <table>
	<tr>
	  <td colspan=2> <img alt="" src=""/> </td>
	</tr>
	<tr>
	  <th>title</th>
	  <td id="title"></td>
	</tr>
	<tr>
	  <th>description</th>
	  <td id="desc"></td>
	</tr>
	<tr>
	  <th>url</th>
	  <td id="url"></td>
	</tr>
      </table>
    </div>
    

    <script type="text/javascript">
     $(function() {
       $( 'button[rel*=leanModal]').leanModal({
	 top: 50,
	 overlay : 0.5,
	 closeButton: ".modal_close"
       });
     });
    </script>
  </body>
</html>


