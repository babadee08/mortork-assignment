<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/multimodel.style.css" type="text/css" media="all">
    <title>MK Dealer</title>
</head>
<body>

<main role="main" class="multimodel step-first">
    <header class="multimodel__masthead">
        <div class="multimodel__header">
            <h1>MK Cars</h1>
        </div>
    </header>

    <div id="multimodel__wrapper" class="multimodel__wrapper">
        <section class="multimodel__editorial u-hidden-till--small u-margin-top--l">
            <article class="editorial">
                <div class="editorial__content">
                    <p class="editorial__text t1 u-text--center">
                        <strong>Call us at 0123456789</strong> from Monday to Friday, 9:00AM to 6:00PM, specifying the
                        car ID you are interested in.
                    </p>
                </div>
            </article>
        </section>
        <section class="multimodel__slider">
            <div class="grid">
                <?php foreach ($cars as $car) { ?>
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
</main>
</body>
</html>