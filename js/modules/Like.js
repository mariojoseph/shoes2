import $ from 'jquery';

class Like {
  constructor() {
    this.likeResponse = $(".like-response"); 
    this.events();
  }

  events() {
    $(".like-boxM-inner").one("click", this.ourClickDispatcher.bind(this));
  }

  // methods
  ourClickDispatcher(e) {

    var currentLikeBox = $(e.target).closest(".like-boxM");
    var heart = $(e.target);

    if (currentLikeBox.attr('data-logged') == 'no') {

      const message = "You need to Log In / Sign In to Vote";
      const messageColor = "orange";
      this.messageResponse(message, messageColor);

      setTimeout(function(){ 
        // window.location.href = "http://localhost:3000/wp-login.php";
        window.location.href = "https://www.haveyouseenmyshoes.com/wp-login.php";
        ; }, 100);


      return null;
    } else {

      if (currentLikeBox.attr('data-exists') == 'yes') {
     
        const message = "You have deleted your vote. You can now vote again";
        const messageColor = "green";
        this.messageResponse(message, messageColor);

        this.deleteLike(currentLikeBox);

        // setTimeout(function(){ 
        //   location.reload();
        //   ; }, 10);

  
      } else {


          const message = "Thank You for Voting";
          const messageColor = "green";
          this.messageResponse(message, messageColor);

          this.createLike(currentLikeBox);
  
          // setTimeout(function(){ 
          //   location.reload();
          //   ; }, 10);


      }

    }


  }


  createLike(currentLikeBox) {


    var $shoeId = {
      'shoeId': currentLikeBox.data('shoe'),
      'userId': currentLikeBox.data('user'),
      'dateId': currentLikeBox.data('date'),
      'weekId': currentLikeBox.data('week'),
      'yearId': currentLikeBox.data('year'),
      'status': 'publish'
    }
    console.log("checking");
    console.log($shoeId);

      $.ajax({
        beforeSend: (xhr) => {
          xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
        },
        url: shoeData.root_url + '/wp-json/shoes/v1/manageLike',

        type: 'POST',
        dataType: 'text',
        data: $shoeId,

        success: (response) => {

            // location.reload();
            setTimeout(function(){ 
            location.reload();
            ; }, 100);
          // console.log(response);
        },
        error: (response) => {
          if(response.responseText == "You have reached your note limit.") {
            $(".note-limit-message").addClass("active");
          }
          // console.log(response);
        }
      });
   
  }


  deleteLike(currentLikeBox) {

    var $like = {
      'like': currentLikeBox.attr('data-like'),
      'shoeId': currentLikeBox.data('shoe'),
      'status': 'publish'
    }


    $.ajax({
      beforeSend: (xhr) => {
        xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
      },
      url: shoeData.root_url + '/wp-json/shoes/v1/manageLike',
      data: $like,
      dataType: 'text',
      type: 'DELETE',
      success: (response) => {

        // location.reload();
        setTimeout(function(){ 
          location.reload();
          ; }, 100);
        console.log(response);
      },
      error: (response) => {
        console.log(response);
      }
    });
  
  }

  messageResponse(message, messageColor){
   
    this.likeResponse.html(message);
    this.likeResponse.css('color', 'yellow');
    this.likeResponse.css('background-color', messageColor);
    this.likeResponse.css('width', '80%');
    this.likeResponse.css('margin', 'auto');
    this.likeResponse.css('margin-top', '1rem');
    this.likeResponse.css('margin-bottom', '4rem');
    this.likeResponse.css('padding', '4px 3px');
    this.likeResponse.css('border-radius', '5px');
  }

}

export default Like;
