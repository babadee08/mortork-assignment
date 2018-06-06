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
            <h1><a href="/">MK Cars</a></h1>
        </div>
        <?php if (checkSessionMessage('status')) { ?>
            <div style="text-align: center;background-color: #4cae4c;color: white;padding: 10px">
                <span><?php echo getSessionMessage('status');  ?></span>
            </div>
        <?php } ?>
        <?php if (checkSessionMessage('error')) { ?>
            <div style="text-align: center;background-color: #cc0828;color: white;padding: 10px">
                <span><?php echo getSessionMessage('error');  ?></span>
            </div>
        <?php } ?>
    </header>