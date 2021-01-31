<!DOCTYPE html>
<html>
<head>
    <title>新規登録＆ログイン</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <br />
        <h3 align="center">新規登録</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">新規登録</div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url(); ?>register/validation">
                    <div class="form-group">
                        <label>ユーザ名</label>
                        <input type="text" name="user_name" class="form-control" value="<?php echo set_value('user_name'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_name'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>メールアドレス</label>
                        <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>パスワード</label>
                        <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" value="登録する" class="btn btn-info" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<!-- Views(email_verification.php)

This view file is used for display success message of email verification with Login link.


<!DOCTYPE html>
<html>
<head>
    <title>Complete Login Register system in Codeigniter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <br />
        <h3 align="center">Complete Login Register system in Codeigniter</h3>
        <br />

        <?php

        echo $message;

        ?>

    </div>
</body>
</html> -->
