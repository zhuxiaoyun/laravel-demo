@extends('layouts.default')
@section('title', '主页头头')
@section('content')
    <div class="jumbotron">
        <h1>Hello Lucker</h1>
        <p class="lead">
            您现在所看到的是 <a href="http://www.baidu.com">百度页入口</a>，铛铛铛
        </p>
        <p>一切，将从这里开始</p>
        <p>
            <a href="{{ route('signup') }}" class="btn btn-lg btn-success" role="button">现在注册</a>
        </p>
    </div>
@stop