//http://fex.baidu.com/webuploader/getting-started.html


// 鍥剧墖涓婁紶demo
jQuery(function() {
    var $ = jQuery,
        $list = $('#fileList'),
        // 浼樺寲retina, 鍦╮etina涓嬭繖涓€兼槸2
        ratio = window.devicePixelRatio || 1,

        // 缂╃暐鍥惧ぇ灏�
        thumbnailWidth = 100 * ratio,
        thumbnailHeight = 100 * ratio,

        // Web Uploader瀹炰緥
        uploader;

    // 鍒濆鍖朩eb Uploader
    uploader = WebUploader.create({

        // 鑷姩涓婁紶銆�
        auto: true,

        // swf鏂囦欢璺緞
        swf: BASE_URL + '/js/Uploader.swf',

        // 鏂囦欢鎺ユ敹鏈嶅姟绔€�
        server: 'http://webuploader.duapp.com/server/fileupload.php',

        // 閫夋嫨鏂囦欢鐨勬寜閽€傚彲閫夈€�
        // 鍐呴儴鏍规嵁褰撳墠杩愯鏄垱寤猴紝鍙兘鏄痠nput鍏冪礌锛屼篃鍙兘鏄痜lash.
        pick: '#filePicker',

        // 鍙厑璁搁€夋嫨鏂囦欢锛屽彲閫夈€�
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        }
    });

    // 褰撴湁鏂囦欢娣诲姞杩涙潵鐨勬椂鍊�
    uploader.on( 'fileQueued', function( file ) {
        var $li = $(
                '<div id="' + file.id + '" class="file-item thumbnail">' +
                    '<img>' +
                    '<div class="info">' + file.name + '</div>' +
                '</div>'
                ),
            $img = $li.find('img');

        $list.append( $li );

        // 鍒涘缓缂╃暐鍥�
        uploader.makeThumb( file, function( error, src ) {
            if ( error ) {
                $img.replaceWith('<span>涓嶈兘棰勮</span>');
                return;
            }

            $img.attr( 'src', src );
        }, thumbnailWidth, thumbnailHeight );
    });

    // 鏂囦欢涓婁紶杩囩▼涓垱寤鸿繘搴︽潯瀹炴椂鏄剧ず銆�
    uploader.on( 'uploadProgress', function( file, percentage ) {
        var $li = $( '#'+file.id ),
            $percent = $li.find('.progress span');

        // 閬垮厤閲嶅鍒涘缓
        if ( !$percent.length ) {
            $percent = $('<p class="progress"><span></span></p>')
                    .appendTo( $li )
                    .find('span');
        }

        $percent.css( 'width', percentage * 100 + '%' );
    });

    // 鏂囦欢涓婁紶鎴愬姛锛岀粰item娣诲姞鎴愬姛class, 鐢ㄦ牱寮忔爣璁颁笂浼犳垚鍔熴€�
    uploader.on( 'uploadSuccess', function( file ) {
        $( '#'+file.id ).addClass('upload-state-done');
    });

    // 鏂囦欢涓婁紶澶辫触锛岀幇瀹炰笂浼犲嚭閿欍€�
    uploader.on( 'uploadError', function( file ) {
        var $li = $( '#'+file.id ),
            $error = $li.find('div.error');

        // 閬垮厤閲嶅鍒涘缓
        if ( !$error.length ) {
            $error = $('<div class="error"></div>').appendTo( $li );
        }

        $error.text('涓婁紶澶辫触');
    });

    // 瀹屾垚涓婁紶瀹屼簡锛屾垚鍔熸垨鑰呭け璐ワ紝鍏堝垹闄よ繘搴︽潯銆�
    uploader.on( 'uploadComplete', function( file ) {
        $( '#'+file.id ).find('.progress').remove();
    });
});