<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

/**
 *
 * 对于一个资源来说
 *
 * 针对资源的操作有： 增删改查
 * 针对资源的集合 查
 *
 */


class Role extends Controller
{
    /**
     * 显示资源列表 GET请求
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $result = \app\admin\model\Role::paginate(2)->toArray();


        $res = [
            'code'=>0,
            'data' => $result['data'],
            'count' => $result['total'],
            'msg' => ''
        ];

        return json($res);
    }


    /**
     * 保存新建的资源 POST请求
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
        $data = $request->param();

//        $data['1111'] = 2222;
//        return json($data);


        // unique验证当前请求的字段是否为唯一
        $rule = [
            'role_name' => 'require|length:1,20|unique:Role',
            'describe' =>  'max:255'
        ];
        $msg = [
            'role_name.require' => '角色名称必填',
            'role_name.length' => '角色名称应在1-20之间',
            'role_name.unique' => '角色名称已存在',
            'describe.max' => '介绍长度最大为255个字符'

        ];
        //todo
        $data['create_user'] = 1;
        //执行验证
        $check = $this->Validate($data, $rule, $msg);
//        return $check;
        if ($check === true){

            //入库
            if(\app\admin\model\Role::create($data)){
                return json(['code'=>0, 'msg' => '添加成功']);
            }else{
                return json(['code'=>1, 'msg' => '添加失败']);
            }
        }else{
            return json(['code'=>1, 'msg' => $check]);
        }
    }

    /**
     * 显示指定的资源 GET请求
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
        return '读取资源';
    }


    /**
     * 保存更新的资源 PUT请求
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        return '修改资源';
    }

    /**
     * 删除指定资源 DELETE请求
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        return '删除资源';
    }
}
