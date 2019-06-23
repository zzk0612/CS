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


class User extends Controller
{
    /**
     * 显示资源列表 GET请求
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return '资源列表';
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
        return '创建资源';
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
