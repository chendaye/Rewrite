<?php
<<<EOT
索引是对数据库表中一列或多列的值进行排序的一种结构，使用索引可快速访问数据库表中的特定信息。

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

为表设置索引要付出代价的：一是增加了数据库的存储空间，
二是在插入和修改数据时要花费较多的时间(因为索引也要随之变动)。

+++++++++++++++++++++++++++++++++++++++++++++++++++++++
一般来说，应该在这些列上创建索引：
在经常需要搜索的列上
在作为主键的列上
在经常用在连接的列上
在经常需要根据范围进行搜索的列上 
在经常需要排序的列上创建索引
在经常使用在WHERE子句中的列上面创建索引，加快条件的判断速度

一般来说，不应该创建索引的的这些列具有下列特点：
对于那些在查询中很少使用或者参考的列不应该创建索引
对于那些只有很少数据值的列也不应该增加索引
当修改性能远远大于检索性能时，不应该创建索引。这是因为，修改性能和检索性能是互相矛盾的

++++++++++++++++++++++++++++++++++++++++++++++++++++++

可在数据库设计器中创建三种索引：唯一索引 主键索引 聚集索引。

唯一索引 
唯一索引是不允许其中任何两行具有相同索引值的索引。

主键索引
数据库表经常有一列或列组合，其值唯一标识表中的每一行。该列称为表的主键。

聚集索引
在聚集索引中，表中行的物理顺序与键值的逻辑（索引）顺序相同。一个表只能包含一个聚集索引。
如果某索引不是聚集索引，则表中行的物理顺序与键值的逻辑顺序不匹配。与非聚集索引相比，
聚集索引通常提供更快的数据访问速度。


++++++++++++++++++++++++++++++++++++++++++++++++++++++

创建索引可以大大提高系统的性能。
第一，通过创建唯一性索引，可以保证数据库表中每一行数据的唯一性。
第二，可以大大加快数据的检索速度，这也是创建索引的最主要的原因。
第三，可以加速表和表之间的连接，特别是在实现数据的参考完整性方面特别有意义。
第四，在使用分组和排序子句进行数据检索时，同样可以显著减少查询中分组和排序的时间。
第五，通过使用索引，可以在查询的过程中，使用优化隐藏器，提高系统的性能。 

索引也有许多不利的方面。
第一，创建索引和维护索引要耗费时间，这种时间随着数据量的增加而增加。
第二，索引需要占物理空间，除了数据表占数据空间之外，每一个索引还要占一定的物理空间，如果要建立聚簇索引，那么需要的空间就会更大。
第三，当对表中的数据进行增加、删除和修改的时候，索引也要动态的维护，这样就降低了数据的维护速度。
EOT;
