<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Realiza tus examenes y demas en optica IJC.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Optica IJC</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/design/mdl/mdl.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/styles.css">
    <script src="<?php echo constant('URL');?>public/js/jquery/jquery-3.3.1.js"></script>
    <script src="<?php echo constant('URL');?>public/design/mdl/material.min.js"></script>
    <style>
        .demo-card-wide.mdl-card{
            width: 512px;
        }
        .demo-card-wide > .mdl-card__title {
            color: #fff;
            height: 176px;
            background: url('');
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
    </style>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <?php require 'views/header.php'; ?>
    <div class="android-content mdl-layout__content">
        <div class="mdl-typography--text-center">
            <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="margin-left: 550px; margin-top: 80px; margin-bottom: 100px;">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text"><strong>Inicio Usuario</strong></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form action="POST" id="user_form">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input required maxlength="10" minlength="10" class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="usercommon">
                            <label class="mdl-textfield__label" for="usercommon">Usuario o Identificacion</label>
                            <span class="mdl-textfield__error">Esto no parece ser correcto</span>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input required class="mdl-textfield__input" type="password" minlength="10" id="passcommon">
                            <label class="mdl-textfield__label" for="passcommon">Contraseña</label>
                            <span class="mdl-textfield__error">Algo anda mal</span>
                        </div>
                        <br>
                        <br>
                        <div class="mdl-card__actions mdl-card--border">
                            <button id="login" type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                Iniciar Sesion
                            </button>
                        </div>
                    </form>
                    <br>
                    <div id="progress" class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="display: none;"></div>
                    <div id="error_mssg" style="color: red; display: none;">?</div>
                </div>
            </div>
        </div>
        <?php require 'views/footer.php'; ?>
    </div>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="<?php echo constant('URL');?>public/js/app.js"></script>
</body>
</html>
