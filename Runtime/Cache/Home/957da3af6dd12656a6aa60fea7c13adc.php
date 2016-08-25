<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        td {
            padding: 10px;
            width: auto;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div style="width:100%; height:auto;" id="visitors">
        <h4>访客:</h4>
        <table border="1" style="width:100%; height:auto;">
            <tr style="width:100%;">
                <td style="width:10%; height:auto;">IP</td>
                <td style="width:10%; height:auto;">操作系统</td>
                <td style="width:10%; height:auto;">浏览器</td>
                <td style="width:35%; height:auto;">时间</td>
                <td style="width:35%; height:auto;">离开</td>
            </tr>
            <?php if(is_array($visitors)): foreach($visitors as $key=>$visitor): ?><tr>
                    <td><?php echo ($visitor["ip"]); ?></td>
                    <td><?php echo ($visitor["os"]); ?></td>
                    <td><?php echo ($visitor["browser"]); ?></td>
                    <td><?php echo ($visitor["time"]); ?></td>
                    <td><?php echo ($visitor["bye"]); ?></td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div>
    <br/><br/>
    <hr/>

    <div style="width:100%; height:auto;" id="suggests">
        <h4>建议:</h4>
        <table border="1" style="width:100%; height:auto;">
            <tr style="width:100%;">
                <td style="width:10%; height:auto;">IP</td>
                <td style="width:10%; height:auto;">发送时间</td>
                <td style="width:15%; height:auto;">联系方式</td>
                <td style="width:65%; height:auto;">内容</td>
            </tr>
            <?php if(is_array($suggests)): foreach($suggests as $key=>$suggest): ?><tr>
                    <td><?php echo ($suggest["ip"]); ?></td>
                    <td><?php echo ($suggest["time"]); ?></td>
                    <td><?php echo ($suggest["contact"]); ?></td>
                    <td><?php echo ($suggest["content"]); ?></td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div>
    <br/><br/>
    <hr/>

    <div style=" overflow-y:auto; width:100%; height:30%;" id="interviews">
        <h4>面试:</h4>
        <table border="1" style="width:100%; height:auto;">
            <tr style="width:100%;">
                <td style="width:10%; height:auto;">IP</td>
                <td style="width:10%; height:auto;">发送时间</td>
                <td style="width:15%; height:auto;">公司名称</td>
                <td style="width:15%; height:auto;">公司地址</td>
                <td style="width:50%; height:auto;">注意事项</td>
            </tr>
            <?php if(is_array($interviews)): foreach($interviews as $key=>$interview): ?><tr>
                    <td><?php echo ($interview["ip"]); ?></td>
                    <td><?php echo ($interview["time"]); ?></td>
                    <td><?php echo ($interview["companyname"]); ?></td>
                    <td><?php echo ($interview["companyaddr"]); ?></td>
                    <td><?php echo ($interview["description"]); ?></td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div>



</body>
</html>