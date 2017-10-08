<?php

class UserModel extends Model {

    public function getTopUser($uname) {
        //添加自己的业务逻辑
        // ...
//             $User = M('Operators');
//            //执行其他的数据操作
//             $User->select();
//             return $User;
//添加             
//$User = M("User"); // 实例化User对象
//$data['name'] = 'ThinkPHP';
//$data['email'] = 'ThinkPHP@gmail.com';
//$User->add($data);
//修改
//$User = M("User"); // 实例化User对象
//// 要修改的数据对象属性赋值
//$data['name'] = 'ThinkPHP';
//$data['email'] = 'ThinkPHP@gmail.com';
//$User->where('id=5')->save($data); // 根据条件保存修改的数据        
//删除
//$User->find(2);
//$User->delete(); // 删除当前的数据对象        

        $User = D('operators');

        $date = $User->where("username='" . $uname . "'")->limit(1)->find();

        return $date; //$User->getLastSql();
    }

    public function getUser($uname) {
        $User = D('operators');

        $date = $User->select();

        return $date;
    }

    public function getuserid($username) {
        $u = M('operators');
        $result = $u->where("username='" . $username . "'")->limit(1)->find();
        //echo $u->getLastSql();
        return $result;
    }
    
    public function getname($search) {//根据用户姓名查找用户
        $u = M('operators');
        $result = $u->where("name in (" . $search . ")")->limit(1)->find();
        //echo $u->getLastSql();
        return $result;
    }

}

?>
