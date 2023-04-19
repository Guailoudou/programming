-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-04-19 10:04:06
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
('f78e0266caf9fc516803b44a1b9d5200100f07e3e766e297f55dc6e785276f42', '9a900403ac313ba27a1bc81f0932652b8020dac92c234d98fa0b06bf0040ecfd', 3),
('4778c04ee1647eaace8130185cf4d39d02679e789a569a02a8a9b903389734ec', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1);

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
(54, 'GLD', '4778c04ee1647eaace8130185cf4d39d02679e789a569a02a8a9b903389734ec', '现在已经正常支持用户注册和登录了<br>登录用户可以编辑和删除自己发送的内容<br>已知bug：在html标签后面换行会导致无法再次编辑！', '2023-04-19 09:39:58');

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
(58);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
