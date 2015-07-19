<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PBL-CAI Learning</title>
        <meta name="keywords" content="cai, pbl-cai, student, learning" />
        <meta name="description" content="pbl-cai Learning Computer " />

        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/css/myCSS.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/css/myForm.css" />

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
                            <h3>ผู้เรียน</h3>   
                            <div class="content"> 
                                <?php
                                if (empty(Yii::app()->session['id'])) {
                                    $loginModel = new LoginForm();
                                    
                                    echo CHtml::beginForm(array('/Home/Login'));
                                    ?>
                                <table border="0" cellpadding="2" cellspacing="2" style="width:200px;">
                                        <tr>
                                            <td><?php echo CHtml::label("UserName", "username",array('style'=>'width:50px;')); ?></td>
                                            <td><?php echo CHtml::textField("username", '', array('style' => 'width:100px;border: 1px solid #b9bdc1;padding: 3px;')); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo CHtml::label("Password", "password",array('style'=>'width:50px;')); ?></td>
                                            <td><?php echo CHtml::passwordField("password", '', array('style' => 'width:100px;border: 1px solid #b9bdc1;padding: 3px;')); ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <?php echo CHtml::submitButton("เข้าสู่ระบบ", array('name' => 'Login','class' => 'button')) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/regis.jpg', '', array('width' => '30', 'align' => 'left')) ?>
                                                นักเรียนสามารถสมัครสมาชิกได้ฟรี  
                                                <?php echo CHtml::link("สมัครสมาชิก", array("/Home/Registration")) ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php echo CHtml::endForm(); ?>
                                    <?php
                                } else {
                                    $id = Yii::app()->session['id'];
                                    $model = Student::model()->findByPk($id);
                                    $this->widget('application.extensions.ShowStudent', array('model' => $model));
                                }
                                ?>

                            </div>
                        </div>

                        <div class="sidebar_box"><span class="bottom"></span>
                            <h3>แนะนำบทเรียน</h3>   
                            <div class="content"> 
                                <ul class="sidebar_list">
                                    <li class="first"><?php echo CHtml::link('Home', array('/Home/')); ?></li>
                                    <li><?php echo CHtml::link('แนนำบทเรียน', array('/Study/ShowIntro', 'type' => 1)); ?></li>
                                    <li><?php echo CHtml::link('การใช้งานบทเรียน', array('/Study/ShowIntro', 'type' => 2)) ?></li>
                                    <li class="last"><?php echo CHtml::link('ผลการเรียนรู้ที่คาดหวัง', array('/Study/ShowIntro', 'type' => 3)) ?></li>
                                </ul>
                            </div>
                        </div>

                        <?php if (!empty(Yii::app()->session['id'])): ?>
                            <div class="sidebar_box"><span class="bottom"></span>
                                <h3>บทเรียน</h3>   
                                <div class="content"> 
                                    <ul class="sidebar_list">
                                        <li class="first"><?php echo CHtml::link('แบบทดสอบก่อนเรียน', array('/Study/DoTest', 'type' => 1)) ?></li>
                                        <?php
                                        $this->widget('application.extensions.LessonListMenu')
                                        ?>
                                        <li class="last"><?php echo CHtml::link('แบบทดสอบหลังเรียน', array('/Study/DoTest', 'type' => 2)) ?></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                    <div id="content" class="float_r">

                        <?php echo $content; ?>

                    </div> 

                    <div class="cleaner"></div>
                </div> <!-- END of templatemo_main -->

                <div id="templatemo_footer">
                    <p>
                        <?php echo CHtml::link("Home", array('/Study/')); ?> | 
                        <?php echo CHtml::link('แนนำบทเรียน', array('/Study/ShowIntro', 'type' => 1)); ?> | 
                        <?php echo CHtml::link('การใช้งานบทเรียน', array('/Study/ShowIntro', 'type' => 2)) ?> | 
                        <?php echo CHtml::link('ผลการเรียนรู้ที่คาดหวัง', array('/Study/ShowIntro', 'type' => 3)) ?>
                    </p>

                    Copyright © 2072 <a href="#">Problem-based learning (PBL)</a>

                </div> <!-- END of footer -->

            </div> <!-- END of wrapper -->
        </div> <!-- END of body_wrapper -->


    </body>
</html>