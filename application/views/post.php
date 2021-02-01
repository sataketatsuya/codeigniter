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
		font-size: 100%;
		font-family:'ヒラギノ角ゴ Pro W3','Hiragino Kaku Gothic Pro','メイリオ',Meiryo,'ＭＳ Ｐゴシック',sans-serif;
		color: #222;
		background: #f7f7f7;
	}

	.article {
		padding-bottom: 20px;
	}
</style>
<body>
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">ひと言掲示板</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/login/index">ログイン</a>
        <a class="p-2 text-dark" href="/register/index">新規登録</a>
        <a class="p-2 text-dark" href="#">ログアウト</a>
      </nav>
    </div>

	<div class="container">
		<?php if(isset($mode_success)): ?>
			<div class="alert alert-success" role="alert">
				登録完了しました
			</div>
		<?php endif; ?>
		<p class="text_message">こちらはデモ用の掲示板なので、自由に書き込んでください。</p>
		<form action="/postcontroller/create" method="post">
		  	<div class="form-group">
			    <label for="title">表示名</label>
				<input type="text" id="title" name="title" class="form-control">
			<small class="form-text text-muted">掲示板で表示されるユーザ名を入力してください</small>
		  </div>
		  <div class="form-group">
				<label for="message">ひと言メッセージ</label>
				<textarea class="form-control" id="message" name="message" rows="3"></textarea>
				<small class="form-text text-muted">ひと言どうぞ</small>
		  </div>
		  <button type="submit" class="btn btn-primary">書き込む</button>
		</form>
		<hr>
		<section id="section_area">
			<?php foreach($posts as $post): ?>
				<article class="article">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-3">
									<h2><?= $post['title'] ?></h2>
								</div>
								<div class="col-lg-3">
									<p><?= $post['created_at'] ?></p>
								</div>
								<div class="col-lg-6">
									<div class="d-flex justify-content-lg-end">
										<div class="alert alert-secondary" role="alert">
											<a href="/postcontroller/edit/<?= $post['post_id'] ?>" class="alert-link">編集</a>
										</div>
										<div class="alert alert-danger" role="alert">
											<a href="#" class="alert-link">削除</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<p><?= $post['message'] ?></p>
								</div>
							</div>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</section>
	</div>

</body>
</html>
