<?php if (Yii::app()->user->hasFlash('register')): ?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('register'); ?>
    </div>
<?php endif; ?>
