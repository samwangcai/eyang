-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2012 年 07 月 27 日 00:25
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `song`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `zy_admin`
-- 

CREATE TABLE `zy_admin` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `zy_admin`
-- 

INSERT INTO `zy_admin` VALUES (1, 'sam', 'sam121');

-- --------------------------------------------------------

-- 
-- 表的结构 `zy_article`
-- 

CREATE TABLE `zy_article` (
  `id` int(11) NOT NULL auto_increment,
  `category` varchar(100) default NULL,
  `author` varchar(200) default NULL,
  `add_time` datetime NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text,
  `pictures` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- 
-- 导出表中的数据 `zy_article`
-- 

INSERT INTO `zy_article` VALUES (11, '1', NULL, '0000-00-00 00:00:00', '代理服务器拒绝连接', 'Firefox 尝试联系您指定的代理服务器时连接被拒绝。\r\n\r\n 请检查浏览器的代理服务器设置是否正确。请联系您的网络管理员以确认代理服务器工作正常。', '/content_title_brand_en_3.jpg');
INSERT INTO `zy_article` VALUES (13, '1', 'sam', '2012-01-24 05:58:24', '此例它指的是top.html页面', '1.window指代的是当前页面，例如对于此例它指的是top.html页面。 <br />2.parent指的是当前页面的父页面，也就是包含它的框架页面。例如对于此例它指的是framedemo.html。 <br />3.frames是window对象，是一个数组。代表着该框架内所有子页面。 <br />4.item是方法。返回数组里面的元素。 <br />5.如果子页面也是个框架页面，里面还是其它的子页面，那么上面的有些方法可能不行。 <br />附： <br />Javascript刷新页面的几种方法： <br />1 history.go(0) <br />2 location.reload() <br />3 location=location <br />4 location.assign(location) <br />5 document.execCommand(''Refresh'') <br />6 window.navigate(location) <br />7 location.replace(location) <br />8 document.URL=location.href <br />', '/content_title_brand_en_3.jpg');
INSERT INTO `zy_article` VALUES (27, '1', 'sam', '2012-01-30 15:13:30', '尚纳正品短款薄羽绒服 女韩版新潮流修身型春装外套特价包邮 1121 ', 'void QThread::start ( Priority priority = InheritPriority ) [slot]\r\n\r\nBegins execution of the thread by calling run(), which should be reimplemented in a QThread subclass to contain your code. The operating system will schedule the thread according to the priority parameter. If the thread is already running, this function does nothing.\r\n\r\nThe effect of the priority parameter is dependent on the operating system''s scheduling policy. In particular, the priority will be ignored on systems that do not support thread priorities (such as on Linux, see http://linux.die.net/man/2/sched_setscheduler for more details).\r\n\r\nSee also run() and terminate().\r\nvoid QThread::started () [signal]\r\n\r\nThis signal is emitted when the thread starts executing.\r\n\r\nSee also finished() and terminated().\r\nvoid QThread::terminate () [slot]\r\n\r\nTerminates the execution of the thread. The thread may or may not be terminated immediately, depending on the operating systems scheduling policies. Use QThread::wait() after terminate() for synchronous termination.\r\n\r\nWhen the thread is terminated, all threads waiting for the thread to finish will be woken up.\r\n\r\nWarning: This function is dangerous and its use is discouraged. The thread can be terminated at any point in its code path. Threads can be terminated while modifying data. There is no chance for the thread to clean up after itself, unlock any held mutexes, etc. In short, use this function only if absolutely necessary.\r\n\r\nTermination can be explicitly enabled or disabled by calling QThread::setTerminationEnabled(). Calling this function while termination is disabled results in the termination being deferred, until termination is re-enabled. See the documentation of QThread::setTerminationEnabled() for more information.\r\n\r\nSee also setTerminationEnabled().\r\nvoid QThread::terminated () [signal]\r\n\r\nThis signal is emitted when the thread is terminated.\r\n\r\nSee also started() and finished().\r\nvoid QThread::usleep ( unsigned long usecs ) [static protected]\r\n\r\nCauses the current thread to sleep for usecs microseconds.\r\n\r\nSee also sleep() and msleep().\r\nbool QThread::wait ( unsigned long time = ULONG_MAX )\r\n\r\nBlocks the thread until either of these conditions is met:\r\n\r\n    The thread associated with this QThread object has finished execution (i.e. when it returns from run()). This function will return true if the thread has finished. It also returns true if the thread has not been started yet.\r\n    time milliseconds has elapsed. If time is ULONG_MAX (the default), then the wait will never timeout (the thread must return from run()). This function will return false if the wait timed out.\r\n\r\nThis provides similar functionality to the POSIX pthread_join() function.\r\n\r\nSee also sleep() and terminate().\r\nvoid QThread::yieldCurrentThread () [static]\r\n\r\nYields execution of the current thread to another runnable thread, if any. Note that the operating system decides to which thread to switch.', '/t2mav6xd4cxxxxxxxx_!!552436046[1].jpg');
INSERT INTO `zy_article` VALUES (28, '1', 'sam', '2012-02-19 13:54:19', '疯狂周末购2012夏装新款韩版女装荷叶修身假两件套雪纺连衣裙', '新款夏装缤纷印花轻薄雪纺性感镂空及地长裙\r\n\r\n    关键字：\r\n    价格： 到\r\n\r\n折扣季 5折连衣裙推荐\r\n\r\n    折扣季VM纯棉两穿高腰长款褶皱牛仔连衣裙N深牛仔蓝|312242016162\r\n    289.50 元\r\n    已销售：45 件\r\n    (已有20人评论)\r\n    折扣季VM圆领压褶雪纺宽松无袖短款连衣裙N(浅粉)|312207134111\r\n    274.50 元\r\n    已销售：157 件\r\n    (已有78人评论)\r\n    折扣季VM吊带百褶中长款宽松连衣裙N(象牙白)|312207114025\r\n    274.50 元\r\n    已销售：34 件\r\n    (已有20人评论)\r\n    折扣季VM圆领双层拼接收腰捏褶无袖连衣裙C(浅黄)|312207092052\r\n    349.50 元\r\n    已销售：32 件\r\n    (已有17人评论)\r\n    折扣季VM吊带高腰线条纹两穿合体中长款连衣裙N深蓝|312207091031\r\n    239.50 元\r\n    已销售：54 件\r\n    (已有24人评论)\r\n    折扣季VM雪纺印花翻领无袖开襟式长款连衣裙N(浅黄)|312207090052\r\n    274.50 元\r\n    已销售：12 件\r\n    (已有1人评论)\r\n    折扣季VMV领抽象条纹印花雪纺短款连衣裙C(灰粉)|312207054115\r\n    349.50 元\r\n    已销售：2 件\r\n    (已有0人评论)\r\n    折扣季VM层叠荷叶边压褶拼接单肩连衣裙C(红)|312207053070\r\n    349.50 元\r\n    已销售：64 件\r\n    (已有30人评论)\r\n    折扣季VM圆领花边装饰百褶拼缝无袖短款连衣裙C(黄|312207089050\r\n    324.50 元\r\n    已销售：61 件\r\n    (已有12人评论)\r\n    折扣季VM雪纺纱肩部抽褶高腰荷叶边连衣裙N(浅粉)|312207076111\r\n    274.50 元\r\n    已销售：228 件\r\n    (已有28人评论)\r\n    折扣季VM圆领几何条纹不规则裙摆连衣裙N(黑/Black)|312207044010\r\n    299.50 元\r\n    已销售：52 件\r\n    (已有5人评论)\r\n', '/t2zibxxbhnxxxxxxxx_!!676649324[1].jpg');
INSERT INTO `zy_article` VALUES (32, '1', 'sam', '2012-07-17 10:07:17', '喵~~为了使您购物更加方便，我们对搜索结果做了优化，您觉得不习惯，可以点右边按钮返回旧版操作，点右下角的小猫还可以给我们留建议哦~~', '裙装\r\n\r\n    连衣裙(210181)\r\n    半身裙(47876)\r\n\r\n上衣\r\n\r\n    T恤(116645)\r\n    针织衫(24002)\r\n    衬衫(54285)\r\n    小西装(10108)\r\n    雪纺衫(27125)\r\n    吊带/背心(12776)\r\n    马甲(5519)\r\n\r\n裤子\r\n\r\n    牛仔裤(41362)\r\n    休闲长裤(73500)\r\n    正装长裤(900)\r\n    九分裤/七分裤(8460)\r\n    中裤/五分裤(1825)\r\n    打底裤(18244)\r\n    短裤/热裤(5745)\r\n\r\n特色市场\r\n\r\n    中老年服装(35523)\r\n    婚纱/礼服/旗袍(102565)\r\n    套装(13992)\r\n    唐装/中式服装(8787)\r\n    制服/校服(25216)\r\n    大码女装(17125)\r\n\r\n秋冬商品\r\n\r\n    风衣(15084)\r\n    毛呢外套(11288)\r\n    棉衣棉服(10297)\r\n    PU外套(5134)\r\n    真皮皮衣(9126)\r\n    羽绒服(16200)\r\n    皮草(8201)\r\n    短外套(18096)\r\n    卫衣/绒衫(11548)\r\n\r\n', '/t2mlxnxltnxxxxxxxx_!!676649324[1].jpg');

-- --------------------------------------------------------

-- 
-- 表的结构 `zy_carts`
-- 

CREATE TABLE `zy_carts` (
  `id` int(20) NOT NULL auto_increment,
  `oid` varchar(20) NOT NULL,
  `pid` int(10) NOT NULL,
  `thumb` varchar(255) default NULL,
  `pname` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(4) NOT NULL,
  `size` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `add_time` datetime NOT NULL,
  `last_updata_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `zy_carts`
-- 

INSERT INTO `zy_carts` VALUES (1, '8-964656535', 2, '/t2mlxnxltnxxxxxxxx_!!676649324[1].jpg', '以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误', 20, 1, '12', '4', '2012-07-27 00:08:55', '2012-07-27 00:08:55');

-- --------------------------------------------------------

-- 
-- 表的结构 `zy_features`
-- 

CREATE TABLE `zy_features` (
  `id` int(20) NOT NULL auto_increment,
  `category` varchar(100) NOT NULL,
  `display` varchar(200) NOT NULL,
  `oid` int(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- 导出表中的数据 `zy_features`
-- 

INSERT INTO `zy_features` VALUES (1, 'gender', '男', 0);
INSERT INTO `zy_features` VALUES (2, 'gender', '女', 0);
INSERT INTO `zy_features` VALUES (3, 'age', '儿童 (0 ~ 13)', 0);
INSERT INTO `zy_features` VALUES (4, 'color', '白色', 0);
INSERT INTO `zy_features` VALUES (5, 'category', '上装', 0);
INSERT INTO `zy_features` VALUES (6, 'material', '纯棉', 0);
INSERT INTO `zy_features` VALUES (7, 'sizes', 'MX', 0);
INSERT INTO `zy_features` VALUES (8, 'category', '裤装', 0);
INSERT INTO `zy_features` VALUES (9, 'category', '套装', 0);
INSERT INTO `zy_features` VALUES (10, 'category', '连衣裙', 0);
INSERT INTO `zy_features` VALUES (11, 'sizes', 'S', 0);
INSERT INTO `zy_features` VALUES (12, 'sizes', 'M', 0);
INSERT INTO `zy_features` VALUES (13, 'sizes', 'L', 0);
INSERT INTO `zy_features` VALUES (14, 'sizes', 'XXL', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `zy_order`
-- 

CREATE TABLE `zy_order` (
  `id` varchar(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumb` varchar(255) default NULL,
  `total` float NOT NULL,
  `contact` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `statue` varchar(100) NOT NULL,
  `add_time` datetime NOT NULL,
  `last_updata` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `zy_order`
-- 

INSERT INTO `zy_order` VALUES ('8-964656535', 8, '以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误', '/t2mlxnxltnxxxxxxxx_!!676649324[1].jpg', 20, '旺财', '1234567890', '上海徐汇区', 'processing', '2012-07-27 00:08:55', NULL);

-- --------------------------------------------------------

-- 
-- 表的结构 `zy_populers`
-- 

CREATE TABLE `zy_populers` (
  `id` int(10) NOT NULL auto_increment,
  `txt` tinytext,
  `category` varchar(200) default NULL,
  `pictures` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `zy_populers`
-- 

INSERT INTO `zy_populers` VALUES (1, 'homepage top 01', '首页大图', '/t2dcxwxgpdxxxxxxxx_!!676649324[1].jpg', NULL);
INSERT INTO `zy_populers` VALUES (2, 'homepage top 02', '首页大图', '/t2hhlixkvnxxxxxxxx_!!899093663[1].jpg', 'http://localhost/zhouyang/products_detail_en.php?id=1');
INSERT INTO `zy_populers` VALUES (3, 'homepage top 03', '首页大图', '/t26gv7xdvcxxxxxxxx_!!676649324[1].jpg', NULL);
INSERT INTO `zy_populers` VALUES (4, 'homepage top 04', '首页大图', '/t1ftbwxjlhxxb1upjx[1]', 'http://localhost/zhouyang/products_detail_en.php?id=2');

-- --------------------------------------------------------

-- 
-- 表的结构 `zy_products`
-- 

CREATE TABLE `zy_products` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `gender` varchar(50) default NULL,
  `category` varchar(200) default NULL,
  `thumb` varchar(255) default NULL,
  `pictures` text,
  `market_price` float default NULL,
  `sale_price` float default NULL,
  `age` varchar(255) default NULL,
  `sizes` varchar(255) default NULL,
  `color` varchar(255) default NULL,
  `material` varchar(255) default NULL,
  `weight` varchar(200) default NULL,
  `packaging` varchar(200) default NULL,
  `features` text,
  `synopsis` text,
  `context` text,
  `stars` int(2) default NULL,
  `is_show` int(2) NOT NULL default '0',
  `is_new` int(2) NOT NULL default '0',
  `is_hot` int(2) NOT NULL default '0',
  `add_time` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `zy_products`
-- 

INSERT INTO `zy_products` VALUES (1, '带有确认框的try...catch 语句: 另一个编写', '2||', '5||', '2', '/t2mav6xd4cxxxxxxxx_!!552436046[1].jpg||/2b16_4b86673e_08c7_a13d_33e6_f4cf85ec8f6b_1[1].jpg||/t2a34vxk8cxxxxxxxx_!!676649324[1].jpg||', 20, 10, '3||', '12||7||', '4||', '6||', '18mm*30m', 'PET self-seal bag', NULL, '这一章我们就会学习怎样捕捉和处理这些JavaScript的出错信息，以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误', '这一章我们就会学习怎样捕捉和处理这些JavaScript的出错信息，以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误这一章我们就会学习怎样捕捉和处理这些JavaScript的出错信息，以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误', 3, 1, 1, 1, '2010-06-11 11:16:11');
INSERT INTO `zy_products` VALUES (2, '以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误', '1||2||', '10||9||8||5||', '2', '/2b7c_0041c3fd_a7da_4b82_6c0d_0858d142d1dd_1[1].jpg||/2b1d_ec1a972a_97fe_1b47_a2b2_fdd2013ad633_1[1].jpg||/t2mlxnxltnxxxxxxxx_!!676649324[1].jpg||', 22, 20, '3||', '13||12||11||7||14||', '4||', '6||', 'adfa sdf as dfasdf sdf', 'asf"a sdfas"dfa asdf ''asdf ', NULL, '2007年4月28日 – JS 事件 JS Throw. The try...catch statement allows you to test a block of code for errors. 使用try...catch声明让你能够测试出错误的代码', '1.	首页上部四张图片缺少，且无连接。首页上面四个大图对应的顺序是Brand Story, Design \r\nPhilosophy, Green Eco, Quality Guarantee，单词首字大写，请补上图片和链接。\r\n2.	最底部的导航栏的文字顺序应为: homepage, updates, products, brand story, design philosophy, our team, green eco, quality guarantee，也就是把design philosophy和brand story的位置兑换，另外所有字母都是小写。\r\n3.	Products页面现在进入有问题，进去后除了边上和底部的导航栏，并没有任何内容，请修改。\r\n4.	New updates页面中时间请修改成月，日，年的格式，例如“May 21 2012” 月份三个英文字母表示即可。在后台的操作中 月，日，年都采用下拉菜单选择的方式。后台和页面的记录排序都根据时间顺序倒序，也就是最新的在最前面，最老的记录在后面。\r\n', 4, 1, 1, 1, '2011-11-10 00:00:00');
INSERT INTO `zy_products` VALUES (3, '语句: 另一个编写带有确认框的try...catch ', '2||', '9||5||', '3', '/t2mav6xd4cxxxxxxxx_!!552436046[1].jpg||/r8.jpg||/t2mlxnxltnxxxxxxxx_!!676649324[1].jpg||/t2a34vxk8cxxxxxxxx_!!676649324[1].jpg||', 20, 10, '3||', '12||', '4||', '6||', '18mm*30m', 'PET self-seal bag', NULL, '这一章我们就会学习怎样捕捉和处理这些JavaScript的出错信息，以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误', '这一章我们就会学习怎样捕捉和处理这些JavaScript的出错信息，以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误这一章我们就会学习怎样捕捉和处理这些JavaScript的出错信息，以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误', 3, 1, 1, 1, '2010-06-11 11:16:11');
INSERT INTO `zy_products` VALUES (4, '以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误', '1||2||', '10||9||8||5||', '2', '/2b7c_0041c3fd_a7da_4b82_6c0d_0858d142d1dd_1[1].jpg||/2b1d_ec1a972a_97fe_1b47_a2b2_fdd2013ad633_1[1].jpg||/t2zibxxbhnxxxxxxxx_!!676649324[1].jpg||', 22, 20, '3||', '13||11||14||', '4||', '6||', 'adfa sdf as dfasdf sdf', 'asf"a sdfas"dfa asdf ''asdf ', NULL, '2007年4月28日 – JS 事件 JS Throw. The try...catch statement allows you to test a block of code for errors. 使用try...catch声明让你能够测试出错误的代码', '1.	首页上部四张图片缺少，且无连接。首页上面四个大图对应的顺序是Brand Story, Design \r\nPhilosophy, Green Eco, Quality Guarantee，单词首字大写，请补上图片和链接。\r\n2.	最底部的导航栏的文字顺序应为: homepage, updates, products, brand story, design philosophy, our team, green eco, quality guarantee，也就是把design philosophy和brand story的位置兑换，另外所有字母都是小写。\r\n3.	Products页面现在进入有问题，进去后除了边上和底部的导航栏，并没有任何内容，请修改。\r\n4.	New updates页面中时间请修改成月，日，年的格式，例如“May 21 2012” 月份三个英文字母表示即可。在后台的操作中 月，日，年都采用下拉菜单选择的方式。后台和页面的记录排序都根据时间顺序倒序，也就是最新的在最前面，最老的记录在后面。\r\n', 4, 1, 1, 1, '2011-11-10 00:00:00');
INSERT INTO `zy_products` VALUES (5, '带有确认框的try...catch 语句: 另一个编写', '2||', '5||', '1', '/t2mav6xd4cxxxxxxxx_!!552436046[1].jpg||/t2ospvxflcxxxxxxxx_!!676649324[1].jpg||', 20, 10, '3||', NULL, '4||', '6||', '18mm*30m', 'PET self-seal bag', NULL, '这一章我们就会学习怎样捕捉和处理这些JavaScript的出错信息，以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误', '这一章我们就会学习怎样捕捉和处理这些JavaScript的出错信息，以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误这一章我们就会学习怎样捕捉和处理这些JavaScript的出错信息，以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误', 3, 1, 1, 1, '2010-06-11 11:16:11');
INSERT INTO `zy_products` VALUES (6, '以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误以防止因此而丢失用户。 有两种方法可以在网页中捕捉错误', '1||2||', '5||', '3', '/2b7c_0041c3fd_a7da_4b82_6c0d_0858d142d1dd_1[1].jpg||/2b1d_ec1a972a_97fe_1b47_a2b2_fdd2013ad633_1[1].jpg||/t2go0mxexnxxxxxxxx_!!552436046[1].jpg||/t2hblvxjdcxxxxxxxx_!!676649324[1].jpg||', 22, 20, '3||', '7||', '4||', '6||', 'adfa sdf as dfasdf sdf', 'asf"a sdfas"dfa asdf ''asdf ', NULL, '2007年4月28日 – JS 事件 JS Throw. The try...catch statement allows you to test a block of code for errors. 使用try...catch声明让你能够测试出错误的代码', '1.	首页上部四张图片缺少，且无连接。首页上面四个大图对应的顺序是Brand Story, Design \r\nPhilosophy, Green Eco, Quality Guarantee，单词首字大写，请补上图片和链接。\r\n2.	最底部的导航栏的文字顺序应为: homepage, updates, products, brand story, design philosophy, our team, green eco, quality guarantee，也就是把design philosophy和brand story的位置兑换，另外所有字母都是小写。\r\n3.	Products页面现在进入有问题，进去后除了边上和底部的导航栏，并没有任何内容，请修改。\r\n4.	New updates页面中时间请修改成月，日，年的格式，例如“May 21 2012” 月份三个英文字母表示即可。在后台的操作中 月，日，年都采用下拉菜单选择的方式。后台和页面的记录排序都根据时间顺序倒序，也就是最新的在最前面，最老的记录在后面。\r\n', 4, 1, 1, 1, '2011-11-10 00:00:00');

-- --------------------------------------------------------

-- 
-- 表的结构 `zy_users`
-- 

CREATE TABLE `zy_users` (
  `id` int(11) NOT NULL auto_increment,
  `statue` varchar(10) NOT NULL default 'inactived',
  `lever` int(5) NOT NULL default '0',
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(200) default NULL,
  `company` varchar(200) default NULL,
  `addr` varchar(255) default NULL,
  `phone` varchar(50) default NULL,
  `add_time` datetime default NULL,
  `password` varchar(20) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- 导出表中的数据 `zy_users`
-- 

INSERT INTO `zy_users` VALUES (8, 'acticed', 0, 'sam@waven.com', 'sam', '旺财', 'cereson', '上海徐汇区', '1234567890', '2012-12-01 00:00:00', '123456');
INSERT INTO `zy_users` VALUES (9, 'acticed', 0, '111', 'sam2', NULL, NULL, NULL, NULL, NULL, '121');
INSERT INTO `zy_users` VALUES (10, 'acticed', 0, 'sam222', 'sam222', NULL, NULL, NULL, NULL, NULL, 'sam222');
INSERT INTO `zy_users` VALUES (11, 'acticed', 0, '', 'sss', 'ss', 'ss', 'ss', 'ss', '0000-00-00 00:00:00', 'sss');
INSERT INTO `zy_users` VALUES (12, 'inacticed', 0, 'ssss', 'ssss', NULL, NULL, NULL, NULL, NULL, 'ssss');
INSERT INTO `zy_users` VALUES (13, 'inactived', 0, 'xxxx', 'xxxxx', NULL, NULL, NULL, NULL, NULL, 'xxxxxxxxx');
