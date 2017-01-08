<h3><i class="fa fa-phone fa-fw"></i><?= t('SMS Two-Factor Authentication') ?></h3>
<div class="panel">
    <?= $this->form->label(t('Twilio Account SID'), 'twilio_account_sid') ?>
    <?= $this->form->password('twilio_account_sid', $values) ?>

    <?= $this->form->label(t('Twilio Auth Token'), 'twilio_auth_token') ?>
    <?= $this->form->password('twilio_auth_token', $values) ?>

    <?= $this->form->label(t('Twilio Phone Number'), 'twilio_from_number') ?>
    <?= $this->form->text('twilio_from_number', $values) ?>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
    </div>
</div>