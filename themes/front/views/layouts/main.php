<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Footsoc Arena</title>
        <meta name="keywords" content="cai, pbl-cai, student, learning" />
        <meta name="description" content="pbl-cai Learning Computer " />

        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/css/myCSS.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/css/myForm.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/css/table.css" />

        <!-- facebox -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= Yii::app()->theme->baseUrl; ?>/js/facebox/facebox.css"/>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/facebox/facebox.js"></script>

    </head>

    <body>

        <div id="templatemo_body_wrapper">
            <div id="templatemo_wrapper">

                <div id="templatemo_header">
                    <div id="site_title"><h1>&nbsp;</h1></div>



                    <div class="cleaner"></div>
                </div> <!-- END of templatemo_header -->

                <div id="templatemo_menubar">
                    <div id="top_nav"></div>
                    <!--
                    <div id="top_nav" class="ddsmoothmenu">
                        <ul>
                            <li><a href="index.html" class="selected">Home</a></li>
                            <li><a href="products.html">Products</a>
                                <ul>
                                    <li><a href="http://www.templatemo.com/page/1">Sub menu 1</a></li>
                                    <li><a href="http://www.templatemo.com/page/2">Sub menu 2</a></li>
                                    <li><a href="http://www.templatemo.com/page/3">Sub menu 3</a></li>
                                    <li><a href="http://www.templatemo.com/page/4">Sub menu 4</a></li>
                                    <li><a href="http://www.templatemo.com/page/5">Sub menu 5</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About</a>
                                <ul>
                                    <li><a href="http://www.templatemo.com/page/1">Sub menu 1</a></li>
                                    <li><a href="http://www.templatemo.com/page/2">Sub menu 2</a></li>
                                    <li><a href="http://www.templatemo.com/page/3">Sub menu 3</a></li>
                                </ul>
                            </li>
                            <li><a href="faqs.html">FAQs</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                        <br style="clear: left" />
                    </div> <!-- end of ddsmoothmenu -->


                    <div id="templatemo_search">
                        <form action="#" method="get">
                            <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                            <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                        </form>
                    </div>
                   
                </div> <!-- END of templatemo_menubar -->

                <div id="templatemo_main">
                    <div id="sidebar" class="float_l">

                        <div class="sidebar_box"><span class="bottom"></span>
                            <h3>สมาชิก</h3>
                            <div class="content"> 
                                <?php
                                if (empty(Yii::app()->session['id'])) {
                                    $loginModel = new MemberLoginForm();
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'login-form',
                                        'action' => array('/Home/Login'),
                                        //'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                        ),
                                    ));

                                    echo $form->errorSummary($loginModel);

                                    //echo CHtml::beginForm(array('/Home/Login'));
                                    ?>
                                    <table border="0" cellpadding="2" cellspacing="2" style="width:215px;margin-left: -10px;">
                                        <tr>
                                            <td><?php echo $form->labelEx($loginModel, "username", array('style' => 'width:90px;')); ?></td>
                                            <td>
                                                <?php echo $form->textField($loginModel, "username", array('style' => 'width:90px;border: 1px solid #b9bdc1;padding: 3px;')); ?>
                                                <?php echo $form->error($loginModel, 'username') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $form->labelEx($loginModel, "password", array('style' => 'width:70px;')); ?></td>
                                            <td>
                                                <?php echo $form->passwordField($loginModel, "password", array('style' => 'width:90px;border: 1px solid #b9bdc1;padding: 3px;')); ?>
                                                <?php echo $form->error($loginModel, 'password') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <?php echo $form->checkBox($loginModel, 'rememberMe'); ?>
                                                <?php echo $form->label($loginModel, 'rememberMe'); ?>
                                                <?php $form->error($loginModel, 'rememberMe'); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <?php echo CHtml::submitButton("เข้าสู่ระบบ", array('class' => 'button')) ?>
                                                <?php $this->endWidget(); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/regis.jpg', '', array('width' => '20', 'align' => 'left')) ?>
                                                สมัครสมาชิกได้ฟรี  
                                                <?php echo CHtml::link("สมัครสมาชิก", array("/Home/Registration")) ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php
                                } else {
                                    $id = Yii::app()->session['id'];
                                    $model = Member::model()->findByPk($id);
                                    $this->widget('application.extensions.ShowMember', array('model' => $model));
                                }
                                ?>

                            </div>
                        </div>

                        <div class="sidebar_box"><span class="bottom"></span>
                            <h3>Main Menu</h3>   
                            <div class="content"> 
                                <ul class="sidebar_list">
                                    <li class="first"><?php echo CHtml::link('Home', array('/Home/')); ?></li>
                                    <li><?php echo CHtml::link('สนามแข่งขัน', array('/Home/GroundList')); ?></li>
                                    <li><?php echo CHtml::link('ข้อกำหนดการใช้สนาม', array('/Home/Law')) ?></li>
                                    <li class="last"><?php echo CHtml::link('ติดต่อเรา', array('/Home/Contact')) ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="content" class="float_r">

                        <?php echo $content; ?>

                    </div> 

                    <div class="cleaner"></div>
                </div> <!-- END of templatemo_main -->

                <div id="templatemo_footer">
                    <p>
                        <?php echo CHtml::link("Home", array('/Study/')); ?> | 
                        <?php echo CHtml::link('แนนำสนาม', array('/Study/ShowIntro', 'type' => 1)); ?> | 
                        <?php echo CHtml::link('ข้อกำหนดการใช้สนาม', array('/Study/ShowIntro', 'type' => 2)) ?> | 
                        <?php echo CHtml::link('ติดต่อเรา', array('/Study/ShowIntro', 'type' => 3)) ?>
                    </p>

                    Copyright © 2072 <a href="#" target="_blank">Project</a>

                </div> <!-- END of footer -->

            </div> <!-- END of wrapper -->
        </div> <!-- END of body_wrapper -->


    </body>
</html>