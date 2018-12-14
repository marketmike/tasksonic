<?php
class PDF extends FPDF
	{
		var $h_image = "";
		var $f_image = "";
		var $f_image_hgt = "";
		var $f_image_wdh = "";
		var $h_image_hgt = "";
		var $h_image_wdh = "";		
		var $h_middle = "";
		var $f_middle = "";
		var $Curreny = "";
		
		var $data=array();
		function Header()
		  {
				global $physical_path;
				$this->h_middle = (105 - ($this->h_image_wdh / 2) >= 0 ? 105 - ($this->h_image_wdh / 2) : 0);
				$this->Image($physical_path['Upload'].$this->h_image,$this->h_middle,0,$this->h_image_wdh,$this->h_image_hgt);
				$this->Ln((($this->h_image_hgt * 25.4) / 72));
		  }
		function Footer()
		  {
				global $physical_path;
				//$this->f_middle = (105 - ($this->f_image_wdh / 2) >= 0 ? 105 - ($this->f_image_wdh / 2) : 0);
			//	$this->Image($physical_path['Upload'].$this->f_image,$this->f_middle,(297-$this->f_image_hgt),$this->f_image_wdh,$this->f_image_hgt);
				//$this->Image($physical_path['imageupload'].$this->f_image,0,230,297,46);
				$this->SetY(-10);
				$this->SetFont('Arial','I',8);
				
				$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		  }
		
			//Colored table
			function FancyTable($header,$data)
			{
				//Colors, line width and bold font
			    $this->SetFillColor(87,142,184);
				$this->SetTextColor(255,255,255);
				$this->SetLineWidth(0);
				$this->SetFont('courier','',12);
		        //Header
				
//				$w=array(48,40,45,57);
				$w=array(63,63,63);
				for($i=0;$i<count($header);$i++)
					$this->Cell($w[$i],6,$header[$i],0,0,'C', 1);
					$this->Ln();
				//Color and font restoration
				$this->SetFillColor(196,218,234);
				$this->SetTextColor(0);
				$this->SetFont('');
				//Data
				$fill=0;
				
				foreach($data as $key=>$val)
				{
				   	$fill=!$fill;
					if (!$fill)
					{   
						$this->SetFillColor(222,235,243);
						$this->Cell($w[0],6,$val['member_name'],0,0,'C',1);
						$this->Cell($w[1],6,$val['membership_name'],0,0,'C',1);
						$this->Cell($w[2],6,$this->Curreny.$val['membership_fees'],0,0,'C',1);
						$this->Ln();
					}
					else
					{
					    $this->SetFillColor(196,218,234);
						$this->Cell($w[0],6,$val['member_name'],0,0,'C',$fill);
						$this->Cell($w[1],6,$val['membership_name'],0,0,'C',$fill);
						$this->Cell($w[2],6,$this->Curreny.$val['membership_fees'],0,0,'C',$fill);
						$this->Ln();
					}
				}
				$this->Cell(array_sum($w),0,'',0,0,$fill);
			}
			
			function FancyTable_deposite($header1,$earn_deposite)
			{
				//Colors, line width and bold font
			    $this->SetFillColor(87,142,184);
				$this->SetTextColor(255,255,255);
				$this->SetLineWidth(0);
				$this->SetFont('courier','',12);
		        //Header
				
				$w=array(48,40,45,57);
				
				for($i=0;$i<count($header1);$i++)
					$this->Cell($w[$i],6,$header1[$i],0,0,'C', 1);
					$this->Ln();
				//Color and font restoration
				$this->SetFillColor(196,218,234);
							
				$this->SetTextColor(0);
				$this->SetFont('');
				//Data
				$fill=0;
				foreach($earn_deposite as $key=>$val)
				{
				   	
					$fill=!$fill;
					if (!$fill)
					{   
						$this->SetFillColor(222,235,243);
						$this->Cell($w[0],6,$val['user_login_id'],0,0,'C',1);
						$this->Cell($w[1],6,$this->Curreny.number_format($val['deposited_money'],2),0,0,'C',1);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['paid_money'],2),0,0,'C',1);
						$this->Cell($w[3],6,$this->Curreny.number_format($val['earning'],2),0,0,'C',1);
						$this->Ln();
					}
					else
					{
					    $this->SetFillColor(196,218,234);
						$this->Cell($w[0],6,$val['user_login_id'],0,0,'C',$fill);
						$this->Cell($w[1],6,$this->Curreny.number_format($val['deposited_money'],2),0,0,'C',$fill);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['paid_money'],2),0,0,'C',$fill);
						$this->Cell($w[3],6,$this->Curreny.number_format($val['earning'],2),0,0,'C',$fill);
						$this->Ln();
					}
				}
				$this->Cell(array_sum($w),0,'',0,0);
			}
			function FancyTable_Comm($header2,$earn_comm)
			{
				//Colors, line width and bold font
			    $this->SetFillColor(87,142,184);
				$this->SetTextColor(255,255,255);
				$this->SetLineWidth(0);
				$this->SetFont('courier','',12);
		        
				$w=array(60,60,60);
				
				for($i=0;$i<count($header2);$i++)
					$this->Cell($w[$i],6,$header2[$i],0,0,'C', 1);
					$this->Ln();
				
				//Header
				
				/*$w=array(63,63,63);
				
				for($i=0;$i<count($header2);$i++)
					$this->Cell($w[$i],6,$header2[$i],0,0,'C', 1);
					$this->Ln();*/
				//Color and font restoration
				$this->SetFillColor(196,218,234);
							
				$this->SetTextColor(0);
				$this->SetFont('');
				//Data
				$fill=0;
				
				foreach($earn_comm as $key=>$val)
				{
					$fill=!$fill;
					if (!$fill)
					{   
						$this->SetFillColor(222,235,243);
						$this->Cell($w[0],6,$val['project_title'],0,0,'C',1);
						$this->Cell($w[1],6,$this->Curreny.number_format($val['buyer_comm'],2),0,0,'C',1);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['seller_comm'],2),0,0,'C',1);
						$this->Ln();
					}
					else
					{
					    $this->SetFillColor(196,218,234);
						$this->Cell($w[0],6,$val['project_title'],0,0,'C',$fill);
						$this->Cell($w[1],6,$this->Curreny.number_format($val['buyer_comm'],2),0,0,'C',$fill);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['seller_comm'],2),0,0,'C',$fill);
						$this->Ln();
					}
				}
				$this->Cell(array_sum($w),0,'',0,0);
			}
			function FancyTable_Withdraw($header3,$earn_withdraw)
			{
				//Colors, line width and bold font
			    $this->SetFillColor(87,142,184);
				$this->SetTextColor(255,255,255);
				$this->SetLineWidth(0);
				$this->SetFont('courier','',12);
		        //Header
				
				$w=array(48,40,45,57);
				
				for($i=0;$i<count($header3);$i++)
					$this->Cell($w[$i],6,$header3[$i],0,0,'C', 1);
					$this->Ln();
				//Color and font restoration
				$this->SetFillColor(196,218,234);
							
				$this->SetTextColor(0);
				$this->SetFont('');
				//Data
				$fill=0;
				
				foreach($earn_withdraw as $key=>$val)
				{
				   	
					$fill=!$fill;
					if (!$fill)
					{   
						$this->SetFillColor(222,235,243);
						$this->Cell($w[0],6,$val['user_name'],0,0,'C',1);
						$this->Cell($w[1],6,$this->Curreny.number_format($val['requested_amount'],2),0,0,'C',1);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['paied_amount'],2),0,0,'C',1);
						$this->Cell($w[3],6,$this->Curreny.number_format($val['amount'],2),0,0,'C',1);
						$this->Ln();
					}
					else
					{
					    $this->SetFillColor(196,218,234);
						$this->Cell($w[0],6,$val['user_name'],0,0,'C',$fill);
						$this->Cell($w[1],6,$this->Curreny.number_format($val['requested_amount'],2),0,0,'C',$fill);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['paied_amount'],2),0,0,'C',$fill);
						$this->Cell($w[3],6,$this->Curreny.number_format($val['amount'],2),0,0,'C',1);
						$this->Ln();
					}
				}
				$this->Cell(array_sum($w),0,'',0,0);
			}
			function FancyTable_Cancel($header4,$earn_cancel)
			{
				//Colors, line width and bold font
			    $this->SetFillColor(87,142,184);
				$this->SetTextColor(255,255,255);
				$this->SetLineWidth(0);
				$this->SetFont('courier','',12);
		        //Header
				
				$w=array(63,63,63);
				
				for($i=0;$i<count($header4);$i++)
					$this->Cell($w[$i],6,$header4[$i],0,0,'C', 1);
					$this->Ln();
				//Color and font restoration
				$this->SetFillColor(196,218,234);
							
				$this->SetTextColor(0);
				$this->SetFont('');
				//Data
				$fill=0;
				
				foreach($earn_cancel as $key=>$val)
				{
				   	
					$fill=!$fill;
					if (!$fill)
					{   
						$this->SetFillColor(222,235,243);
						$this->Cell($w[0],6,$val['project_title'],0,0,'C',1);
						$this->Cell($w[1],6,$val['project_posted_date'],0,0,'C',1);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['Fees'],2),0,0,'C',1);
						$this->Ln();
					}
					else
					{
					    $this->SetFillColor(196,218,234);
						$this->Cell($w[0],6,$val['project_title'],0,0,'C',$fill);
						$this->Cell($w[1],6,$val['project_posted_date'],0,0,'C',$fill);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['Fees'],2),0,0,'C',$fill);
						$this->Ln();
					}
				}
				$this->Cell(array_sum($w),0,'',0,0);
			}
			function FancyTable_Premium($header5,$earn_premium)
			{
				//Colors, line width and bold font
			    $this->SetFillColor(87,142,184);
				$this->SetTextColor(255,255,255);
				$this->SetLineWidth(0);
				$this->SetFont('courier','',12);
		        //Header
				
				$w=array(63,63,63);
				
				for($i=0;$i<count($header5);$i++)
					$this->Cell($w[$i],6,$header5[$i],0,0,'C', 1);
					$this->Ln();
				//Color and font restoration
				$this->SetFillColor(196,218,234);
							
				$this->SetTextColor(0);
				$this->SetFont('');
				//Data
				$fill=0;
				
				foreach($earn_premium as $key=>$val)
				{
				   	
					$fill=!$fill;
					if (!$fill)
					{   
						$this->SetFillColor(222,235,243);
						$this->Cell($w[0],6,$val['project_title'],0,0,'C',1);
						$this->Cell($w[1],6,$val['project_posted_date'],0,0,'C',1);
						//$this->Cell($w[2],6,$val['project_status'],0,0,'C',1);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['Fees'],2),0,0,'C',1);
						$this->Ln();
					}
					else
					{
					    $this->SetFillColor(196,218,234);
						$this->Cell($w[0],6,$val['project_title'],0,0,'C',$fill);
						$this->Cell($w[1],6,$val['project_posted_date'],0,0,'C',$fill);
						//$this->Cell($w[2],6,$val['project_status'],0,0,'C',$fill);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['Fees'],2),0,0,'C',1);
						$this->Ln();
					}
				}
				$this->Cell(array_sum($w),0,'',0,0);
			}
			function FancyTable_Urgent($header5,$earn_urgent)
			{
				//Colors, line width and bold font
			    $this->SetFillColor(87,142,184);
				$this->SetTextColor(255,255,255);
				$this->SetLineWidth(0);
				$this->SetFont('courier','',12);
		        //Header
				
				$w=array(63,63,63);
				
				for($i=0;$i<count($header5);$i++)
					$this->Cell($w[$i],6,$header5[$i],0,0,'C', 1);
					$this->Ln();
				//Color and font restoration
				$this->SetFillColor(196,218,234);
							
				$this->SetTextColor(0);
				$this->SetFont('');
				//Data
				$fill=0;
				
				foreach($earn_urgent as $key=>$val)
				{
				   	
					$fill=!$fill;
					if (!$fill)
					{   
						$this->SetFillColor(222,235,243);
						$this->Cell($w[0],6,$val['project_title'],0,0,'C',1);
						$this->Cell($w[1],6,$val['project_posted_date'],0,0,'C',1);
						//$this->Cell($w[2],6,$val['project_status'],0,0,'C',1);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['Fees'],2),0,0,'C',1);
						$this->Ln();
					}
					else
					{
					    $this->SetFillColor(196,218,234);
						$this->Cell($w[0],6,$val['project_title'],0,0,'C',$fill);
						$this->Cell($w[1],6,$val['project_posted_date'],0,0,'C',$fill);
						//$this->Cell($w[2],6,$val['project_status'],0,0,'C',$fill);
						$this->Cell($w[2],6,$this->Curreny.number_format($val['Fees'],2),0,0,'C',1);
						$this->Ln();
					}
				}
				$this->Cell(array_sum($w),0,'',0,0);
			}
   }
?>