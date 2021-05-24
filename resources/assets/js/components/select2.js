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
        })

        $('.select2-tag').select2({
            theme: 'bootstrap4',
            tags: true,
            width: '100%',
        })
    })
    $(document).on('select2:open', '.select2', function (e) {
        document.querySelector('.select2-search__field').focus();

    });
})

$(document).on('select2:open', (e) => {
    const selectId = e.target.id

    $(".select2-search__field[aria-controls='select2-" + selectId + "-results']").each(function (
        key,
        value,
    ) {
        value.focus()
    })
})
