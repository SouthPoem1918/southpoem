<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class UploaderController extends Controller
{
    //本地存储头像处理
    public function webuploader(Request $request){
        // 判断文件是否上传成功
        if($request->hasFile("file") && $request->file("file")->isValid()){
            // 文件上传正常(sha1返回40字符长度的16进制)
            $filename=sha1(time().$request->file("file")->getClientOriginalName()).'.'.$request->file("file")->getClientOriginalExtension();
            // dump($filename);
            // 保存或移动文件（file_get_contents()获取文件内容）
            Storage::disk("public")->put($filename,file_get_contents($request->file("file")->path()));
            $res=[
                "erroeCode" =>  "200",
                "errorMsg"  =>  "",
                "successMsg"=>  "文件上传成功",
                "path"      =>  'http://www.edu.south1918.com:8086/storage/' . $filename,
            ];
            return  $res;
        }
        else{
            // 文件上传出错
            $res=[
                "errorCode" =>  "400",
                "errorMsg"  =>  $request->file("file")->getErrorMessage(),
            ];
        }
        // 返回结果
        return response()->json($res);
    }

     //服务器端头像处理
     public function qiniu(Request $request){
        // 判断文件是否上传成功
        if($request->hasFile("file") && $request->file("file")->isValid()){
            // 文件上传正常(sha1返回40字符长度的16进制)
            $filename=sha1(time().$request->file("file")->getClientOriginalName()).'.'.$request->file("file")->getClientOriginalExtension();
            // dump($filename);
            // 保存或移动文件（file_get_contents()获取文件内容）
            Storage::disk("qiniu")->put($filename,file_get_contents($request->file("file")->path()));
            $res=[
                "erroeCode" =>  "200",
                "errorMsg"  =>  "",
                "successMsg"=>  "文件上传成功",
                // 本地图片路径
                // "path"      =>  'http://www.edu.south1918.com:8086/storage/' . $filename,
                // 服务器端图片路径
                "path"      =>  Storage::disk("qiniu")->downloadUrl($filename),

            ];
            return  $res;
        }
        else{
            // 文件上传出错
            $res=[
                "errorCode" =>  "400",
                "errorMsg"  =>  $request->file("file")->getErrorMessage(),
            ];
        }
        // 返回结果
        return response()->json($res);
    }
}
