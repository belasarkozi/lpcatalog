import './styles/app.css';

import './bootstrap';

$(function() {
    $('#szerzo_hozzaadasa').on("click", function(e){
        e.preventDefault();
        let $clone = $('#cloneable').clone().removeAttr('id').removeClass('col-sm-9').addClass('col-sm-12').addClass('mb-3');
        $('button', $clone).remove();
        $clone.insertBefore($(this));
    });
});