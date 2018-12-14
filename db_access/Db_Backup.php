<?php
class Backup
{
	function backup()
	{}	
	
	################################################################################################################
	# Function: getfield_Name($table='table name')
	# Purpose: It gets all private fields for all tables
	# Return: It returns array of fields details
	# Parameters: 
	# 1. $table = Table Name
	################################################################################################################
	function getfield_Name($table)
	{
		global $db;
		$sql= "SHOW COLUMNS FROM ".$table;
 		$db->query($sql);
		return ($db->fetch_array());
	}
	
	################################################################################################################
	# Function: getEngine_Type()
	# Purpose: It gets given Engine
	# Return: It returns array of Engine Name details
	# Parameters: 
	################################################################################################################
	function getEngine_Type()
	{
		global $db;
		$sql= "SHOW TABLE  STATUS";
 
 		$db->query($sql);
		
		if($db->next_record())
		return $db->f('Engine');
	}
	
	
	################################################################################################################
	# Function: generateFieldSpec($post)
	# Purpose: It updates message description in to the table
	# Return: It returns void
	# Parameters: 
	# 1. $post => Form Post data
	################################################################################################################
	function generateFieldSpec($name, $type, $length, $attribute,$collation, $null, $default, $default_current_timestamp, $extra,$comment='', &$field_primary, $index, $default_orig = false)
    {
		$query = backquote($name) . ' ' . $type;
        if ($length != '' && !preg_match('@^(DATE|DATETIME|TIME|TINYBLOB|TINYTEXT|BLOB|TEXT|MEDIUMBLOB|MEDIUMTEXT|LONGBLOB|LONGTEXT)$@i', $type)) 
		{
            $query .= '(' . $length . ')';
        }

        if ($attribute != '') 
		{
            $query .= ' ' . $attribute;
        }

        if (MYSQL_INT_VERSION >= 40100 && !empty($collation)&& $collation != 'NULL' && preg_match('@^(TINYTEXT|TEXT|MEDIUMTEXT|LONGTEXT|VARCHAR|CHAR|ENUM|SET)$@i', $type)) 
		{
            $query .= generateCharsetQueryPart($collation);
        }

        if (!($null === false)) 
		{
            if (!empty($null)) 
			{
                $query .= ' NOT NULL';
            } 
			else 
			{
                $query .= ' NULL';
            }
        }

        if ($default_current_timestamp && strpos(' ' . strtoupper($type), 'TIMESTAMP') == 1) 
		{
            $query .= ' DEFAULT CURRENT_TIMESTAMP';
        } 
		elseif ($extra !== 'AUTO_INCREMENT' && (!empty($default) || $default == '0' || $default != $default_orig)) 
		{
            if (strtoupper($default) == 'NULL') 
			{
                $query .= ' DEFAULT NULL';
            } 
			else 
			{
                if (!empty($default) || $default == '0') 
				{
                    $query .= ' DEFAULT \'' ;
                }
            }
        }

        if (!empty($extra)) 
		{
            $query .= ' ' . $extra;
            if ($extra == 'AUTO_INCREMENT' && isset($field_primary)) 
			{
                $primary_cnt = count($field_primary);
                for ($j = 0; $j < $primary_cnt && $field_primary[$j] != $index; $j++) 
				{
                    // void
                } // end for
                if (isset($field_primary[$j]) && $field_primary[$j] == $index) 
				{
                    $query .= ' PRIMARY KEY';
                    unset($field_primary[$j]);
                }
            } 
        }
        if (MYSQL_INT_VERSION >= 40100 && !empty($comment)) 
		{
            $query .= " COMMENT '";
        }
        return $query;
    }
	################################################################################################################
	# Function: Update_Clb_Description($post)
	# Purpose: It updates message description in to the table
	# Return: It returns void
	# Parameters: 
	# 1. $post => Form Post data
	################################################################################################################
	

