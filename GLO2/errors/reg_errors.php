<?php if (count($reg_errors) > 0) : ?>
    <div class="error">
        <?php foreach ($reg_errors as $reg_error) : ?>
            <p><?php echo $reg_error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>