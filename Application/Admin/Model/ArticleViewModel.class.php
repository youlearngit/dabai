<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticleViewModel
 *
 * @author 凯凯
 */
namespace Admin\Model;
use Think\Model\ViewModel;
class ArticleViewModel extends ViewModel{
    //put your code here
    public $viewFields=array(
        'article'=>array('id','title','pic','_type'=>'LEFT'),
        'cate'=>array('name','_on'=>'article.cateid=cate.id')
    );
}
