<?php

include 'include/config.inc.php';
include_once $arrConfig['dir_site'].'/include/header.php';
include_once $arrConfig['dir_site'].'/include/topstript.php';

?>
    <body id="page-top">
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-10 text-uppercase">Startup Base</h1>
                        <h2 class="text-white mx-auto mt-2 mb-3">Empresa revolucionária no apoio e suporte a empresas.</h2>
                        <a class="btn btn-primary" href="#about">Conheça-nos</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4"> O Nosso Objetivo</h2>
                        <p class="text-white-50">
                        Somos uma incubadora com um programa colaborativo projetado para ajudar novas startups a ter sucesso. As nossas incubadoras ajudam os empresários a resolver alguns dos problemas comumente associados à execução de uma inicialização, fornecendo espaço de trabalho, apoio e treinamento.
                        </p>
                        <p class="text-white-50">
                        <img class="img-fluid" src="assets/img/incubadoras.png" alt="..." />
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-7 d-flex justify-content-center">
                    <img class="img-fluid mb-3 mb-lg-0" src="assets/img/LOGOTIPO2.png" alt="..." />
                </div>

                    <div class="col-xl-4 col-lg-7">
                        <div class="featured-text text-center text-lg-left">
                        <p class="text-black-50 mb-0" style="font-size: 30px;">
                                Melhorar o mundo <br> com todas as pessoas,<br>em todas áreas,<br>todos os dias.
                        </p>
                        <h4 style="margin-top: 20px;">STARTUP BASE</h4>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/66.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-left text-lg-right">
                                    <p class="mb-0 text-white">Proporcionamos o acolhimento empresarial, através da disponibilização de espaços físicos e da realização de iniciativas num ambiente de cooperação e inovação, no sentido de promover e incentivar a dinâmica empresarial.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/55.jpg" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-left text-lg-right">                                   
                                    <p class="mb-0 text-white">Na nossa incubadora, as empresas nos primeiros anos de atividade encontram condições que facilitam o acesso ao sistema científico e tecnológico, além de um ambiente que promove a ampliação de conhecimentos em áreas como qualidade, gestão, marketing e a interação com mercados nacionais e internacionais.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Signup-->
        <section class="signup-section" id="signup">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Contacte-nos</h2>
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Localização</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">Rua Luanda Pires</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="mailto:startupbase@outlook.pt">startupbaseporto@outlook.com</a></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Telefone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+351 221999222</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">

                </div>
            </div>
        </section>
        <!-- Footer-->
        <!--<footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2023</div></footer>-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
