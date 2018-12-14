<?php
/* this file is mainly used for defining table constants. */

/*
Task Status information
-------------------------------
1->Open
2->Awarded
3->Task Accepted
4->Closed manually by user
5->Marked Completed
6->Completed
7->Failed
*/
#=================================================================
# A
#=================================================================
define('AUTH_USER',						 'auth_user');
define('AFFILATION_MASTER',				 'affilation_master');
define('AFFILATION_COMMISION',			 'affilation_commision');
#=================================================================
# B
#=================================================================
define('BADWORD_MASTER',				 'badword_master');
define('BID_MASTER',			     	 'bid_master');
define('BUYER_RATING_MASTER',	 	 	 'buyer_rating_master ');
#=================================================================
# C
#=================================================================
define('COUNTRY_MASTER',				 'country_master');
define('CATEGORY_MASTER',				 'category_master');
define('CONTACT_MASTER',				 'contact_master');
define('CONTACT_US_MASTER',				 'contact_us_master');

#=================================================================
# D  
#=================================================================
define('DEVELOPMENT_COST',				 'development_cost');
#=================================================================
# E
#=================================================================
define('EMAIL_CONFIG',				 'email_config');
define('ESCROW_PAYMENT_MASTER',		 'escrow_payment_master');
define('EXECUTION_TIME',			 'execution_time');
define('EMAIL_TEMPLATE',			 'email_template');
define('EMAIL_IN_PIPELINE',			 'email_in_pipeline');
#=================================================================
# F
#=================================================================

#=================================================================
# G
#=================================================================
#=================================================================
# H
#=================================================================
define('HOMEPAGE_MASTER',				 'homepage_master');
#=================================================================
# I
#=================================================================
define('INDUSTRY_MASTER',				 'industry_master');
#=================================================================
# J
#=================================================================
#=================================================================
# K
#=================================================================
#=================================================================
# L
#=================================================================
#=================================================================
# M
#=================================================================
define('MEMBER_MASTER',				 'member_master');
define('MESSAGE_BOARD_MASTER',		 'message_board_master');
define('MEMBERSHIP_PLAN_MASTER',	 'membership_plan_master');
define('MEMBER_MEMBERSHIP_HISTORY',	 'member_membership_history');
define('MONEYBOOKER_PENDING_DEPOSITE','moneybooker_pending_deposite');
#=================================================================
# N
#=================================================================
define('NEWSLETTER_MASTER',			 'newsletter_master ');

#=================================================================
# O
#=================================================================
#=================================================================
# P
#=================================================================
define('PAGE_MASTER',				 'page_master');
define('PROFILE_MASTER',			 'profile_master');
define('project_MASTER',			 'project_master');
define('PAYPAL_MASTER',			     'paypal_master');
define('project_EDIT_MASTER',		 'project_edit_master');
define('project_EXTEND_MASTER',		 'project_extend_master'); 
define('PRIVATE_MESSAGE_MASTER',	 'private_message_master');
define('PAYPAL_PENDING_DEPOSITE',	 'paypal_pending_deposite');
#=================================================================
# Q
#=================================================================

#=================================================================
# R
#=================================================================
define('REPORT_VIOLATIONS_MASTER',		 'report_violations_master ');
define('REPORT_INACTIVITY_MASTER',		 'report_inactivity_master ');
#=================================================================
# S
#=================================================================
define('SELLER_SKILL_MASTER',		     'seller_skill_master ');
define('SELLER_PORTFOLIO_MASTER',		 'seller_portfolio_master ');
define('SELLER_RATING_MASTER',	 	 	 'seller_rating_master ');
define('SITE_EARNING_DEPOSITE',	 	 	 'site_earning_deposite');
define('SITE_EARNING_project',	 	 	 'site_earning_project');

#=================================================================
# T
#=================================================================

#=================================================================
# U
#=================================================================

#=================================================================
# V
#=================================================================
#=================================================================
# W
#=================================================================
define('WEBSITE_CONFIG',				'website_config');
define('WITHDRAW_MASTER',		 		'withdraw_master');
#=================================================================
# X
#=================================================================

#=================================================================
# Y
#=================================================================
define('YEAR_EXPERIENCE',				'year_experience');
#=================================================================
# Z
#=================================================================



