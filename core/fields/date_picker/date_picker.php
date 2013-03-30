<?php

class acf_date_picker extends acf_field
{
	
	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function __construct()
	{
		// vars
		$this->name = 'date_picker';
		$this->label = __("Date Picker",'acf');
		$this->category = __("jQuery",'acf');
		
		
		// do not delete!
    	parent::__construct();
	}
	
	
	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function create_field( $field )
	{
		// defaults
		$defaults = array(
			'date_format' 		=>	'yymmdd',
			'display_format'	=>	'dd/mm/yy',
		);
		
		$field = array_merge($defaults, $field);
		
		
		// make sure it's not blank
		if( !$field['date_format'] )
		{
			$field['date_format'] = 'yymmdd';
		}
		if( !$field['display_format'] )
		{
			$field['display_format'] = 'dd/mm/yy';
		}
		

		// html
		echo '<input type="hidden" value="' . $field['value'] . '" name="' . $field['name'] . '" class="acf-hidden-datepicker" />';
		echo '<input type="text" value="" class="acf_datepicker" data-save_format="' . $field['date_format'] . '" data-display_format="' . $field['display_format'] . '" />';

	}
	
	
	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/
	
	function create_options( $field )
	{
		// vars
		$defaults = array(
			'date_format' 		=>	'yymmdd',
			'display_format'	=>	'dd/mm/yy',
		);
		
		$field = array_merge($defaults, $field);
		$key = $field['name'];
		
?>
<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Save format",'acf'); ?></label>
		<p class="description"><?php _e("This format will determin the value saved to the database and returned via the API",'acf'); ?></p>
		<p><?php _e("\"yymmdd\" is the most versatile save format. Read more about",'acf'); ?> <a href="http://docs.jquery.com/UI/Datepicker/formatDate"><?php _e("jQuery date formats",'acf'); ?></a></p>
	</td>
	<td>
		<?php 
		do_action('acf/create_field', array(
			'type'	=>	'text',
			'name'	=>	'fields[' .$key.'][date_format]',
			'value'	=>	$field['date_format'],
		));
		?>
	</td>
</tr>
<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Display format",'acf'); ?></label>
		<p class="description"><?php _e("This format will be seen by the user when entering a value",'acf'); ?></p>
		<p><?php _e("\"dd/mm/yy\" or \"mm/dd/yy\" are the most used display formats. Read more about",'acf'); ?> <a href="http://docs.jquery.com/UI/Datepicker/formatDate" target="_blank"><?php _e("jQuery date formats",'acf'); ?></a></p>
	</td>
	<td>
		<?php 
		do_action('acf/create_field', array(
			'type'	=>	'text',
			'name'	=>	'fields[' .$key.'][display_format]',
			'value'	=>	$field['display_format'],
		));
		?>
	</td>
</tr>
<?php
		
	}
	
}

new acf_date_picker();

?>