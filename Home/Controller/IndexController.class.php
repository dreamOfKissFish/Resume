<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        $visitor = D('Visitor');


        $visitor->time = time();

        $ip = $this->getIP();
        $visitor->ip = $ip;

        $os = $this->getOS();
        $visitor->os = $os;

        $browser = $this->getBrowser();
        $visitor->browser= $browser;

        $visitor->add();

        $personalModel = D('Personal');
        $personals = $personalModel->select();
        $personal = $personals[0];
        $this->assign('personal',$personal);

        $skillModel = D('Skill');
        $skill = $skillModel->select();
        $this->assign('skill',$skill);

        $projectModel = D('Project');
        $projects = $projectModel->select();
        $this->assign('projects',$projects);

        $this->display();

    }

    public function bye() {
        $visitor = D('Visitor');
        $ip = $this->getIP();
        $visitor->bye = time();
        $visitor->ip = $ip;
        $visitor->add();
    }

    public function suggest() {
        if (IS_POST) {
            $ip = $this->getIP();
            $suggest = D('Suggest');
            $suggest->ip = $ip;
            $suggest->contact = I('contact');
            $suggest->content = I('content');
            $suggest->time = time();
            $suggest->add();
        }
    }

    public function interview() {
        if (IS_POST) {
            $ip = $this->getIP();
            $interview = D('Interview');
            $interview->ip = $ip;
            $interview->companyName = I('companyName');
            $interview->companyAddr = I('companyAddr');
            $interview->description = I('description');
            $interview->time = time();
            $interview->add();
        }
    }

    public function count() {
        $ip = $this->getIP();
        $suggestModel = D('Suggest');
        $suggests = $suggestModel ->field('ip')->where("ip='$ip'")->select();
        $interviewModel = D('Interview');
        $interviews = $interviewModel ->field('ip')->where("ip='$ip'")->select();
        $submitCount = count($interviews) + count($suggests);
        echo $submitCount;
    }

    public function getIP() {
        if(!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }else if(!empty($_SERVER["REMOTE_ADDR"])) {
            $cip = $_SERVER["REMOTE_ADDR"];
        }else{
            $cip = "99999";
        }
        return $cip;
    }

    public function getOS(){
        if(!empty($_SERVER['HTTP_USER_AGENT'])) {
            $OS = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/win/i',$OS)) {
                $OS = 'Windows';
            } else if (preg_match('/iPhone/i',$OS)) {
                $OS = 'iPhone';
            } else if (preg_match('/mac/i',$OS)) {
                $OS = 'MAC';
            } else if (preg_match('/linux/i',$OS)) {
                $OS = 'Linux';
            } else if (preg_match('/unix/i',$OS)) {
                $OS = 'Unix';
            } else if (preg_match('/iPad/i',$OS)) {
                $OS = 'iPad';
            } else if (preg_match('/android/i',$OS)) {
                $OS = 'android';
            } else {
                $OS = 'Other';
            }
            return $OS;
        }
        else{
            return "unknow";
        }
    }

    public function getBrowser(){
        if(!empty($_SERVER['HTTP_USER_AGENT'])){
            $br = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/IE/i',$br)) {
                $br = 'IE';
            } else if (preg_match('/Firefox/i',$br)) {
                $br = 'Firefox';
            } else if (preg_match('/Chrome/i',$br)) {
                $br = 'Chrome';
            } else if (preg_match('/Safari/i',$br)) {
                $br = 'Safari';
            } else if (preg_match('/Opera/i',$br)) {
                $br = 'Opera';
            } else if (preg_match('/360/i',$br)) {
                $br = '360';
            } else {
                $br = 'Other';
            }
            return $br;
        }
        else{
            return "unknow";
        }
    }


    public function suggestReg() {
        if (IS_POST) {
            if( (strlen(I('content')) < 1) || (strlen(I('content')) > 300) || (strlen(I('contact')) > 50)) {
                echo '';
            } else {
                echo 'OK';
            }
        }
    }

    public function interviewReg() {
        if (IS_POST) {
            if ( (strlen(I('companyName')) > 0) && (strlen(I('companyAddr')) > 0) && (strlen(I('description')) > 0) && (strlen(I('companyName')) < 50) && (strlen(I('companyAddr')) < 100) && (strlen(I('description')) < 300) ) {
                echo 'OK';
            } else {
                echo '';
            }
        }
    }

}