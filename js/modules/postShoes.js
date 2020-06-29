import $ from 'jquery';

class PostShoes {
  constructor() {

    if(window.location.href.indexOf('/post-your-shoes') > -1){
      
    // Variable for Images
        this.uploadDialog;
    var _PREVIEW_URL =0

    // Call to start events function
    this.events();
    // alert("is anybody out there cara");
    }
  }

  events() {

    // IMAGE CONTROL EVENTS
    // 	IMAGE CONTROL EVENTS - Show Select File dialog
		    document.querySelector("#upload-dialog").addEventListener('click', this.uploadDialog);
    //   IMAGE CONTROL EVENTS - Selected File has changed
        document.querySelector("#fileInput").addEventListener('change', this.fileChange);
    //   IMAGE CONTROL EVENTS - Reset file input
        document.querySelector("#cancel-image").addEventListener('click', this.resetFile);

  // SHOE EVENTS
    // $(".delete-note").on("click", this.deleteNote.bind(this));
    // $(".edit-note").on("click", this.editNote.bind(this));
    // $(".update-note").on("click", this.updateNote.bind(this));
    $(".ShoesSubmit-note").on("click", this.createNote.bind(this));


  }

  // methods
  // deleteNote(e) {
  //   var thisNote = $(e.target).parents("li");
  //           console.log(thisNote);
  //   $.ajax({
  //     beforeSend: (xhr) => {
  //       xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
  //     },
  //     url: shoeData.root_url + '/wp-json/shoes/v1/manageShoe' + thisNote.data('id'),
  //     type: 'DELETE',
  //     success: (response) => {
  //       thisNote.slideUp();
  //       console.log("congrats");
  //       console.log(response);
  //     },
  //     error: (response) => {
  //       console.log("Sorry");
  //       console.log(response);
  //     }
  //   });
  // }

  // editNote(e) {
  //   var thisNote = $(e.target).parents("li");
  //   if (thisNote.data("state") == "editable") {
  //     this.makeNoteReadOnly(thisNote);
  //   } else {
  //     this.makeNoteEditable(thisNote);
  //   }
  // }

  // makeNoteEditable(thisNote) {
  //   thisNote.find(".edit-note").html('<i class="fa fa-times" aria-hidden="true"></i> Cancel');
  //   thisNote.find(".note-title-field, .note-body-field").removeAttr("readonly").addClass("note-active-field");
  //   thisNote.find(".update-note").addClass("update-note--visible");
  //   thisNote.data("state", "editable");
  // }

  // makeNoteReadOnly(thisNote) {
  //   thisNote.find(".edit-note").html('<i class="fa fa-pencil" aria-hidden="true"></i> Edit');
  //   thisNote.find(".note-title-field, .note-body-field").attr("readonly", "readonly").removeClass("note-active-field");
  //   thisNote.find(".update-note").removeClass("update-note--visible");
  //   thisNote.data("state", "cancel");
  // }

  // updateNote(e) {
  //   var thisNote = $(e.target).parents("li");

  //   var ourUpdatedPost = {
  //     'title': thisNote.find(".note-title-field").val(),
  //     'content': thisNote.find(".note-body-field").val()
  //   }

  //   $.ajax({
  //     beforeSend: (xhr) => {
  //       xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
  //     },
  //     url: shoeData.root_url + '/wp-json/shoes/v1/manageShoe' + thisNote.data('id'),
  //     type: 'POST',
  //     data: ourUpdatedPost,
  //     success: (response) => {
  //       this.makeNoteReadOnly(thisNote);
  //       console.log("Congrats");
  //       console.log(response);
  //     },
  //     error: (response) => {
  //       console.log("Sorry");
  //       console.log(response);
  //     }
  //   });
  // }


  // Image creation
  uploadDialog() {

    document.querySelector("#fileInput").click();

   }
   