	function get_directory($dir_path)
	{
		while (false !== ($entry = $dir_path->read())) 
		{ 
			if ( $filename !== '.' && $filename !== '..' && is_dir($entry) && $filename !== '')
			{
			}
			else
			$list[] = $entry;#return $list;
		}
		return $list;
	}
	
}
	
	
	################################################################################################################
	# Function: Delete_Pmb($msg_id)
	# Purpose: It deletes message
	# Return: It returns void
	# Parameters: 
	# 1. $msg_id => Message Id
	################################################################################################################
	function checkParameters($params, $die = true, $request = true)
    {
        global $PHP_SELF, $checked_special;

        if (!isset($checked_special)) 
		{
            $checked_special = false;
        }

        $reported_script_name = basename($PHP_SELF);
        $found_error = false;
        $error_message = '';

        foreach ($params AS $param) 
		{
            if ($request && $param != 'db' && $param != 'table') 
			{
                $checked_special = true;
            }

            if (!isset($GLOBALS[$param])) 
			{
                $error_message .= $reported_script_name . ': Missing parameter: ' . $param . ' <a href="./Documentation.html#faqmissingparameters" target="documentation"> (FAQ 2.8)</a><br />';
                $found_error = true;
            }
        }
        if ($found_error) 
		{
            require_once './libraries/header_meta_style.inc.php';
            echo '</head><body><p>' . $error_message . '</p></body></html>';
            if ($die) 
			{
                exit();
            }
        }
    }
	
	################################################################################################################
	# Function: Delete_Selected_Pmb($msg_id)
	# Purpose: It deletes selected messages
	# Return: It returns void
	# Parameters: 
	# 1. $msg_id => Message Id
	################################################################################################################
	function DBI_fetch_value($result, $row_number = 0, $field = 0, $link = null, $options = 0) 
	{
		$value = false;
	
		if (is_string($result)) 
		{
			$result = DBI_try_query($result, $link, $options | DBI_QUERY_STORE);
		}
	
		if (DBI_num_rows($result) < ($row_number + 1)) 
		{
			return $value;
		}
	
		if (is_int($field)) {
			$fetch_function = 'DBI_fetch_row';
		} 
		else 
		{
			$fetch_function = 'DBI_fetch_assoc';
		}
	
		for ($i = 0; $i <= $row_number; $i++) 
		{
			$row = $fetch_function($result);
		}
 	   	DBI_free_result($result);
    	if (isset($row[$field])) 
		{
        	$value = $row[$field];
    	}
    	unset($row);

    	return $value;
	}

	
	
	################################################################################################################
	# Function: Get_All_Clbs($orderby="Time",$order="DESC")
	# Purpose: It gets all public messages for all jobs
	# Return: It returns array of message details
	# Parameters: 
	# 1. $orderby = Order By field
	# 2. $order = Order
	################################################################################################################
	function backquote($a_name, $do_it = true)
	{
		if (! $do_it) 
		{
        	return $a_name;
    	}

    	if (is_array($a_name)) 
		{
        	$result = array();
         	foreach ($a_name as $key => $val) 
			{
             	$result[$key] =backquote($val);
         	}
         	return $result;
    	}
		if (strlen($a_name) && $a_name !== '*') 
		{
        	return '`' . str_replace('`', '``', $a_name) . '`';
    	} 
		else 
		{
        	return $a_name;
    	}
	}
	
	
	################################################################################################################
	# Function: Update_Clb_Description($post)
	# Purpose: It updates message description in to the table
	# Return: It returns void
	# Parameters: 
	# 1. $post => Form Post data
	################################################################################################################
	

	function DBI_get_tables_full($database, $table = false,$tbl_is_group = false, $link = null, $limit_offset = 0, $limit_count = false)
	{
		if (true === $limit_count) 
		{
			$limit_count = $GLOBALS['cfg']['MaxTableList'];
		}
		
		if (! is_array($database)) 
		{
			$databases = array($database);
		}
		else 
		{
			$databases = $database;
		}
	
		$tables = array();
		
			// get table information from information_schema
			if ($table) 
			{
				if (true === $tbl_is_group) 
				{
					$sql_where_table = 'AND `TABLE_NAME` LIKE \''
						. escape_mysql_wildcards(addslashes($table)) . '%\'';
				} elseif ('comment' === $tbl_is_group) 
				{
					$sql_where_table = 'AND `TABLE_COMMENT` LIKE \''
						. escape_mysql_wildcards(addslashes($table)) . '%\'';
				} else 
				{
					$sql_where_table = 'AND `TABLE_NAME` = \'' . addslashes($table) . '\'';
				}
			} 
			else 
			{
				$sql_where_table = '';
				$this_databases = array_map('', $databases);
	
				$sql = '
				 	SELECT *,
						`TABLE_SCHEMA`       AS `Db`,
						`TABLE_NAME`         AS `Name`,
						`ENGINE`             AS `Engine`,
						`ENGINE`             AS `Type`,
						`VERSION`            AS `Version`,
						`ROW_FORMAT`         AS `Row_format`,
						`TABLE_ROWS`         AS `Rows`,
						`AVG_ROW_LENGTH`     AS `Avg_row_length`,
						`DATA_LENGTH`        AS `Data_length`,
						`MAX_DATA_LENGTH`    AS `Max_data_length`,
						`INDEX_LENGTH`       AS `Index_length`,
						`DATA_FREE`          AS `Data_free`,
						`AUTO_INCREMENT`     AS `Auto_increment`,
						`CREATE_TIME`        AS `Create_time`,
						`UPDATE_TIME`        AS `Update_time`,
						`CHECK_TIME`         AS `Check_time`,
						`TABLE_COLLATION`    AS `Collation`,
						`CHECKSUM`           AS `Checksum`,
						`CREATE_OPTIONS`     AS `Create_options`,
						`TABLE_COMMENT`      AS `Comment`
				   FROM `information_schema`.`TABLES`
				  WHERE ' . (IS_WINDOWS ? '' : 'BINARY') . ' `TABLE_SCHEMA` IN (\'' . implode("', '", $this_databases) . '\')
					' . $sql_where_table;
	
			if ($limit_count) 
			{
				$sql .= ' LIMIT ' . $limit_count . ' OFFSET ' . $limit_offset;
			}
			$tables = DBI_fetch_result($sql, array('TABLE_SCHEMA', 'TABLE_NAME'),null, $link);
			unset($sql_where_table, $sql);
		}
		if (! is_array($database)) 
		{
			if (isset($tables[$database])) 
			{
				return $tables[$database];
			} 
			elseif (isset($tables[strtolower($database)])) 
			{
			   return $tables[strtolower($database)];
			} 
			else
			{
				return $tables;
			}
		} 
		else 
		{
			return $tables;
		}
	}
	
?>