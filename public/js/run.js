var html = {
    addMaterialFieldset: function(obj) {
        alert("Element added");
    },
    addDetailFieldset: function(obj) {
        var detailHtml = '.' + $(obj).parents('form').attr('class') + ' .elem1';
        detailHtml = $(detailHtml);
        $('.elem1')
            .clone()
            .removeClass("elem1")
            .addClass("elem2")
            .insertAfter( detailHtml );
        detailHtml = null;
    },
    addProductFieldset: function(obj) {
        alert("Product added");
    }
};
