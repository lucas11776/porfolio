<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <base href="<?= base_url() ?>">
    <!-- Site Properties -->
    <title>Login To Dashboard</title>
    <!-- Semantic CSS File -->
    <link href="assets/lib/semantic/semantic.min.css" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-color: #DADADA;
        }
        .outer-container {
            height: 100vh;
            width: 100%;
            display: table;
        }
        .outer-container .inner-container {
            display: table-cell;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="outer-container">
        <div class="inner-container">
            <div class="col-sm-8 col-md-4 offset-sm-2 offset-md-4">
                <div class="ui middle aligned center aligned grid">
                    <div class="column">
                        <?= form_open('login', ['class' => 'ui large form']) ?>
                            <div class="ui stacked segment">
                                <div class="field">
                                    <div class="ui left icon input">
                                        <i class="user icon"></i>
                                        <input type="email"
                                               name="email" 
                                               placeholder="E-mail address"
                                               value="<?= set_value('email') ?>">
                                    </div>
                                    <p class="text-danger text-left"><?= form_error('email', '* ', '') ?></p>
                                </div>
                                <div class="field">
                                    <div class="ui left icon input">
                                        <i class="lock icon"></i>
                                        <input type="password"
                                               name="password" 
                                               placeholder="Password...">
                                    </div>
                                    <p class="text-danger text-left"><?= form_error('email', '* ', '') ?></p>
                                </div>
                                <button class="ui fluid large primary submit button">
                                    Login
                                </button>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/lib/semantic/semantic.min.js"></script>
</body>
</html>