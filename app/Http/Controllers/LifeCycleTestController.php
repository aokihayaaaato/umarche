<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    public function showServiceProviderTest()
    {
        $encrypt = app()->make('encrypter');
        $password = $encrypt->encrypt('password');

        // 自分でサービスプロバイダーを作成して、読み込み時に自動でサービスコンテナに登録される → それを呼び出した！
        $sample = app()->make('serviceProviderTest');

        dd($sample, $password, $encrypt->decrypt($password));
    }

    public function showServiceContainerTest()
    {
        // app()->bind()でサービスコンテナに機能を登録する
        // app()->bind('サービスコンテナに登録する名前', 機能)
        app()->bind('lifeCycleTest', function(){
            return 'ライフサイクルテスト';
        });

        // app()->make()で登録されているサービスコンテナを呼び出す
        // app()->make('サービスコンテナに登録されている名前')
        $test = app()->make('lifeCycleTest');

        // // サービスコンテナなしのパターン
        // $message = new Message();
        // $sample = new Sample($message);
        // $sample->run();

        // サービスコンテナありのパターン
        app()->bind('sample', Sample::class);
        $sample = app()->make('sample');
        $sample->run();

        dd($test, app()); //サービスコンテナに登録されているサービス(機能など)の一覧が見れる
    }
}

class Message
{
    public function send(){
        echo('メッセージ表示');
    }
}

class Sample 
{
    public $message;
    public function __construct(Message $message){
        $this->message = $message;
    }
    public function run(){
        $this->message->send();
    }
}