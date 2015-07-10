<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/3/30
 * Time: 上午11:22
 */
 ?>
  @extends('layouts.admin.admin')
  @section('page-title')
  <div class="page-title">
      <div class="title-env">
          <h1 class="title">内容管理</h1>
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

                  <strong>节点列表</strong>
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
              <a class="btn btn-primary" href="{{ route('admin.menu.create') }}">新建节点</a>
          </div>
      </div>
  </div>
<!-- Removing search and results count filter -->
<div class="panel panel-default">
    <div class="panel-heading">节点列表</div>
    <div class="panel-body">

        <div class="row">
            <div class="col-sm-12">

                <script type="text/javascript">
                    jQuery(document).ready(function($)
                    {
                        $("#nestable-list-1").on('nestable-stop', function(ev)
                        {
                            var serialized = $(this).data('nestable').serialize(),
                                str = '';

                            //console.log( $(this).data('nestable').list() );
                            str = iterateList(serialized, 0);
                            //iterateList(serialized);

                            $("#nestable-list-1-ev").val(str);
                        });
                    });

                    function iterateList(items, depth)
                    {
                        var str = '';

                        if( ! depth)
                            depth = 0;

                        console.log(items);

                        jQuery.each(items, function(i, obj)
                        {
                            str += '[ID: ' + obj.itemId + ']\t' + repeat('—', depth+1) + ' ' + obj.item;
                            str += '\n';

                            if(obj.children)
                            {
                                str += iterateList(obj.children, depth+1);
                            }
                        });

                        return str;
                    }

                    function repeat(s, n)
                    {
                        var a = [];
                        while(a.length < n)
                        {
                            a.push(s);
                        }
                        return a.join('');
                    }

                </script>
                <ul id="nestable-list-1" class="uk-nestable" data-uk-nestable>
                @foreach($menus as $key=>$menu)
                    <li data-item="Item 1" data-item-id="a">
                        <div class="uk-nestable-item">
                            <div class="uk-nestable-handle"></div>
                            <div data-nestable-action="toggle"></div>
                            <div class="list-label">{{trans('admin.'.$menu->name)}}-{{$menu->id}}</div>
                            @if($menu->id>24)
                            <div class="btn-group navbar-right">
                                <a href="{{route('admin.menu.edit',$menu->id)}}" type="button" class="btn btn-info btn-sm">修改</a>
                            </div>
                            @endif
                        </div>
                        @if(!empty($menu->children))
                        <ul>
                            @foreach($menu->children as $ck=>$cnode)
                            <li data-item="Item 7" data-item-id="g">
                                <div class="uk-nestable-item">
                                    <div class="uk-nestable-handle"></div>
                                    <div data-nestable-action="toggle"></div>
                                    <div class="list-label">{{trans('admin.'.$cnode->name)}}-{{$cnode->id}}</div>
                                    @if($menu->id>24)
                                    <div class="btn-group navbar-right">
                                        <a href="{{route('admin.menu.edit',$cnode->id)}}" type="button" class="btn btn-info btn-sm">修改</a>
                                    </div>
                                    @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                @endforeach
                </ul>

            </div>
            {{--<div class="col-sm-4">--}}
                {{--<textarea id="nestable-list-1-ev" class="form-control" rows="17" placeholder="Nestable Events"></textarea>--}}
            {{--</div>--}}
        </div>

    </div>
</div>

@stop
@section('style')
    {!! Html::style('style/assets/js/datatables/dataTables.bootstrap.css') !!}
    <!-- Imported styles on this page -->
    {!! Html::style('style/assets/js/uikit/uikit.css') !!}
@stop
@section('script')

    <!-- Imported scripts on this page -->
    {!! Html::script('style/assets/js/uikit/js/uikit.min.js') !!}
    {!! Html::script('style/assets/js/uikit/js/addons/nestable.min.js') !!}

@stop