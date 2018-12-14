<script language="javascript">
	var JS_en_dec		 = '{$langJS_en_dec}';
</script>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>Edit Your Task</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>				
				<form method="post" action="{$smarty.server.PHP_SELF}" name="frmeditproject" enctype="multipart/form-data">
				{if $total == $count1}
				<div class="note" style="text-align:center;padding:20px;">{$lang.Edit_Text1} {$total} {$lang.Times}</div>
				{else}
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="intro">{$pro_title|stripslashes|truncate:60:'..':true:false}</label>
						</div>
					</div>
					<div class="clear"></div>
					<div class="field" style="margin-bottom:10px;">
					<div class="note" style="text-align:center;padding:8px;">{$lang.Edit_Text} {$count}{if $count == 1}st{/if}{if $count == 2}nd{/if}{if $count == 3}rd{/if}{if $count == 4}th{/if}{if $count == 5}th{/if} {$lang.Times}</div>
					<div class="clear"></div>
					<span style="width:100%;text-align:center;">{$lang.Edit_Details}</span>
					</div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
						<label for="login-email-address">{$lang.Desc_En}</label>
						</div>
					</div>
					<div class="title-bottom"></div>				
					<div class="clear"></div>
					<div class="field textarea">
						<textarea name="en_edit_proj" class="textarea" ></textarea>
						<span class="hint" style="width:550px;">Add to your task description to further describe your task</span>
					</div>					
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.task_File_Edit}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<input type="file" name="project_file">
						<span class="hint" style="width:550px;">You can upload an additional file that is relevant to the task</span>
					</div>
					<div class="buttons"  style="float:center;">						
					<button type="submit" class="regular" name="Submit" value="{$lang.Button_Submit}" onClick="Javascript: return Check_Details(this.form);">Update Task</button>
					<button type="submit" class="regular" name="Cancel" value="{$lang.Cancel1}" onClick="Javascript: return cancel();">Cancel</button>					
					</div>					
					<input type="hidden" name="Action" value="Edit">
					<input type="hidden" name="project_id" value="{$id}">
				{/if}
				</form>
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
			<div class="right-column-wrap">
			<h1>Something Here</h1>
			</div>			
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->