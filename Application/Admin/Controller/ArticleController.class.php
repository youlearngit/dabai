<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticleController
 *
 * @author 凯凯
 */
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController{
    //put your code here
    public function lst(){
        $article=D('ArticleView');
        $count=$article->count();//查询满足要求的总记录数
        $page=new \Think\Page($count,2);//实例化分页,传入总记录数和每页显示的条数
        // 配置翻页的样式
	$page->setConfig('prev', '上一页');
	$page->setConfig('next', '下一页');
        $show=$page->show();//分页显示输出
        $list=$article->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page', $show);//赋值分页输出
        $this->assign('list', $list);
        $cate=D('cate');
        $cates=$cate->catetree();
        $this->assign('cates', $cates);
        $this->display();
    }
    
    public function add(){
        $article=D('Article');
        if(IS_POST){
            $data['title']=I('title');
            $data['num']=I('num');
            $data['atype']=I('atype');
            $data['author']=I('author');
            $data['cateid']=I('cateid');
            $data['content']=I('content');
            $data['time']=I('time');
            if($_FILES['pic']['tmp_name']!=''){
                $upload=new \Think\Upload();//实例化上传类
                $upload->maxSize = 3145728;
                $upload->exts = array('jpg','gif','png','jpeg');
                $upload->savePath = './Public/Uploads/';
                $upload->rootPath='./';
                //上传文件
                $info=$upload->uploadOne($_FILES['pic']);
                if(!info){
                    $this->error($upload->getError());
                }else{
                    $data['pic']=$info['savepath'].$info['savename'];
                }
            }
            if($article->create($data)){
                if($article->add()){
                    $this->success('新增文章成功!', U('lst'));
                }else{
                    $this->error('新增失败!');
                }
            }else{
                $this->error($article->getError());
            }
            return;
        }
        $cate=D('cate');
        $cates=$cate->catetree();
        $this->assign('cates', $cates);
        $this->display();
    }
    
    public function edit($id){
        $article=D('Article');
        if(IS_POST){
            $data['title']=I('title');
            $data['num']=I('num');
            $data['atype']=I('atype');
            $data['author']=I('author');
            $data['cateid']=I('cateid');
            $data['content']=I('content');
            $data['time']=I('time');
            if($_FILES['pic']['tmp_name']!=''){
                $upload=new \Think\Upload();//实例化上传类
                $upload->maxSize = 3145728;
                $upload->exts = array('jpg','gif','png','jpeg');
                $upload->savePath = './Public/Uploads/';
                $upload->rootPath='./';
                //上传文件
                $info=$upload->uploadOne($_FILES['pic']);
                if(!info){
                    $this->error($upload->getError());
                }else{
                    $data['pic']=$info['savepath'].$info['savename'];
                }
            }
            if($article->create($data)){
                if($article->save()){
                    $this->success('修改文章成功!', U('lst'));
                }else{
                    $this->error('修改失败!');
                }
            }else{
                $this->error($article->getError());
            }
            return;
        }
        $artres=$article->find($id);
        $this->assign('artres', $artres);
        $cate=D('cate');
        $cates=$cate->catetree();
        $this->assign('cates', $cates);
        $this->display();
    }
    
    public function del($id){
        $article=D('article');
        if($article->delete($id)){
            $this->success('删除成功!', U('lst'));
        }else{
            $this->error('删除失败!');
        }
    }
    
}
