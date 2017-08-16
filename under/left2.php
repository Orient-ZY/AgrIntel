<?php
header("Content-Type: text/html; charset=utf-8");
require_once('db.php');
$connect = Db::getInstance()->connect();
// if($connect){
// echo "连接成功";
// }else{
// echo "连接失败";
// }
// echo "</br>";
//require_once('tran.php');
$pageSize = 11; //每页显示数据条数
$page_size = $pageSize + 1;
$sql ="select * from student";
$result = mysqli_query($connect, $sql);
$totalNum = mysqli_num_rows($result); //数据总条数
$totalPage = ceil($totalNum/$pageSize); //总页数
//判<a断当前页是哪一页
if(!isset($_GET['page'])||!ceil($_GET['page'])||$_GET['page']>$totalPage)//page可能的四种状态   
{   
    $page=1;   
}   
else   
{   
    $page=$_GET['page'];//如果不满足以上四种情况，则page的值为$_GET['page']   
}   
$startnum = ($page-1)*$pageSize;//开始条数   
$sql = "select * from student  limit $startnum,$page_size ";//查询出所需要的条数   
$rs = mysqli_query($connect, $sql);   
$contents = mysqli_fetch_array($rs);
while($arr = mysqli_fetch_array($rs, MYSQL_ASSOC)){
  echo '<a href="right2.php?time=';
  echo $arr['sbirthday'];
  echo '" target="right">';
  print_r($arr['sbirthday']);
  echo '</a>';
    echo "</br>";
}
 
while($contents = mysqli_fetch_array($rs));//do....while   
$per = $page - 1;//上一页   
$next = $page + 1;//下一页   
echo "<center>共".$totalPage."页 ";   
if($page != 1)   
{   
echo "<a href='".$_SERVER['PHP_SELF']."'>首页</a>";   
echo "<a href='".$_SERVER['PHP_SELF'].'?page='.$per."'> 上一页</a>";   
}   
if($page != $totalPage)   
{   
echo "<a href='".$_SERVER['PHP_SELF'].'?page='.$next."'> 下一页</a>";   
echo "<a href='".$_SERVER['PHP_SELF'].'?page='.$totalPage."'> 尾页</a></center>";   
}   
else//如果$total为空则输出No message   
{   
echo "<center>No message</center>";   
}    
?>