SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `hnsdesktop` (
  `user_id` int(10) unsigned NOT NULL,
  `notepad` mediumtext NOT NULL,
  `theme_id` int(2) NOT NULL DEFAULT '1',
  `bg_color` varchar(20) NOT NULL,
  `wallpaper_file` varchar(50) NOT NULL,
  `wallpaper_position` varchar(20) NOT NULL,
  `wallpaper_repeat` varchar(20) NOT NULL,
  `font_color` varchar(20) NOT NULL,
  `transparency` int(1) NOT NULL DEFAULT '1',
  `screensaver` int(1) NOT NULL DEFAULT '1',
  `screensaver_time` int(3) NOT NULL,
  `yt_playlist` text NOT NULL,
  `music_song` varchar(255) NOT NULL,
  `browser_home` varchar(100) NOT NULL,
  `browser_favorites` varchar(255) NOT NULL,
  `browser_history` varchar(255) NOT NULL,
  `players` varchar(255) NOT NULL,
  `twttr_playlist` text NOT NULL,
  `launcher_autorun` varchar(255) NOT NULL,
  `launcher_thumbs` varchar(255) NOT NULL,
  `launcher_startmenuapps` varchar(255) NOT NULL,
  `launcher_startmenutools` varchar(255) NOT NULL,
  `launcher_quickstart` varchar(255) NOT NULL,
  `launcher_tray` varchar(255) NOT NULL,
  `app_documents` varchar(100) NOT NULL,
  `app_preferences` varchar(100) NOT NULL,
  `app_notepad` varchar(100) NOT NULL,
  `app_flash_name` varchar(100) NOT NULL,
  `app_ytinstant` varchar(100) NOT NULL,
  `app_piano` varchar(100) NOT NULL,
  `app_about_hnsdesktop` varchar(100) NOT NULL,
  `app_feedback` varchar(100) NOT NULL,
  `app_tic_tac_toe` varchar(100) NOT NULL,
  `app_friends` varchar(100) NOT NULL,
  `app_goom_radio` varchar(100) NOT NULL,
  `app_search` varchar(100) NOT NULL,
  `app_chat` varchar(100) NOT NULL,
  `app_music` varchar(100) NOT NULL,
  `app_web_browser` varchar(100) NOT NULL,
  `app_torus` varchar(100) NOT NULL,
  `app_calendar` varchar(100) NOT NULL,
  `app_app_explorer` varchar(100) NOT NULL,
  `app_calculator` varchar(100) NOT NULL,
  `app_twitter` varchar(100) NOT NULL,
  UNIQUE KEY `uid` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

INSERT INTO `hnsdesktop` (`user_id`, `notepad`, `theme_id`, `bg_color`, `wallpaper_file`, `wallpaper_position`, `wallpaper_repeat`, `font_color`, `transparency`, `screensaver`, `screensaver_time`, `yt_playlist`, `music_song`, `browser_home`, `browser_favorites`, `browser_history`, `players`, `twttr_playlist`, `launcher_autorun`, `launcher_thumbs`, `launcher_startmenuapps`, `launcher_startmenutools`, `launcher_quickstart`, `launcher_tray`, `app_documents`, `app_preferences`, `app_notepad`, `app_flash_name`, `app_ytinstant`, `app_piano`, `app_about_hnsdesktop`, `app_feedback`, `app_tic_tac_toe`, `app_friends`, `app_goom_radio`, `app_search`, `app_chat`, `app_music`, `app_web_browser`, `app_torus`, `app_calendar`, `app_app_explorer`, `app_calculator`, `app_twitter`) VALUES
(1, 'Cross Country is Awesome!', 1, '', 'Aurora.jpg', '', '', '', 1, 1, 0, 'Megan Nicole,Jeff Hendrick,Eminem,Kesha,Julia Sheer,Tyler Ward,Enrique Iglesias,Asking Alexandria Right Now,Tick Tock Calculus,Calculus Round The Clock,MattyBRaps,Juhsparamore,Framing Henley,Conor Maynard,Alex Goot,Drew Dawson,Christina Grimmie,Sam Tsui,Kurt Schneider,Jake Bruene,J Rice,Marianas Trench,Cobus Potgieter,Free Drivers Education Video - How To Prepare And Pass The Written Test (Part 1 Of 4),Janice And Sonia,Kalie Goh', '', '', '', '', '', 'MGMT', '', 'notepad,ytinstant,piano,tic_tac_toe,friends,goom_radio,chat,music,web_browser,torus,calculator,twitter', 'notepad,friends,goom_radio,chat,music,ytinstant,web_browser,torus,calculator,twitter', 'documents,preferences,search,app_explorer', 'ytinstant,friends,goom_radio,chat,web_browser', 'chat,calendar,preferences', '460, 176, 402, 520, undefined, undefined, undefined, undefined, undefined, undefined', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Hello Andrew Gerst! :) YAY!', 1, '', '5-Wallpaper 1080p_6.jpg', '', '', '', 1, 1, 0, 'Megan Nicole,Jeff Hendrick,AHMIR,Tyler Ward,Far East Movement,Nelly,Usher,Taio Cruz,Eminem,B.o.B,Fall Out Boy,Drake,Jay Sean,Bruno Mars', '', '', '', '', '', '', '', '', '', '', '', '', '', '439, 162, 256, 481, l, t, 1, 0, 1, 0', '759, 40, 200, 400, l, t, 1, 0, 1, 0', '', '', '40, 84, 570, 1107, l, t, 1, 0, 1, 0', '', 'undefined', '403, 65, 599, 540, l, t, 1, 0, 1, 0', '448, 0, 599, 538, l, t, 1, 0, 1, 0', 'undefined', '', '326, 24, 599, 628, l, t, 1, 0, 1, 0', '482, 291, 64, 316, l, t, 1, 0, 1, 0', '', '', '', '', '', ''),
(3, '', 1, '', '', '', '', '', 1, 1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Hello Mary Posluszny!hello andy fine job on notepad!', 1, '', 'Wallpaper 5.jpg', '', '', '', 1, 1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Fix New Line!', 1, '666', 'Long Bay.jpg', 'center center', 'repeat', '333', 1, 1, 15, 'Simple Plan,Top Songs 2010,New', '', '', '', '', '', '', '', 'notepad,preferences,wallpaper,flash-name,piano,tictactoe', 'notepad,piano,tictactoe', 'documents,wallpaper,preferences,about-hnsdesktop,feedback', 'notepad,preferences,feedback', 'notepad,preferences,feedback', '0, 0, 0, 0, l, t, 1, 0, 0, 0', '125, 135, 302, 400, l, t, 1, 0, 1, 0', '363, 150, 200, 400, l, t, 1, 0, 1, 0', '215, 79, 270, 470, l, t, 1, 0, 1, 0', '90, 18, 610, 1100, l, t, 1, 0, 1, 0', '0, 0, 0, 0, l, t, 1, 0, 0, 0', '0, 0, 0, 0, l, t, 1, 0, 0, 0', '0, 0, 0, 0, l, t, 1, 0, 0, 0', '0, 0, 0, 0, l, t, 1, 0, 0, 0', '0, 0, 0, 0, l, t, 1, 0, 0, 0', '524, 202, 242, 231, l, t, 1, 0, 1, 0', '0, 0, 0, 0, l, t, 1, 0, 0, 0', '593, 28, 599, 628, l, t, 1, 0, 1, 0', '480, 263, 64, 323, l, t, 1, 0, 1, 0', '', '', '', '', '', ''),
(6, '', 1, '', '', '', '', '', 1, 1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '', 1, '', '', '', '', '', 1, 1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '', 1, '', '', '', '', '', 1, 1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'John Gerst''s Desktop!', 1, '', 'Windows 7 RC1.jpg', '', '', '', 1, 1, 0, 'Asking Alexandria Right Now,Escape The Fate Not Good Enough,BMTH Fuck,Alesana Beautiful,Dot Dot Curve FuckMyLife', '', '', '', '', '', '', '', '', '', '', '', '', '', '1009, 63, 302, 400, l, t, 1, 0, 1, 0', '', '', '170, 130, 610, 1100, l, t, 1, 0, 1, 0', '', '', '', '', '481, 135, 599, 538, l, t, 1, 0, 1, 0', '', '', '524, 125, 599, 538, l, t, 1, 0, 1, 0', '526, 287, 64, 316, l, t, 1, 0, 1, 0', '', '', '', '', '', '');
