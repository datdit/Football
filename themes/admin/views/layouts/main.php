
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php //$this->view('version_v');    ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?= Yii::app()->theme->baseUrl; ?>/css/admin_style.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?= Yii::app()->theme->baseUrl; ?>/css/mybutton.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?= Yii::app()->theme->baseUrl; ?>/css/table.css" />

        <!-- facebox -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= Yii::app()->theme->baseUrl; ?>/js/facebox/facebox.css"/>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/facebox/facebox.js"></script>

    </head>
    <body>
        <div id="my_body">
            <div id="my_header">
                <div class="top">
                    <div class="top_nav_left">
                        <img src="<?= Yii::app()->theme->baseUrl ?>/images/head-logo.png">
                    </div>
                    <div class="top_nav_right">
                    </div>
                </div>
            </div>
            <?php
            //if (Yii::app()->session['group_id'] == 1)
            $this->widget('application.extensions.topnav_admin');
            //else
            //$this->widget('application.extensions.topnav_user');
            ?>

            <div id="my_content">
                <div id="breadcrumbs">
                </div>
                <?= $content; ?>
            </div>
        </div>
        <div id="my_footer"></div>

    </body>
</html>