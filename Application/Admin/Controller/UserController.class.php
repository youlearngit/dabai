<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author 凯凯
 */
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController{
    //put your code here
    public function lst(){
        $user=D('User');
        $count=$user->count();//查询满足要求的总记录数
        $page=new \Think\Page($count,2);//实例化分页,传入总记录数和每页显示的条数
        // 配置翻页的样式
	$page->setConfig('prev', '上一页');
	$page->setConfig('next', '下一页');
        $show=$page->show();//分页显示输出
        $list=$user->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page', $show);//赋值分页输出
        $this->assign('list', $list);
        
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $user=D('User');
            if($user->create()){
                $user->pwd=md5($user->pwd);
                if($user->add()){
                    $this->success('添加管理员成功!', U('lst'));
                }else{
                    $this->error('添加管理员失败!');
                }
        }else{
            $this->error($user->getError());
        }
        return;
        }
        $this->display();
    }
    
     public function edit(){
        if(IS_POST){
            $user=D('User');
            if($user->create()){
                $user->pwd=md5($user->pwd);
                if($user->save()){
                    $this->success('修改管理员成功!', U('lst'));
                }else{
                    $this->error('修改管理员失败!');
                }
        }else{
            $this->error($user->getError());
        }
        return;
        }
        $id=I('id');
        $user=D('user')->find($id);
        $this->assign('user', $user);
        $this->display();
    }
    
    public function del(){
        $id=I('id');
        $user=D('user');
        if($user->delete($id)){
            $this->success('删除成功!', U('lst'));
        }else{
            $this->error('删除失败!');
        }
    }
}

