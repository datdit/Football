
<?php

/**
 * CDRedirect
 * ==========
 *
 * Countdown Action Widget
 * 
 * 
 * Usage example:
 * 
 *
  $this->widget('ext.ecountdownaction.ECountdownAction',
  array(
  'seconds'=>8, //8 seconds
  'action'=>'{alert("hello world!")}',
  )
  );
 * 
 * 
 *
 * @version 0.1
 * @author ytannus
 */
class ECountdownAction extends CWidget {

    //public $seconds=0;
    public $min = 0;
    public $action = '';
    private $js = array(
        'jquery'
    );

    /** The css scripts to register.
     * @var array
     * @since 0.1
     */
    private $css = array(
            //'jquery.countdown.css',
    );

    /** The asset folder after published
     * @var string
     * @since 0.1
     */
    private $assets;

    private function publishAssets() {
        $assets = dirname(__FILE__) . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR;
        $this->assets = Yii::app()->getAssetManager()->publish($assets);
    }

    private function registerScripts() {
        $cs = Yii::app()->clientScript;
        foreach ($this->js as $file) {
            if (!$cs->isScriptRegistered($file))
                $cs->registerCoreScript($file);
        }

        foreach ($this->js as $file) {
            $cs->registerScriptFile($this->assets . "/" . $file, CClientScript::POS_HEAD);
        }
        foreach ($this->css as $file) {
            $cs->registerCssFile($this->assets . "/" . $file);
        }
    }

    public function init() {
        $this->publishAssets();
        $this->registerScripts();
    }

    public function run() {
        $sec = 0.59;
        $this->min--;
        $ss = $this->min + $sec;

        echo '<div id="topRight">';
        echo '<span id="show-time">';
        echo $ss;
        echo '</span>';
        echo '</div>';

        echo '
            <script type="text/javascript">
                var settimmer = 0;
                $(function(){
                        timer = window.setInterval(function() {                       
                            var tmpVar = $("span[id=show-time]").html().split(".");
                            var min = tmpVar[0];
                            var sec = tmpVar[1];
                            sec =sec - 1;
                            if (sec == 0) {
                                if (min != 0) {
                                    sec = 60;
                                    min--;
                                }
                            }
                            sec = sec / 100;
                            var updateTime = (eval(min) + eval(sec)).toFixed(2);
                            $("span[id=show-time]").html(updateTime);

                            if(updateTime == 0){
                                    ' . $this->action . ';
                                     clearInterval(timer);
                            }
                        }, 1000);
                });
            </script>';
    }

}
