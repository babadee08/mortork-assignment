<?php require('partials/head.php'); ?>

    <div id="multimodel__wrapper" class="multimodel__wrapper">
        <div style="width: 100%;display: inline-flex">
            <section class="multimodel__slider">
                <div class="grid">
                    <div class="grid__item u-12/12--medium u-6/12--large u-4/12--large-x">
                        <article class="card">
                            <figure class="card__picture">
                                <div class="card__image">
                                    <img src="<?php echo $car['attrs']['img']; ?>">
                                </div>
                            </figure>
                            <footer class="card__info"><span
                                        class="make u-text--center"><?php echo $car['attrs']['make']; ?></span>
                                <span class="model u-text--center"><?php echo $car['attrs']['model']; ?></span>
                            </footer>
                        </article>
                    </div>
                </div>
            </section>

            <section class="multimodel__content">
                    <div class="dk-forms">
                        <form method="post" action="/leads">
                            <input type="hidden" name="csrf_token" value="<?php echo generateToken('leads-form'); ?>"/>
                            <input type="hidden" name="carId" value="<?php echo $car['attrs']['carId']; ?>"/>
                            <div class="landing-form-fields">
                                <span class="field field__name">
                                    <label for="name" class="gui-label">Nome</label>
                                    <input type="text" id="name"
                                           name="name"
                                           required="required" class="gui-input">
                                </span>
                                <span class="field field__surname">
                                    <label for="surname" class="gui-label">Cognome</label>
                                    <input type="text" id="surname"
                                           name="surname"
                                           required="required" class="gui-input">
                                </span>
                                <span class="field field__email">
                                    <label for="email" class="gui-label">Email</label>
                                    <input type="email" id="email"
                                           name="email"
                                           required="required"
                                           class="gui-input">
                                </span>
                                <div class="input-group-tel-zipcode">
                                    <span class="field field__telephone">
                                        <label for="phone" class="gui-label">Telefono</label>
                                        <input
                                                type="tel" id="phone" placeholder="Telefono"
                                                name="phone"
                                                inputmode="numeric"
                                                required="required" class="gui-input">
                                    </span>

                                    <span class="field field__cap">
                                        <label for="zip" class="gui-label">CAP</label>
                                        <input type="tel" id="zip"
                                               name="zip"
                                               required="required" class="gui-input">
                                    </span>
                                </div>
                            </div>
                            <div class="option-group field field__privacy">
                                <input type="checkbox"
                                       name="privacy"
                                       id="privacy"
                                       value="Y"
                                       required="required"
                                       class="gui-checkbox">

                                <label for="privacy" class="option gui-label">
                                    <span class="gui-label-text">
                                        Ho letto e accetto <a href="#" target="_blank"> la privacy policy</a>
                                    </span>
                                </label>
                            </div>
                            <footer class="multimodel__leadform-cta">
                                <button type="submit" class="leadform__submit cta-primary cta--wide has-transform-active">
                                    Request quote
                                </button>
                            </footer>
                        </form>
                    </div>
                </section>
        </div>
        <div style="padding: 7%;width: 100%">
            <section class="multimodel__slider">
                <h2 style="text-align: center;padding: 10px">Recommendations</h2>
                <div class="grid">
                    <?php foreach ($recommendations as $car) { ?>
                        <div class="grid__item u-12/12--medium u-6/12--large u-4/12--large-x">
                            <article class="card">
                                <figure class="card__picture">
                                    <div class="card__image">
                                        <img src="<?php echo $car['attrs']['img']; ?>">
                                    </div>
                                </figure>
                                <footer class="card__info">
                                    <span class="make u-text--center"><?php echo $car['attrs']['make']; ?></span>
                                    <span class="model u-text--center"><a href="/detail/<?php echo $car['attrs']['carId']; ?>"><?php echo $car['attrs']['model']; ?></a></span>
                                    <p class="u-text--center">Car ID: <?php echo $car['attrs']['carId']; ?></p>
                                </footer>
                            </article>
                        </div>
                    <?php } ?>
                </div>
            </section>
        </div>
    </div>
</main>
</html>