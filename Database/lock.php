<?php
<<<EOT
MyISAM和MEMORY采用表级锁(table-level locking)。 
MyISAM中是不会产生死锁的，因为MyISAM总是一次性获得所需的全部锁，要么全部满足，要么全部等待。

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

BDB采用页面锁(page-level locking)或表级锁，默认为页面锁。 

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


InnoDB支持行级锁(row-level locking)和表级锁，默认为行级锁。
InnoDB行锁是通过给索引上的索引项加锁来实现的，
这一点MySQL与Oracle不同，Oracle者是通过在数据块中对相应数据行加锁来实现的。
InnoDB这种行锁实现特点意味着：只有通过索引条件检索数据，InnoDB才使用行级锁，否则，InnoDB将使用表锁！
 
 行级锁都是基于索引的，如果一条SQL语句用不到索引是不会使用行级锁的，会使用表级锁。
行级锁的缺点是：如果并发请求大量的锁资源，所以速度慢，内存消耗大。

在InnoDB中，锁是逐步获得的，就造成了死锁的可能。 
在MySQL中，行级锁并不是直接锁记录，而是锁索引。


++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
行级锁与死锁
索引分为主键索引和非主键索引两种：
如果一条sql语句操作了主键索引，MySQL就会锁定这条主键索引；
如果一条语句操作了非主键索引，MySQL会先锁定该非主键索引，再锁定相关的主键索引。 
在UPDATE、DELETE操作时，MySQL不仅锁定WHERE条件扫描过的所有索引记录，而且会锁定相邻的键值，即所谓的next-key locking。

当两个事务同时执行，一个锁住了主键索引，在等待其他相关索引。
另一个锁定了非主键索引，在等待主键索引。这样就会发生死锁。

发生死锁后，InnoDB一般都可以检测到，并使一个事务释放锁回退，另一个获取锁完成事务。
有多种方法可以避免死锁，我们来介绍常见的三种 
  ● 如果不同程序会并发存取多个表，尽量约定以相同的顺序访问表，可以大大降低死锁机会。 
  ● 在同一个事务中，尽可能做到一次锁定所需要的所有资源，减少死锁产生概率； 
  ● 对于非常容易产生死锁的业务部分，可以尝试使用升级锁定颗粒度，通过表级锁定来减少死锁产生的概率；
  
 表锁
 表锁分为表共享读锁（共享锁）与表独占写锁（排他锁）
 
● 共享锁(Share Lock)又称读锁，是读取操作创建的锁。其他用户可以并发读取数据，
但任何事务都不能对数据进行修改（获取数据上的排他锁），直到已释放所有共享锁。 
如果事务T对数据A加上共享锁后，则其他事务只能对A再加共享锁，
不能加排他锁。获准共享锁的事务只能读数据，不能修改数据。 

● 排他锁（exclusive Lock）又称写锁，如果事务T对数据A加上排他锁后，
则其他事务不能再对A加任任何类型的锁。获准排他锁的事务既能读数据，又能修改数据。 

总结  
对于insert、update、delete，InnoDB会自动给涉及的数据加排他锁；
对于一般的Select语句，InnoDB不会加任何锁。
事务可以通过以下语句给显示加共享锁或排他锁：
共享锁：SELECT ... LOCK IN SHARE MODE; 
排他锁：SELECT ... FOR UPDATE;
EOT;
