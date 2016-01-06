<h3><i class="fa fa-phone fa-fw"></i><?= t('SMS Two-Factor Authentication') ?></h3>
<div class="listing">
    <?= $this->form->label(t('Phone Number'), 'phone_number') ?>
    <?= $this->form->text('phone_number', $values) ?>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
    </div>
</div>