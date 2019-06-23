layui.define('jquery', function (exports) {

    var jquery = layui.jquery;
    var NB = {

        get: jquery.get,
        post: jquery.post,
        put:function (url, data , callback) {
            jquery.ajax({
                url: url,
                data: data,
                method: 'PUT',
                success:callback
            })
        },
        del:function (url, data , callback) {
            jquery.ajax({
                url: url,
                data: data,
                method: 'DELETE',
                success:callback
            })
        },
        ajax: jquery.ajax
    };

    exports('nb', NB);

});