import $ from 'jquery';

class Like {
  constructor() {
    this.events();

  }

  events() {
    $(".like-box").on("click", this.ourClickDispatcher.bind(this));
  }

  // methods
  ourClickDispatcher(e) {
     var currentLikeBox = $(e.target).closest(".like-box");

    //  alert(currentLikeBox.attr('data-exists'));

    if (currentLikeBox.attr('data-exists') == 'yes') {
      this.deleteLike(currentLikeBox);
    } else {
      this.createLike(currentLikeBox);
    }
  }


  // createLike(currentLikeBox){
  //   // alert('create test message');
  //   alert("create test message");
   
  //   currentLikeBox.attr("data-exists", 'yes');
  //   const $shoeId = currentLikeBox.data('shoe');   
  //   console.log('i am in');
  // }

  // deleteLike(currentLikeBox){
  //   alert('delete test message');
  //   currentLikeBox.attr("data-exists", 'no');
  // }

  createLike(currentLikeBox) {


    //  const $shoeId = currentLikeBox.data('shoe');   

    var $shoeId = {
      'shoeId': currentLikeBox.data('shoe'),
      'userId': currentLikeBox.data('user'),
      'dateId': currentLikeBox.data('date'),
      'weekId': currentLikeBox.data('week'),
      'yearId': currentLikeBox.data('year'),
      'status': 'publish'
    }



      $.ajax({
        beforeSend: (xhr) => {
          xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
        },
        url: shoeData.root_url + '/wp-json/shoes/v1/manageLike',

        type: 'POST',
        data: $shoeId,
        // extra Info

        // cache: false,
        // processData: false,
        // contentType: false,


        success: (response) => {
          currentLikeBox.attr('data-exists', 'yes');
          var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10);
          likeCount++;
          currentLikeBox.find(".like-count").html(likeCount);
          currentLikeBox.attr("data-like", response);
          console.log(response);
        },
        error: (response) => {
          if(response.responseText == "You have reached your note limit.") {
            $(".note-limit-message").addClass("active");
          }
          console.log(response);
        }
      });
      location.reload();
  }


  deleteLike(currentLikeBox) {

    var $like = {
      'like': currentLikeBox.attr('data-like')
    }

    console.log($like);

    $.ajax({
      beforeSend: (xhr) => {
        xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
      },
      url: shoeData.root_url + '/wp-json/shoes/v1/manageLike',
      data: $like,
      type: 'DELETE',
      success: (response) => {
        currentLikeBox.attr('data-exists', 'no');
        var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10);
        likeCount--;
        currentLikeBox.find(".like-count").html(likeCount);
        currentLikeBox.attr("data-like", '');
        console.log(response);
        console.log("mario");
        console.log($like);
      },
      error: (response) => {
        console.log(response);
      }
    });

    location.reload();
  }
}

export default Like;
