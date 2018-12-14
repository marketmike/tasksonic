<div id="ft">
        <div class="footer_ul">
            <div class="container_12">
                <div class="grid_12">
                    <ul class="cf">
                        <li class="col">
                            <strong>User Guides</strong>
                            <ul class="sub-list">
								<li><a href="{$Site_URL}/how_works.html">How It Works!</a></li>
								{if !$smarty.session.User_Name}			
								<li><a href="#" onclick="popup('popUpDiv')">FAQ</a></li>
								{else}								
								<li><a href="{$Site_URL}/faq.html">FAQ</a></li>
								{/if}
								<li><a href="{$Site_URL}/terms_conditions.html">Terms of Use</a></li>
								<li><a href="{$Site_URL}/tour.html">Tour</a></li>
								{if $smarty.session.User_Name}	
								<li><a href="{$Site_URL}/share_earn.html">Share & Earn</a></li>
								{else}
								<li><a href="#" onclick="popup('popUpDiv')">Share & Earn</a></li>							
								{/if}
                            </ul>
                        </li>
                        <li class="col">
                            <strong>Contact</strong>
                            <ul class="sub-list">
								{if !$smarty.session.User_Name}			
								<li><a href="#" onclick="popup('popUpDiv')">Contact</a></li>
								{else}
								<li><a href="{$Site_URL}/contact_us.html">Contact</a></li>							
								{/if}
								{if !$smarty.session.User_Name}			
								<li><a href="#" onclick="popup('popUpDiv')">Report Violation</a></li>
								{else}
								<li><a href="{$Site_URL}/report-violation.html">Report Violation</a></li>						
								{/if} 								
							  <li><a href="{$Site_URL}/become_tasker.html">Become A Tasker</a></li>
							  <li><a href="{$Site_URL}/become_task_owner.html">Become A Task Owner</a></li>                          
                            </ul>
                        </li>
                        <li class="col">
                            <strong>About Us</strong>
                            <ul class="sub-list">
                                <li><a href="{$Site_URL}/about.html">About Task Sonic</a></li>
                                <li><a href="{$Site_URL}/terms_conditions.html">Terms of Use</a></li>
                                <li><a href="{$Site_URL}/privacy.html">Privacy</a></li>
								{if !$smarty.session.User_Name}			
								<li><a href="#" onclick="popup('popUpDiv')">Get Verified</a></li>
								{else}								
                                <li><a href="{$Site_URL}/faq_details_28.html">Get Verified</a></li>
								{/if}
                            </ul>
                        </li>
                        <li class="col end">
                                <div class="logo-footer">
                                    <a href="{$Site_URL}"><img src="{$Site_URL}/images/logo.png" alt="" width="170" /></a>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container_12">
                 <span>&copy; {$smarty.now|date_format:"%Y"} {$Site_Title_Absolute}. All rights reserved.</span>
            </div>
		</div>
	</div>
<script src="http://connect.facebook.net/en_US/all.js" type="text/javascript"></script>
{$google_analytics_code}
