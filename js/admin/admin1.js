const fetchIt = document.querySelector('.fetch');
const draftIt = document.querySelector('.draftFetch');

fetchIt.addEventListener('click', function(e){

   const picture_id = e.target.getAttribute('data-value');
    var ajaxscript = {ajax_url: shoeData1.root_url +'/wp-admin/admin-ajax.php'};
    // var ajaxscript = {ajax_url: 'http://localhost:3000/wp-admin/admin-ajax.php'};
    $.ajax({
        url: ajaxscript.ajax_url,
        type: 'POST',
        data: {
            action: 'my_action',
            step: 'publish',
            id: picture_id
        },
        success:(response) => {
            $('#datafetch').append(
                window.location.reload()
            );
        }
    });
});

draftIt.addEventListener('click', function(e){

    console.log('this is working');
    const picture_id = e.target.getAttribute('data-source');
     var ajaxscript = {ajax_url: shoeData1.root_url +'/wp-admin/admin-ajax.php'};
     $.ajax({
         url: ajaxscript.ajax_url,
         type: 'POST',
         data: {
             action: 'my_action',
             step: 'draft',
             id: picture_id
         },
         success:(response) => {
             $('#datafetch').append(
                 window.location.reload()
             );
         }
     });
 });
