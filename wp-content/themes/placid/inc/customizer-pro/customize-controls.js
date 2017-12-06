( function( api ) {

	// Extends our custom "placid" section.
	api.sectionConstructor['placid'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
