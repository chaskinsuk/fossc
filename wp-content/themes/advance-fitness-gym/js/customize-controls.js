( function( api ) {

	// Extends our custom "advance-fitness-gym" section.
	api.sectionConstructor['advance-fitness-gym'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );