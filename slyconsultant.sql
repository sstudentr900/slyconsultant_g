-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-03-07 16:47:22
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `slyconsultant`
--

-- --------------------------------------------------------

--
-- 資料表結構 `bulletin`
--

CREATE TABLE `bulletin` (
  `id` int(10) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short` varchar(100) NOT NULL,
  `tinymce` mediumtext NOT NULL,
  `release` enum('y','n') NOT NULL DEFAULT 'y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `bulletin`
--

INSERT INTO `bulletin` (`id`, `sort`, `title`, `short`, `tinymce`, `release`, `created_at`, `updated_at`) VALUES
(2, 6, '中華經濟研究院徵求研究人員數名', '中華經濟研究院徵求研究人員數名', '<p>應徵職級：助研究員(同助理教授)、副研究員(同副教授)、研究員(同教授)</p>\r\n<p>應徵資格：<br />原則上111年8月1日起聘(可視情況調整)。申請者應於民國111年8月1日以前取得博士學位證書</p>\r\n<p>應備條件：具經濟、企管、法律等相關領域之博士學位<br />專長領域：經濟政策分析相關之領域<br />待遇：參考教育部大學院校教職人員敘薪標準，並依工作能力與經驗從優敘薪</p>\r\n<p>應備審查資料：<br />1. 詳細履歷表(請說明申請職級)並簡要說明研究旨趣及未來計畫<br />2. 博士學位證書(預計畢業但尚未取得畢業證書者，請檢附臨時學位證明或指導教授出具預計畢業之證明)，申請助研究員者需檢附博士班成績單<br />3. 著作目錄<br />4. 研究著作(學位論文或其他學術代表著作1～2份)<br />5. 三封推薦函(請由推薦者直接寄至<span id=\"cloak3627340e7279d60ce1d60018f3241950\"><a href=\"mailto:fangru@cier.edu.tw\">fangru@cier.edu.tw</a></span>)</p>\r\n<p>請檢具上述1-4項資料並以電子檔寄至<span id=\"cloak64779e8a0035545f4303990821d4b47c\"><a href=\"mailto:fangru@cier.edu.tw\">fangru@cier.edu.tw</a></span>。申請資料到齊後，本院將儘快進行審查，如有必要將先進行視訊面試。</p>\r\n<p>經本院錄取之申請者，若是國外學位文憑，則必須於報到前繳交經外館認證之博士班成績單與博士學位證書</p>\r\n<p>申請截止日期：中華民國110年12月31日<br />聯絡方式：台北市大安區長興街七十五號<br />Tel：(02) 2735-6006轉123 Fax：(02) 2735-6035 秘書劉小姐<br />e-mail：<span id=\"cloak29e283e6699843b163aca4b0dae26c20\"><a href=\"mailto:fangru@cier.edu.tw\">fangru@cier.edu.tw</a></span><br />(相關資料請參閱本院網址：www.cier.edu.tw)</p>', 'y', '2022-01-04 09:16:48', '2022-07-06 08:39:51'),
(4, 7, '[轉發]國立成功大學國際經營管理研究所徵求主管公告', '[轉發]國立成功大學國際經營管理研究所徵求主管公告', '<p>國立成功大學國際經營管理研究所(IMBA)所長推選委員會公告 (110.3.19)</p>\r\n<p>主旨:即日起公開徵求本所所長候選人。</p>\r\n<p>說明:<br />一、本所所長任期將於 110 年 7 月 31 日屆滿,依本委員會 110 年 3 月 19 日第一次會 議決議,即日起公開徵求本所所長候選人。</p>\r\n<p>二、本所所長候選人需具備以下資格:<br />(一) 具副教授以上資格者。<br />(二) 非本所專任教師尚需經本所專任教師至少一人聯名推薦,另需先經所教評會同意聘任後,方得為候選人。</p>\r\n<p>三、自即日起至 110 年 4 月 21 日(三)止,請將相關資料(學經歷、著作目錄、教師證書影本等)掛號寄交台南市國立成功大學國際經營管理研究所所長推選委員會。<br />聯絡人:國際經營管理研究所 溫敏杰所長<br />電 話:(06)275-7575 轉 53629<br />傳 真:(06)234-2469</p>\r\n<p>四、隨附「國立成功大學國際經營管理研究所所長推選、續聘及解聘辦法」及國立成功大學管理學院國際經營管理研究所所長候選人推薦表及資料表。</p>\r\n<p>國立成功大學國際經營管理研究所所長推選、續聘及解聘辦法&nbsp;<a href=\"http://www.finance.org.tw/wp-content/uploads/2021/03/2015.2.10.pdf\">2015.2.10</a>&nbsp;<a href=\"http://www.finance.org.tw/wp-content/uploads/2021/03/VITA.doc\"><br /></a></p>\r\n<p>國立成功大學管理學院國際經營管理研究所所長候選人推薦表&nbsp;&nbsp;<a href=\"http://www.finance.org.tw/wp-content/uploads/2021/03/VITA.doc\">VITA</a></p>', 'y', '2022-01-07 10:15:14', '2022-03-15 15:43:37'),
(5, 5, '[轉發]Call for Paper 2021 AsianFA Annual Meeting', '[轉發]Call for Paper 2021 AsianFA Annual Meeting', '<div>諸位會員您好：</div>\r\n<div>&nbsp;</div>\r\n<div>代轉發2021 AsianFA Annual Meeting相關訊息，</div>\r\n<div>請看附件或至官方網站(&nbsp;<a href=\"http://www.asianfa.org/\" target=\"_blank\" rel=\"noopener noreferrer\" data-saferedirecturl=\"https://www.google.com/url?q=http://www.asianfa.org/&amp;source=gmail&amp;ust=1616461357156000&amp;usg=AFQjCNHvLd4ufbbEOMVzJcz7zYKCCi9KyA\">http://www.<wbr />asianfa.org/</a>&nbsp;)查詢。</div>\r\n<div>&nbsp;</div>\r\n<p><a href=\"http://www.finance.org.tw/wp-content/uploads/2021/03/AsianFA-2021_CFP-v4.pdf\">AsianFA 2021_CFP v4</a></p>', 'y', '2022-01-07 10:15:31', '2022-01-07 10:15:31'),
(6, 3, '「應用經濟論叢」徵稿啟事', '「應用經濟論叢」徵稿啟事', '<p>《應用經濟論叢》第107期已出刊，網站即日起開放下載論文全文電子檔，無需登入即可下載！歡迎學界朋友參考引用及踴躍投稿。本刊自1963年創刊至今，收錄於科技部TSSCI之重要文獻索引資料庫，2019年僅收錄5本經濟學門期刊，本刊為其中之一。</p>\r\n<p>1、 中英文學術論文皆可，投稿內文須具備研究方法、模型與實證分析之經濟相關論文，研究主題包括農業經濟、產業經濟、財務經濟、能源經濟、環境經濟、國際經濟、健康經濟、勞動經濟或其他具政策涵意之學術專業論文。</p>\r\n<p>2、 本刊為半年刊，每年六月及十二月出刊，一年出版兩期。</p>\r\n<p>3、 文稿篇幅不超過30頁為原則，正文以不少於一萬二千字，但不超過兩萬字為原則，中、英文摘要以三百至五百字為原則。</p>\r\n<p>4、 來稿請至應用經濟論叢線上投稿系統http://tjaecon.nchu.edu.tw/。</p>\r\n<p>5、 如欲瞭解本刊徵稿格式及其他相關資訊，歡迎參閱本刊線上網頁http://tjaecon.nchu.edu.tw/。</p>\r\n<p>若有任何疑問，請電洽(04-22840350轉224)或以E-mail方式(<span id=\"cloak46098d1a9fbdcd19bf53bcdf8cfde73f\"><a href=\"mailto:jagecon@dragon.nchu.edu.tw\">jagecon@dragon.nchu.edu.tw</a></span>)洽詢本刊編輯助理王小姐。</p>\r\n<p>耑此 順頌<br />研安</p>\r\n<p>國立中興大學應用經濟學系<br />《應用經濟論叢》編輯委員會<br />謹啟</p>', 'y', '2022-01-07 10:15:51', '2022-03-15 15:42:57'),
(7, 1, '國立政治大學風險管理與保險學系徵聘專任教師公告', '國立政治大學風險管理與保險學系徵聘專任教師公告', '<p>本系擬徵聘專任教師1名，相關資訊如下：<br />一、 職等：助理教授（含）以上<br />二、 名額：1名<br />三、 專長領域：風險管理與保險、精算、保險法相關領域<br />四、 資格：<br />&nbsp; &nbsp; 1.具教育部認可國內外博士學位或已具有助理教授(含)以上資格者。<br />&nbsp; &nbsp; 2.具備英語教學能力。<br />五、 預計起聘日：民國110年2月1日<br />六、 應繳交資料：<br />（1） 履歷表。<br />（2） 博士學位證書(若為博士候選人最晚須於109年7月底前取得博士學位並提出具論文口試通過之正式證明)及學經歷證明影本。（錄取後驗正本，如為外國學歷，請於相關駐外館處辦妥驗證）<br />（3） 博士班成績單正本一份（已有教師證書者得免附）。<br />（4） 教師證書影本一份（尚未取得教師證書者免附）。<br />（5） 博士論文一份 (具副教授及教授資格者免附博士論文) 。<br />（6） 近五年內研究著作目錄一份。<br />（7） 研究著作目錄一份。<br />（8） 相關著作或研究成果。<br />（9） 推薦信一封。<br />七、 備註：<br />&nbsp; &nbsp; 1.有意應徵者請備妥上述資料郵寄至「11605台北市文山區指南路二段64 號，國立政治大學風險管理與保險學系教師遴選委員會」收，並將電子 檔寄至<span id=\"cloak857e94acdf5ab5fd3d1e3e834fd8910e\"><a href=\"mailto:wanting1@nccu.edu.tw\">wanting1@nccu.edu.tw</a></span>，本系將隨到隨審。<br />&nbsp; &nbsp; 2.聯絡方式：<br />電話：886-2-29393091 轉 89072 鄭助教<br />傳真：886-2-29393864<br />E-mail：<span>&nbsp;</span><span id=\"cloake58a8006e8691447ff9c1965c1b8a5b2\"><a href=\"mailto:wanting1@nccu.edu.tw\">wanting1@nccu.edu.tw</a></span><br />風管系網址：<a href=\"https://rmi.nccu.edu.tw/\">https://rmi.nccu.edu.tw/</a></p>\r\n<p>中、英文版「2019國立政治大學商學院優秀師資招聘手冊」連結分別如下：<br />&bull; 2019國立政治大學商學院優秀師資招聘手冊（中文版）<br />　　&nbsp;<a href=\"https://bit.ly/2DogOvN\">https://bit.ly/2DogOvN</a><br />&bull; 2019國立政治大學商學院優秀師資招聘手冊（英文版）（108/02新增）<br />　　&nbsp;<a href=\"https://goo.gl/nUdt6s\">https://goo.gl/nUdt6s</a></p>', 'y', '2022-01-07 10:16:15', '2022-03-15 15:42:40'),
(17, 8, '[徵才]中經院-111年度研究人員召募訊息', '中華經濟研究院徵求研究人員數名', '<p style=\"text-align: left;\">中華經濟研究院徵求研究人員數名</p>\r\n<p>應徵職級：助研究員<span>(</span>同助理教授<span>)</span></p>\r\n<p>應徵資格：112年<span>8</span>月<span>1</span>日起聘<span>(</span>可視情況調整<span>)</span>。申請者應於應聘前取得博士學位證書</p>\r\n<p>應備條件：具經濟、企管、法律等相關領域之博士學位</p>\r\n<p>專長領域：經濟政策分析相關之領域</p>\r\n<p>待遇：參考教育部大學院校教職人員敘薪標準，並依工作能力與經驗從優敘薪</p>\r\n<p>&nbsp;</p>\r\n<p>應備審查資料：</p>\r\n<ol>\r\n<li>詳細履歷表<span>(</span>請說明國籍<span>)</span>並簡要說明研究旨趣及未來計畫</li>\r\n<li>博士學位證書<span>(</span>預計畢業但尚未取得畢業證書者，請檢附臨時學位證明或指導教授出具預計畢業之證明及博士班成績單<span>)</span>。</li>\r\n<li>著作目錄</li>\r\n<li>研究著作<span>(</span>學位論文或其他學術代表著作<span>1</span>～<span>2</span>份<span>)</span></li>\r\n<li>三封推薦函<span>(</span>請由推薦者直接寄至<span>fangru@cier.edu.tw)</span></li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>請檢具上述<span>1-4</span>項資料並以電子檔寄至<span>fangru@cier.edu.tw</span>。申請資料到齊後，本院將儘快進行審查，如有必要將先進行視訊面試。</p>\r\n<p>經本院錄取之申請者，若是國外學位文憑，則必須於報到前繳交經外館認證之博士班成績單與博士學位證書</p>\r\n<p>&nbsp;</p>\r\n<p>申請截止日期：中華民國<span>111</span>年<span>12</span>月<span>31</span>日</p>\r\n<p>聯絡方式：台北市大安區長興街七十五號</p>\r\n<p>Tel：<span>(02) 2735-6006</span>轉<span>123&nbsp; Fax</span>：<span>(02) 2735-6035&nbsp;&nbsp;&nbsp; </span>秘書劉小姐</p>\r\n<p>e-mail：<span>fangru@cier.edu.tw </span></p>\r\n<p>(相關資料請參閱本院網址：<span>www.cier.edu.tw)</span></p>', 'y', '2022-09-29 09:17:11', '2022-09-29 09:19:23'),
(18, 18, '國立中正大學財務金融學系誠徵教師', '國立中正大學財務金融學系誠徵教師', '<p>一、徵聘職級及員額: 助理教授級以上師資2名<br />二、起聘日期: 民國112年8月1日或113年2月1日<br />三、應徵資格:<br />&nbsp; &nbsp; &nbsp;1.具教育部認可國內外博士學位。<br />&nbsp; &nbsp; &nbsp;2.研究專長領域為財務金融相關。<br />&nbsp; &nbsp; &nbsp;3.具備雙語(中英)授課能力，具有旅外英語教學研究經驗者尤佳。<br />&nbsp; &nbsp; &nbsp;4.能夠教授金融市場與機構、風險管理、債券市場、財務工程、統計學、期貨與選擇權、資產管理、財富管理等相關領域課程。<br />&nbsp; &nbsp; &nbsp;5.經審核進入面試之申請人，需以全英語進行一篇研究論文發表及教學課程試教。<br />&nbsp; &nbsp; &nbsp;6.新進教師一學年至少需開授一門英語教學課程。<br />&nbsp; &nbsp; &nbsp;7.需符合本校新進教師聘任相關規定。<br />(請參酌網址:https://person.ccu.edu.tw/var/file/15/1015/img/436/416452807.pdf)<br />&nbsp; &nbsp; &nbsp;8.本校依性別平等教育法第27條第4項規定，需辦理性侵害犯罪紀錄查詢。<br />四、應備文件:<br />&nbsp; &nbsp; &nbsp;1.履歷表(科技部個人資料表)。<br />&nbsp; &nbsp; &nbsp;2.應徵信函(研究成果自述、未來3年之研究構想)。<br />&nbsp; &nbsp; &nbsp;3.博士學位證(明)書及學經歷證(明)書 (尚未取得畢業證書者，請檢附臨時學位證明或指導教授出具之預計畢業之證明)。<br />&nbsp; &nbsp; &nbsp;4.博士班成績單(具副教授以上資格者免附此項文件)。<br />&nbsp; &nbsp; &nbsp;5.博士論文及近五年內著作清單(具副教授以上資格者免附博士論文)。<br />&nbsp; &nbsp; &nbsp;6.近五年擔任計畫主持人之研究計畫清冊(科技部計畫、產學合作計畫等)。<br />&nbsp; &nbsp; &nbsp;7.可教授科目表(含課程大綱)。<br />&nbsp; &nbsp; &nbsp;8.推薦信兩封(已在國內任教者免附此項文件)。<br />&nbsp; &nbsp; &nbsp;9.上述文件請依序排列，彙整為一個電子檔，於民國112年1月31日前，e-mail至admsyc@ccu.edu.tw，主旨: 應徵中正大學財金系教&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 師。<br />五、聯絡方式: 電話: 886-(0)5-2720411轉24201張小姐，財金系網址:https://deptfin.ccu.edu.tw/<br />六、合適者優先安排面談，視新冠疫情得採視訊面試。</p>', 'y', '2022-11-02 08:37:12', '2022-11-02 08:38:45'),
(19, 19, '國立彰化師範大學財務金融技術學系徵聘專案教師', '國立彰化師範大學財務金融技術學系徵聘專案教師', '<p>(相關連結：http://fin.ncue.edu.tw/contentinside?contentid=2512)</p>\r\n<p>一、職級：助理教授(含)以上1名。</p>\r\n<p>二、學歷：取得教育部認可之博士學位者，以財務金融領域為主，能夠教授計算機概論、商業應用&nbsp;&nbsp;軟體或其他金融科技相關領域課程為佳。</p>\r\n<p>三、應徵資格：除獲有博士學位之初任教師外，新聘專任教師應具有下列條件(一)~(三)項之一<br /> （一）最近3年至少2篇論文於相關專業領域發表（相當於&nbsp;SCI、SSCI、TSSCI、EI、A&amp;HCI、THCI、SCOPUS&nbsp;或國科會優良期刊第一級與 第二級等學術性期刊論文，且為第一作者或通訊作者）。<br /> （二）最近3年至少應主持2個國科會或公部門研究計畫。<br />&nbsp; &nbsp; &nbsp; &nbsp; (前述論文及國科會或公部門之研究計畫，可相互折抵，但以一件為限。)<br /> （三）具業界實務經驗或專業成就，有具體傑出事蹟可供審查。<br /> （四）能以全英語授課，並具產學合作經驗者尤佳。</p>\r\n<p>四、需附資料：<br /> （一）履歷表（含自傳）；<br /> （二）相關研究著作及國科會計畫之說明；<br /> （三）教學（可授課程及其內容大綱）；<br /> （四）學經歷影本及碩、博士班成績單；<br /> （五）教師證書影本（若無則免）；<br /> （六）其他有助審查之相關資料(如英語能力證明、獲獎紀錄)等。</p>\r\n<p>五、起聘日期：&nbsp;112年2月1日(視聘任程序完成時間而定)。<br />&nbsp; &nbsp; &nbsp;(新進專案教師須適用本校教師多元升等辦法之相關規定)</p>\r\n<p>六、填寫表格(http://fin.ncue.edu.tw/contentinside?contentid=2512)<br /> （一）個人基本資料(如：附加檔案「新聘教師履歷表.doc」、「財金系新聘教師資料表.doc」)<br /> （二）預填本校專兼任教師聘任申請表(如：附加檔案「財金系新聘教師申請表.doc」)</p>\r\n<p>七、意者請將相關資料寄至：</p>\r\n<p>500彰化市師大路2號財務金融技術學系&nbsp;邱婷小姐收(請備註「應聘財務金融技術學系教師」)，<br />※資格符合者將通知面試，不合者恕不另行通知。</p>\r\n<p>※敬請先行將前述「六、填寫表格」第1項及第2項之電子檔mail至finoffice@cc2.ncue.edu.tw</p>\r\n<p>※截止日期：中華民國111&nbsp;年12&nbsp;月13&nbsp;日前寄達(含紙本與電子檔)。</p>', 'y', '2022-12-01 09:00:19', '2022-12-01 09:05:25');

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

CREATE TABLE `manager` (
  `id` int(10) UNSIGNED NOT NULL,
  `cover` varchar(100) NOT NULL DEFAULT 'error.jpg',
  `account` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `release` enum('y','n') NOT NULL DEFAULT 'y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `manager`
--

INSERT INTO `manager` (`id`, `cover`, `account`, `password`, `name`, `phone`, `release`, `created_at`, `updated_at`) VALUES
(20, 'bamanager1690275332.jpg', '1@1.1', '$2y$10$tiyZHfdwRFCY9FuxXg8C.eVGzCot9shT9RnWG8/04J7WFSwNYZQeS', '555', '1111111', 'y', '2022-08-23 01:45:23', '2023-08-07 10:02:01'),
(23, 'bamanager1691467509.jpg', '1@1.16', '$2y$10$P6vqUFy0s5TL/I9Fll217uJJOqSBQevm9b3udlG9EDSj3cMo9qLoa', '6565fffff', '123456', 'y', '2023-08-08 04:05:09', '2023-10-17 09:46:02');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `cover` varchar(100) NOT NULL DEFAULT 'error.jpg',
  `account` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `gender` enum('m','w','n') NOT NULL DEFAULT 'm',
  `occupation` varchar(255) NOT NULL COMMENT '現職',
  `organization` varchar(255) DEFAULT NULL COMMENT '服務機關及職稱',
  `release` enum('y','n') NOT NULL DEFAULT 'y',
  `describe` varchar(255) NOT NULL COMMENT '通訊地址',
  `token` varchar(255) DEFAULT 'error',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `cover`, `account`, `password`, `name`, `phone`, `url`, `gender`, `occupation`, `organization`, `release`, `describe`, `token`, `created_at`, `updated_at`) VALUES
(10, 'bamember1642668032.jpg', '1@1.1', '$2y$10$XXW3hfD1XkjIEcChEgOdlOdJWeVcUpBJgsvgmpKmQ7YiniRiSjIW6', '1', 'ddd', '', 'm', '45645', '', 'y', '545454', '', '2022-01-20 08:40:32', '2023-03-20 06:02:40'),
(83, 'bamember1675402342.jpg', 'xcv@5.5', '$2y$10$sMYqVb7JQuAVA2aFhc3zduPmNyJhbO7P6zaIGaSIplZB7gSo15lwq', 'xzv', 'xcv', NULL, 'm', '', NULL, 'n', '', 'eGN2QDUuNQ==', '2023-02-03 05:32:22', '2023-02-03 05:32:22'),
(84, 'bamember1675403056.jpg', '45@hj.54', '$2y$10$mKhBoW3mT/n//nfKkKiJuu.EJSLxFr.yfrsK4NQYlyYTRCW8tm8.G', '4554', '5454', '4455', 'm', '', NULL, 'y', '5454', NULL, '2023-02-03 05:44:16', '2023-02-03 05:44:16'),
(85, 'bamember1675403145.jpg', '45@5.5', '$2y$10$O8bLlimXKL0XyzCcQSpM8uCyaRnyDjYkspC1C4RZE/Lk/zcjVT64u', '555', '455', NULL, 'm', '', NULL, 'n', '', 'NDVANS41', '2023-02-03 05:45:45', '2023-02-03 07:13:07'),
(95, 'bamember1678851245.jpg', 'sstudentr123700900@yahoo.com.tw', '$2y$10$iLyk7HzT5yL5YDBF9dgEieap.vAv2rJ4NdOwV3e8/3gTZ9pPj4wKC', 'xczzxc', '88', '888', 'w', '888', '888', 'y', '888', 'c3N0dWRlbnRyMTIzNzAwOTAwQHlhaG9vLmNvbS50d185NQ==', '2023-03-15 03:34:05', '2023-04-26 02:20:44'),
(99, 'bamember1682489526.jpg', '5@5.55ff', '$2y$10$RvDIw7kqQZA4Nbak0K0Hj.YcVNJ73CNb5psrMZWd3T5GLtvQJHQsC', '5', '55', '5', 'm', '5', '5', 'y', '55', '後台註冊成功', '2023-04-26 06:12:06', '2023-04-26 06:12:06');

-- --------------------------------------------------------

--
-- 資料表結構 `member_appendix`
--

CREATE TABLE `member_appendix` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `src` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member_appendix`
--

INSERT INTO `member_appendix` (`id`, `member_id`, `src`, `name`, `created_at`, `updated_at`) VALUES
(9, 71, 'public/QVMfe3kIuH0zO0qJ98aPiQz5HdbWYQd4xFSq4ym2.jpg', 'std_applyprove_stu_0.jpg', '2022-11-02 06:11:57', '2022-11-02 06:11:57'),
(10, 73, 'public/c9cpZXVDNIng6AwonGqOkO1e0Zmhb7BSO4Q7G8Tu.png', 'Certificate.png', '2022-11-02 13:26:00', '2022-11-02 13:26:00'),
(11, 79, 'public/KTKt9nhVKcnIkjrKWBCmWlVuG0w7VfiZhRx8LDs6.jpg', '葛晏均-中文碩士畢業證書.jpg', '2023-01-02 07:12:28', '2023-01-02 07:12:28'),
(12, 79, 'public/3B1w2AUoFwMgTjNV3mAkX1Hta91u5pdiOIhJQboT.jpg', '葛晏均的高科大碩士班畢業歷年成績單.jpg', '2023-01-02 07:17:58', '2023-01-02 07:17:58'),
(13, 79, 'public/eG5VWBBzmZW4Qx3RhSunoq0UBMcTqclSPAcbLNa5.jpg', '葛晏均-中文學士畢業證書.jpg', '2023-01-02 07:17:58', '2023-01-02 07:17:58'),
(14, 79, 'public/Tkn1EGqRMQ3RD9F8Uw27tOA84x5Mxdd3K9SUSkfh.jpg', '葛晏均-中文學士歷年成績單.jpg', '2023-01-02 07:17:58', '2023-01-02 07:17:58'),
(21, 97, 'public/9q8Eb48KNMEyzRFdvqCnYtO9Sgac1SRMkVg7vSdI.jpg', '337699818_1069028227390156_6614984672658245857_n.jpg', '2023-04-26 05:32:25', '2023-04-26 05:32:25'),
(22, 97, 'public/W6Flza94EX99bAj60iLiHZ6FtZkAB6vUP6PM2Vx6.jpg', '337429417_1522688518218712_7517269828750448730_n.jpg', '2023-04-26 05:49:38', '2023-04-26 05:49:38'),
(33, 99, 'public/AIWIIJDDUPMLV6DXRdJlUnvMQowjbIYsINNX1d5u.jpg', '337239704_607312264273671_5244066054543272267_n.jpg', '2023-04-26 06:59:53', '2023-04-26 06:59:53');

-- --------------------------------------------------------

--
-- 資料表結構 `orderlist`
--

CREATE TABLE `orderlist` (
  `id` int(11) UNSIGNED NOT NULL,
  `service_id` varchar(255) NOT NULL COMMENT '商品',
  `number` varchar(100) NOT NULL COMMENT '數量',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `orderlist`
--

INSERT INTO `orderlist` (`id`, `service_id`, `number`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2023-10-20 09:19:17', '2023-10-20 09:19:22'),
(192, '1', '1', '2024-02-26 05:57:05', '2024-02-26 05:57:05'),
(193, '81', '1', '2024-02-26 10:06:28', '2024-02-26 10:06:28'),
(194, '1', '1', '2024-07-12 03:30:38', '2024-07-12 03:30:38'),
(195, '1', '1', '2024-09-02 08:29:33', '2024-09-02 08:29:33'),
(196, '1', '1', '2024-09-02 08:30:48', '2024-09-02 08:30:48'),
(197, '1', '3', '2024-09-03 03:05:19', '2024-09-03 03:05:19'),
(198, '81', '1', '2024-09-03 03:05:19', '2024-09-03 03:05:19'),
(199, '1', '3', '2024-09-03 03:31:31', '2024-09-03 03:31:31'),
(200, '81', '1', '2024-09-03 03:31:31', '2024-09-03 03:31:31');

-- --------------------------------------------------------

--
-- 資料表結構 `purchaser`
--

CREATE TABLE `purchaser` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL COMMENT '姓名',
  `phone` varchar(15) NOT NULL COMMENT '連絡電話',
  `city` varchar(50) DEFAULT NULL COMMENT '縣市',
  `township` varchar(50) DEFAULT NULL COMMENT '鄉鎮市區',
  `address` varchar(100) DEFAULT NULL COMMENT '街道地址',
  `email` varchar(100) DEFAULT NULL COMMENT '電子郵件',
  `remark` varchar(255) DEFAULT NULL COMMENT '訂單備註',
  `casenumber` varchar(255) DEFAULT NULL COMMENT '案件編號',
  `releases` enum('y','n') NOT NULL DEFAULT 'y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `purchaser`
--

INSERT INTO `purchaser` (`id`, `username`, `phone`, `city`, `township`, `address`, `email`, `remark`, `casenumber`, `releases`, `created_at`, `updated_at`) VALUES
(105, '柯軍豪', '0986738269', NULL, NULL, '臺北市1555555555', NULL, '加購清償證明 100元', 'TSF10102460-1', 'y', '2023-10-20 08:17:23', '2023-10-20 08:17:23'),
(106, '柯軍豪', '0986738269', NULL, NULL, '臺北市1555555555', NULL, '加購清償證明 100元', 'TSF10102460-1', 'y', '2023-10-20 08:23:25', '2023-10-20 08:23:25'),
(107, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 08:55:58', '2023-10-20 08:55:58'),
(108, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 09:10:55', '2023-10-20 09:10:55'),
(109, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 09:11:58', '2023-10-20 09:11:58'),
(110, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 09:13:14', '2023-10-20 09:13:14'),
(111, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 09:42:00', '2023-10-20 09:42:00'),
(112, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 09:44:51', '2023-10-20 09:44:51'),
(113, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 09:46:11', '2023-10-20 09:46:11'),
(114, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 10:09:44', '2023-10-20 10:09:44'),
(115, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 10:12:16', '2023-10-20 10:12:16'),
(116, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 10:13:11', '2023-10-20 10:13:11'),
(117, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 10:13:32', '2023-10-20 10:13:32'),
(118, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 10:14:20', '2023-10-20 10:14:20'),
(119, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-20 10:20:04', '2023-10-20 10:20:04'),
(120, '林葉子', '0971011594', NULL, NULL, '', NULL, '', 'STWS20103697-1', 'y', '2023-10-20 10:21:33', '2023-10-20 10:21:33'),
(121, '林葉子', '0929380306', NULL, NULL, '', NULL, '', 'STWS20103696-1', 'y', '2023-10-20 10:22:04', '2023-10-20 10:22:04'),
(122, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-23 01:20:25', '2023-10-23 01:20:25'),
(123, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-23 01:21:40', '2023-10-23 01:21:40'),
(124, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-23 01:22:25', '2023-10-23 01:22:25'),
(125, '柯軍豪', '0973612063', NULL, NULL, '', NULL, '', 'STSS10114433-1', 'y', '2023-10-23 01:28:52', '2023-10-23 01:28:52'),
(126, '柯軍豪', '0986738269', NULL, NULL, '', NULL, '', 'TSF10102460-1', 'y', '2023-10-23 01:29:37', '2023-10-23 01:29:37'),
(127, 'xc', 'cx', 'xc', 'xc', 'xc', 'xc@5.5', 'xc', NULL, 'y', '2024-02-26 05:57:05', '2024-02-26 05:57:05'),
(128, 'hgjgh', 'ghjghj', 'ghjgjh', 'ghjghj', 'ghjghj', 'ghjghj@5.5try', 'tryrty', NULL, 'y', '2024-02-26 10:06:28', '2024-02-26 10:06:28'),
(129, '7887', '7878', '78', '78', '78', '78@54.jkl', '7878', NULL, 'y', '2024-07-12 03:30:38', '2024-07-12 03:30:38'),
(130, 'dfg', 'dgffgd', 'fdgfgd', 'dfggfd', 'fdggfd', 'fdgfgd@tfy.try', 'fdgfgdgdf', NULL, 'y', '2024-09-02 08:29:33', '2024-09-02 08:29:33'),
(131, 'dfg', 'dgffgd', 'fdgfgd', 'dfggfd', 'fdggfd', 'fdgfgd@tfy.try', 'fdgfgdgdf', NULL, 'y', '2024-09-02 08:30:48', '2024-09-02 08:30:48'),
(132, '565656', '565656', '565656', '56565', '6565656', '565656@445.4156', '56565665', NULL, 'y', '2024-09-03 03:05:19', '2024-09-03 03:05:19'),
(133, '565656', '565656', '565656', '56565', '6565656', '565656@445.4156', '56565665', NULL, 'y', '2024-09-03 03:31:31', '2024-09-03 03:31:31');

-- --------------------------------------------------------

--
-- 資料表結構 `question`
--

CREATE TABLE `question` (
  `id` int(10) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL COMMENT '排序',
  `title` varchar(100) NOT NULL,
  `text` varchar(255) NOT NULL,
  `release` enum('y','n') NOT NULL DEFAULT 'y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `question`
--

INSERT INTO `question` (`id`, `sort`, `title`, `text`, `release`, `created_at`, `updated_at`) VALUES
(31, 31, '收到欠費通知，我怎麼知道是不是詐騙?', '您可先至電信公司直營門市查證，即可知道是否為詐騙，後續有繳費問題再來電與我司聯繫。\r\n本公司【馨琳揚企管顧問有限公司】創立於民國81年，陸續改制及擴展新的服務項目，為合法經營之公司行號。', 'y', '2022-03-15 15:50:55', '2023-09-13 02:29:23'),
(33, 33, '收到欠費通知，我怎麼知道是不是詐騙?', '您可先至電信公司直營門市查證，即可知道是否為詐騙，後續有繳費問題再來電與我司聯繫。\n\n本公司【馨琳揚企管顧問有限公司】創立於民國81年，陸續改制及擴展新的服務項目，為合法經營之公司行號。', 'y', '2022-03-15 15:52:27', '2022-11-07 05:38:32'),
(68, 68, '收到欠費通知，我怎麼知道是不是詐騙?', '您可先至電信公司直營門市查證，即可知道是否為詐騙，後續有繳費問題再來電與我司聯繫。\r\n\r\n本公司【馨琳揚企管顧問有限公司】創立於民國81年，陸續改制及擴展新的服務項目，為合法經營之公司行號。', 'y', '2022-03-15 15:52:27', '2022-11-07 05:38:32'),
(69, 69, '收到欠費通知，我怎麼知道是不是詐騙?', '您可先至電信公司直營門市查證，即可知道是否為詐騙，後續有繳費問題再來電與我司聯繫。\r\n\r\n本公司【馨琳揚企管顧問有限公司】創立於民國81年，陸續改制及擴展新的服務項目，為合法經營之公司行號。', 'y', '2022-03-15 15:52:27', '2022-11-07 05:38:32'),
(70, 1, '收到欠費通知，我怎麼知道是不是詐騙?', '您可先至電信公司直營門市查證，即可知道是否為詐騙，後續有繳費問題再來電與我司聯繫。 本公司【馨琳揚企管顧問有限公司】創立於民國81年，陸續改制及擴展新的服務項目，為合法經營之公司行號。', 'y', '2023-09-13 02:24:47', '2024-02-26 05:48:48'),
(71, 71, '收到欠費通知，我怎麼知道是不是詐騙?', '您可先至電信公司直營門市查證，即可知道是否為詐騙，後續有繳費問題再來電與我司聯繫。 本公司【馨琳揚企管顧問有限公司】創立於民國81年，陸續改制及擴展新的服務項目，為合法經營之公司行號。', 'y', '2023-09-13 07:09:35', '2024-02-26 05:49:00');

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `id` int(10) UNSIGNED NOT NULL,
  `merchant_no` varchar(255) NOT NULL COMMENT '訂單編號',
  `trade_no` varchar(255) DEFAULT NULL COMMENT '金流編號',
  `payment_type` varchar(255) DEFAULT NULL COMMENT '付款方式',
  `state` varchar(255) DEFAULT NULL COMMENT '訂單狀態(文字)',
  `orderstatus` varchar(255) DEFAULT NULL COMMENT '訂單狀態',
  `rtnnsg` varchar(255) DEFAULT NULL COMMENT '回傳繳款狀態',
  `orderlist_id` varchar(255) NOT NULL COMMENT '訂單',
  `purchaser_id` int(11) NOT NULL COMMENT '購買人',
  `totle` varchar(255) NOT NULL COMMENT '總金額',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`id`, `merchant_no`, `trade_no`, `payment_type`, `state`, `orderstatus`, `rtnnsg`, `orderlist_id`, `purchaser_id`, `totle`, `created_at`, `updated_at`) VALUES
(235, '20231020104', NULL, NULL, NULL, NULL, NULL, '1', 104, '36862', '2023-10-20 08:16:09', '2023-10-20 08:16:09'),
(236, '20231020105', NULL, NULL, NULL, NULL, NULL, '1', 105, '36862', '2023-10-20 08:17:23', '2023-10-20 08:17:23'),
(237, '20231020106', '23102016433304991', '信用卡一次付清', '授權成功', NULL, '信用卡', '1', 106, '36862', '2023-10-20 08:23:25', '2023-10-20 08:52:26'),
(238, '20231020107', '23102017082805094', 'Web ATM', '模擬付款成功', NULL, 'Web ATM', '1', 107, '19371', '2023-10-20 08:55:58', '2023-10-20 09:08:27'),
(239, '20231020108', '23102017111805109', 'ATM轉帳', '模擬付款成功', NULL, 'atm', '1', 108, '19371', '2023-10-20 09:10:55', '2023-10-20 09:21:57'),
(240, '20231020109', '23102017121205113', '條碼繳費', '模擬銷帳成功', NULL, '條碼', '1', 109, '19371', '2023-10-20 09:11:58', '2023-10-20 09:21:33'),
(241, '20231020110', '23102017133105126', '超商代碼繳費', '模擬付款成功', NULL, '超商', '1', 110, '19371', '2023-10-20 09:13:14', '2023-10-20 09:21:11'),
(242, '20231020111', NULL, NULL, NULL, NULL, NULL, '1', 111, '19371', '2023-10-20 09:42:00', '2023-10-20 09:42:00'),
(243, '20231020112', NULL, NULL, NULL, NULL, NULL, '1', 112, '19371', '2023-10-20 09:44:51', '2023-10-20 09:44:51'),
(244, '20231020113', NULL, NULL, NULL, NULL, NULL, '1', 113, '19371', '2023-10-20 09:46:11', '2023-10-20 09:46:11'),
(245, '20231020114', '23102018100705383', '信用卡一次付清', '授權成功', '1', NULL, '1', 114, '19371', '2023-10-20 10:09:44', '2023-10-20 10:10:11'),
(246, '20231020115', '23102018123205394', 'Web ATM', '模擬付款成功', '1', NULL, '1', 115, '19371', '2023-10-20 10:12:16', '2023-10-20 10:12:31'),
(247, '20231020116', '23102018132505400', 'ATM轉帳', '模擬付款成功', NULL, NULL, '1', 116, '19371', '2023-10-20 10:13:11', '2023-10-20 10:17:59'),
(248, '20231020117', NULL, NULL, NULL, NULL, NULL, '1', 117, '19371', '2023-10-20 10:13:32', '2023-10-20 10:13:32'),
(249, '20231020118', NULL, NULL, NULL, NULL, NULL, '1', 118, '19371', '2023-10-20 10:14:20', '2023-10-20 10:14:20'),
(250, '20231020119', NULL, NULL, NULL, NULL, NULL, '1', 119, '19371', '2023-10-20 10:20:04', '2023-10-20 10:20:04'),
(251, '20231020120', NULL, NULL, NULL, NULL, NULL, '1', 120, '7651', '2023-10-20 10:21:33', '2023-10-20 10:21:33'),
(252, '20231020121', NULL, NULL, NULL, NULL, NULL, '1', 121, '2425', '2023-10-20 10:22:04', '2023-10-20 10:22:04'),
(253, '20231023122', '23102309204608305', 'ATM轉帳', '模擬付款成功', NULL, NULL, '1', 122, '19371', '2023-10-23 01:20:26', '2023-10-23 01:25:53'),
(254, '20231023123', '23102309220008306', '條碼繳費', '模擬銷帳成功', NULL, NULL, '1', 123, '19371', '2023-10-23 01:21:40', '2023-10-23 01:25:49'),
(255, '20231023124', '23102309224408307', '超商代碼繳費', '模擬付款成功', NULL, NULL, '1', 124, '19371', '2023-10-23 01:22:25', '2023-10-23 01:25:44'),
(256, '20231023125', '23102309291108313', 'ATM轉帳', '模擬付款成功', NULL, '回傳繳款狀態成功', '1', 125, '19371', '2023-10-23 01:28:52', '2023-10-23 01:31:09'),
(257, '20231023126', '23102309300608314', '條碼繳費', '模擬銷帳成功', NULL, '回傳繳款狀態成功', '1', 126, '36762', '2023-10-23 01:29:37', '2023-10-23 01:31:05'),
(258, '20240226127', NULL, NULL, NULL, NULL, NULL, '192', 127, '1000', '2024-02-26 05:57:05', '2024-02-26 05:57:05'),
(259, '20240226128', NULL, NULL, NULL, NULL, NULL, '193', 128, '600', '2024-02-26 10:06:28', '2024-02-26 10:06:28'),
(260, '20240712129', NULL, NULL, NULL, NULL, NULL, '194', 129, '1000', '2024-07-12 03:30:39', '2024-07-12 03:30:39'),
(261, '20240903133', NULL, NULL, NULL, NULL, NULL, '199,200', 133, '3600', '2024-09-03 03:31:31', '2024-09-03 03:31:31');

-- --------------------------------------------------------

--
-- 資料表結構 `service`
--

CREATE TABLE `service` (
  `id` int(10) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL COMMENT '排序',
  `title` varchar(100) NOT NULL,
  `text` varchar(255) NOT NULL,
  `cover` varchar(100) NOT NULL COMMENT '圖片',
  `price` varchar(100) NOT NULL COMMENT '原價',
  `special_offer` varchar(100) NOT NULL COMMENT '特價',
  `release` enum('y','n') NOT NULL DEFAULT 'y',
  `delete` enum('y','n') NOT NULL DEFAULT 'n' COMMENT '刪除',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `service`
--

INSERT INTO `service` (`id`, `sort`, `title`, `text`, `cover`, `price`, `special_offer`, `release`, `delete`, `created_at`, `updated_at`) VALUES
(1, 1, '債務諮商(1小時)', '債務諮商', 'baservice1694415209.jpg', '1800', '1000', 'y', 'n', '2023-09-11 06:53:29', '2024-02-26 05:58:22'),
(81, 2, '代書諮詢(1小時)', '代書諮詢代書諮詢代書諮詢代書諮詢代書諮詢', 'baservice1694415229.jpg', '1200', '600', 'y', 'n', '2023-09-11 06:53:49', '2024-02-26 05:57:58'),
(82, 3, '法律諮詢(1小時)', '法律諮詢 / 時法律諮詢 / 時法律諮詢 / 時法律諮詢 / 時', 'baservice1694415209.jpg', '1800', '1000', 'y', 'y', '2023-09-11 06:53:29', '2024-02-26 06:23:27'),
(83, 4, '債務諮商', '代書諮詢代書諮詢代書諮詢代書諮詢代書諮詢', 'baservice1694415229.jpg', '1200', '600', 'y', 'y', '2023-09-11 06:53:49', '2023-09-14 06:37:19'),
(86, 84, '法律諮詢(1小時)', '法律諮詢 / 時法律諮詢 / 時法律諮詢 / 時法律諮詢 / 時', 'baservice1708928603.jpg', '1800', '1000', 'y', 'n', '2024-02-26 06:23:23', '2024-02-26 06:23:23'),
(87, 87, '催收諮商(2小時)', '催收諮商', 'baservice1708928810.jpg', '1800', '1000', 'y', 'n', '2024-02-26 06:26:50', '2024-02-26 06:27:10'),
(88, 88, '土地諮商(2小時)', '土地諮商', 'baservice1708928933.jpg', '1800', '1000', 'y', 'n', '2024-02-26 06:28:53', '2024-02-26 06:28:53');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member_appendix`
--
ALTER TABLE `member_appendix`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `purchaser`
--
ALTER TABLE `purchaser`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bulletin`
--
ALTER TABLE `bulletin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member_appendix`
--
ALTER TABLE `member_appendix`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `purchaser`
--
ALTER TABLE `purchaser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `record`
--
ALTER TABLE `record`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
