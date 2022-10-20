<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/static/webuploader-0.1.5/webuploader.css " />
<!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>添加用户</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
    <article class="page-container">
        <form action="" method="post" class="form form-horizontal" id="form-member-add" >
            <div class="row cl" >
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="username" name="username">
                </div>
            </div>

        <!--用来存放头像-->
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">头像：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div id="uploader-demo">
                    <div id="fileList" class="uploader-list">
                        <!-- 隐藏域 -->
                        <input type="hidden" name="avatar" value="" id="hd-avatar"/>
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
            </div>
        </div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="gender" type="radio" id="gender-1" checked value="1">
					<label for="gender-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="gender-2" name="gender" value="2">
					<label for="gender-2">女</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="gender-3" name="gender" value="3">
					<label for="gender-3">保密</label>
				</div>
			</div>
		</div>

        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>账号类型：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="type" type="radio" id="type-1" checked value="1">
					<label for="type-1">老师</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="type-2" name="type" value="2">
					<label for="type-2">学生</label>
				</div>
			</div>
        </div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="status" type="radio" id="status-1" checked value="1">
					<label for="status-1">停用</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="status-2" name="status" value="2">
					<label for="status-2">启用</label>
				</div>
			</div>
        </div>
        {{csrf_field()}}
		<div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">所属地区：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box" style="width:100px;">
                    <select class="select" name="province_id" size="1">
                        <option value="0">省份</option>
                        @foreach($province as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                </span> 
                <span class="select-box" style="width:100px;">
                    <select class="select" name="city_id" size="1">
                        <option value="1">市</option>
                        
                    </select>
                </span> 
                <span class="select-box" style="width:100px;">
                    <select class="select" name="county_id" size="1">
                        <option value="2">县（区）</option>
                    </select>
                </span> 
            </div>
        </div>
        
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="mobile" name="mobile">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" name="email" id="email">
			</div>
        </div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
        </div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/static/webuploader-0.1.5/webuploader.js"></script>
<script type="text/javascript" src="/static/webuploader-0.1.5/demo-uploader.js"></script>


<script type="text/javascript">
$(function(){
    // 新增上传图片参数
    var url="{{csrf_token()}}"

    // 在选择省份后罗列出市级单位
    $("select[name=province_id]").change(function(){
        var id=$(this).val()
        $.get("/admin/member/getAreaById", {id:id} , function(data){
            // 循环市级选项
            var str="";
            $.each(data,function(index,ele){
                str+='<option value="  '+ele.id+'  ">  '+ele.name+'  </option>';
                // console.log(str)
            })
            // 清除数据
            $("select[name=city_id]").find("option:gt(0)").remove()
            // 放到指定位置
            $("select[name=city_id]").append(str)
        },"json")
    })

    // 在选择市后罗列出县级单位
    $("select[name=city_id]").change(function(){
        var id=$(this).val()
        $.get("/admin/member/getAreaById", {id:id} , function(data){
            // 循环县级选项
            var str="";
            $.each(data,function(index,ele){
                str+='<option value="  '+ele.id+'  ">  '+ele.name+'  </option>';
                // console.log(str)
            })
            // 清除数据（:gt() 过滤索引大于0的数据）
            $("select[name=county_id]").find("option:gt(0)").remove()
            // 放到指定位置
            $("select[name=county_id]").append(str)
        },"json")
    })

	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			username:{
				required:true,
				minlength:2,
				maxlength:16
			},
			gender:{
				required:true,
			},
            type:{
				required:true,
			},
            status:{
				required:true,
			},
			mobile:{
				required:true,
				isMobile:true,
			},
			email:{
				required:true,
				email:true,
			},
			// uploadfile:{
			// 	required:true,
			// },
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",

        // ajax提交数据
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'POST',
                url: "" ,//路由提交至自己
                
                success: function(data){
                    
                        layer.msg('添加成功!',{icon:1,time:1000},
                        function(){
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.$('.btn-refresh').click();
                            // 自动刷新页面
                            parent.window.location=parent.window.location;
                            parent.layer.close(index);
                        });
                                     
                    },

				/* success: function(data){
                    if(data=="1"){
                        layer.msg('添加成功!',{icon:1,time:1000},
                        function(){
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.$('.btn-refresh').click();
                            // 自动刷新页面
                            // parent.window.location=parent.window.location;
                            parent.layer.close(index);
                        });
                    }
                    else{
                        layer.msg('添加失败!',{icon:2,time:2000}
                        );
                    }
                }, */
                
                error: function(XmlHttpRequest, textis_nav, errorThrown){
                    layer.msg('添加失败!',{icon:2,time:1000},
                    );
				},
			});
		}
	});

});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>