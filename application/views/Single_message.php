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

    <!-- Navbar -->
    <div class="ui compact menu labeled icon fluid four item">
        <a class="item <?= $active == 'all' ? 'active' : '' ?>" href="<?= base_url('messages') ?>">
            <i class="envelope icon"></i> All
        </a>
        <a class="item <?= $active == 'unread' ? 'active' : '' ?>" href="<?= base_url('messages/unread') ?>">
            <i class="envelope icon"></i> Unread
        </a>
        <a class="item <?= $active == 'read' ? 'active' : '' ?>" href="<?= base_url('messages/read') ?>">
            <i class="envelope open icon"></i> Read
        </a>
        <a class="item" href="<?= base_url('log') ?>">
            <i class="sign out icon"></i> Logout
        </a>
    </div>

    <!-- Message Container -->
    <div class="container pt-5 pb-5">
        <div class="ui feed">
            <div class="event">
                <div class="label">
                    <i class="envelope icon"></i>
                </div>
                <div class="content">
                    <div class="date">
                        <i class="clock icon"></i><?= date("D, d M Y h:ia", strtotime($message['created'])) ?>
                    </div>
                    <div class="summary">
                        <i class="user icon"></i> <a class="text-info"><?= $message['name'] ?></a>
                    </div>
                    <div class="summary">
                        <i class="envelope icon"></i> <a href="mailto:<?= $message['email'] ?>"><?= $message['email'] ?></a>
                    </div>
                    <div class="summary">
                        <i class="edit outline icon"></i> <?= $message['subject'] ?>
                    </div>
                    <div class="extra text mt-5 mb-5">
                        <?= $message['message'] ?>
                    </div>
                    <div class="meta text-right mt-4">
                        <buttom class="ui button red delete-message">
                            <i class="trash icon"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="ui basic modal text-center">
        <div class="ui icon header">
            <i class="archive icon"></i> Delete Message
        </div>
        <div class="content">
            <p>Are you sure you want to delete this message in database.</p>
        </div>
        <?= form_open('messages/delete', ['class' => 'actions']) ?>
        <input type="hidden" name="id" value="" class="delete-message-input">
        <input type="hidden" name="redirect" value="<?= base_url(uri_string()) ?>">
        <div class="ui red basic cancel inverted button">
            <i class="remove icon"></i> No
        </div>
        <button class="ui green ok inverted button">
            <i class="checkmark icon"></i> Yes
        </button>
        <?= form_close() ?>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/lib/semantic/semantic.min.js"></script>
    <script>
        $('.ui.button.delete-message').click(function(e) {
            $('#delete-message-input').val($(this).val());
            $('.ui.basic.modal').modal('toggle');
        });
    </script>
</body>

</html>