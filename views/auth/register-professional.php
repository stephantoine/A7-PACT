<?php
/** @var $this \app\core\View */
/** @var $proPublic \app\forms\PublicProfessionalRegister */
/** @var $proPrivate \app\forms\PrivateProfessionalRegister */

use app\core\form\Form;

$this->title = 'RegisterProfessional';
$this->jsFile = 'registerProfessional';
$this->cssFile = "registerPro";

?>

<div class="form-page">
    <div class="h-auth">
        <h1 class="heading-1">Inscription</h1>
        <div class="q-auth">
            <p>Déjà un compte ?</p>
            <a href="/connexion" class="link">Connexion</a>
        </div>
    </div>
    <x-tabs class="flex flex-col items-center justify-center lg:w-[600px]" save>
        <!-- public -->

        <x-tab role="heading" slot="tab" class="w-full text-center" id="public">Public / associatif</x-tab>
        <x-tab-panel role="region" slot="panel" class="w-full pt-4 pb-8">
            <?php $form = \app\core\form\Form::begin('', 'post', '', 'form-w') ?>
                <input type="hidden" name="form-name" value="public">
                <div class="form-inputs w-full">
                    <div class="flex flex-row gap-2 mb-4">
                        <input class="checkbox checkbox-normal" type="checkbox" id="asso">
                        <label class="checkbox" for="asso">Statut associatif</label>
                    </div>

                    <div class="hidden" id="siren">
                        <?php echo $form->field($proPublic, 'siren') ?>
                    </div>

                    <?php echo $form->field($proPublic, 'denomination') ?>
                    <?php echo $form->field($proPublic, 'mail')?>
                    <?php echo $form->field($proPublic, 'phone')->phoneField()?>

                    <div class="flex gap-4 on-same-line">
                        <div class="w-25%">
                            <?php echo $form->field($proPublic, 'streetnumber')?>
                        </div>
                        <?php echo $form->field($proPublic, 'streetname')?>
                    </div>

                    <div class="flex gap-4 on-same-line">
                        <div class="w-25%">
                            <?php echo $form->field($proPublic, 'postaleCode')?>
                        </div>
                        <?php echo $form->field($proPublic, 'city')?>
                    </div>

                    <?php echo $form->field($proPublic, 'password')->passwordField()?>
                    <?php echo $form->field($proPublic, 'passwordConfirm')->passwordField()?>

                    <div class="flex flex-col gap-4 mt-4 mb-4">
                        <div class="flex gap-4 items-center">
                            <div class="flex items-center">
                                <input class="switch" type="checkbox" id="switch-cond-public" name="conditions" />
                                <label class="switch" for="switch-cond-public"></label>
                            </div>
                            <label for="switch-period" id="switch-period-label">J'accepte les <a href="" class="link">conditions générales d'utilisation</a></label>
                        </div>

                        <div class="flex gap-4 items-center">
                            <div class="flex items-center">
                                <input class="switch" type="checkbox" id="switch-notifs" name="notifs" />
                                <label class="switch" for="switch-notifs"></label>
                            </div>
                            <label for="switch-period" id="switch-period-label">J'authorise l'envoie de notifications</label>
                        </div>
                    </div>
                 </div>
                <button type="submit" id="submitFormProPublic" class="button w-[90%]">S'inscrire</button>
            <?php \app\core\form\Form::end() ?>
        </x-tab-panel>

        <!-- privé -->

        <x-tab role="heading" slot="tab" class="w-full text-center" id="prive">Privé</x-tab>
        <x-tab-panel role="region" slot="panel" class="w-full pt-4 pb-8">
            <?php $form = \app\core\form\Form::begin('', 'post', '', 'form-w') ?>
                <input type="hidden" name="form-name" value="private">
                <div class="form-inputs">
                    <div class="flex gap-4 on-same-line">
                        <?php echo $form->field($proPrivate, 'denomination') ?>
                        <?php echo $form->field($proPrivate, 'siren') ?>
                    </div>

                    <?php echo $form->field($proPrivate, 'mail')?>
                    <?php echo $form->field($proPrivate, 'phone')->phoneField() ?>

                    <div class="flex gap-4 on-same-line">
                        <div class="w-25%">
                            <?php echo $form->field($proPrivate, 'streetnumber')?>
                        </div>
                        <?php echo $form->field($proPrivate, 'streetname')?>
                    </div>

                    <div class="flex gap-4 on-same-line">
                        <div class="w-25%">
                            <?php echo $form->field($proPrivate, 'postaleCode')?>
                        </div>
                        <?php echo $form->field($proPrivate, 'city')?>
                    </div>

                    <?php echo $form->field($proPrivate, 'password')->passwordField()?>
                    <?php echo $form->field($proPrivate, 'passwordConfirm')->passwordField()?>

                    <div id="check-payment" class="flex flex-row gap-2 mb-4">
                        <input class="checkbox checkbox-normal" type="checkbox" id="ch-payment">
                        <label class="checkbox" for="ch-payment">Je souhaite rentrer mes coordonnées bancaires maintenant (possibilité de le faire plus tard)</label>
                    </div>

                    <div id="mean-payment" class="hidden">
                        <div class="flex flex-col gap-4 w-full">
                            <div class="bt-payment flex-col" id="rib">
                                <div id="payment" class="clickable">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#0332aa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-[30px] h-[30px] lucide lucide-credit-card"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                                    Virement bancaire
                                </div>
                                <div id="content-payment" class="w-full hidden">
                                    <?php echo $form->field($proPrivate, 'titular-account')?>
                                    <?php echo $form->field($proPrivate, 'iban')?>
                                    <?php echo $form->field($proPrivate, 'bic')?>
                                </div>
                            </div>
                            <div class="bt-payment p[.8rem] flex-col" id="cb">
                                <div id="card" class="clickable">
                                    <img src="/assets/images/payment/logoVisa.png" title="logo visa" alt="visa">
                                    <img src="/assets/images/payment/logoMS.png" title="logo visa" alt="visa">
                                    Carte bancaire
                                </div>
                                <div id="content-card" class="w-full hidden">
                                    <?php echo $form->field($proPrivate, 'titular-card') ?>
                                    <?php echo $form->field($proPrivate, 'cardnumber') ?>
                                    <div class="flex gap-4">
                                        <?php echo $form->field($proPrivate, 'expirationdate')?>
                                        <?php echo $form->field($proPrivate, 'cryptogram')?>
                                    </div>
                                </div>
                            </div>
                            <div class="bt-payment flex-row justify-start" id="paypal">
                                <div class="clickable">
                                    <img src="/assets/images/payment/logoPaypal.png" title="logo paypal" alt="paypal">
                                    Paypal (+1.15€)
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 mt-2 mb-4">
                        <div class="flex gap-4 items-center">
                            <div class="flex items-center">
                                <input class="switch" type="checkbox" id="switch-cond-private" name="conditions" />
                                <label class="switch" for="switch-cond-private"></label>
                            </div>
                            <label for="switch-period" id="switch-period-label2">J'accepte les <a href="" class="link">conditions générales d'utilisation</a></label>
                        </div>

                        <div class="flex gap-4 items-center">
                            <div class="flex items-center">
                                <input class="switch" type="checkbox" id="switch-notifs2" name="notifs" />
                                <label class="switch" for="switch-notifs2"></label>
                            </div>
                            <label for="switch-period" id="switch-period-label2">J'autorise l'envoie de notifications</label>
                        </div>
                    </div>
                </div>
                <button type="submit" id="submitFormProPrivate" class="button w-[90%]">S'inscrire</button>
            <?php \app\core\form\Form::end() ?>
        </x-tab-panel>
    </x-tabs>
</div>
