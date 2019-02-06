<!doctype html>
<!--
  Optica IJC
  Copyright 2018 Universidad de Cordoba All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<?php
/*require_once 'php/UserSession.php';
$user = null;
$isLogin = false;
$usrsess = new UserSession();
if (isset($_SESSION['userSession'])) {
    $isLogin = true;
    $user = $usrsess->getCurrentUser();
}*/
?>
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
    <link rel="stylesheet" href="../../vendor/design/mdl/mdl.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="../../vendor/js/jquery/jquery-3.3.1.js"></script>
    <script src="../../vendor/design/mdl/material.min.js"></script>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <div class="page-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="page-title mdl-layout-title">
            <img id="imageHome" class="optic-logo-image" src="../../vendor/images/optica-logo.png" alt="">
          </span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="page-header-spacer mdl-layout-spacer"></div>
            <!-- Navigation -->
            <div class="page-navigation-container">
                <nav class="page-navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="formulas.php">Formulas</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Examenes</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Diagnosticos</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Procedimientos</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Recetario</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Garantias</a>
                    <?php
                    if ($isLogin) {
                        echo '
                        <span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--amber mdl-color-text--white">'.$user['name'][0].'</span>
                            <span class="mdl-chip__text">'.$user['name'].' </span>
                            <a onclick="logout()" class="mdl-chip__action"><i class="material-icons">cancel</i></a>
                        </span>';
                    }
                    ?>
                </nav>
            </div>
            <span class="page-mobile-title mdl-layout-title">
                <img class="optic-logo-image" src="../../vendor/images/optica-logo.png" alt="">
            </span>
            <button class="page-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"
                    id="more-button">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                <?php
                if ($isLogin){
                    ?>
                    <li onclick="logout()" class="mdl-menu__item">
                        Cerrar sesion
                    </li>
                    <?php
                } else {
                    ?>
                    <li onclick="adminlogin()" class="mdl-menu__item">
                        Acceso Administrativo
                    </li>
                    <li onclick="userlogin()" class="mdl-menu__item">
                        Acceso Usuarios
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <?php
    if($isLogin) {
        ?>
        <div class="page-drawer mdl-layout__drawer">
                    <span class="mdl-layout-title">
                      <img class="optic-logo-image" src="../../vendor/images/optica-logo-white.png" alt="">
                    </span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="../../vendor/images/hclinicasv.png" alt="">
                          Historias Clinicas
                        </span>
                </a>
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="../../vendor/images/hevoluciones.png" alt="">
                          Hoja de evoluciones
                        </span>
                </a>
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="../../vendor/images/citasv.png" alt="">
                          Citas
                        </span>
                </a>
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="../../vendor/images/fcompra.png" alt="">
                          Facturas de compra
                        </span>
                </a>
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="../../vendor/images/formulas.png" alt="">
                          Formulas
                        </span>
                </a>
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="../../vendor/images/citas.png" alt="">
                          Pedidos cliente
                        </span>
                </a>
                <?php
                if($user['type'] == 2){
                    ?>
                    <div class="page-drawer-separator"></div>
                    <span class="mdl-navigation__link">Administrativo</span>
                    <a class="mdl-navigation__link" href="">Pago nomina</a>
                    <a class="mdl-navigation__link" href="">Control de producto</a>
                    <a class="mdl-navigation__link" href="">Pedido labroatorio</a>
                    <a class="mdl-navigation__link" href="">Consentimiento informado</a>
                    <?php
                }
                ?>
                <div class="page-drawer-separator"></div>
                <span class="mdl-navigation__link">Clientes</span>
                <a class="mdl-navigation__link" href="">Formula lentes</a>
                <a class="mdl-navigation__link" href="">Examenes externos</a>
                <a class="mdl-navigation__link" href="">Diagnosticos</a>
                <div class="page-drawer-separator"></div>
                <span class="mdl-navigation__link">Otros</span>
                <a class="mdl-navigation__link" href="">Procedimientos</a>
                <a class="mdl-navigation__link" href="">Recetario de examenes</a>
                <a class="mdl-navigation__link" href="register.php">Registro de usuario</a>
            </nav>
        </div>
        <?php
    }
    ?>
    <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="optic-be-together-section mdl-typography--text-center">
            <div class="logo-font optic-slogan">404</div><!--Here info in the banner-->
            <div class="logo-font optic-sub-slogan">Pagina no encontrada</div>
            <a href="#screens">
                <button class="page-fab mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect">
                    <i class="material-icons">expand_more</i>
                </button>
            </a>
        </div>
        <footer class="page-footer mdl-mega-footer">
            <div class="mdl-mega-footer--top-section">
                <div class="mdl-mega-footer--right-section">
                    <a class="mdl-typography--font-light" href="#top">
                        Volver arriba
                        <i class="material-icons">expand_less</i>
                    </a>
                </div>
            </div>
            <div class="mdl-mega-footer--middle-section">
                <p class="mdl-typography--font-light">Ingenieria de Software: © 2018, Universidad de Cordoba</p>
                <!--<p class="mdl-typography--font-light">Other resoruces</p>-->
            </div>
            <div class="mdl-mega-footer--bottom-section">
                <a class="optic-link page-link-menu mdl-typography--font-light" id="version-dropdown">
                    Usuarios
                    <i class="material-icons">arrow_drop_up</i>
                </a>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="version-dropdown">
                    <li class="mdl-menu__item">Notificarme</li>
                    <li class="mdl-menu__item">Cancelar cita</li>
                    <li class="mdl-menu__item">Retiro de productos</li>
                </ul>
                <a class="optic-link page-link-menu mdl-typography--font-light" id="developers-dropdown">
                    Otras opciones
                    <i class="material-icons">arrow_drop_up</i>
                </a>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="developers-dropdown">
                    <li class="mdl-menu__item">Administrativo</li>
                    <li class="mdl-menu__item">Control de producto</li>
                    <li class="mdl-menu__item">Control de inventario</li>
                    <li class="mdl-menu__item">Cartera</li>
                </ul>
                <a class="optic-link mdl-typography--font-light" href="LICENSE-2.0.txt">Licencia</a>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="../../vendor/js/app.js"></script>
</body>
</html>