  fileChange() {
    
    // user selected file	
          var file = this.files[0];
    // var file = this.files[0];

    // allowed MIME types
    var mime_types = [ 'image/jpeg', 'image/png' ];
    
    // validate MIME
    if(mime_types.indexOf(file.type) == -1) {
      alert('Error : Incorrect file type');
      return;
    }

    // validate file size
    if(file.size > 5*1200*1200) {
      alert('Error : Exceeded size 5MB');
      return;
    }

    // validation is successful

    // hide upload dialog button
    document.querySelector("#upload-dialog").style.display = 'none';
    
    // set name of the file
    document.querySelector("#image-name").innerText = file.name;
    document.querySelector("#image-name").style.display = 'inline-block';

    // local url
    this._PREVIEW_URL = URL.createObjectURL(file);

    console.log("value is " + this._PREVIEW_URL);
    // set src of image and show
    
    document.querySelector("#preview-image").setAttribute('src', this._PREVIEW_URL);
    document.querySelector("#preview-image").style.display = 'inline-block';

    
    // show cancel and upload buttons now
    document.querySelector("#cancel-image").style.display = 'inline-block';
    // document.querySelector("#upload-button").style.display = 'inline-block';
   }
   
   resetFile() {

     // destroy previous local url
    URL.revokeObjectURL(this._PREVIEW_URL);

    // show upload dialog button and hide image and cancel buttons
    document.querySelector("#upload-dialog").style.display = 'inline-block';
    document.querySelector("#image-name").style.display = 'none';
    document.querySelector("#cancel-image").style.display = 'none';
    // document.querySelector("#preview-image").style.display = 'none';

    // reset to no selection
    document.querySelector("#image-file").value = '';

    // hide elements that are not required
    // // document.querySelector("#image-name").style.display = 'none';
    // document.querySelector("#preview-image").style.display = 'none';
  
    // document.querySelector("#upload-button").style.display = 'none';
   
   }



  // Creation of Post Your Shoes Post

  createNote(e) {

  e.preventDefault();

    var ourNewPost = {
    // 'postedBy': $(".postedBy").val(),
    'posted': $(".posted-by").val(),
    'name': $(".name").val(),
    'address': $(".address").val(),
    'city': $(".city").val(),
    'country': $("#countryList option:selected").val(),
    'commentary': $(".commentary").val(),
    'status': 'publish'
  }
 

  const files = document.querySelector('#fileInput').files;

	const formData = new FormData();

	for (let i = 0; i < files.length; i++) {
      let file = files[i];
      console.log(file);
      formData.append('files[]', file);

	}
     formData.append('posted',ourNewPost.posted);
    //  formData.append('postedBy',ourNewPost.postedBy);
     formData.append('name',ourNewPost.name);
     formData.append('address',ourNewPost.address);
     formData.append('city',ourNewPost.city);
     formData.append('country',ourNewPost.country);
     formData.append('commentary',ourNewPost.commentary);
     
  // formData.append('dummy', $(".postedBy"),val());

  // const files = document.querySelector('.post-grid1').files;
  // const formData = new FormData(files);


  $.ajax({
    beforeSend: (xhr) => {
      xhr.setRequestHeader('X-WP-Nonce', shoeData.nonce);
    },
    url: shoeData.root_url + '/wp-json/shoes/v1/manageShoe',
 
    type: 'POST',
    data: formData,
    // extra Info

    cache: false,
    processData: false,
    contentType: false,

    // extra Info End
    success: (response) => {
        // $(".name, .shoePhoto").val('');
      // console.log(formData);
      console.log("Congrats");
      console.log(response);

  
    },
    error: (response) => {
      if(response.responseText == "You have reached your note limit.") {
        $(".note-limit-message").addClass("active");
      }
      console.log("Stevie");
      console.log(response);
    }
  });

  // Response from Shoe - Creation of Modal Fixed

  const shoesModal = document.querySelector('.post-shoes-modal');
  shoesModal.style.display = 'block';

  setTimeout(function(){
  shoesModal.style.display = 'none';

  }, 4000);


      
 
}

}


export default PostShoes;
