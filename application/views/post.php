<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function e($text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}
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
		<?php if(isset($mode_failure)): ?>
			<div class="alert alert-danger" role="alert">
				<?= $mode_failure ?>
			</div>
		<?php endif; ?>
		<?php if(isset($mode_success)): ?>
			<div class="alert alert-success" role="alert">
				<?= $mode_success ?>
			</div>
		<?php endif; ?>
		<p class="text_message">こちらはデモ用の掲示板なので、自由に書き込んでください。</p>
		<form action="/postcontroller/register" method="post">
		  	<div class="form-group">
			    <label for="title">表示名</label>
				<input type="text" id="title" name="title" class="form-control" value="<?= $edit_post ? e($edit_post['title']) : null ?>">
			<small class="form-text text-muted">掲示板で表示されるユーザ名を入力してください</small>
		  </div>
		  <div class="form-group">
				<label for="message">ひと言メッセージ</label>
				<textarea class="form-control" id="message" name="message" rows="3"><?= $edit_post ? e($edit_post['message']) : null ?></textarea>
				<small class="form-text text-muted">ひと言どうぞ</small>
		  </div>
		  <?php if ($edit_post): ?>
			<input type="hidden" name="post_id" value="<?= e($edit_post['post_id']) ?>">
		  <?php endif; ?>
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
									<h2><?= e($post['title']) ?></h2>
								</div>
								<div class="col-lg-3">
									<p><?= e($post['created_at']) ?></p>
								</div>
								<div class="col-lg-6">
									<div class="d-flex justify-content-lg-end">
										<a href="/postcontroller?post_id=<?= e($post['post_id']) ?>" class="btn btn-info">編集</a>
										<button class="btn btn-danger" onclick="return destroyPostId(<?= e($post['post_id']) ?>)">削除</button>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<p><?= e($post['message']) ?></p>
								</div>
							</div>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
			<form action="/postcontroller/destroy/:post_id" method="post" id="form_post_destroy"></form>
		</section>
	</div>

	<script>
	function destroyPostId(post_id) {
        alert('対象の一言メッセージを削除します、よろしいでしょうか？');
		let form = document.getElementById('form_post_destroy');
        let action = form.getAttribute('action').replace(':post_id', post_id);
		form.setAttribute('action', action);
        form.submit();
	}
	</script>

</body>
</html>
