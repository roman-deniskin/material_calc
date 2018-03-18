//TODO: переименовать файл в form.js, переименовать глоб. пер. в form
var Form = {
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
        $(obj).parents().eq(1).remove();
        $('fieldset.material').children.each(function(index, element){
            $(element).removeClassWild("elem*").addClass('elem' + (index+1));
        });
        $('fieldset.material').removeClassWild = function(mask) {
            return this.removeClass(function(index, cls) {
                var re = mask.replace(/\*/g, '\\S+');
                return (cls.match(new RegExp('\\b' + re + '', 'g')) || []).join(' ');
            });
        };
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