require('./bootstrap');

require('./apps/search.js')
require('./apps/addresses.js')
require('./apps/contacts.js')
require('./apps/personal-info.js')
require('./apps/contact-outside-workflow.js')
require('./apps/progresses.js')
require('./apps/edit.js')

$(document).ready(function() {
    $('.select2').select2({
        theme: "bootstrap",
        tags: false,
        width: "100%",
    });
});
