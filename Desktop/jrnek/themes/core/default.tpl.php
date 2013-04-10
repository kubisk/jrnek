<!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<link rel="stylesheet" href="<?=$stylesheet?>">
</head>
<body>
<header id="top">
	<?=$header?>
</header>
<div id="content">
<article id="main">
	<?=$main?>
	<?=get_debug()?>
</article>
</div>
<footer id="bottom">
	<?=$footer?>
</footer>
</body>
</html>