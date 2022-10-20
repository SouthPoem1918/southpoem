// http://fex.baidu.com/webuploader/getting-started.html


jQuery(function() {
    var $ = jQuery,
        $list = $('#fileList'),
        // ä¼˜åŒ–retina, åœ¨retinaä¸‹è¿™ä¸ªå€¼æ˜¯2
        ratio = window.devicePixelRatio || 1,

        // ç¼©ç•¥å›¾å¤§å°
        thumbnailWidth = 100 * ratio,
        thumbnailHeight = 100 * ratio,

        // Web Uploader实例化
        uploader;

    // 初始化Web Uploader
    uploader = WebUploader.create({
        // 上传时使用其他参数， 外部文件不能使用模板引擎（{{csrf_token()}}），不能被解析
        formData:{
            _token:$("input[name=_token").val(),
        },
        // 选完文件后，是否自动上传。
        auto: true,

        // swf文件本地路径
        swf: '/static/webuploader-0.1.5/Uploader.swf',
        // 路由接收图片
        /* // 本地存储
        server: '/admin/uploader/webuploader', */
        // 服务器存储
        server: '/admin/uploader/qiniu',

        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#filePicker',

        // 只允许选择图片文件。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        }
    });

    // 当有文件添加进来的时候
    uploader.on( 'fileQueued', function( file ) {
        var $li = $(
                '<div id="' + file.id + '" class="file-item thumbnail">' +
                    '<img>' +
                    '<div class="info">' + file.name + '</div>' +
                '</div>'
                ),
            $img = $li.find('img');

            $(".thumbnail").remove();
        // $list为容器jQuery实例
        $list.append( $li );

        // 创建缩略图
        // 如果为非图片文件，可以不用调用此方法。
        uploader.makeThumb( file, function( error, src ) {
            if ( error ) {
                $img.replaceWith('<span>不能预览</span>');
                return;
            }

            $img.attr( 'src', src );
        }, thumbnailWidth, thumbnailHeight );
    });

    // 文件上传过程中创建进度条实时显示。
    uploader.on( 'uploadProgress', function( file, percentage ) {
        var $li = $( '#'+file.id ),
            $percent = $li.find('.progress span');

        // 避免重复创建
        if ( !$percent.length ) {
            $percent = $('<p class="progress"><span></span></p>')
                    .appendTo( $li )
                    .find('span');
        }

        $percent.css( 'width', percentage * 100 + '%' );
    });

// 文件上传成功，给item添加成功class, 用样式标记上传成功。    
    uploader.on( 'uploadSuccess', function( file,resp) {
        $( '#'+file.id ).addClass('upload-state-done');
        console.log(resp)
        // 将返回值path写到隐藏域中
        // $("input[name=avatar]").val(resp.path);
        $("#hd-avatar").val(resp.path)
        // console.log(resp);
    });

    // æ–‡ä»¶ä¸Šä¼ å¤±è´¥ï¼ŒçŽ°å®žä¸Šä¼ å‡ºé”™ã€‚
    uploader.on( 'uploadError', function( file ) {
        var $li = $( '#'+file.id ),
            $error = $li.find('div.error');

        // é¿å…é‡å¤åˆ›å»º
        if ( !$error.length ) {
            $error = $('<div class="error"></div>').appendTo( $li );
        }

        $error.text('上传失败');
    });

// 完成上传完了，成功或者失败，先删除进度条。    
    uploader.on( 'uploadComplete', function( file ) {
        $( '#'+file.id ).find('.progress').remove();
    });
});