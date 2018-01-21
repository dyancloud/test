<?php  include 'public/config.php'; //加载全局配置文件 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>
        <?php

        if (isset($_GET)){
            if (array_key_exists('cat',$_GET)) {
                echo strtoupper($catName).SITE_SUFFIX;
            } elseif (array_key_exists('act',$_GET)){
                echo '后台管理'.SITE_SUFFIX;
            }
        } else {
            echo '首页'.SITE_SUFFIX;
        }
        ?>
    </title>

    <!-- Bootstrap -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--引入wangeditor的css文件-->
    <link rel="stylesheet" type="text/css" href="/lib/wangeditor/dist/css/wangEditor.min.css">


</head>
<body>

<div class="container">

    <!--顶部菜单-->
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default navbar-static-top navbar-inverse">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><?php echo $siteName; ?></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/">首页</a></li>
                            <?php foreach ($catList as $cat) :?>
                             <li><a href="<?php echo $cat['cat_url'];?>"><?php echo $cat['cat_name'];?></a></li>
                            <?php endforeach; ?>
                        </ul>

                      <!-- 如果用户登陆,显示出用户名和相关操作-->
                        <?php if (isset($_SESSION['username']) && $_SESSION['username']=='admin'):?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><?php echo $_SESSION['username'] ?></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">操作<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/index.php?act=cat_manage">分类管理</a></li>
                                    <li><a href="/index.php?act=art_manage">博文管理</a></li>
                                    <li><a href="/index.php?act=user_manage">用户管理</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="" onclick="logout();return false;">退出</a></li>
                                </ul>
                            </li>
                        </ul>
                            <?php else: ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/index.php?act=login">登录</a></li>
                        </ul>
                        <?php endif;?>


                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>

    <script>
        function logout() {
            if (confirm('确定退出吗?')){
                window.location.href='/index.php?act=logout';
            } else {
                window.location.href='/index.php';
            }
        }
    </script>


