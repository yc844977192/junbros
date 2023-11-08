<?php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$queueName = 'task_queue';

// 查询数据库并将数据放入队列
$dataToProcess = fetchDataFromDatabase(); // 从数据库中获取需要处理的数据
foreach ($dataToProcess as $data) {
    $taskData = ['config' => $data];
    $taskDataJson = json_encode($taskData);
    $redis->lPush($queueName, $taskDataJson);
}
function fetchDataFromDatabase(){
    $config=[
        "servername" => "192.168.61.1",  // 数据库服务器地址
        "username" => "root", // 数据库用户名
        "password" => "zz7323189", // 数据库密码
        "dbname" => "baidu"   // 数据库名称
    ];
//通过百度接口，获取到词
    $conn = new PDO("mysql:host=".$config['servername'].";dbname=".$config['dbname']."", $config['username'], $config['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 这是一个定时任务脚本，例如使用 Cron 每分钟执行一次
    try {
        // 查询数据
        $sql = "SELECT * FROM baidu_query WHERE query_select = 2 limit 5";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data=[];
        foreach ($result as $k=>$v){
            $data[$k]["query_id"]=$result[$k]["query_id"];
            $data[$k]["query_word"]=$result[$k]["query_word"];
        }
        return $data;
    }
    catch(PDOException $e) {
        echo "错误: " . $e->getMessage();
    }
}


