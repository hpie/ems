<?php if ( !empty($crud_note) ) echo "<p>$crud_note</p>"; ?>

<?php if ( !empty($crud_output) ) echo $crud_output; ?>

<script>
$(document).ready(function() 
		{
			var sel_state = $('select[name="requesting_entity_type"]');
			//var sel_city = $('select[name="requested_entity_type"]');
			
			//sel_city.children().remove().end();

			//alert(sel_state);
			
			
		});
</script>
