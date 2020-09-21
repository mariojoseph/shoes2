const loginBtn = document.querySelector('#wp-submit');

loginBtn.addEventListener('click', () =>{


 console.log('should be working');
 
 setTimeout(function(){ 
    window.history.go(-1);
    ; }, 500);

})
  