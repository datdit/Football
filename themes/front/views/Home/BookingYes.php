<?php if (Yii::app()->user->hasFlash('register')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('register'); ?>
    </div>
<?php endif; ?>
