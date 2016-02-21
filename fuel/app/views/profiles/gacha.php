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
    <script>

     // とても隠したい関数
     function resultHtmlGen(imgpath, title, desc, url){
       return "<table><tr><td colspan=2><img src="+imgpath+"/></td></tr> <tr><th>タイトル: </th><td>"+title+"</td></tr> <tr><th>説明: </th><td>"+desc+"</td></tr> <tr><th>URL: </th><td>"+url+"</td></tr> </table>";
     }
     
     $(document).ready(function(){


       $("#gacha").click(function(){

	 $("#result").fadeOut(function(){
	 
	 $.ajax({
	   url: "api/gacha"
	 }).done(function(data){
	   $("#result").empty();
	   console.log(data);
	   

	   $("#result").append(resultHtmlGen(data[0]['imagepath'], data[0]['title'], data[0]['desc'], data[0]['url']));
	   
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
     .result{
       display:none;
     }
    </style>

    
  </head>
  
  <body>
    <h1>ガチャ</h1>

    <img alt="" src="images/gachagacha.png"/>
    <button id="gacha">ガチャる</button>

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
    
    
  </body>
</html>


