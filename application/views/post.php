<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>一言掲示板</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<style>
	body {
		padding: 50px;
		font-size: 100%;
		font-family:'ヒラギノ角ゴ Pro W3','Hiragino Kaku Gothic Pro','メイリオ',Meiryo,'ＭＳ Ｐゴシック',sans-serif;
		color: #222;
		background: #f7f7f7;
	}
</style>
<body>
	<div class="container">
		<h1>ひと言掲示板（デモ）</h1>
		<p class="text_message">こちらはデモ用の掲示板なので、自由に書き込んでください。</p>
		<form>
		  <div class="form-group">
		  	<label for="view_name">表示名</label>
			<input type="text" id="view_name" class="form-control">
			<small class="form-text text-muted">掲示板で表示されるユーザ名を入力してください</small>
		  </div>
		  <div class="form-group">
			<label for="message">ひと言メッセージ</label>
			<textarea class="form-control" id="message" rows="3"></textarea>
			<small class="form-text text-muted">ひと言どうぞ</small>
		  </div>
		  <button type="submit" class="btn btn-primary">書き込む</button>
		</form>
		<hr>
		<section id="section_area">
			<article>
				<div class="card">
					<div class="card-body">
						<h2>佐竹です</h2>
						<time>2021年01月31日 13:18</time>
						<p>PHP!</p>
					</div>
				</div>
			</article>
		</section>
	</div>

</body>
</html>
