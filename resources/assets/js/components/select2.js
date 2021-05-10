// noinspection BadExpressionStatementJS JSLint
/**
 * Select2
 */
require('select2/dist/js/select2.min.js')
$(() => {
    // jshint ignore:line
    $(document).ready(function () {
        $('.select2').select2({
            theme: 'bootstrap4',
            tags: false,
            width: '100%',
            //minimumResultsForSearch: Infinity,
        })

        $('.select2-tag').select2({
            theme: 'bootstrap4',
            tags: true,
            width: '100%',
        })
    })
})
