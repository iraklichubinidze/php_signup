<div class="form-message">
    <?php if ($_SERVER['REQUEST_METHOD']==="POST" && !empty($errors)): ?>
        <div class="display-error">
            <?php
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            ?>
        </div>
    <?php endif;?>
</div>