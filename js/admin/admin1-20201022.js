const fetchIt = document.querySelector('.fetch');


fetchIt.addEventListener('click', function(e){

   const picture_id = e.target.getAttribute('data-value');
    var ajaxscript = {ajax_url: shoeData1.root_url +'/wp-admin/admin-ajax.php'};
    // var ajaxscript = {ajax_url: 'http://localhost:3000/wp-admin/admin-ajax.php'};
    $.ajax({
        url: ajaxscript.ajax_url,
        type: 'POST',
        data: {
            action: 'my_action',
            id: picture_id
        },
        success:(response) => {
            $('#datafetch').append(
                window.location.reload()
            );
        }
    });
});