define('TERM_CONDITION',		  				'2');
#---------------------------
# Email Constants
#---------------------------
define('EMAIL_HEADER',							'1');
define('EMAIL_FOOTER',							'2');
define('EMAIL_FORGET_PASSWORD',					'3');
define('EMAIL_INVITE_TAC',						'4');
define('EMAIL_SIGNUP',							'5');
define('EMAIL_CONTACT_TASKER',					'6');
define('EMAIL_DELETE_TASK',					'7');
define('WITHDRAW_MONEY',		    			'8');
define('DEPOSIT_MONEY',		    				'9');
define('ADMIN_WITHDRAW_MONEY',    				'10');
define('TASK_INFORMATION_CHANGE',			'11');
define('SEND_TASK',							'12');
define('PRIVATE_MESSAGE',						'13');
define('BID_WON',								'14');
define('OUTBID_NOTICE',							'15');
define('BID_DENY',								'16');
define('CAN_NOT_ACCEPT_TASK_BY_TASK_OWNER',  	'17');
define('MAIL_TO_TASKER_AFTER_ACCEPT_TASK',  	'18');
define('MAIL_TO_TASK_OWNER_AFTER_ACCEPT_TASK',  	'19');
define('PLACE_BID_ON_TASK',				  	'20');
define('MESSAGE_ON_TASK',				  	'21');
define('VIOLATE_USER',						  	'22');
define('INFORM_TO_ADMIN_VIOLATE_USER',		  	'23');
define('ESCROW_PAYMENT_TO_TASKER',   		  	'24');
define('INVITE_FRIEND_FOR_BIDDING_ON_TASK', 	'25');
define('CANCEL_PAYMENT', 						'26');
define('SEND_NEW_TASKS', 					'27');
define('REPORT_VIOLATION',	 					'28');
define('EMAIL_SEND_USER',	 					'29');
define('EMAIL_SEND_TO_BLOCKUSER',	 			'30');
define('EMAIL_TO_POST_TASK',		 			'31');
define('NOTIFICATION_OF_TASK',			 	    '32');
define('BID_CANCEL',						 	'33');
define('ESCROW_PAYMENT_RELE',				 	'34');
define('CAN_NOT_ACCEPT_TASK_BY_TASK_OWNER',		'35');
define('SEND_ALL_TASKS',						'36');
define('RENEW_MEMBERSHIP',						'37');
define('PENDING_REQUEST',						'38');
define('TASK_CLOSED_WARNING',					'39');
define('TAC_NEW_CONTACT',						'40');
define('BECOME_ACCOUNT',						'41');
define('BID_PLACE_IN_PENDING',					'42');
define('VISIBLE_BLOCK_USER',					'43');
define('ACTIVATE_BID_ON_TASK',					'44');
define('BID_DELETE_BY_ADMIN',					'45');
define('UPDATES_FROM_TAC',						'46');
define('TASK_STAGED',						    '48');
define('BID_RETRACTED',							'49');
define('BIDDING_END_TWO_DAY',					'61');
define('BIDDING_END_ONE_DAY',					'62');
define('BIDDING_END_THREE_HOUR',				'63');
define('BIDDING_END_ONE_HOUR',					'64');
define('BIDDING_ENDED',							'65');

define('AWARDED_BIDDING_END_TWO_DAY',			'66');
define('AWARDED_BIDDING_END_ONE_DAY',			'67');
define('AWARDED_BIDDING_END_THREE_HOUR',		'68');
define('AWARDED_BIDDING_END_ONE_HOUR',			'69');
define('AWARDED_BIDDING_ENDED',					'70');
define('ACCEPT_DECLINE_NOTICE',					'71');
define('ACCEPT_DECLINE_NOTICE_OVER',			'72');
define('TASK_COMPLETED_NOTICE',					'73');
define('TASK_COMPLETED_DISPUTE_NOTICE',			'74');
define('AWARDED_COMPLETION_DATE_NEAR',			'75');
define('SPECIAL_USER_PERIOD_OVER',			'76');
define('EMAIL_FORGET_USERNAME',					'77');
define('FEEDBACK_LEFT',					'78');																			
$lang['PageSize_List'] = array(	'1'		=> '1',
								'5'		=> '5',
								'10'	=> '10',
								'15'	=> '15',
								'30' 	=> '30',
								'50'	=> '50',
								'100' 	=> '100',
							 	);
								
$lang_arr['Employees'] = array(	'1'			=> '1',
								'2-5'		=> '2 - 5',
								'6-10'		=> '6 - 10',
								'11-20'		=> '11 - 20',
								'21-40' 	=> '21 - 40',
								'40+'		=> '40+',
						 	);

$lang_arr['Reasons'] = array(	'0'		=> 'No Reasons',
								'1'		=> 'Bid is too high',
								'2'		=> 'Bid is too low',
								'3'		=> 'Bid Does not seem realistic',
								'4'		=> 'Bid did not provide sufficient information',
								'5' 	=> 'Tasker did not have necessary expertise',
								'6'		=> 'Did not address my task requirements',
								'7'		=> 'Sufficient examples of work not available',
								'8'		=> 'Prefer another style',
						 	);

