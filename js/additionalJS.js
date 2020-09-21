const loginBtn = document.querySelector('#wp-submit');

loginBtn.addEventListener('click', () =>{


 
 setTimeout(function(){ 
    // window.history.go(-1);
    window.location=document.referrer;
    console.log('reload worked again');
    
   
    ; }, 500);

    
    window.location.reload();

    // setTimeout(function(){ 
    //     window.location.reload();
    //     console.log('reload worked again');
    //     ; }, 2000);
 
   
})


  