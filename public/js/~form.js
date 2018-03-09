var form = {
    addMaterialFieldset: function(obj) {
        alert("Element added");
    },
    addDetailFieldset: function(obj) {
        var lastElemClassName = $("fieldset.material .form-group.row.detail-wrapper:last-child").last().prop('class');
        var elemClassName = $("fieldset.material .form-group.row.detail-wrapper:last-child");
        var elemAmount = $("fieldset.material .form-group.row.detail-wrapper").length;
        lastElemClassName = lastElemClassName.split(' ').pop().replace(/[^A-Za-z]/g,'');
        var container = $('fieldset.material');
        console.log(lastElemClassName);
        $(elemClassName)
            .clone()
            .removeClass(lastElemClassName + elemAmount)
            .addClass(lastElemClassName + (elemAmount+1))
            .appendTo(container);
        $('.'+lastElemClassName + (elemAmount+1))
            .find('select')
            .attr('name', 'material[' + (elemAmount+1) + ']');
        console.log('.'+lastElemClassName + (elemAmount+1));
        $('.'+lastElemClassName + (elemAmount+1))
            .find('input')
            .attr('name', 'unitAmount[' + (elemAmount+1) + ']');
        lastElemClassName = null;
    },
    remoteMaterial: function(obj) {
        (function($) {
            $.fn.removeClassWild = function(mask) {
                return this.removeClass(function(index, cls) {
                    var re = mask.replace(/\*/g, '\\S+');
                    return (cls.match(new RegExp('\\b' + re + '', 'g')) || []).join(' ');
                });
            };
        })(jQuery);
        $(obj).parents().eq(1).remove();
        $('fieldset.material').children().each(function(index, element){
            $(element).removeClassWild("elem*").addClass('elem' + (index+1));
        });
    },
    addProductFieldset: function(obj) {
        alert("Product added");
    }
};
