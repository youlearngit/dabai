<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author 凯凯
 */
namespace Admin\Model;
use Think\Model;

class UserModel extends Model{
    //put your code here
    protected $_validate = array(
		array('username', 'require', '姓名不能为空！', 1, 'regex', 3),
		array('username', '1,32', '姓名的值最长不能超过 32 个字符！', 1, 'length', 3),
                array('username','','名称不得重复！',1,unique,1),
                array('username','','名称不得重复！',1,unique,2),
		array('pwd', 'require', '密码不能为空！', 1, 'regex', 3),
		array('pwd', '1,32', '密码的值最长不能超过 32 个字符！', 1, 'length', 3),
		array('status', 'number', '必须是一个整数！', 2, 'regex', 3),
	);
}
