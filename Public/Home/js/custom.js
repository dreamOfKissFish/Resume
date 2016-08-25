/**
 * Created by Zhou on 16/8/14.
 */
$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
var jWindow = $(window);
var screenHeight = jWindow.height();

jWindow.ready(function(){

    if (jWindow.width() < 768) {
        $("body").css("background-image", "url('http://ac-d9roukwp.clouddn.com/484ce259652e5dd5.png')");
    } else {
        $("body").css("background-image", "url('http://ac-d9roukwp.clouddn.com/a3f486a29241196f.jpg')");
    }

    $("#screen").height(screenHeight);
    var rightNavigation = $("#rightNavigation");
    rightNavigation.height(screenHeight);
    rightNavigation.fadeOut(400);
    $("#topNavi").fadeOut(400);

    function scrollTo(trigger, destination, topOffset) {
        $(trigger).on("click", function(){
            $body.animate({scrollTop: $(destination).offset().top-topOffset}, 400);
            return false;
        });
    };

    scrollTo("#toTheTop", '#theTop', 0);
    scrollTo("#toSkill", '#skill', 40);
    scrollTo("#toProject", '#project', 40);
    scrollTo("#toCommunicat", '#communicat', 40);

    scrollTo("#topToTheTop", '#theTop', 0);
    scrollTo("#topToSkill", '#skill', 60);
    scrollTo("#topToProject", '#project', 60);
    scrollTo("#topToCommunicat", '#communicat', 60);

    $("#suggestSend").on("click", function(){
        $("#startLoad").click();
        $.ajax({
            url: "/resume/Home/Index/suggestReg",
            type: "post",
            data: {
                'contact': $("#suggestContact").val(),
                'content': $("#suggestDetail").val()
            },
            success: function (data) {
                if (data === 'OK') {
                    $.post('/resume/Home/Index/count?data='+Math.random(), function(data) {
                        if (data >= 10) {
                            $("#closeLoad").click();
                            $("#countWarn").click();
                        } else {
                            $.ajax({
                                url: "/resume/Home/Index/suggest",
                                type: "post",
                                data: {
                                    'contact': $("#suggestContact").val(),
                                    'content': $("#suggestDetail").val()
                                },
                                success: function () {
                                    $("#closeLoad").click();
                                    $("#suggestSendSucc").click();
                                }
                            });
                        }
                    });
                } else {
                    $("#suggestWarn").click();
                }
            }
        });
    });

    $("#companySend").on("click", function() {
        $("#startLoad").click();
        $.ajax({
            url: "/resume/Home/Index/interviewReg",
            type: "post",
            data: {
                'companyName': $("#companyName").val(),
                'companyAddr': $("#companyAddr").val(),
                'description': $("#description").val()
            },
            success: function (data) {
                if (data === 'OK') {
                    $.post('/resume/Home/Index/count?data=' + Math.random(), function (data) {
                        if (data >= 10) {
                            $("#closeLoad").click();
                            $("#countWarn").click();
                        } else {
                            $.ajax({
                                url: "/resume/Home/Index/interview",
                                type: "post",
                                data: {
                                    'companyName': $("#companyName").val(),
                                    'companyAddr': $("#companyAddr").val(),
                                    'description': $("#description").val()
                                },
                                success: function () {
                                    $("#closeLoad").click();
                                    $("#companySendSucc").click();
                                }
                            });
                        }
                    });
                } else {
                    $("#interviewWarn").click();
                }
            }
        });
    });

    jWindow.bind('beforeunload',function(){
        $.ajax({
            url: "/resume/Home/Index/bye",
        });
    });

});

jWindow.scroll( function() {
    var scrollHeight = jWindow.scrollTop();
    var hiddenHeight = scrollHeight - screenHeight;
    if (hiddenHeight>-100) {
        $("#myScrollspy").fadeIn(400);
        $("#topNavi").fadeIn(400)
    } else if (hiddenHeight<=-100) {
        $("#myScrollspy").fadeOut(400);
        $("#topNavi").fadeOut(400)
    }
});

