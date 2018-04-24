//TODO: переименовать файл в form.js, переименовать глоб. пер. в form
var Form = {
    addMaterialFieldset: function(obj) {
        alert("Element added");
    },
    addDetailFieldset: function(formName) {
        var lastElemClassName = $(formName + " fieldset.material .form-group.row");
        lastElemClassName = lastElemClassName.last().prop('class');
        //var lastElemClassName = $(fieldSelector).last().prop('class');
        console.log(lastElemClassName);
        var elemClassName = $("fieldset.material .form-group.row.detail-wrapper:last-child").last();
        var container = $(formName + ' fieldset.material');

        $(elemClassName)
            .clone()
            .addClass(lastElemClassName)
            .appendTo(container);
        $('.'+lastElemClassName)
            .find('select')
            .find('input');
        lastElemClassName = null;
    },
    remoteMaterial: function(obj) {
        $(obj).parents().eq(1).remove();
    },
    addProductFieldset: function(obj) {
        $(obj).parent('.btn-combined-group').parent('.form-group').remove();
    },
    changeWeight: function() {
        alert("Product added");
    },
    toltipInit: function() {
        $('[data-toggle]').tooltip();
    }
};