jQuery(document).ready(function() {
  // Change status in quick edit
  jQuery('select[name="_status"]')
  .find('option')
  .remove()
  .end()
  .append('<option value="draft">Waiting Confirmation</option>')
  .append('<option value="confirmed">Confirmed</option>');

  // Change draft label
  var draftLabel = "Waiting Confirmation";
  var selector = '#wpbody-content ul.subsubsub li.draft a';
  var draftCount = jQuery(selector).text().split(' ')[1];
  jQuery(selector).text(draftLabel + ' ' +draftCount);

  // Change draft post-state
  jQuery('#the-list span.post-state:contains("Draft")').text('Waiting Confirmation');
});