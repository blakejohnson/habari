<div<?php echo isset( $class ) ? " class=\"$class\"" : ''; ?><?php echo isset( $id ) ? " id=\"$id\"" : ''; ?>>
	<input<?php if ( isset( $control_title ) ) { ?> title="<?php echo $control_title; ?>"<?php } else { echo ( isset( $title ) ? " title=\"$title\"" : '' ); } if ( isset( $tabindex ) ) { ?> tabindex="<?php echo $tabindex; ?>"<?php } if ( isset( $size ) ) { ?> size="<?php echo $size; ?>"<?php } ?> type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo htmlspecialchars( $value ); ?>">
	<label<?php if ( isset( $label_title ) ) { ?> title="<?php echo $label_title; ?>"<?php } else { echo ( isset( $title ) ? " title=\"$title\"" : '' ); } ?> for="<?php echo $field; ?>"><?php echo $this->caption; ?></label>
	<?php $control->errors_out( '<li>%s</li>', '<ul class="error">%s</ul>' ); ?>
</div>
