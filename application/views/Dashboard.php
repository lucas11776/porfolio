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
</head>

<body>


    <div class="ui compact menu labeled icon fluid four item">
        <a class="item">
            <i class="envelope icon"></i> All
        </a>
        <a class="item">
            <i class="envelope icon"></i> Unread
        </a>
        <a class="item">
            <i class="envelope open icon"></i> Read
        </a>
        <a class="item">
            <i class="sign out icon"></i> Logout
        </a>
    </div>

    <div class="container pt-5">
        <div class="ui relaxed divided list">
            <?php for($i = 0; $i < 10; $i++): ?>
                <div class="item">
                    <div class="right floated content">
                        <div class="ui button red">
                            <i class="trash icon"></i> Delete
                        </div>
                    </div>
                    <i class="large github middle aligned icon"></i>
                    <div class="content">
                        <a class="header font-weight-bold" href="">
                            <strong style="font-size: 18px;">Semantic-Org/Semantic-UI</strong>
                        </a>
                        <div class="description pt-2">
                            <strong>Tesing online themba</strong>
                        </div>
                        <div class="description">Updated 10 mins ago</div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/lib/semantic/semantic.min.js"></script>
    <script>
    // using context
    $('.context.example .ui.sidebar')
        .sidebar({
            context: $('.context.example .bottom.segment')
        })
        .sidebar('attach events', '.context.example .menu .item');
    </script>
</body>

</html>