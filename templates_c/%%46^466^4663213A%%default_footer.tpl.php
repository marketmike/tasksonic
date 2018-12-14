<?php /* Smarty version 2.6.26, created on 2012-08-11 22:00:31
         compiled from default_footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'default_footer.tpl', 65, false),)), $this); ?>
<div id="ft">
        <div class="footer_ul">
            <div class="container_12">
                <div class="grid_12">
                    <ul class="cf">
                        <li class="col">
                            <strong>User Guides</strong>
                            <ul class="sub-list">
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/how_works.html">How It Works!</a></li>
								<?php if (! $_SESSION['User_Name']): ?>			
								<li><a href="#" onclick="popup('popUpDiv')">FAQ</a></li>
								<?php else: ?>								
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/faq.html">FAQ</a></li>
								<?php endif; ?>
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/terms_conditions.html">Terms of Use</a></li>
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/tour.html">Tour</a></li>
								<?php if ($_SESSION['User_Name']): ?>	
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/share_earn.html">Share & Earn</a></li>
								<?php else: ?>
								<li><a href="#" onclick="popup('popUpDiv')">Share & Earn</a></li>							
								<?php endif; ?>
                            </ul>
                        </li>
                        <li class="col">
                            <strong>Contact</strong>
                            <ul class="sub-list">
								<?php if (! $_SESSION['User_Name']): ?>			
								<li><a href="#" onclick="popup('popUpDiv')">Contact</a></li>
								<?php else: ?>
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/contact_us.html">Contact</a></li>							
								<?php endif; ?>
								<?php if (! $_SESSION['User_Name']): ?>			
								<li><a href="#" onclick="popup('popUpDiv')">Report Violation</a></li>
								<?php else: ?>
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/report-violation.html">Report Violation</a></li>						
								<?php endif; ?> 								
							  <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/become_tasker.html">Become A Tasker</a></li>
							  <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/become_task_owner.html">Become A Task Owner</a></li>                          
                            </ul>
                        </li>
                        <li class="col">
                            <strong>About Us</strong>
                            <ul class="sub-list">
                                <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/about.html">About Task Sonic</a></li>
                                <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/terms_conditions.html">Terms of Use</a></li>
                                <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/privacy.html">Privacy</a></li>
								<?php if (! $_SESSION['User_Name']): ?>			
								<li><a href="#" onclick="popup('popUpDiv')">Get Verified</a></li>
								<?php else: ?>								
                                <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/faq_details_28.html">Get Verified</a></li>
								<?php endif; ?>
                            </ul>
                        </li>
                        <li class="col end">
                                <div class="logo-footer">
                                    <a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
"><img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/logo.png" alt="" width="170" /></a>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container_12">
                 <span>&copy; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 <?php echo $this->_tpl_vars['Site_Title_Absolute']; ?>
. All rights reserved.</span>
            </div>
		</div>
	</div>
<script src="http://connect.facebook.net/en_US/all.js" type="text/javascript"></script>
<?php echo $this->_tpl_vars['google_analytics_code']; ?>
