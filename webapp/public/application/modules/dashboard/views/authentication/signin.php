<?php 
$urlnodered=$this->config->item('urlnodered');
$input=@$this->input->post(); 
if($input==null){$input=@$this->input->get();}
ob_end_flush();
# แปลภาษา
# File THAI --> application\language\thai\app_lang.php
# File English --> application\language\english\app_lang.php	
$admin_id=0;# 0=>เห็นทุกเมนู
$navbar_fix='';
$breadcrumb_fix='';
$language=$this->lang->language;
$lang=$this->lang->line('lang');
$langs=$this->lang->line('langs');
$dashboard=$this->lang->line('dashboard');
$welcome=$this->lang->line('welcome');
$settings=$this->lang->line('settings');
$preview=$this->lang->line('preview');
$website=$this->lang->line('website');
$profile=$this->lang->line('profile');
$logout=$this->lang->line('logout');
$titleweb=$this->lang->line('titleweb');
$apps=$this->lang->line('apps');
$company=$this->lang->line('company');
$login=$this->lang->line('login');
$username=$this->lang->line('username');
$password=$this->lang->line('password');
$remember=$this->lang->line('remember');
$forgot=$this->lang->line('forgot');
$email=$this->lang->line('email');
$sendemail=$this->lang->line('sendemail');
$register=$this->lang->line('register');
$reset=$this->lang->line('reset');
######################
if($lang=='th'){
	$langs_th='ภาษาไทย';
	$langs_en='ภาษาอังกถษ';
}else if($lang=='en'){
	$langs_th='Thai';
	$langs_en='English';
}
$segment1=$this->uri->segment(1);
$segment2=$this->uri->segment(2);
$segment3=$this->uri->segment(3);
$segment4=$this->uri->segment(4);
$segment5=$this->uri->segment(5);
$segment6=$this->uri->segment(6);
$segment7=$this->uri->segment(7);
$segment8=$this->uri->segment(8);
$segment9=$this->uri->segment(9);
$segment10=$this->uri->segment(10);
$base_url=$this->config->item('base_url');
$digits='12';
function randomNDigitNumber($digits){
  $returnString = mt_rand(1, 9);
  while (strlen($returnString) < $digits) {
    $returnString .= mt_rand(0, 9);
  }
  return $returnString;
}
$rad=randomNDigitNumber(12);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php echo $titleweb;?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.ico'); ?>" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo base_url('assets');?>/dist/css/tabler.css?<?php echo $rad;?>" rel="stylesheet" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PLUGINS STYLES -->
    <link href="<?php echo base_url('assets');?>/dist/css/tabler-flags.css?<?php echo $rad;?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets');?>/dist/css/tabler-socials.css?<?php echo $rad;?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets');?>/dist/css/tabler-payments.css?<?php echo $rad;?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets');?>/dist/css/tabler-vendors.css?<?php echo $rad;?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets');?>/dist/css/tabler-marketing.css?<?php echo $rad;?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets');?>/dist/css/tabler-themes.css?<?php echo $rad;?>" rel="stylesheet" />
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN DEMO STYLES -->
    <link href="<?php echo base_url('assets');?>/preview/css/demo.css?<?php echo $rad;?>" rel="stylesheet" />
    <!-- END DEMO STYLES -->
    <!-- BEGIN CUSTOM FONT -->
    <style>
    @import url('<?php echo base_url('assets');?>/inter/inter.css');
    </style>
    <!-- END CUSTOM FONT -->
</head>

