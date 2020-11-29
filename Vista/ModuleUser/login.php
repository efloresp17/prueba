<div class="box-search-content search_active block-bg close__top">
    <form id="search_mini_form" class="minisearch" action="#">
        <div class="field__search">
            <input type="text" placeholder="Search entire store here...">
            <div class="action">
                <a href="#"><i class="zmdi zmdi-search"></i></a>
            </div>
        </div>
    </form>
    <div class="close__wrap">
        <span>close</span>
    </div>
</div>
<!-- End Search Popup -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image--6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Login | Signup</h2>
                    <nav class="bradcaump-content">
                        <a class="breadcrumb_item" href="index.html">Home</a>
                        <span class="brd-separetor">/</span>
                        <span class="breadcrumb_item active">Login</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<div class="toast" name="toast">
    <div class="toast-header">
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong class="mr-auto">Complete los campos solicitados</strong>
    </div>
    <div class="toast-body">

    </div>
</div>
<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="my__account__wrapper">
                    <h3 class="account__title">Login</h3>
                    <form action="validarLogin.php" id="formLogin" enctype="multipart/form-data" method="POST	" name="formLogin">
                        <div class="account__form">
                            <div class="input__box">
                                <label>Email address <span>*</span></label>
                                <input type="text" id="emailL" name="emailL" onkeyup="PasarValor();">
                            </div>
                            <div class="input__box">
                                <label>Password<span>*</span></label>
                                <input type="password" id="password" name="password">
                            </div>
                            <div class="form__btn">
                                <button class="advertenciaLogin">Login</button>
                                <label class="label-for-checkbox">
                                    <input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <a class="forget_pass" href="#">Lost your password?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="my__account__wrapper">
                    <h3 class="account__title">Register</h3>
                    <form action="registrarUsuario.php" id="formRegistro" enctype="multipart/form-data" method="POST	" name="formRegistro">
                        <div class="account__form">
                            <div class="input__box">
                                <label>First Name<span>*</span></label>
                                <input type="text" id="firstName" name="firstName">
                            </div>
                            <div class="input__box">
                                <label>Last Name<span>*</span></label>
                                <input type="text" id="lastName" name="lastName">
                            </div>
                            <div class="input__box">
                                <label>Email address <span>*</span></label>
                                <input type="email" id="emailR" name="emailR">
                            </div>
                            <div class="form__btn">
                                <button class="adRegistroUser">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>