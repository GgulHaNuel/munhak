<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$g5_debug['php']['begin_time'] = $begin_time = get_microtime();

if (!isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
}
else {
    $g5_head_title = $g5['title']; // 상태바에 표시될 제목
    //$g5_head_title .= " | ".$config['cf_title'];
}

$g5['title'] = strip_tags($g5['title']);
$g5_head_title = strip_tags($g5_head_title);

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?>

<!--홈페이지 오픈시 이부분 주석처리-->
<!--
<script type="text/javascript">

location.href="http://azwellsys.com";

</script>
-->
<!--홈페이지 오픈시 이부분 주석처리 end-->

<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
	<meta name="Keywords" content="에즈웰,AZWELL,컨설팅,클라우드바론,Cloud BaRon,비대면가상오피스,스마트오피스,재택근무솔루션,SI컨설팅,하드웨어,파트너사" />
    <meta name="Description" content="에즈웰,AZWELL,컨설팅,클라우드바론,Cloud BaRon,비대면가상오피스,스마트오피스,재택근무솔루션,SI컨설팅,하드웨어,파트너사" />
    <meta name="Robots" content="All" />
    <meta http-equiv="Subject" content="AZWELL-에즈웰" />
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="AZWELL-에즈웰">
    <meta property="og:description" content="에즈웰,AZWELL,컨설팅,클라우드바론,Cloud BaRon,비대면가상오피스,스마트오피스,재택근무솔루션,SI컨설팅,하드웨어,파트너사">
    <meta property="og:image" content="/theme/azwell/inct/img/kakao_logo_azwell.png">
    <meta property="og:url" content="http://azwellsys.com/">
    <?php
    if (G5_IS_MOBILE) {
        echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">'.PHP_EOL;
        echo '<meta name="HandheldFriendly" content="true">'.PHP_EOL;
        echo '<meta name="format-detection" content="telephone=no">'.PHP_EOL;
    } else {
        echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">'.PHP_EOL;
        echo '<meta http-equiv="imagetoolbar" content="no">'.PHP_EOL;
        echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">'.PHP_EOL;
    }

    if($config['cf_add_meta'])
        echo $config['cf_add_meta'].PHP_EOL;
    ?>
    <title><?php echo $g5_head_title; ?></title>
    <link rel="stylesheet" href="<?php echo run_replace('head_css_url', G5_THEME_CSS_URL.'/'.(G5_IS_MOBILE ? 'mobile' : 'default').'.css?ver='.G5_CSS_VER, G5_THEME_URL); ?>">
    <!--[if lte IE 8]>
    <script src="<?php echo G5_JS_URL ?>/html5.js"></script>
    <![endif]-->
    <script>
        // 자바스크립트에서 사용하는 전역변수 선언
        var g5_url       = "<?php echo G5_URL ?>";
        var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
        var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
        var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
        var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
        var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
        var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
        var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
        var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
    </script>
    <!--  JQuery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--  JQuery-UI  -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <?php
    add_javascript('<script src="'.G5_JS_URL.'/jquery-migrate-1.4.1.min.js"></script>', 0);
    add_javascript('<script src="'.G5_JS_URL.'/jquery.menu.js?ver='.G5_JS_VER.'"></script>', 0);
    add_javascript('<script src="'.G5_JS_URL.'/common.js?ver='.G5_JS_VER.'"></script>', 0);
    add_javascript('<script src="'.G5_JS_URL.'/wrest.js?ver='.G5_JS_VER.'"></script>', 0);
    add_javascript('<script src="'.G5_JS_URL.'/placeholders.min.js"></script>', 0);

    if(G5_IS_MOBILE) {
        add_javascript('<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>', 1); // overflow scroll 감지
    }
    if(!defined('G5_IS_ADMIN'))
        echo $config['cf_add_script'];
    ?>
    <!-- css -->
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/inct/css/all.css" type="text/css">
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/inct/css/header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/inct/css/main.css" type="text/css">
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/inct/css/fotter.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- fullpage -->
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/inct/fullpage/jquery.fullPage.css" type="text/css">
    <!-- slick -->
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/inct/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/inct/slick/slick-theme.css" type="text/css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- fontawasome/lineawasome -->
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/inct/css/fontawasome/all.css" type="text/css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
    
<body<?php echo isset($g5['body_script']) ? $g5['body_script'] : ''; ?>>