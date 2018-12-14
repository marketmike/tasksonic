<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		User Manager [ {$Action} ]
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmUsers" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">User Manager [ {$Action} ]</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td colspan="4" align="left"><input type="submit" name="Submit" value="Back" class="stdButton"></td>
				</tr>
				<tr>
					<td width="24%" valign="top" class="fieldlabelRight">UserID :</td>
					<td width="25%" valign="top" class="fieldlabelLeft">{$user_login_id}{if $membership_id!=0}&nbsp;(VIP member){else}&nbsp;{/if} </td>
					<td width="20%" valign="top" class="fieldlabelRight">Email ID :</td>
					<td width="31%" valign="top" class="fieldlabelLeft"> {$mem_email}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">First Name :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_fname}</td>
					<td class="fieldlabelRight" valign="top">Last Name :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_lname}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">City :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_city}</td>
					<td class="fieldlabelRight" valign="top">State :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_state}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">County :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_country}</td>
					<td class="fieldlabelRight" valign="top">Organization :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_organization}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">No. of Employees :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_employes}</td>
					<td class="fieldlabelRight" valign="top">Daytime Phone :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_daytime_phone}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Evening Phone :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_eve_phone}</td>
					<td class="fieldlabelRight" valign="top">Fax :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_fax_no}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Address :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_address}<BR>{$mem_address1}</td>
					<td class="fieldlabelRight" valign="top">Zipcode :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_zip_code}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Member Website :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_website}</td>
					<td class="fieldlabelRight" valign="top">Wallet Amount :</td>
					<td class="fieldlabelLeft" valign="top">$&nbsp;{$totalamount}</td>
				</tr>
				<tr>
				    <td class="fieldlabelRight" valign="top">project Notices :</td>
					<td class="fieldlabelLeft" valign="top"> {$mem_pro_notice}</td>
					<td class="fieldlabelRight" valign="top">Options :</td>
					<td class="fieldlabelLeft" valign="top">{$mem_option} </td>
				</tr>
			</table>	
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
			   <tr>
			      <td class="fieldlabelRight1" valign="top" align="left">Areas of Interest/Expertise :</td>
			   </tr>
			   <tr>
				   <td colspan="3">
						  <table width="100%" border="0" cellpadding="0" cellspacing="0">
							{assign var="col" value=3}
							{section name=prod loop=$Loop}
							{if $smarty.section.prod.iteration|mod:$col==1}
								<tr>
							{/if}
									<td valign="top" width="25%" class="fieldlabelRight2">
										&nbsp;{$catname[prod]}
									</td>
							{if $smarty.section.prod.iteration|mod:$col==0}
								</tr>
							{/if}
							{/section}
							</table>
					</td>
				</tr>	
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight1" valign="top" align="left">
						<span id="Buyer_Show" style="visibility:visible;">
						<a href="javascript: show_Buyer()" class="actionlink"><strong>Buyers Profile</strong></a>
						</span>
						<span id="Buyer_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Buyer()" class="actionlink"><strong>Buyers Profile</strong></a>
						</span>
					</td>
				</tr>
			</table>	
		<span id="Buyer_Hide_Details" style="visibility:hidden;display:none;">
		<table border="0" cellpadding="1" cellspacing="2" width="90%">
			<tr>
				<td class="fieldlabelRight" valign="top" width="24%">Slogan :</td>
				<td class="fieldlabelLeft" valign="top">{$buyers_slogan}</td>
			</tr>
			<tr>
				<td class="fieldlabelRight" valign="top" width="24%">Description :</td>
				<td class="fieldlabelLeft">&nbsp;</td>
			</tr>
			<tr>
				<td class="fieldLabelLeft1" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;{$buyers_description}</td>
			</tr>
		</table>
		</span>
		<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight1" valign="top" align="left">
						<span id="Seller_Show" style="visibility:visible;">
						<a href="javascript: show_Seller()" class="actionlink"><strong>Seller Profile</strong></a>
						</span>
						<span id="Seller_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Seller()" class="actionlink"><strong>Seller Profile</strong></a>
						</span>
					</td>
				</tr>
			</table>	
				   <span id="Seller_Hide_Details" style="visibility:hidden;display:none;">
						<table border="0" cellpadding="1" cellspacing="2" width="90%">
							<tr>
								<td class="fieldlabelRight" valign="top" width="24%">Slogan :</td>
								<td class="fieldlabelLeft" valign="top">{$seller_slogan}</td>
							</tr>
							<tr>
								<td class="fieldlabelRight" valign="top">Description :</td>
								<td class="fieldlabelLeft" valign="top">{$seller_description}</td>
							</tr>
							<tr>
								<td class="fieldlabelRight" valign="top">Rates Per Hour :</td>
								<td class="fieldlabelLeft" valign="top">{$seller_rate_per_hour} $</td>
							</tr>
							<tr>
								<td class="fieldlabelRight" valign="top">Experience :</td>
								<td class="fieldlabelLeft" valign="top">{$seller_exp}</td>
							</tr>
							<tr>
								<td class="fieldlabelRight" valign="top">Industry :</td>
								<td class="fieldlabelLeft" valign="top">{$industries}</td>
							</tr>
							<tr>
								<td class="fieldlabelRight" valign="top">Skills and Ratings :</td>
								<td class="fieldlabelLeft" valign="top">
								<table width="75%" cellpadding="1" cellspacing="1" border="0">
									<tr>
										<td class="varnormal" align="center"><strong>Skill Name</strong></td>
										<td class="varnormal" align="center"><strong>Skill Rate</strong></td>
									</tr>
									{foreach name=skills from=$Listing item=skills}
									<tr>
										<td class="varnormal" align="center">{$skills->skill_name}</td>
										<td class="varnormal" align="center">{$skills->skill_rate}</td>
									</tr>
									{/foreach}
								</table>
								</td>
							</tr>
							<tr>
								<td class="fieldlabelRight" valign="top">Average Skills :</td>
								<td class="fieldlabelLeft" valign="top">{$average_skill}</td>
							</tr>
						</table>
						</span>
		<table border="0" cellpadding="1" cellspacing="2" width="90%">
			<tr>
				<td class="fieldlabelRight1" valign="top" align="left">
					<span id="Seller_Protfolio_Show" style="visibility:visible;">
					<a href="javascript: show_Seller_Protfolio()" class="actionlink"><strong>Seller Protfolio</strong></a>
					</span>
					<span id="Seller_Protfolio_Hide" style="visibility:hidden;display:none;">
					<a href="javascript: hide_Seller_Protfolio()" class="actionlink"><strong>Seller Protfolio</strong></a>
					</span>
				</td>
			</tr>
		</table>
		<span id="Seller_Protfolio_Hide_Details" style="visibility:hidden;display:none;">
		 <table width="90%" border="0" cellspacing="1" cellpadding="3">
				 	<tr class="header">
						<td align="center" ><strong>Imgae</strong></td>
						<td align="center" ><strong>Description</strong></td>
						<td align="center" ><strong>Industry</strong></td>
						<td align="center" ><strong>Development Cost</strong></td>
						<td align="center" ><strong>Execution Time</strong></td>
						<td align="center" ><strong>Categories</strong></td>
			       </tr>
				 			   
				 {section name=sellerport loop=$Loop}
				   	<tr class="{cycle values='list_B, list_A'}">
					    {if $sportfolio[sellerport].sample_file != NULL}
			            <td align="center" class="fieldLabelLeft1"><img src="{$portfolio_imgpath}{$sportfolio[sellerport].sample_file}" height="50" width="50"/></td>
						{else}
			            <td align="justify" class="fieldLabelLeft1"></td>
						{/if}
					  	<td align="left" class="fieldLabelLeft1" valign="top"><strong>Title</strong> : {$sportfolio[sellerport].title}<br /><br />					    
					    {$sportfolio[sellerport].desc|truncate:100}</td> 
						<td align="center" class="fieldLabelLeft1">{$sportfolio[sellerport].industry}</td>
						<td align="center" class="fieldLabelLeft1">{$sportfolio[sellerport].budget}</td>
						<td align="center" class="fieldLabelLeft1">{$sportfolio[sellerport].time_spent}</td>
						<td align="center" class="fieldLabelLeft1">{$sportfolio[sellerport].cats}</td>
			        </tr>
				{/section}
			 </table>		
			</span> 
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight1" valign="top" align="left">
					<span id="Transcation_Show" style="visibility:visible;">
					<a href="javascript: show_Transcation()" class="actionlink"><strong>Transaction</strong></a>
					</span>
					<span id="Transcation_Hide" style="visibility:hidden;display:none;">
					<a href="javascript: hide_Transcation()" class="actionlink"><strong>Transaction</strong></a>
					</span>
					</td>
				</tr>
			</table>
		<!--Start Transcation_Hide_Details-->
		 <span id="Transcation_Hide_Details" style="visibility:hidden;display:none;">
		 <!--######################################################################## -->
		 <!--Paypal _Master -->
		 <table border="0" cellpadding="1" cellspacing="2" width="90%">
		       <tr>
					<td class="fieldlabelRight1" valign="top" align="right"></t></t>
					<span id="Deposit_Show" style="visibility:visible;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript: show_Deposit()" class="actionlink"><strong>Deposit Money</strong></a>
					</span>
					<span id="Deposit_Hide" style="visibility:hidden;display:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript: hide_Deposit()" class="actionlink"><strong>Deposit Money</strong></a>
					</span>
					</td>
				</tr>
		 </table>
		 <span id="Deposit_Hide_Details" style="visibility:hidden;display:none;">
			<table width="90%" border="0" cellspacing="1" cellpadding="3">
				<tr class="header">
					<td align="center" ><strong>Amount</strong></td>
					<td align="center" ><strong>Description</strong></td>
					<td align="center" ><strong>Date</strong></td>
				</tr>
				{section name=trac loop=$trasLoop}
				   	<tr class="{cycle values='list_A, list_B'}">
				      	<td align="center" class="fieldLabelLeft1">{$atraction[trac].trans_type}&nbsp;$&nbsp;{$atraction[trac].amount|string_format:"%.2f"}</td>
						<td align="center" class="fieldLabelLeft1">{$atraction[trac].description}</td>
						<td align="center" class="fieldLabelLeft1">{$atraction[trac].date}</td>
				   </tr>
				{/section}	   
			</table>
		 </span>	
			 <!--Paypal _Master End-->	
			 <!--Withdraw _Master -->
		 <table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight1" valign="top" align="right">
					<span id="Withdraw_Show" style="visibility:visible;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript: show_Withdraw()" class="actionlink"><strong>Requested withdraw Money</strong></a>
					</span>
					<span id="Withdraw_Hide" style="visibility:hidden;display:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript: hide_Withdraw()" class="actionlink"><strong>Requested withdraw Money</strong></a>
					</span>
					</td>
				</tr>
		 </table>
		  <span id="Withdraw_Hide_Details" style="visibility:hidden;display:none;">
			<table width="90%" border="0" cellspacing="1" cellpadding="3">
				<tr class="header">
					<td align="center" ><strong>Amount</strong></td>
					<td align="center" ><strong>Description</strong></td>
					<td align="center" ><strong>Date</strong></td>
					<td align="center" ><strong>Status</strong></td>
				</tr>
				{section name=withdrawmoney loop=$withdrawLoop}
				   	<tr class="{cycle values='list_A, list_B'}">
				      	<td align="center" class="fieldLabelLeft1">{$awithdarw[withdrawmoney].trans_type}&nbsp;$&nbsp;{$awithdarw[withdrawmoney].amount|string_format:"%.2f"}</td>
						<td align="center" class="fieldLabelLeft1">{$awithdarw[withdrawmoney].description}</td>
						<td align="center" class="fieldLabelLeft1">{$awithdarw[withdrawmoney].requested_date}</td>
						<td align="center" class="fieldLabelLeft1">{if $awithdarw[withdrawmoney].status == 0}Requested (Pending){else}Completed{/if}</td>
				   </tr>
				{/section}
			</table>
			</span>
			 <!--Withdraw _Master End-->	
			<!--######################################################################## -->	
			</span> <!-- End-->
			<br>
			<input type="hidden" name="Action" value="{$Action}"/>
			<br>
		</td>
	</tr>
	</form>
</table>