<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author 凯凯
 */
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    //put your code here
    public function login(){
        if(IS_POST){
            //判断用户名和密码是否正确
            $managerinfo=D('User')->where(array('username'=>$_POST['username'],'pwd'=>md5($_POST['pwd'])))->find();
            if($managerinfo!==null){
                //持久化用户信息
                session('admin_id', $managerinfo['id']);
                session('admin_name', $managerinfo['username']);
                //登录成功跳转到后台
                $this->redirect('Index/index');
            }else{
                $this->error('用户名或密码错误', U('Login/login'),1);
            }
            return;
        }
        $this->display();
    }
    
    //退出系统
    public function logout(){
        session(null);
        $this->redirect('Login/login');
    }
}
