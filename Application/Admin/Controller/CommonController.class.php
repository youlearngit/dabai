<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonController
 *
 * @author 凯凯
 */
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        if(!session('admin_id')){
            $this->error('请先登录系统!',U('Login/login'));
        }
        if(MODULE_NAME=='Admin' && CONTROLLER_NAME=='Login'){
           return true;
        }
        if(MODULE_NAME=='Admin' && CONTROLLER_NAME=='Login' && ACTION_NAME=='logout'){
            return true;
        }
    }
}
