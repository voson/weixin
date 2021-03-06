<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  //如果用户从 get 方式进入，则覆盖之前的 cookie
  if(isset($_GET['comId'])){
	  $comId=$_GET['comId'];
	  $tableName='company_info';
	  $conArr=array('company_id');
	  $conArrCont=array($comId);
	  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
	  setCookie('comId',$comId);	
	  setCookie('carId',$info['car_id']);  //设置代理哪个汽车品牌
	  $carId=$info['car_id'];	
	  setCookie('comName',$info['company_name']);  //设置代理哪个汽车品牌	
	  $comName=$info['company_name'];
 
  }else{
      $carId=$_COOKIE['carId'];
	  $comId=$_COOKIE['comId'];
	  $comName=$_COOKIE['comName'];
  }
  
  $jsonfile='../temp/active/'.$comId.'active.json';
  
  //if(!file_exists($jsonfile)){  //判断是否存在文件，存在则不再生成
  if(1){  //判断是否存在文件，存在则不再生成
	  $tableName='car_active';
	  $conArr=array('company_id');
	  $conArrCont=array($comId);
	  $orderArr=array('endTime');
	  $info=$sqlQuery->select($tableName,$conArr,$conArrCont,'',$orderArr,'-1');
	  $fh = fopen($jsonfile, 'w')
		  or die("Error opening output file");
	  fwrite($fh, "var dataJson=".json_encode($info));
	  fclose($fh);
  }

  $smarty->assign('dataJson',$jsonfile);
  $smarty->assign('comName',$comName);
  $smarty->assign('comId',$comId);
  $smarty->display($html_path.'activityList.html');
  mysql_close();
?>
  