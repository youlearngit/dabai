<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CateModel
 *
 * @author 凯凯
 */
namespace Admin\Model;
use Think\Model;

class CateModel extends Model {
    //put your code here
    protected $_validate=array(
        array('name','require','栏目名称不得为空!',1),
        array('name','','栏目名称不得重复!',1,unique,1),
    );
    
    public function catetree(){
        $data=$this->select();
        return $this->resort($data);
    }
    
    public function resort($data,$parentid=0,$level=0){
        static $ret=array();
        foreach($data as $k =>$v){
            if($v['parentid']==$parentid){
                $v['level']=$level;
                $ret[]=$v;
                $this->resort($data, $v['id'], $level+1);
            }
        }
        return $ret;
    }
}
