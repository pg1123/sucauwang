<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?=$public_r[sitename]?>|[!--pagetitle--]</title>
<link href="/just/css/style.css" type="text/css" rel="stylesheet" />
<script src="/just/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/just/layui/layui.js"></script>
</head>

<body>
<div id="container">
  <div class="header clearfix ctnt">
    <div class="logo"><img src="/just/images/logo.png" /></div>

    <ul class="layui-nav">
      <li class="layui-nav-item layui-this"> <a href="/">首页1111</a> </li>


      <?php
        $ecms_bq_sql=sys_ReturnEcmsLoopBq('select classid,classname,classpath from [!db.pre!]enewsclass where bclassid=0 and showclass=0 order by myorder limit 10',20,24,0);
        while($r=$empire->fetch($ecms_bq_sql))
        {
            $s = sys_ReturnEcmsLoopStext($r);
            //$path = $public_r['newsurl'].$r['classpath']; 
            ?>

            <li class="layui-nav-item"> <a href="#"><?php echo $s['classname']; ?></a>
              <dl class="layui-nav-child snav">
                <?php
                  $sql2=sys_ReturnEcmsLoopBq('select classid,classname,classpath from [!db.pre!]enewsclass where bclassid='.$r['classid'].' order by myorder limit 25',20,24,0);
                  while($r2=$empire->fetch($sql2))
                  {
                        $s2 = sys_ReturnEcmsLoopStext($r2);
                    ?>
                    <dd>
                      <a href="<?php echo $s2['classurl']; ?>" class="btit"><?php echo $s2['classname']; ?></a>
                       <div class="snavfl clearfix">
                         
                        <?php 
                            $sql3=sys_ReturnEcmsLoopBq('select classid,classname,classpath from [!db.pre!]enewsclass where bclassid='.$r2['classid'].' order by myorder limit 25',20,24,0);
                            while($r3=$empire->fetch($sql3))
                            {   
                                $s3 = sys_ReturnEcmsLoopStext($r3);
                            ?>
                                <a href="<?php echo $s3['classurl']; ?>"><?php echo $s3['classname']; ?></a>
                        <?php } ?>


                       </div>
                    </dd>
                  <?php } ?>
              </dl>
            </li>
            

    <?php } ?>
      
       <?php 
      if($_COOKIE['wwogcmlusername']){
     echo '<li class="layui-nav-item layui-nav-item1 usera" lay-unselect=""> <a href="javascript:;"><img src="/just/images/user.png" class="layui-nav-img">用户00368</a>
        <dl class="layui-nav-child">
          <dd><a href="javascript:;">充值服务</a></dd>
          <dd><a href="/e/member/doaction.php?enews=exit">退出</a></dd>
        </dl>
      </li>';
   }
 ?>

    </ul>

    <?php 
      if(!$_COOKIE['wwogcmlusername']){
        echo '<div class="hicon clearfix"> <a href="#" class="icon"><i class="fa fa-qq" aria-hidden="true"></i></a> <a href="#" class="icon"><i class="fa fa-share-alt" aria-hidden="true"></i></a> <a href="#" class="icon"><i class="fa fa-question" aria-hidden="true"></i></a> <a href="#" class="icon"><i class="fa fa-bars" aria-hidden="true"></i></a> </div><div class="login"><a href="#" onclick="logintc()">登录</a>|<a href="#" onclick="design()">注册</a></div>';
      }
    ?>
  </div>

  <div class="list">
    <div class="choose clearfix">
       <!-- <span class="this"><a href="[!--news.url--]e/public/ViewClick/?classid=[!--classid--]&id=[!--id--]&down=5">全部</a></span> -->
        <span class="this"><a href="[!--news.url--]e/action/ListInfo.php?classid=[!--self.classid--]&orderby=onclick">全部</a></span>
       <span><a href="[!--news.url--]e/action/ListInfo.php?classid=[!--self.classid--]&orderby=newstime">最新</a></span>
       <span><a href="[!--news.url--]e/action/ListInfo.php?classid=[!--self.classid--]&orderby=diggtop">人气</a></span>
       <span><a href="[!--news.url--]e/action/ListInfo.php?classid=[!--self.classid--]&orderby=onclick">点击</a></span>
       <span><a href="[!--news.url--]e/action/ListInfo.php?classid=[!--self.classid--]&orderby=plnum">回复</a></span>
    </div>
    <div class="layui-tab-content">
    <div class="layui-row">
            [!--empirenews.listtemp--]<!--list.var1-->[!--empirenews.listtemp--]
    </div>
  </div>
　<div class="pageBox pTB20">[!--show.listpage--]</div>
</div>
<script type="text/javascript">
$(function(){
        
$(".show").hover(function() {
  $(this).children(".shadow").show();
}, function() {
  $(this).children(".shadow").hide();
});

    })
    
    
    layui.use('element', function(){
  var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块
  
  //监听导航点击
  element.on('nav(demo)', function(elem){
    //console.log(elem)
    layer.msg(elem.text());
  });
});
layui.use(['laypage', 'layer'], function(){
  var laypage = layui.laypage
  ,layer = layui.layer;
  
  //总页数低于页码总数
  laypage.render({
    elem: 'demo8'
    ,count: 1000
    ,layout: ['limit', 'prev', 'page', 'next']
  });
  });
</script>
</body>
</html>
