-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-05-07 16:06:40
-- 服务器版本： 8.0.32
-- PHP 版本： 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `web`
--

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

CREATE TABLE `login` (
  `username` char(64) NOT NULL,
  `password` char(64) NOT NULL,
  `admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`username`, `password`, `admin`) VALUES
('f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '9a900403ac313ba27a1bc81f0932652b8020dac92c234d98fa0b06bf0040ecfd', 114514),
('4778c04ee1647eaace8130185cf4d39d02679e789a569a02a8a9b903389734ec', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2),
('6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 1),
('efd5dc5497b9502fbc7b54f4da1b2aa1c84c0361413288de9833c8ae7127ca52', '7a802920eed2bc524ad831196c8ce5d1c2893de39719a0fe5f661ea6a1ca0cdb', 1),
('7a84e8a4117d84bc2b6a3bea3dbca995f9a7de5cb009f8faf6abc6a4014924e7', '9855ed83b1a3430553af428278863064cc96bc2e49f1b3c165e59e248ba17709', 2),
('53cb8233b1f5de70722c75801bd30facac393f123b335eaeb1b9d24fe2bbcf4c', 'a566276065aa3c46e143c1663d52b240e24317f643ea2c2eecfa41329b5c382d', 1),
('7729727efe4ea07963c8bf8976a4ba6225110c9811c28f9181d6ff8114e9b69b', '91b4d142823f7d20c5f08df69122de43f35f057a988d9619f6d3138485c9a203', 1),
('e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1),
('5ba0d137d1bb2e0f21f6c00cd856213c88ecf283746be1fb70dadae0a71d7385', 'e8ec35e92762bbedde7dac0d66edf9e775d41ef3326ad9080185a794c63eaecf', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ly`
--

CREATE TABLE `ly` (
  `uid` int NOT NULL,
  `name` text NOT NULL,
  `username` char(64) NOT NULL,
  `txt` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `ly`
--

INSERT INTO `ly` (`uid`, `name`, `username`, `txt`, `time`) VALUES
(5, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', 'ohhh更新了，不过是后台更新，现在使用数据库MYSQL来存储数据，更加方便管理了呢，以前的东西可以在<a href=\"http://47.120.0.219/ly/old.html#end\">这里</a>查看', '2023-04-14 21:44:01'),
(7, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '好了现在都搞好了，后台管理现在方便得一批，我可以随时删里面的内容了，数据库就是好😊', '2023-04-14 22:07:40'),
(8, '气死了啦', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '歪了😭😭😭迪希雅,我我不能说恨你,但是我是接近八十唉,啊啊啊啊你能不能三十抽就歪,', '2023-04-14 23:16:51'),
(9, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '写个更新日志：\n更换了后端存储算法，从文件存储换成了数据库\n后端管理更加方便了😎🤩', '2023-04-15 00:15:53'),
(33, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '现在有名字保存功能了，现在刷新之后提交之后的名字会自动填上去，还加入了继续留言的按钮', '2023-04-16 13:27:49'),
(34, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '现在设置了名字的记录保存7天，另外打开的弹窗现在关闭一次后7日内不会再次弹出', '2023-04-16 14:17:21'),
(36, '233', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '偷看一下', '2023-04-16 14:46:33'),
(37, '233', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '好的,很合理😎', '2023-04-16 14:46:40'),
(40, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '啊哈哈哈哈哈，现在加入了后台的编辑功能，我可以编辑里面的内容了，而且我测试修复bug了好久，现在可以完美兼容html格式的内容<br>比如换行用br标签', '2023-04-16 16:25:49'),
(43, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '都给我去看<a href=\"https://www.dm506.com/play/7892-1-1.html\">我推的孩子</a>啊啊，绝对的神作<br>😎🕶️👌😭 爱门！！<br>愛してる😭😭😭', '2023-04-16 21:37:43'),
(44, '啦啦啦', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '看到我了吗？', '2023-04-17 11:41:23'),
(45, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '青年大学习好他妈傻逼啊，我从8.30开始放，到现在没看完，总是到中途就停了，不放了，现在已经是第11次重放了，我要疯了，啊啊啊啊sb东西，nt青年大学习', '2023-04-17 21:15:28'),
(46, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '阿巴阿巴，看到这条消息的到处帮我宣传一下？没人发东西好无聊的说😘', '2023-04-17 23:24:43'),
(47, 'hzc', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '我hzc实名喜欢ghw.', '2023-04-18 17:03:47'),
(54, 'GLD', '4778c04ee1647eaace8130185cf4d39d02679e789a569a02a8a9b903389734ec', '现在已经正常支持用户注册和登录了<br>登录用户可以编辑和删除自己发送的内容<br>已知bug：在html标签后面换行会导致无法再次编辑！', '2023-04-19 09:39:58'),
(58, '11', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', '111', '2023-04-19 10:16:45'),
(59, 'ongi', 'efd5dc5497b9502fbc7b54f4da1b2aa1c84c0361413288de9833c8ae7127ca52', '好烦，她两星期没给我打电话了🌚', '2023-04-19 12:46:48'),
(60, 'ongi', 'efd5dc5497b9502fbc7b54f4da1b2aa1c84c0361413288de9833c8ae7127ca52', '我yhy实名喜欢qy', '2023-04-19 12:47:44'),
(61, '理念', '7a84e8a4117d84bc2b6a3bea3dbca995f9a7de5cb009f8faf6abc6a4014924e7', '纵使困顿难行，亦当砥砺奋进', '2023-04-19 14:34:00'),
(63, '233', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '怎么啦,给我发这个<br>这个奶茶不好好<br>是不好喝', '2023-04-19 17:04:02'),
(66, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '我就试试，刚刚别人告诉我微信可以直接打开😘', '2023-04-19 17:05:44'),
(70, '学生zwj', '7729727efe4ea07963c8bf8976a4ba6225110c9811c28f9181d6ff8114e9b69b', '俺が神だ!!', '2023-04-20 07:46:20'),
(72, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '我推<a href=\"https://www.dm506.com/play/7892-1-2.html\">第二集</a>更新了！都快给我去看', '2023-04-20 08:55:22'),
(73, '理念', '7a84e8a4117d84bc2b6a3bea3dbca995f9a7de5cb009f8faf6abc6a4014924e7', '玛丽小姐！不要做无畏的挣扎📢你已经被我看中📢马上放下羞涩与我结婚📢！！', '2023-04-20 12:10:29'),
(74, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '楼上的冷静👀', '2023-04-20 20:24:39'),
(75, 'QAZ', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '<p>test</p>\n', '2023-04-21 10:25:49'),
(76, 'QAZ', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '123', '2023-04-21 10:27:30'),
(77, 'QAZ', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '我提个BUG-<br>感谢提交.下午就没这个bug了，之前没考虑这个-by GLD', '2023-04-21 10:28:38'),
(78, 'QAZ', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '送你一张图<br><img src=\"https://i2.100024.xyz/2023/04/21/h5fhnd.webp\"></img>', '2023-04-21 10:38:38'),
(79, 'QAZ', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '11111<br><img src=\"https://i2.100024.xyz/2023/04/21/j3rxzn.webp\"></img>', '2023-04-21 11:56:02'),
(80, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '啊啊啊，什么sb抽签啊😭😭😭', '2023-04-21 16:01:27'),
(81, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', 'UID<br>原神：134304134（只打委托，已经摆烂）<br>崩三：271951331（专刷主线，只为剧情）<br>星铁：101896079（心灰意冷，准备退游）', '2023-04-26 12:52:01'),
(82, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '米忽悠那个骗子，提前开服', '2023-04-26 12:57:53'),
(83, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '啊啊啊，米忽悠我恨你啊啊啊，全部大保底，保底啊啊，没有角色，打不赢了，血回不上来，没有动力了，不玩星铁了😭😭😭😭', '2023-04-27 11:32:02'),
(94, 'GHW', '5ba0d137d1bb2e0f21f6c00cd856213c88ecf283746be1fb70dadae0a71d7385', '冒泡。-你的泡真多', '2023-04-28 12:29:14'),
(95, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '我推<a href=\"https://www.dm506.com/play/7892-1-3.html\">第三集</a>更新了！都快给我去看', '2023-04-28 13:00:57'),
(96, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '今天是炮姐生日耶，B站还记得，进活动页可以领1天大会员，明天下午就又要去学校了，唉😔', '2023-05-02 16:02:59'),
(97, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '这停水停电大学，我要疯了🤯😭😭', '2023-05-03 17:56:19'),
(98, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '换了个图标库~<br>图标和以前不太一样了', '2023-05-05 09:07:48'),
(100, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '现在有个<a href=\"/c\">c页面</a>的嘞，里面都是上机作业的AI生成代码~<br>以后就都收录在这了', '2023-05-05 17:52:00'),
(101, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '星期六还要上课，有点难绷😥', '2023-05-06 16:33:36'),
(103, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '我发现把文件发到Github上然后用CDN引用直链非常好用，可以当文件床用，我写了个把Github链接转CDN的<a href=\"/cdn\">小工具</a>', '2023-05-06 17:02:28'),
(104, 'GLD', 'f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '没人在这发东西，好无聊奥', '2023-05-07 16:05:02');

-- --------------------------------------------------------

--
-- 表的结构 `music`
--

CREATE TABLE `music` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `music`
--

INSERT INTO `music` (`id`) VALUES
(2034742057);

-- --------------------------------------------------------

--
-- 表的结构 `uuid`
--

CREATE TABLE `uuid` (
  `uid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `uuid`
--

INSERT INTO `uuid` (`uid`) VALUES
(105);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