$lang['Expertize'] 	= array(	'1'		=> '1',
								'2'		=> '2',
								'3'		=> '3',
								'4'		=> '4',
								'5' 	=> '5',
								'6'		=> '6',
								'7' 	=> '7',
								'8' 	=> '8',
								'9' 	=> '9',
								'10' 	=> '10',
						 	);
$lang['project_Extend'] = array(	'1'		=> '1',
									'2'		=> '2',
									'3'		=> '3',
									'4'		=> '4',
									'5' 	=> '5',
									'6'		=> '6',
									'7' 	=> '7',
								);
$lang['Year_Experience'] = array(	'Less Than 1 year'		=> 'Less Than 1 year',
									'1 - 2 years'			=> '1 - 2 years',
									'3 - 5 years'			=> '3 - 5 years',
									'6 - 10 years'			=> '6 - 10 years',
									'11+ years'				=> '11+ years',
									);

$lang['Expenses'] 	= array(	'10'		=> 'Less than $10',
								'20'		=> 'Less than $20',
								'30'		=> 'Less than $30',
								'40'		=> 'Less than $40',
								'50' 		=> 'Less than $50',
								'60'		=> 'Less than $60',
								'70' 		=> 'Less than $70',
								'80' 		=> 'Less than $80',
								'90' 		=> 'Less than $90',
								'100' 		=> 'Less than $100',
								'150' 		=> 'Less than $150',
								'200' 		=> 'Less than $200',
								'250' 		=> 'Less than $250',
								'999' 		=> 'More than $250',								
						 	);

									
$lang['Hourly_Rates'] = array(	
								'5'		=> '$5',
								'10'	=> '$10',
								'15'	=> '$15',
								'30' 	=> '$30',
								'50'	=> '$50',
								'100' 	=> '$100',
								'>100' 	=> '>$100',
							 	);
								
								
$lang['project_status_list'] = array(	'0'   	=> 'All', 
										'1'		=> 'Open',
										'2'		=> 'Awarded',
										'3'		=> 'Accepted',
										'4' 	=> 'Closed',
										'5' 	=> 'Marked Completed',
										'6' 	=> 'Completed',
										'7' 	=> 'Failed',										
									);								
								
$lang['violation'] = array(	
								'Posting contact information'			=> 'Posting contact information',
								'Advertising another website'			=> 'Advertising another website',
								'Fake task posted'						=> 'Fake task posted',
								'Obscenities or harassing behaviour' 	=> 'Obscenities or harassing behaviour',
								'Other' 								=> 'Other',
						);
$lang['inactivity'] = array(	
								'Escrow Not Created'			=> 'Escrow Not Created',
								'No Communication'			=> 'No Communication',
								'Task Not Completed' => 'Task Not Completed',
								'Other' 								=> 'Other',
						);						
$lang['contact'] = array(	
								'General Question'			    => 'General Question',
								'Technical Assistance'			=> 'Technical Assistance',
								'Payments & Account Balance'	=> 'Payments & Account Balance',
								'Advertising Opportunities' 	=> 'Advertising Opportunities',
								'Other' 						=> 'Other',
						);					
$currentDate = date("Y-m-d");// current date
$lang['days_for_bidding'] = array(	
										'1' => 'Today (1 day)',	
										'2' => 'Tomorrow (2 days)',
										'3' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +2 day")) . '(3 days)',
										'4' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +3 day")) . '(4 days)',
										'5' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +4 day")) . '(5 days)',
										'6' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +5 day")) . '(6 days)',
										'7' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +6 day")) . '(7 days)',
										'8' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +7 day")) . '(8 days)',
										'9' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +8 day")) . '(9 days)',
										'10' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +9 day")) . '(10 days)',
										'11' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +10 day")) . '(11 days)',
										'12' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +11 day")) . '(12 days)',
										'13' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +12 day")) . '(13 days)',
										'14' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +13 day")) . '(14 days)',
										'15' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +14 day")) . '(15 days)',
										'16' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +15 day")) . '(16 days)',									
										'17' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +16 day")) . '(17 days)',
										'18' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +17 day")) . '(18 days)',
										'19' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +18 day")) . '(19 days)',
										'20' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +19 day")) . '(20 days)',
										'21' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +20 day")) . '(21 days)',
										'22' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +21 day")) . '(22 days)',
										'23' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +22 day")) . '(23 days)',
										'24' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +23 day")) . '(24 days)',
										'25' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +24 day")) . '(25 days)',
										'26' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +25 day")) . '(26 days)',
										'27' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +26 day")) . '(27 days)',
										'28' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +27 day")) . '(28 days)',
										'29' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +28 day")) . '(29 days)',
										'30' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +29 day")) . '(30 days)',
										'31' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +30 day")) . '(31 days)',
							 	);
								

