<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author 凯凯
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController{
    //put your code here
    public function index(){
        $this->display();
    }
    
    public function main(){
        $this->display();
    }
    
    public function head(){
        $this->display();
    }
    
    public function left(){
        $this->display();
    }
    
   
}
