 <?php 
$urlnodered=$this->config->item('urlnodered');
$input=@$this->input->post(); 
if($input==null){$input=@$this->input->get();}
#ob_end_flush();
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
/************************/ 
?>
 <div class="col">
     <!-- BEGIN NAVBAR MENU -->
     <ul class="navbar-nav">
         <li class="<?php if($this->uri->segment(1)=='home'){ ?> active<?php } ?> nav-item">
             <a class="nav-link" href="<?php echo base_url('home');?>">
                 <span class="nav-link-icon d-md-none d-lg-inline-block">
                     <!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-tabler icons-tabler-outline icon-tabler-home-search">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                         <path d="M21 12l-9 -9l-9 9h2v7a2 2 0 0 0 2 2h4.7" />
                         <path d="M9 21v-6a2 2 0 0 1 2 -2h2" />
                         <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                         <path d="M20.2 20.2l1.8 1.8" />
                     </svg>
                 </span>
                 <span class="nav-link-title"><?php echo  $this->lang->line('home');?></span>
             </a>
         </li>
         <?php ############# ?>
         </li>
         <?php ############# ?>
         <?php ####Log######### ?>
         <li class="nav-item dropdown <?php  if($this->uri->segment(1)=='log'){ ?>active<?php } ?>">
             <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                 data-bs-auto-close="outside" role="button" aria-expanded="false">

                 <span class="nav-link-icon d-md-none d-lg-inline-block">
                     <!-- Download SVG icon from http://tabler.io/icons/icon/package -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-tabler icons-tabler-outline icon-tabler-database-search">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                         <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3" />
                         <path d="M4 6v6c0 1.657 3.582 3 8 3m8 -3.5v-5.5" />
                         <path d="M4 12v6c0 1.657 3.582 3 8 3" />
                         <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                         <path d="M20.2 20.2l1.8 1.8" />
                     </svg>
                 </span>
                 <span class="nav-link-title"> <?php echo $this->lang->line('menu_log');?> </span> </a>

             <div class="dropdown-menu">
                 <div class="dropdown-menu-columns">
                     <div class="dropdown-menu-column">
                         <a class="dropdown-item <?php if($this->uri->segment(1)=='log' and $this->uri->segment(2)=='history'){ ?> active<?php } ?>"
                             href="<?php echo base_url('log/history');?>"> History log <span
                                 class="badge badge-sm bg-green-lt text-uppercase ms-auto">System</span>
                             <a class="dropdown-item <?php if($this->uri->segment(1)=='log' and $this->uri->segment(2)=='alerts'){ ?> active<?php } ?>"
                                 href="<?php echo base_url('log/alerts');?>"> Alerts log </a>
                             <div class="dropend">
                                 <a class="dropdown-item dropdown-toggle <?php if($this->uri->segment(1)=='log' and ($this->uri->segment(2)=='signlog' or $this->uri->segment(2)=='accesslog')){ ?> active<?php } ?>"
                                     href="#sidebar-authentication" data-bs-toggle="dropdown"
                                     data-bs-auto-close="outside" role="button" aria-expanded="false">
                                     Authentication log </a>
                                 <div
                                     class="dropdown-menu <?php if($this->uri->segment(1)=='log' and $this->uri->segment(2)=='signlog'){ ?> active<?php } ?>">
                                     <a href="<?php echo base_url('log/signlog');?>" class="dropdown-item"> SignIn
                                         log </a>
                                     <a href="<?php echo base_url('log/accesslog');?>" class="dropdown-item"> Access
                                         log </a>
                                 </div>
                             </div>
                     </div>
                     <div class="dropdown-menu-column">
                         <a class="dropdown-item <?php if($this->uri->segment(1)=='log' and $this->uri->segment(2)=='user'){ ?> active<?php } ?>"
                             href="<?php echo base_url('log/user');?>"> User log</a>

                         <!-- <a class="dropdown-item <?php if($this->uri->segment(1)=='log' and $this->uri->segment(2)=='historylog'){ ?> active<?php } ?>"
                                 href="<?php echo base_url('log/historylog');?>"> History log</a> -->

                     </div>
                 </div>
             </div>

         </li>
         <?php #####Layout######## ?>

         <li class="nav-item <?php if($this->uri->segment(1)=='user'){ ?> active<?php } ?> dropdown">
             <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                 data-bs-auto-close="outside" role="button" aria-expanded="false">

                 <span class="nav-link-icon d-md-none d-lg-inline-block">
                     <!-- Download SVG icon from http://tabler.io/icons/icon/layout-2 -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-tabler icons-tabler-outline icon-tabler-chalkboard-teacher">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                         <path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" />
                         <path d="M12 14a2 2 0 1 0 4.001 -.001a2 2 0 0 0 -4.001 .001" />
                         <path d="M17 19a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2" />
                     </svg>
                 </span><span class="nav-link-title"> <?php echo $this->lang->line('user_menu');?> </span> </a>

             <div class="dropdown-menu">
                 <div class="dropdown-menu-columns">
                     <div class="dropdown-menu-column">
                         <a class="dropdown-item <?php if($this->uri->segment(1)=='user' and $this->uri->segment(2)=='dashboard'){ ?> active<?php } ?>"
                             href="<?php echo base_url('user/dashboard');?>"> Dashboard </a>

                         <a class="dropdown-item<?php if($this->uri->segment(1)=='user' and ($this->uri->segment(2)=='profile' or  $this->uri->segment(2)=='profileupdate')){ ?> active<?php } ?>"
                             href="<?php echo base_url('user/profile');?>"> Profile </a>

                         <a class="dropdown-item <?php if($this->uri->segment(1)=='user' and $this->uri->segment(2)=='profilesetting'){ ?> active<?php } ?>"
                             href="<?php echo base_url('user/profilesetting');?>"> Profile setting </a>

                         <a class="dropdown-item <?php if($this->uri->segment(1)=='user' and $this->uri->segment(2)=='userinfo'){ ?> active<?php } ?>"
                             href="<?php echo base_url('user/userinfo');?>"> Userinfo</a>

                         <a class="dropdown-item <?php if($this->uri->segment(1)=='user' and $this->uri->segment(2)=='accesslog'){ ?> active<?php } ?>"
                             href="<?php echo base_url('user/accesslog');?>"> Accesslog</a>

                         <a class="dropdown-item <?php if($this->uri->segment(1)=='user' and $this->uri->segment(2)=='signlog'){ ?> active<?php } ?>"
                             href="<?php echo base_url('user/signlog');?>"> Signlog</a>

                     </div>
                     <div class="dropdown-menu-column">

                         <a class="dropdown-item <?php if($this->uri->segment(1)=='user' and $this->uri->segment(2)=='profilelist'){ ?> active<?php } ?>"
                             href="<?php echo base_url('user/profilelist');?>">

                             Profile list

                         </a>

                         <a class="dropdown-item <?php if($this->uri->segment(1)=='user' and $this->uri->segment(2)=='alerts'){ ?> active<?php } ?>"
                             href="<?php echo base_url('user/alerts');?>"> Alerts </a>

                     </div>
                 </div>
             </div>

         </li>

         <?php #######Plugins###### ?>
         <?php  /* ?>
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#navbar-plugins" data-bs-toggle="dropdown"
                 data-bs-auto-close="outside" role="button" aria-expanded="false">

                 <span class="nav-link-icon d-md-none d-lg-inline-block">
                     <!-- Download SVG icon from http://tabler.io/icons/icon/puzzle -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-1">
                         <path
                             d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1" />
                     </svg>
                 </span>

                 <span class="nav-link-title">

                     Plugins

                 </span>

             </a>

             <div class="dropdown-menu">

                 <a class="dropdown-item" href="./charts.html">

                     Charts

                 </a>

                 <a class="dropdown-item" href="./colorpicker.html">

                     Color picker

                 </a>

                 <a class="dropdown-item" href="./datatables.html">

                     Datatables

                 </a>

             </div>

         </li>
         <?php  */ ?>
         <?php ############# ?>
         <?php  /* ?>
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#navbar-addons" data-bs-toggle="dropdown"
                 data-bs-auto-close="outside" role="button" aria-expanded="false">

                 <span class="nav-link-icon d-md-none d-lg-inline-block">
                     <!-- Download SVG icon from http://tabler.io/icons/icon/gift -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-1">
                         <path d="M3 8m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" />
                         <path d="M12 8l0 13" />
                         <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" />
                         <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" />
                     </svg>
                 </span>

                 <span class="nav-link-title">

                     Addons

                 </span>

             </a>

             <div class="dropdown-menu">

                 <a class="dropdown-item" href="./icons.html">

                     Icons

                 </a>

                 <a class="dropdown-item" href="./emails.html">

                     Emails

                 </a>

             </div>

         </li>
         <?php */ ?>
         <?php ######Help####### ?>
         <li class="nav-item dropdown <?php  if($this->uri->segment(1)=='help'){ ?>active<?php } ?>">
             <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                 data-bs-auto-close="outside" role="button" aria-expanded="false">

                 <span class="nav-link-icon d-md-none d-lg-inline-block">
                     <!-- Download SVG icon from http://tabler.io/icons/icon/lifebuoy -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-1">
                         <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                         <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                         <path d="M15 15l3.35 3.35" />
                         <path d="M9 15l-3.35 3.35" />
                         <path d="M5.65 5.65l3.35 3.35" />
                         <path d="M18.35 5.65l-3.35 3.35" />
                     </svg>
                 </span>

                 <span class="nav-link-title">

                     <?php echo $this->lang->line('help');?>

                 </span>

             </a>

             <div class="dropdown-menu">

                 <a class="dropdown-item" href="<?php echo base_url();?>#manual" target="_blank" rel="noopener">

                     Documentation

                 </a>

             </div>

         </li>
         <?php ######Help####### ?>
     </ul>
     <!-- END NAVBAR MENU -->
 </div>