$lang['task_completed_dates'] = array(
										'1' => 'Today (1 day)',	
										'2' => 'Tomorrow (2 days)',
										'3' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +2 day")) . '(3 days)',
										'4' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +3 day")) . '(4 days)',
										'5' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +4 day")) . '(5 days)',
										'6' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +5 day")) . '(6 days)',
										'7' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +6 day")) . '(7 days)',
										'8' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +7 day")) . '(8 days)',
										'9' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +8 day")) . '(9 days)',
										'10' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +9 day")) . '(10 days)',
										'11' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +10 day")) . '(11 days)',
										'12' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +11 day")) . '(12 days)',
										'13' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +12 day")) . '(13 days)',
										'14' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +13 day")) . '(14 days)',
										'15' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +14 day")) . '(15 days)',
										'16' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +15 day")) . '(16 days)',									
										'17' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +16 day")) . '(17 days)',
										'18' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +17 day")) . '(18 days)',
										'19' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +18 day")) . '(19 days)',
										'20' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +19 day")) . '(20 days)',
										'21' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +20 day")) . '(21 days)',
										'22' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +21 day")) . '(22 days)',
										'23' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +22 day")) . '(23 days)',
										'24' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +23 day")) . '(24 days)',
										'25' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +24 day")) . '(25 days)',
										'26' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +25 day")) . '(26 days)',
										'27' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +26 day")) . '(27 days)',
										'28' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +27 day")) . '(28 days)',
										'29' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +28 day")) . '(29 days)',
										'30' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +29 day")) . '(30 days)',
										'31' => date('l F d, Y', strtotime(date("Y-m-d", strtotime($currentDate)) . " +30 day")) . '(31 days)',
										);									
								
$lang['time_of_day'] = array(	
									'00:00:00'	=> '12 AM',
									'01:00:00'	=> '1 AM',
									'02:00:00'	=> '2 AM',
									'03:00:00' 	=> '3 AM',
									'04:00:00'	=> '4 AM',
									'05:00:00' 	=> '5 AM',
									'06:00:00'	=> '6 AM',
									'07:00:00'	=> '7 AM',
									'08:00:00'	=> '8 AM',
									'09:00:00' 	=> '9 AM',
									'10:00:00'	=> '10 AM',
									'11:00:00'	=> '11 AM',
									'12:00:00'	=> '12 PM',
									'13:00:00'	=> '1 PM',
									'14:00:00'	=> '2 PM',	
									'15:00:00'	=> '3 PM',	
									'16:00:00'	=> '4 PM',	
									'17:00:00'	=> '5 PM',	
									'18:00:00'	=> '6 PM',	
									'19:00:00'	=> '7 PM',	
									'20:00:00'	=> '8 PM',	
									'21:00:00'	=> '9 PM',	
									'22:00:00'	=> '10 PM',	
									'23:00:00'	=> '11 PM',											
							 	);								
$arr_langs['Search_project'] = array(		'1'				=> 'Anywhere in the task',
											'2'				=> 'In title of task',
											'3'				=> 'In description of task',
									);

$arr_langs['Search_Portfolio'] = array(		'1'				=> 'Anywhere in the portfolio',
											'2'				=> 'Title',
											'3'				=> 'Description',
											'4'				=> 'User ID',
									);

$arr_langs['Search_Seller'] = 	array(		'1'				=> 'Anywhere in the profile',
											'2'				=> 'Location',
											'3'				=> 'Username',
											'4'				=> 'Sellers description',
									);

$arr_langs['Accept_Deny_project'] =	array(	'1'				=> 'Accept',
											'2'				=> 'Deny',
									);
									
$arr_langs['rating'] 	= 	array(			'1'				=> '1 - Very Poor',
											'2'				=> '2',
											'3'				=> '3',
											'4'				=> '4',
											'5'				=> '5 - Acceptable',
											'6'				=> '6',
											'7'				=> '7',
											'8'				=> '8',
											'9'				=> '9',
											'10'			=> '10 - Excellent',
									
								);
							
$lang['Month']			= array('01' 	=>	'January',
								'02'	=>	'February',
								'03'	=>	'March',
								'04'	=>	'April',
								'05'	=>	'May',
								'06'	=>	'June',
								'07'	=>	'July',
								'08'	=>	'August',
								'09'	=>	'September',
								'10'	=>	'Octomber',
								'11'	=>	'November',
								'12'	=>	'December',
							);							
?>