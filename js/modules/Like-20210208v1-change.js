import $ from 'jquery';

class Like {
  constructor() {
    this.likeResponse = $(".like-response"); 
    this.events();
  }

  events() {
    $(".like-box-inner-side").on("click", this.ourClickDispatcher.bind(this));
  }

  // methods
  ourClickDispatcher(e) {
    var currentLikeBox = $(e.target).closest(".like-box");
    var heart = $(e.target);

    var shoeNumber = currentLikeBox.attr('data-shoePost1');
    
    // For localhost
    // var shoeNumberStr = shoeNumber.substring(16);

    // For Server
    var shoeNumberStr = shoeNumber.substring(34);


    if (currentLikeBox.attr('data-logged') == 'no') {

      const message = "You need to Log In / Sign In to Vote";
      const messageColor = "orange";
      this.messageResponse(message, messageColor);

      setTimeout(function(){ 
        
        // For localhost
        // window.location.href = "http://localhost:3000/wp-login.php?redirect_to="+shoeNumberStr;
        
        // For Server
        window.location.href = "https://www.haveyouseenmyshoes.com/wp-login.php?redirect_to="+shoeNumberStr;
        ; }, 2000);


  
        
    } else {

      if (currentLikeBox.attr('data-exists') == 'yes') {
     
        console.log('hallo yes, it exists');
        // const message = "You have deleted your vote. You can now vote again";
        // const messageColor = "green";
        // this.messageResponse(message, messageColor);

        // heart.removeClass('fa-heart');
        // heart.addClass('fa-heart-o');
        // heart.css('visibility', 'visible');
        // heart.css('opacity', 1 );
        this.deleteLike(currentLikeBox);
        
        // setTimeout(function(){ 
        //   location.reload();
        //   ; }, 1);

          
  
      } else if (currentLikeBox.attr('data-exists') == 'no'){

        console.log('no it doesnt');
          // const message = "Thank You for Voting";
          // const messageColor = "green";
          // this.messageResponse(message, messageColor);

          // heart.removeClass('fa-heart-o');
          // heart.addClass('fa-heart');
          // heart.css('visibility', 'visible');
          // heart.css('opacity', 1 );
          this.createLike(currentLikeBox);
          
          // setTimeout(function(){ 
          //   location.reload();
          //   ; }, 1);
           

      } else{
        return null;
      }

    }

    e.preventDefault();
  }


  createLike(currentLikeBox) {

    console.log('we are in create like')
    //  const $professorId = currentLikeBox.data('professor');   

    // var $shoeId = {
    //   'shoeId': currentLikeBox.data('shoe'),
    //   'userId': currentLikeBox.data('user'),
    //   'dateId': currentLikeBox.data('date'),
    //   'weekId': currentLikeBox.data('week'),
    //   'yearId': currentLikeBox.data('year'),
    //   'status': 'publish'
    // }
    // console.log("checking");
    // console.log($shoeId);
    //  alert(currentLikeBox.data('professor'));

      $.ajax({
        beforeSend: (xhr) => {
          xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
        },
        url: shoeData.root_url + '/wp-json/shoes/v1/manageLike',

        type: 'POST',
        dataType: 'text',
        
        // data: $shoeId,
        // extra Info

        cache: false,
        // processData: false,
        // contentType: false,

        // extra Info End
        success: (response) => {
          console.log("we created a heart");
          // currentLikeBox.attr('data-exists', 'yes');
          // var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10);
          // likeCount++;
          // currentLikeBox.find(".like-count").html(likeCount);
          // currentLikeBox.attr("data-like", response);
          // alert("stevie pass");
          console.log(response);
        },
        error: (response) => {
          // if(response.responseText == "You have reached your note limit.") {
          //   $(".note-limit-message").addClass("active");
          // }
          // console.log(response);
          console.log('seems strange');
        }
      });
      // location.reload();
  }


  deleteLike(currentLikeBox) {

    // var $like = {
    //   'like': currentLikeBox.attr('data-like'),
    //   'shoeId': currentLikeBox.data('shoe'),
    //   'status': 'publish'
    // }


    $.ajax({
      // beforeSend: (xhr) => {
      //   xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
      // },
      url: shoeData.root_url + '/wp-json/shoes/v1/manageLike',
      data: $like,
      type: 'DELETE',
      success: (response) => {
        console.log("we deleted a heart");
        // currentLikeBox.attr('data-exists', 'no');
        // var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10);
        // likeCount--;
        // currentLikeBox.find(".like-count").html(likeCount);
        // currentLikeBox.attr("data-like", '');
        // console.log(response);
      },
      error: (response) => {
        console.log(response);
      }
    });
    // location.reload();
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
