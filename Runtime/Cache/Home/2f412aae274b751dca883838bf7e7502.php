<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Resume</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css">
    <!--<link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css" />-->
    <link rel="stylesheet" href="/Public/Home/css/style.css" />
</head>

<body data-spy="scroll" data-target=".myScrollspy" data-offset="80">

    <div id="theTop"></div>

    <div class="container">

        <div id="screen">
            <div class="content pull-left text-center" id="title">
                <h1><?php echo ($personal["name"]); ?></h1><hr/>
                <h3><?php echo ($personal["job"]); ?></h3><hr/>
                <h5><?php echo ($personal["education"]); ?></h5><hr/>
                <p><?php echo ($personal["introduce"]); ?></p>
            </div>
        </div>

        <div class="content content-block pull-left col-xs-12 col-sm-10 col-md-10 col-lg-10" id="skill">
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
                <h4>职业技能</h4>
                <ul>
                    <?php if(is_array($skill)): foreach($skill as $key=>$skill): ?><div class="col-sm-1 col-md-1 col-lg-1 hidden-xs"></div>
                        <li><?php echo ($skill["skillname"]); ?></li><?php endforeach; endif; ?>
                    <br/>
                    <div class="col-sm-1 col-md-1 col-lg-1 hidden-xs"></div>
                    <p>不断增加中...</p>
                </ul>
            </div>
        </div>

        <div class="pull-right hidden-xs col-sm-2 col-md-2 col-lg-2 myScrollspy" id="myScrollspy">
            <ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="125">
                <li class="active tapTheTop"><a id="toTheTop" href="#theTop">回到顶端</a></li>
                <li class="tapSkill"><a id="toSkill" href="#skill">职业技能</a></li>
                <li class="tapProject"><a id="toProject" href="#project">项目经验</a></li>
                <li class="tapCommunicat"><a id="toCommunicat" href="#communicat">联系我吧</a></li>
            </ul>
        </div>

        <div class="content content-block pull-left col-xs-12 col-sm-10 col-md-10 col-lg-10" id="project">
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
                <h4>项目经验</h4>
                <ul>

                    <?php if(is_array($projects)): foreach($projects as $key=>$project): ?><div class="col-sm-1 col-md-1 col-lg-1 hidden-xs"></div>
                        <li><h5>项目名称:&nbsp;<?php echo ($project["name"]); ?></h5></li>

                        <div class="col-sm-1 col-md-1 col-lg-1 hidden-xs"></div>
                        <p class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                            开发环境:&nbsp;<?php echo ($project["ide"]); ?>
                        </p>

                        <div class="col-sm-1 col-md-1 col-lg-1 hidden-xs"></div>
                        <p class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                            项目职责:&nbsp;<?php echo ($project["responsibilities"]); ?>
                        </p>

                        <div class="col-sm-1 col-md-1 col-lg-1 hidden-xs"></div>
                        <p class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                            项目简介:&nbsp;<?php echo ($project["introduction"]); ?>
                        </p>

                        <div class="col-sm-1 col-md-1 col-lg-1 hidden-xs"></div>
                        <p class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                            项目源码:&nbsp;<a href="<?php echo ($project['download']); ?>" target="_blank">点击下载</a>
                        </p><?php endforeach; endif; ?>

                </ul>
            </div>
        </div>

        <div class="content content-block pull-left col-xs-12 col-sm-10 col-md-10 col-lg-10" id="communicat">
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
                <h4>联系我吧</h4>
                <ul>
                    <ul id="commuOpt" class="nav nav-tabs">
                        <li class="active">
                            <a href="#suggest" data-toggle="tab">提出建议</a>
                        </li>
                        <li>
                            <a href="#interview" data-toggle="tab">邀请面试</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="commuOpts">

                        <div class="tab-pane fade in active" id="suggest">
                            <input class="col-xs-11 col-sm-11 col-md-11 col-lg-11" type="text" placeholder="您的联系方式" id="suggestContact" />
                            <textarea class="col-xs-11 col-sm-11 col-md-11 col-lg-11" rows="6" placeholder="您的具体建议" id="suggestDetail"></textarea>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background: none"></div>
                            <button id="suggestSend" class="btn btn-default send col-xs-4 col-sm-4 col-md-4 col-lg-4">发送</button>
                            <button id="suggestSendSucc" style="display: none" class="btn btn-primary" data-toggle="modal" data-target="#suggestModal"></button>
                        </div>

                        <div class="tab-pane fade" id="interview">
                            <input class="col-xs-11 col-sm-5 col-md-5 col-lg-5" type="text" placeholder="公司名称" id="companyName" />
                            <div class="col-sm-1 col-sm-1 col-sm-1 hidden-xs"></div>
                            <input class="col-xs-11 col-sm-5 col-md-5 col-lg-5" type="text" placeholder="公司地址" id="companyAddr" />
                            <textarea class="col-xs-11 col-sm-11 col-md-11 col-lg-11" rows="6" placeholder="其他说明,如面试时间,HR联系方式,需携带物品等" id="description"></textarea>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background: none"></div>
                            <button id="companySend" class="btn btn-default send col-xs-4 col-sm-4 col-md-4 col-lg-4">发送</button>
                            <button id="companySendSucc" style="display: none" class="btn btn-primary" data-toggle="modal" data-target="#companyModal"></button>
                        </div>

                        <button id="countWarn" style="display: none" class="btn btn-primary" data-toggle="modal" data-target="#countWarnModal"></button>
                        <button id="suggestWarn" style="display: none" class="btn btn-primary" data-toggle="modal" data-target="#suggestWarnModal"></button>
                        <button id="interviewWarn" style="display: none" class="btn btn-primary" data-toggle="modal" data-target="#interviewWarnModal"></button>
                        <button id="startLoad" style="display: none" class="btn btn-primary" data-toggle="modal" data-target="#loadingModal"></button>
                    </div>
                </ul>
                <br/>
                <hr width="92%">
                <div class="text-center" id="traditionComu">
                    <div id="phoneNum"><h4>我的手机:&nbsp;<a href="tel:18035948660">18035948660</a></h4></div>
                    <div id="email"><h4>我的邮箱:&nbsp;<a href="mailto:445931731@qq.com" target="_blank">445931731@qq.com</a></h4></div>
                </div>
            </div>
        </div>

    </div>

    <div class="row" id="topNavi">
        <ul id="topNav" class="nav navbar-nav navbar-fixed-top visible-xs myScrollspy bs-js-navbar-scrollspy" role="navigation" data-spy="affix" data-offset-top="0">
            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3" ><a class="active" id="topToTheTop" href="#theTop">回到顶端</a></li>
            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a id="topToSkill" href="#skill">职业技能</a></li>
            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a id="topToProject" href="#project">项目经验</a></li>
            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a id="topToCommunicat" href="#communicat">联系我吧</a></li>
        </ul>
    </div>

    <div class="modal bs-example-modal-sm fade" id="suggestModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header succ">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <h5 class="modal-title" id="suggestModalLabel">
                        感谢您的宝贵意见
                    </h5>
                </div>
                <div class="modal-body">
                    在您的指导下我将会进步更快&nbsp;&nbsp;:&nbsp;)
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bs-example-modal-sm fade" id="companyModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header succ">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <h5 class="modal-title" id="companyModalLabel">
                        感谢您对我的肯定
                    </h5>
                </div>
                <div class="modal-body">
                    我将在收到您的邀请后与您联系&nbsp;&nbsp;:&nbsp;)
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bs-example-modal-sm fade" id="countWarnModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header err">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <h5 class="modal-title" id="countWarnModalLabel">
                        提交次数太多啦
                    </h5>
                </div>
                <div class="modal-body">
                    请不要灌水噢&nbsp;&nbsp;:&nbsp;)
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bs-example-modal-sm fade" id="suggestWarnModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header err">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <h5 class="modal-title" id="suggestWarnModalLabel">
                        输入长度不符合规则
                    </h5>
                </div>
                <div class="modal-body">
                    建议不能为空且不能太长噢,如果建议稍长请直接电话或邮箱联系我&nbsp;&nbsp;:&nbsp;)
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bs-example-modal-sm fade" id="interviewWarnModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header err">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <h5 class="modal-title" id="interviewWarnModalLabel">
                        请填写正确的面试邀请信息
                    </h5>
                </div>
                <div class="modal-body">
                    请检查&nbsp;公司名称/公司地址/其他说明&nbsp;格式是否书写正确&nbsp;&nbsp;:&nbsp;)
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bs-example-modal-sm fade" id="loadingModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header succ">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <h5 class="modal-title" id="loadingModalLabel">
                        请稍等
                    </h5>
                </div>
                <div class="modal-body">
                    正在提交中...&nbsp;&nbsp;:&nbsp;)
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal" id="closeLoad">关闭
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="/Public/Home/js/jquery-3.1.0.js"></script>
    <script src="/Public/Home/js/bootstrap.min.js"></script>
    <script src="/Public/Home/js/custom.js"></script>

</body>
</html>