<body>
    <!-- BEGIN GLOBAL THEME SCRIPT -->
    <script src="<?php echo base_url('assets');?>/dist/js/tabler-theme.js"></script>
    <!-- END GLOBAL THEME SCRIPT -->

    <div class="page page-center">
        <div class="container container-tight py-4">

            <div class="text-center mb-4  navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="<?php echo base_url('/main');?>">
                    <img src="<?php echo base_url('assets/img/logo/logo-dark.png');?>" width="80" height="15"
                        viewBox="0 0 232 68" class="navbar-brand-image"></a>
            </div>
            <div class="text-center">
                <a href="<?php echo $base_url;?>/lang/language?lang=english&uri=<?php print(uri_string()); ?>"> <img
                        src="<?=base_url()?>/assets/lang/en.png" onClick="lanfTrans('en');" height="25"
                        title="<?php  echo $this->lang->line('english');?>"> </a> <a
                    href="<?php echo $base_url;?>/lang/language?lang=thai&uri=<?php print(uri_string()); ?>"><img
                        src="<?=base_url()?>/assets/lang/th.png" onClick="lanfTrans('th');" height="25"
                        title="<?php  echo $this->lang->line('thai');?>"> </a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>

                    <form action="<?php echo base_url('user/signindb');?>" method="post" autocomplete="off" novalidate>
                        <div class="mb-3">
                            <label class="form-label"><?php echo $this->lang->line('username');?> /
                                <?php echo $this->lang->line('emailuser');?></label>
                            <input type="username" name="username" value=""
                                placeholder="<?php echo $this->lang->line('username');?>"
                                class=" form-control  is-invalid" placeholder="Invalid State..." autocomplete="on"
                                required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                <?php echo $this->lang->line('password');?>
                                <span class="form-label-description">
                                    <a href="<?php echo base_url('user/forgotpassword');?>">
                                        <?php echo $this->lang->line('link_forgot_password');?></a>
                                </span>
                            </label>

                            <div class="input-group input-group-flat">
                                <input type="password" name="password" value="" class="form-control" id="passwordField"
                                    placeholder="<?php echo $this->lang->line('password');?>" autocomplete="on"
                                    required>

                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"
                                        onclick="togglePassword()" id="togglePasswordBtn">
                                        <!-- Eye icon for show password -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1"
                                            id="eyeIcon">
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                        <!-- Eye-off icon for hide password (initially hidden) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1"
                                            id="eyeOffIcon" style="display: none;">
                                            <path d="M10.585 10.585a2 2 0 0 0 2.829 2.829" />
                                            <path
                                                d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                                            <path d="M3 3l18 18" />
                                        </svg>
                                    </a>
                                </span>
                            </div>


                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" />
                                <span class="form-check-label"> <a
                                        href="<?php echo base_url('/user/signinotp');?>">Remember me on this
                                        device</a></span>
                            </label>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">
                                <?php echo $this->lang->line('button_sign_in');?></button>
                        </div>
                    </form>
                </div>
                <?php /* ?>
                <div class=" hr-text">or
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <a href="#" class="btn btn-4 w-100">

                                <!-- Download SVG icon from http://tabler.io/icons/icon/brand-github -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon text-github icon-2">
                                    <path
                                        d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                                </svg>

                                Login with Github

                            </a>
                        </div>
                        <div class="col">

                            <a href="#" class="btn btn-4 w-100">

                                <!-- Download SVG icon from http://tabler.io/icons/icon/brand-x -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon text-x icon-2">
                                    <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                    <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                </svg>

                                Login with X

                            </a>
                        </div>
                    </div>
                </div>
                <?php */ ?>
            </div>

            <div class="text-center text-secondary mt-3">
                Don't have account yet? <a href="<?php echo base_url('user/signup');?>" tabindex="-1">
                    <?php echo $this->lang->line('button_signup');?></a>
            </div>

        </div>
    </div>

    <div class="settings">
        <a href="#" class="btn btn-floating btn-icon btn-primary" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasSettings">
            <!-- Download SVG icon from http://tabler.io/icons/icon/brush -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-1">
                <path d="M3 21v-4a4 4 0 1 1 4 4h-4" />
                <path d="M21 3a16 16 0 0 0 -12.8 10.2" />
                <path d="M21 3a16 16 0 0 1 -10.2 12.8" />
                <path d="M10.6 9a9 9 0 0 1 4.4 4.4" />
            </svg>
        </a>

        <form class="offcanvas offcanvas-start offcanvas-narrow" tabindex="-1" id="offcanvasSettings">
            <div class="offcanvas-header">
                <h2 class="offcanvas-title">Theme Builder</h2>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column">
                <div>
                    <div class="mb-4">
                        <label class="form-label">Color mode</label>
                        <p class="form-hint">Choose the color mode for your app.</p>

                        <label class="form-check">
                            <div class="form-selectgroup-item">
                                <input type="radio" name="theme" value="light" class="form-check-input" checked />
                                <div class="form-check-label">Light</div>
                            </div>
                        </label>

                        <label class="form-check">
                            <div class="form-selectgroup-item">
                                <input type="radio" name="theme" value="dark" class="form-check-input" />
                                <div class="form-check-label">Dark</div>
                            </div>
                        </label>

                    </div>

                    <div class="mb-4">
                        <label class="form-label">Color scheme</label>
                        <p class="form-hint">The perfect color mode for your app.</p>

                        <div class="row g-2">

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="blue"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-blue"></span>
                                </label>
                            </div>

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="azure"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-azure"></span>
                                </label>
                            </div>

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="indigo"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-indigo"></span>
                                </label>
                            </div>

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="purple"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-purple"></span>
                                </label>
                            </div>

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="pink"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-pink"></span>
                                </label>
                            </div>

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="red"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-red"></span>
                                </label>
                            </div>

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="orange"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-orange"></span>
                                </label>
                            </div>

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="yellow"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-yellow"></span>
                                </label>
                            </div>

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="lime"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-lime"></span>
                                </label>
                            </div>

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="green"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-green"></span>
                                </label>
                            </div>

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="teal"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-teal"></span>
                                </label>
                            </div>

                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="cyan"
                                        class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-cyan"></span>
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Font family</label>
                        <p class="form-hint">Choose the font family that fits your app.</p>

                        <div>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-font" value="sans-serif" class="form-check-input"
                                        checked />
                                    <div class="form-check-label">Sans-serif</div>
                                </div>
                            </label>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-font" value="serif" class="form-check-input" />
                                    <div class="form-check-label">Serif</div>
                                </div>
                            </label>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-font" value="monospace" class="form-check-input" />
                                    <div class="form-check-label">Monospace</div>
                                </div>
                            </label>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-font" value="comic" class="form-check-input" />
                                    <div class="form-check-label">Comic</div>
                                </div>
                            </label>

                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Theme base</label>
                        <p class="form-hint">Choose the gray shade for your app.</p>

                        <div>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-base" value="slate" class="form-check-input" />
                                    <div class="form-check-label">Slate</div>
                                </div>
                            </label>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-base" value="gray" class="form-check-input"
                                        checked />
                                    <div class="form-check-label">Gray</div>
                                </div>
                            </label>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-base" value="zinc" class="form-check-input" />
                                    <div class="form-check-label">Zinc</div>
                                </div>
                            </label>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-base" value="neutral" class="form-check-input" />
                                    <div class="form-check-label">Neutral</div>
                                </div>
                            </label>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-base" value="stone" class="form-check-input" />
                                    <div class="form-check-label">Stone</div>
                                </div>
                            </label>

                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Corner Radius</label>
                        <p class="form-hint">
                            Choose the border radius factor for your app.
                        </p>

                        <div>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-radius" value="0" class="form-check-input" />
                                    <div class="form-check-label">0</div>
                                </div>
                            </label>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-radius" value="0.5" class="form-check-input" />
                                    <div class="form-check-label">0.5</div>
                                </div>
                            </label>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-radius" value="1" class="form-check-input"
                                        checked />
                                    <div class="form-check-label">1</div>
                                </div>
                            </label>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-radius" value="1.5" class="form-check-input" />
                                    <div class="form-check-label">1.5</div>
                                </div>
                            </label>

                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-radius" value="2" class="form-check-input" />
                                    <div class="form-check-label">2</div>
                                </div>
                            </label>

                        </div>
                    </div>
                </div>

                <div class="mt-auto space-y">
                    <button type="button" class="btn w-100" id="reset-changes">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/rotate -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-1">
                            <path d="M19.95 11a8 8 0 1 0 -.5 4m.5 5v-5h-5" />
                        </svg>
                        Reset changes
                    </button>
                    <a href="#" class="btn btn-primary w-100" data-bs-dismiss="offcanvas">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/settings -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-1">
                            <path
                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        </svg>
                        Save settings
                    </a>
                </div>

            </div>
        </form>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?php echo base_url('assets');?>/dist/js/tabler.js" defer></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN DEMO SCRIPTS -->
    <script src="<?php echo base_url('assets');?>/preview/js/demo.js" defer></script>
    <!-- END DEMO SCRIPTS -->

    <!-- BEGIN PAGE SCRIPTS -->
    <script>
    function togglePassword() {
        const passwordField = document.getElementById('passwordField');
        const eyeIcon = document.getElementById('eyeIcon');
        const eyeOffIcon = document.getElementById('eyeOffIcon');
        const toggleBtn = document.getElementById('togglePasswordBtn');

        if (passwordField.type === 'password') {
            // แสดงรหัสผ่าน
            passwordField.type = 'text';
            eyeIcon.style.display = 'none';
            eyeOffIcon.style.display = 'block';
            toggleBtn.title = 'Hide password';
        } else {
            // ซ่อนรหัสผ่าน
            passwordField.type = 'password';
            eyeIcon.style.display = 'block';
            eyeOffIcon.style.display = 'none';
            toggleBtn.title = 'Show password';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var forms = document.querySelectorAll('form');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var themeConfig = {
            theme: "light",
            "theme-base": "gray",
            "theme-font": "sans-serif",
            "theme-primary": "blue",
            "theme-radius": "1",
        }
        var url = new URL(window.location)
        var form = document.getElementById("offcanvasSettings")
        var resetButton = document.getElementById("reset-changes")
        var checkItems = function() {
            for (var key in themeConfig) {
                var value = window.localStorage["tabler-" + key] || themeConfig[key]
                if (!!value) {
                    var radios = form.querySelectorAll(`[name="${key}"]`)
                    if (!!radios) {
                        radios.forEach((radio) => {
                            radio.checked = radio.value === value
                        })
                    }
                }
            }
        }
        form.addEventListener("change", function(event) {
            var target = event.target,
                name = target.name,
                value = target.value
            for (var key in themeConfig) {
                if (name === key) {
                    document.documentElement.setAttribute("data-bs-" + key, value)
                    window.localStorage.setItem("tabler-" + key, value)
                    url.searchParams.set(key, value)
                }
            }
            window.history.pushState({}, "", url)
        })
        resetButton.addEventListener("click", function() {
            for (var key in themeConfig) {
                var value = themeConfig[key]
                document.documentElement.removeAttribute("data-bs-" + key)
                window.localStorage.removeItem("tabler-" + key)
                url.searchParams.delete(key)
            }
            checkItems()
            window.history.pushState({}, "", url)
        })
        checkItems()
    })
    </script>
    <!-- END PAGE SCRIPTS -->
</body>

</html>