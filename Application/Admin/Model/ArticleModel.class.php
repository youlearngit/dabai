<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticleModel
 *
 * @author 凯凯
 */
namespace Admin\Model;
use Think\Model;

class ArticleModel extends Model{
    //put your code here
    protected $_validate=array(
      array('title','require','文章标题不能为空!',1),
      array('title','','文章标题不能为空！',1,unique,1),
    );
}
