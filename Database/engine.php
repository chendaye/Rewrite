<?php
<<<EOT
数据库引擎是用于存储、处理和保护数据的核心服务。
+++++++++++++++++++++++++++++++++++++++++++

mysql的存储引擎包括：MyISAM、InnoDB、BDB、MEMORY、MERGE、EXAMPLE、NDBCluster、
ARCHIVE、CSV、BLACKHOLE、FEDERATED等，其中InnoDB和BDB提供事务安全表，
其他存储引擎都是非事务安全表。
+++++++++++++++++++++++++++++++++++++++++++++++++++++

MyISAMMySQL ：
5.0 之前的默认数据库引擎，最为常用。拥有较高的插入，查询速度，但不支持事务
每个MyISAM在磁盘上存储成三个文件。文件名都和表名相同，扩展名分别是.frm（存储表定义）、.MYD(MYData，存储数据)、.
MYI(MYIndex，存储索引)。
数据文件和索引文件可以放置在不同的目录，平均分布io，获得更快的速度

MYISAM是MYSQL的ISAM扩展格式和缺省的数据库引擎。
除了提供ISAM里所没有的索引和字段管理的大量功能，
MYISAM还使用一种表格锁定的机制，来优化多个并发的读写操作。
其代价是你需要经常运行OPTIMIZE TABLE命令，来恢复被更新机制所浪费的空间

InnoDB ：
事务型数据库的首选引擎，支持ACID事务，支持行级锁定, MySQL 5.5 起成为默认数据库引擎
InnoDB存储引擎提供了具有提交、回滚和崩溃恢复能力的事务安全。但是对比Myisam的存储引擎，
InnoDB写的处理效率差一些并且会占用更多的磁盘空间以保留数据和索引。

BDB源 自 Berkeley DB，事务型数据库的另一种选择，支持Commit 和Rollback 等其他事务特性
EOT;
