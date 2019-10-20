<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>綜合練習-萬年曆製作</title>
    <style>
    *{
        list-style-type:none;
        text-align:center;
    } 
    /* 方格動畫跑馬燈 */
    #square {
            width: 50px;
            height: 50px;
            background-color:blue;
            position: relative;
            box-shadow: 5px 5px 5px #888888;

            /* 動畫名子 */
            animation-name: move;
            /* 動畫長度 */
            animation-duration: 6s;
            /* 播放次數
                數字，或是無限 infinite
             */
            animation-iteration-count: infinite;
            /* alternate -播過去播回來 */
            animation-direction:alternate;
            /* animation-timing-function: linear; 線性播放*/
            animation-timing-function: linear;

        }
        /* move 動畫 */
        @keyframes move{
            0%{
                left: 0;
                top: 120px;
                border-radius: 0;
                transform: rotate(90deg);
                background-color:darkorchid;
            }
            25%{
                left: 475px;
                top: 120px;
                border-radius: 25%;
                background-color:crimson;
            }
            50%{
                left: 925px;
                top: 120px;
                border-radius: 50%;
                transform: rotate(45deg);
                background-color:darkcyan;
            }
            75%{
                left: 1375px;
                top: 120px;
                border-radius: 25%;
                background-color:crimson;
            }
            100%{
                left: 1825px;
                top: 120px;
                border-radius: 0;
                transform: rotate(0deg);
                background-color:darkorchid;
            }
        }
    html {
            height: 100%;
        }

    body {
            background-image: url(maple.jpg);/*背景圖片*/
            background-repeat: no-repeat;/*圖片不要重複*/
            background-attachment: fixed;/*圖片固定*/
            background-position: center;/*顯示在中間*/
            background-size:auto;/*圖片預設大小*/
            opacity: 0.7;/*透明度0.7*/
            z-index:-2;/*使圖片浮起來*/
        }
    table{
        box-shadow: 10px 10px 5px #888888; 
            width:1400px;
           background-color:#ffeeee;
           margin:auto;
        }
    tr{
        height:100px;
        padding:10px;
       }
    table,td,th{/*逗號是table裡面全部都吃*/ 
        padding:10px;
        box-shadow: 5px 5px 5px #888888;
        border:3px #bd6b86 dashed;/*點線框*/
        border-collapse: collapse;
        
       }
    #table td:first-child { /*指定表格的第一格*/
        color:red;         /*星期日變紅色*/
    }                   
    #table td:last-child{ /*指定表格的第六格*/
        color:green;     /*星期六變綠色*/
    }
    h1{ font-size:40px; /*字型大小*/
        text-align:center;/*中間顯示*/
        color:#09f;
        text-shadow:3px 3px #cccccc;/*文字陰影*/
    }
    a{
        text-decoration:none;/*不要顯示連結底線*/
        text-align:center;/*連結顯示位置*/
    }

    </style>
</head>
<body>
<div id="square"></div>
<?php
//決定目前的年份

if(!empty($_GET['year'])){

    $year=$_GET['year'];

}else{
        $year=date("Y");
}
?>

<?php

//決定目前的月份

if(!empty($_GET['month'])){

    $month=$_GET['month'];

}else{
        $month=date("m");
}
?>
<?php
    $sd=[                                   /*國定假日*/
        1=>[1=>"<br>元旦"],
        2=>[28=>"<br>和平紀念日"],
        3=>[3=>"<br>女兒節"],
        4=>[5=>"<br>清明節"],
        5=>[1=>"<br>勞動節"],
        6=>[7=>"<br>端午節"],
        7=>[7=>"<br>七夕"],
        8=>[8=>"<br>父親節"],
        9=>[28=>"<br>教師節"],
        10=>[10=>"<br>國慶日"],
        11=>[11=>"<br>光棍節"],
        12=>[25=>"<br>聖誕節"],
    ];
    $today=date("Y-m-d");//今天的日期
    $todayDays=date("d");//今天日期是幾號
    $start="$year-$month-01";//當月的開頭
    $startDay=date("w",strtotime($start));//當天是在這周的第幾天
    $days=date("t",strtotime($start));//當月的天數
    $endDay=date("w",strtotime("$year-$month-$days")); 
    echo "<h1>".date("Y年-m月",strtotime($start))."</h1>";  /*年曆標題*/
?>
<br>

<?php
    if(($month-1)>0){
        ?>
        <a href="homework.php?month=<?=($month-1);?>&&year=<?=($year);?>"><img src="01.jpg"width="50" height="50"></a>         
        <?php
    }else{
        ?>
        <a href="homework.php?month=12&&year=<?=($year-1);?>"><img src="01.jpg"width="50" height="50"></a>            
        <?php
    }
        ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
    if(($month+1)<=12){
    ?>
    <a href="homework.php?month=<?=($month+1);?>&&year=<?=($year);?>"><img src="02.jpg"width="50" height="50"></a>
    <?php
    }else{
    ?>
    <a href="homework.php?month=1&&year=<?=($year+1);?>"><img src="02.jpg"width="50" height="50"></a>   
    <?php
        }
    ?>
 
<table id="table"  cellspacing='2' width='1000px'>
    <tr>
        <th style='color:#ff0000'>星期日</th>
        <th>星期一</th>
        <th>星期二</th>
        <th>星期三</th>
        <th>星期四</th>
        <th>星期五</th>
        <th style='color:#008000'>星期六</th>
    </tr>
    
<?php  /*日曆的運算程式*/
for($i=0;$i<6;$i++){

    echo "<tr>";

    for($j=0;$j<7;$j++){
        if(!empty($sd[$month][$i*7+$j+1-$startDay])){
            $str=$sd[$month][$i*7+$j+1-$startDay];
        }else{
            $str="";
        }
        if($i==0){

            if($j<$startDay){
                 echo "<td></td>";

            }else{
                if(($i*7+$j+1-$startDay)==$todayDays){
                    
                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{

                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }
        }else{

            if(($i*7+$j+1-$startDay)<=$days){
                if(($i*7+$j+1-$startDay)==$todayDays){
                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{
                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }else{
                echo " <td></td>";    
            }
        }
   }
    echo "</tr>";
}

?> 
</table>

</body>
</html>