<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/3/30
 * Time: 上午10:24
 */
 ?>
 @extends('layouts.admin.admin')
 @section('page-title')
 <div class="page-title">
     <div class="title-env">
         <h1 class="title">修改节点</h1>
         <p class="description">Dynamic table variants with pagination and other controls</p>
     </div>

     <div class="breadcrumb-env">

         <ol class="breadcrumb bc-1">
             <li>
                 <a href="dashboard-1.html"><i class="fa-home"></i>Dashboard</a>
             </li>
             <li>

                 <a href="tables-basic.html">内容管理</a>
             </li>
             <li class="active">

                 <strong>修改节点</strong>
             </li>
         </ol>

     </div>
 </div>
 @stop

 @section('flash-message')
 @if (Session::has('flash_notification.message'))
     <div class="alert alert-{{ Session::get('flash_notification.level') }}">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

         {{ Session::get('flash_notification.message') }}
     </div>
 @endif
 @stop

 @section('content')
<div class="row">
    <div class="col-sm-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">修改节点</h3>
                <div class="panel-options">
                    <a href="#" data-toggle="panel">
                        <span class="collapse-icon">&ndash;</span>
                        <span class="expand-icon">+</span>
                    </a>
                    <a href="#" data-toggle="remove">
                        &times;
                    </a>
                </div>
            </div>
            <div class="panel-body">

                {!! Form::open(['route'=>['admin.menu.update',$menu->id],'role'=>'form','class'=>'form-horizontal','method'=>'patch']) !!}

                    <div class="form-group @if($errors->first('fid')) has-error @endif">
                        <label class="col-sm-2 control-label" for="fid">上级节点</label>

                        <div class="col-sm-10">
                            <select class="form-control" name="fid">
                                <option value="0">顶级菜单</option>
                                @foreach($menus as $key=>$m)
                                <option value="{{$m->id}}" @if($menu->fid == $m->id)>&nbsp;&equiv;{{trans('admin.'.$m->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group @if($errors->first('name')) has-error @endif">
                        <label class="col-sm-2 control-label" for="name">菜单名称</label>

                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" value="{{$m->name}}" placehol der="@if($errors->first('name')) {{$errors->first('name')}} @else 菜单名称 @endif">
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group @if($errors->first('route_name')) has-error @endif">
                        <label class="col-sm-2 control-label" for="route_name">路由名</label>

                        <div class="col-sm-10">
                            <input type="text" name="route_name" class="form-control" id="route_name" value="{{$m->route_name}}" placeholder="@if($errors->first('route_name')) {{$errors->first('route_name')}} @else 路由名 @endif">
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group @if($errors->first('icon')) has-error @endif">
                        <label class="col-sm-2 control-label" for="description">节点图标</label>

                        <div class="col-sm-10">
                            <input type="text" name="icon" class="form-control" id="icon" value="{{$m->icon}}" placeholder="@if($errors->first('icon')) {{$errors->first('icon')}} @else 节点图标 @endif">
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label"></label>

                        <div class="col-sm-11">

                            <button class="btn btn-danger">确认修改</button>

                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>

    </div>
</div>

 @stop
 @section('other')
      <script>
        jQuery(document).ready(function($)
        {
            Dropzone.options.dropZone={
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                autoProcessQueue: false,//关闭自动上传
                uploadMultiple:1,
                addRemoveLinks: true,
                parallelUploads:1,//单次上传文件个数，最大为2
                init:function(){
                    var submitButton = document.querySelector("#upload");
                    myDropzone = this; // closure

                    submitButton.addEventListener("click", function () {
                      //手动上传所有图片
                      myDropzone.processQueue();
                    });

                    //当上传完成后的事件，接受的数据为JSON格式
                    this.on("complete", function (file) {
                      if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {

                        var res = eval('(' + file.xhr.responseText + ')');
                        var msg;

                        if (res.state=='success') {
                          alert('upload success!');
                          $('#preview').attr('src',res.url);
                          $('#photo').val(res.url);
                        }
                        else {
                          alert('upload failed!');
                        }

                      }
                    });

                    //删除图片的事件，当上传的图片为空时，使上传按钮不可用状态
                    this.on("removedfile", function () {
                      if (this.getAcceptedFiles().length === 0) {
                        $("#upload").attr("disabled", true);
                      }
                    });
                }
            };
        });

        </script>
        <!-- Modal 2 (Custom Width)-->
        <div class="modal fade custom-width" id="modal-2">
            <div class="modal-dialog" style="width: 60%;">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">封面图片上传</h4>
                    </div>

                    <div class="modal-body">
                        <!-- Auto initialization -->
                        {!! Form::open(['route'=>['upload'],'role'=>'form','id'=>'dropZone','class'=>'dropzone','enctype'=>'multipart/form-data']) !!}
                            {!! Form::hidden('type','posts') !!}
                        {!! Form::close() !!}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button type="button" id="upload" class="btn btn-info">上传</button>
                    </div>
                </div>
            </div>
        </div>
 @stop
 @section('style')
     {!! Html::style('style/assets/js/datatables/dataTables.bootstrap.css') !!}

     {!! Html::style('style/assets/js/dropzone/css/dropzone.css') !!}
 @stop
 @section('script')

          {!! Html::script('style/assets/js/dropzone/dropzone.min.js') !!}

 @stop
