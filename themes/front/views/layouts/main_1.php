<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PBL-CAI Learning</title>
        <meta name="keywords" content="cai, pbl-cai, student, learning" />
        <meta name="description" content="pbl-cai Learning Computer " />

        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/css/myCSS.css" />

        <!-- DropDown Menu -->
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/css/ddsmoothmenu.css" />

        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/ddsmoothmenu.js">
            /***********************************************
             * Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
             * This notice MUST stay intact for legal use
             * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
             ***********************************************/
        </script>

        <script type="text/javascript">

            ddsmoothmenu.init({
                mainmenuid: "top_nav", //menu DIV id
                orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
                classname: 'ddsmoothmenu', //class added to menu's outer DIV
                //customtheme: ["#1c5a80", "#18374a"],
                contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
            })

        </script>
        
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
                                <center>
                                    <img src="<?= Yii::app()->theme->baseUrl; ?>/images/templatemo_image_01.jpg" alt="image" />
                                </center>
                                <?php
                                // Show Student
                                //$criteria = new CDbCriteria();
                                //$criteria->condition = "id=1";
                                $id = 1;
                                $model = Student::model()->findByPk($id);
                                $this->widget('application.extensions.ShowStudent', array('model' => $model));
                                ?>

                            </div>
                        </div>

                        <div class="sidebar_box"><span class="bottom"></span>
                            <h3>แนะนำบทเรียน</h3>   
                            <div class="content"> 
                                <ul class="sidebar_list">
                                    <li class="first"><?php echo CHtml::link('แนนำบทเรียน', array('/Study/ShowIntro', 'type' => 1)); ?></li>
                                    <li><?php echo CHtml::link('การใช้งานบทเรียน', array('/Study/ShowIntro', 'type' => 2)) ?></li>
                                    <li class="last"><?php echo CHtml::link('ผลการเรียนรู้ที่คาดหวัง', array('/Study/ShowIntro', 'type' => 3)) ?></li>
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar_box"><span class="bottom"></span>
                            <h3>บทเรียน</h3>   
                            <div class="content"> 
                                <ul class="sidebar_list">
                                    <li class="first"><?php echo CHtml::link('แบบทดสอบก่อนเรียน', array('/Study/DoTest','type'=>1)) ?></li>
                                    <?php
                                    $this->widget('application.extensions.LessonListMenu')
                                    ?>
                                    <li class="last"><?php echo CHtml::link('แบบทดสอบหลังเรียน', array('/Study/DoTest','type'=>2)) ?></li>
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
                    <p><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">About</a> | <a href="#">FAQs</a> | <a href="#">Checkout</a> | <a href="#">Contact Us</a>
                    </p>

                    Copyright © 2072 <a href="#">Your Company Name</a> | <a href="http://www.templatemo.com/preview/templatemo_367_shoes">Shoes Theme</a> by <a href="http://www.templatemo.com" target="_parent" title="free css templates">templatemo</a>

                </div> <!-- END of templatemo_footer -->

            </div> <!-- END of templatemo_wrapper -->
        </div> <!-- END of templatemo_body_wrapper -->


        <script type='text/javascript' src='js/logging.js'></script>

    </body>
</html>