

// if(windows.url == ){


if(window.location.href ==  'https://www.haveyouseenmyshoes.com/wp-login.php?checkemail=registered'){
// if(window.location.href ==  'http://localhost:3000/wp-login.php?checkemail=registered'){
    console.log('caught you');
    const blogContainer = document.getElementById('backtoblog');
    const nextTo = document.querySelector('#backtoblog a')
    
    const messageContent = document.createElement('p');
      messageContent.textContent = "Thanks for registering. Check your email to set your password & login";
      messageContent.style.color = 'white';
      messageContent.style.backgroundColor = 'green';
      messageContent.style.width = "80%";
      messageContent.style.margin = "auto";
      messageContent.style.marginTop = "1rem";
      messageContent.style.marginBottom = "4rem";
      messageContent.style.padding = "4px 3px";
      messageContent.style.borderRadius = "5px";
      messageContent.style.fontSize = "1rem";

    blogContainer.insertBefore(messageContent, nextTo);



} else{
    console.log('not there yet');
    console.log(window.location.href);
}

 
