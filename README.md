# junbros
junbros是上海华夏安信为了拓词而开发的PHP脚本程序。
1.采用了php原生语言编写，将代码从laravel框架中摘除出来，减少了框架以及各种不必要的插件的冗余代码。
2.使用了redis消息队列功能，异步分发，处理任务，减少了内存溢出，运行超时等性能问题。
3.使用了进程守护，监控php脚本程序24小时不间断运行。
运行必要软件
php，mysql，redis，守护进程。
运行环境
系统：ubuntu-22.04.3-live-server-amd64.iso
php >=7.4
mysql 8.0
nginx 1.22
redis 7.0
守护进程管理器 3.0


