<?php
 date_default_timezone_set('Asia/Tokyo');
 define("CHAT","chat.txt");
 
 if($_SERVER["REQUEST_METHOD"] === "POST"){
   
 $text=$_POST['message'] .",".date('m月d日　H時i分s秒')."\n";
     
 file_put_contents(CHAT,$text,FILE_APPEND);

 }


  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>簡易掲示チャット</title>
    <style type="text/css">
    *{margin:0;padding:0; list-style:none;}
    .wrap{
        width:600px;
        margin:0 auto;
        padding:20px 0 100px 0;
        background: #f1f1f2;
        min-height: 100vh;
        
    }

    li{
        position: relative;
        padding:10px 20px;
        margin:0 10px 10px 10px;
        background-color:#fff;
        border-radius: 5px;
    
        }

        span{
            position: absolute;
            top:50%;
            transform: translateY(-50%);
            right:10px;
            font-size: 12px;
            color:#ccc
        }

        form{
            position:fixed;
            top: 10%;
            left: 5vw;
        }

    </style>
</head>
<body>
    <div class="wrap">
        <ul>
            

        </ul>

    </div>

    <form action="index.php" method="post">
    <input type="text" name="message">
    
    <button>送信</button>
</form>



<script src="https://code.jquery.com/jquery-3.5.0.js">
</script>


<script>
　$(function () {
  $.ajax({
    url: 'chat.txt',
    
  })
  .done(function(data) {
    data.split('\n').forEach(function(chat){
      const post_text=chat.split(',')[0];
      const post_time=chat.split(',')[1];
      if(post_text){
       const li=`<li>${post_text}<span>${post_time}</span></li>`;
        $('ul').append(li);
      }
    
    });

  });
   });
  



 
</script>

</body>
</html>