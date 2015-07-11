<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 7/11/15
 * Time: 3:24 PM
 */
 ?>
 @extends('layouts.home.home')
@section('title')
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">{{$post->title}}</h1>
            <p class="description">{{$post->user->name}}</p>{{$post->created_at}}
        </div>

            <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1">
                    <li>
                        <a href="#"><i class="fa-home"></i>首页</a>
                    </li>
                    <li>
                        <a href="#">文章</a>
                    </li>
                    <li class="active">
                        <strong>{{$post->title}}</strong>
                    </li>
                </ol>

        </div>

    </div>
@stop

@section('main')
 			<section class="profile-env">

 				<div class="row">

 					<div class="col-sm-12">

 						<!-- User timeline stories -->
 						<section class="user-timeline-stories">

 							<!-- Timeline Story Type: Status -->
 							<article class="timeline-story">

 								{!!$post->body!!}

 							</article>


 						</section>

 					</div>

 				</div>

 			</section>
@stop
