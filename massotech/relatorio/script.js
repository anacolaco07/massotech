$(function() {
    $('#chkveg').multiselect({ includeSelectAllOption: true });

    $('#btnget').click(function() {
        const selectedValues = $('#chkveg').val() || [];
        const selectedValuesText = selectedValues.join(', ');
        $('#selected-values').text('Valores Selecionados: ' + selectedValuesText);
    });
});
