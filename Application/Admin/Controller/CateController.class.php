<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CateController
 *
 * @author 凯凯
 */
namespace Admin\Controller;
use Think\Controller;

class CateController extends CommonController{
    //put your code here
    public function lst(){
        $cate=D('Cate');
        $cates=$cate->catetree();
        $this->assign('cates', $cates);
        $this->display();
    }
    
    public function add(){
        if(IS_POST){
            $cate=D('cate');
            
            if($cate->create(I('post.'),1)){
                if($cate->add()){
                    $this->success('新增栏目成功!', U('lst'));
                }else{
                    $this->error('新增栏目失败!');
                }
            }else{
                $this->error('新增栏目失败!');
            }
            return;
        }
        $cate=D('Cate');
        $cates=$cate->catetree();
        $this->assign('cates', $cates);
        $this->display();
    }
    
    public function edit(){
        $cate=D('Cate');
        if(IS_POST){
            if($cate->create(I('post.'),2)){
                if($cate->save()){
                    $this->success('修改栏目成功!', U('lst'));
                }else{
                    $this->error('修改栏目失败!');
                }
            }else{
                $this->error($cate->getError());
            }
            return;
        }
        $cateid=I('id');
        $cateres=$cate->find($cateid);
        $this->assign('cateres', $cateres);
        $cates=$cate->catetree();
        $this->assign('cates', $cates);
        $this->display();
    }
    public function del(){
        $cate=D('cate');
        $id=I('id');
        if($cate->delete($id)){
            $this->success('成功删除栏目!', U('lst'));
        }else{
            $this->error('栏目删除失败!');
        }
    }
}
