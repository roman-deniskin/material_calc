//TODO: переименовать файл в form.js, переименовать глоб. пер. в form
(function($) {
    $.fn.removeClassWild = function(mask) {
        return this.removeClass(function(index, cls) {
            var re = mask.replace(/\*/g, '\\S+');
            return (cls.match(new RegExp('\\b' + re + '', 'g')) || []).join(' ');
        });
    };
    //TODO: Убрать синглтон в remoteMaterial (в глобальном пространстве он не нужен и не является отдельной функцией)
})(jQuery);
var html = {
    addMaterialFieldset: function(obj) {
        alert("Element added");
    },
    addDetailFieldset: function(obj) {
        var lastElemClassName = $("fieldset.material .form-group.row.detail-wrapper").last().prop('class');
        var elemClassName = $("fieldset.material .form-group.row.detail-wrapper:last-child");
        //var elemAmount = $("fieldset.material .form-group.row.detail-wrapper").length;
        var elemAmount = Number(lastElemClassName.split(' ').pop().replace(/\D+/g,""))
        lastElemClassName = lastElemClassName.split(' ').pop().replace(/[^A-Za-z]/g,'');
        var container = $('fieldset.material');

        $(elemClassName)
            .clone()
            .removeClass(lastElemClassName + elemAmount)
            .addClass(lastElemClassName + (elemAmount+1))
            .appendTo(container);
        $('.'+lastElemClassName + (elemAmount+1))
            .find('select')
            .attr('name', 'material[' + (elemAmount+1) + ']');
        $('.'+lastElemClassName + (elemAmount+1))
            .find('input')
            .attr('name', 'unitAmount[' + (elemAmount+1) + ']');
        lastElemClassName = null;
    },
    remoteMaterial: function(obj) {
        //$(obj).parents().eq(1).remove();
        $(obj).parent('.btn-combined-group').parent('.form-group').remove();
        $('fieldset.material').children().each(function(index, element){
            $(element).removeClassWild("elem*").addClass('elem' + (index+1));
        });
    },
    addProductFieldset: function(obj) {
        alert("Product added");
    }
};
