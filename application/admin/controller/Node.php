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
 * Class User
 * @package app\admin\controller
 */


class Node extends Controller
{
    /**
     * 显示资源列表 GET请求
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $result = \app\admin\model\Node::paginate(2)->toArray();


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

        if(isset($data['is_menu'])){
            $data['is_menu'] = 1;
        }else{
            $data['is_menu'] = 0;
        }

       $data['pid'] = isset($data['pid']) ? $data['pid'] : 0;

        $rule = [
            'node_name' => 'require|length:2,20',
            'path' => 'require|length:1,50',
            'describe' => 'max:255'
        ];

        $msg = [
            'node_name.require' => '节点名称有误',
            'node_name.length' => '节点名称长度有误',
            'path.require' => '路径有误',
            'path.length' => '路径长度有误',
            'describe.max' => '描述长度过大'
        ];
        $check = $this->validate($data,$rule,$msg);

        if($check === true){

            if(\app\admin\model\Node::create($data)){
                return json(['code' => 0, 'msg' => '成功']);
            }else{
                return json(['code' => 1, 'msg' => '失败']);
            }
        }else{
            return json(['code' => 1,'msg' => $check]);
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
