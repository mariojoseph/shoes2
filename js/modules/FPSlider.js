
class fpSlider{

constructor(){

  if(document.URL === 'https://www.haveyouseenmyshoes.com/' || document.URL === 'http://localhost:3000/' ){
  this.gridImageContainer = document.querySelector('.grid4-image');
  this.gridImagesA = document.querySelectorAll('.photoImages');
  this.counter = 1;
  this.sizeA = this.gridImagesA[0].clientWidth;
  this.events();
  }
}

events() {
 
  this.gridImageContainer.style.transform = 'translateX('+(-this.sizeA*this.counter)+ 'px)';
  this.MyTimer = setInterval(this.changeScene.bind(this), 3000);
  }

changeScene(){
    if(this.counter === 5){
 
      this.counter = 0;
      this.gridImageContainer.style.transition = "none"; 
      this.gridImageContainer.style.transform = 'translateX(' + (-this.sizeA * this.counter) + 'px)';

    } else{
  
        // if(this.counter>= this.gridImagesA.length -1) return;
        this.gridImageContainer.style.transition = "transform 0.4s ease-in-out";
        this.counter++;
        this.gridImageContainer.style.transform = 'translateX('+ (-this.sizeA * this.counter) + 'px)';
    }

}



}




export default fpSlider;


