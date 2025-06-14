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
/************************/
$home=$this->lang->line('home');
if(!$home){
    $home='Home';
}
/************************/
function randomNDigitNumber($digits){
  $returnString = mt_rand(1, 9);
  while (strlen($returnString) < $digits) {
    $returnString .= mt_rand(0, 9);
  }
  return $returnString;
}
$rad=randomNDigitNumber(12);

?>
 <div class="nav-item dropdown d-none d-md-flex me-3">
     <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show app menu"
         data-bs-auto-close="outside" aria-expanded="false">
         <!-- Download SVG icon from http://tabler.io/icons/icon/apps -->
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
             <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
             <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
             <path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
             <path d="M14 7l6 0" />
             <path d="M17 4l0 6" />
         </svg>
     </a>
     <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
         <div class="card">
             <div class="card-header">
                 <div class="card-title">My Apps</div>

                 <div class="card-actions btn-actions">
                     <a href="#" class="btn-action">
                         <!-- Download SVG icon from http://tabler.io/icons/icon/settings -->
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="icon icon-1">
                             <path
                                 d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                             <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                         </svg>
                     </a>
                 </div>
             </div>
             <div class="card-body scroll-y p-2" style="max-height: 50vh">
                 <div class="row g-0">

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/amazon.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Amazon</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/android.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Android</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/app-store.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Apple App Store</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/apple-podcast.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Apple Podcast</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/apple.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Apple</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/behance.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Behance</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/discord.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Discord</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/dribbble.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Dribbble</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/dropbox.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Dropbox</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/ever-green.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Ever Green</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/facebook.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Facebook</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/figma.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Figma</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/github.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">GitHub</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/gitlab.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">GitLab</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-ads.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Ads</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-adsense.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google AdSense</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-analytics.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Analytics</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-cloud.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Cloud</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-drive.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Drive</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-fit.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Fit</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-home.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Home</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-maps.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Maps</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-meet.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Meet</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-photos.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Photos</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-play.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Play</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-shopping.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Shopping</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google-teams.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google Teams</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/google.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Google</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/instagram.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Instagram</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/klarna.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Klarna</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/linkedin.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">LinkedIn</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/mailchimp.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Mailchimp</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/medium.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Medium</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/messenger.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Messenger</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/meta.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Meta</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/monday.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Monday</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/netflix.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Netflix</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/notion.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Notion</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/office-365.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Office 365</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/opera.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Opera</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/paypal.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">PayPal</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/petreon.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Patreon</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/pinterest.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Pinterest</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/play-store.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Play Store</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/quora.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Quora</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/reddit.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Reddit</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/shopify.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Shopify</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/skype.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Skype</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/slack.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Slack</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/snapchat.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Snapchat</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/soundcloud.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">SoundCloud</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/spotify.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Spotify</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/stripe.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Stripe</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/telegram.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Telegram</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/tiktok.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">TikTok</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/tinder.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Tinder</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/trello.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Trello</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/truth.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Truth</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/tumblr.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Tumblr</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/twitch.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Twitch</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/twitter.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Twitter</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/vimeo.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Vimeo</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/vk.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">VK</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/watppad.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Wattpad</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/webflow.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Webflow</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/whatsapp.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">WhatsApp</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/wordpress.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">WordPress</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/xing.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Xing</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/yelp.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Yelp</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/youtube.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">YouTube</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/zapier.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Zapier</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/zendesk.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Zendesk</span>
                         </a>
                     </div>

                     <div class="col-4">
                         <a href="#"
                             class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                             <img src="<?php echo base_url('assets');?>/static/brands/zoom.svg"
                                 class="w-6 h-6 mx-auto mb-2" width="24" height="24" alt="">
                             <span class="h5">Zoom</span>
                         </a>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>