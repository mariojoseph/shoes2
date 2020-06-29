import $ from 'jquery';

class PWSlider{

  constructor(){
  

      if(window.location.href.indexOf('/past-winners') > -1){
       
        this.carouselSliderPW = document.querySelector('.hero-sliderP');
        this.carouselSliderPWImages = document.querySelectorAll('.pastImage');
        this.dotClassDots = document.querySelectorAll('.dot-class li');
        this.counter = 1;
        this.dot = 0;
        // Changed to actual size to avoid issues. Can change afterwards
        this.Size = this.carouselSliderPWImages[0].clientWidth;
        this.events();
        console.log(this.carouselSliderPWImages);
      }
  
    }
    
    events(){
      // console.log(this.Size);
    this.carouselSliderPW.style.transform = "translateX("+(-this.Size*this.counter) +"px)";
    this.dotClassDots[this.dot].style.backgroundColor = "rgba(104, 98, 124, 0.9)";
    this.carouselSliderPWImages[this.counter+1].style.opacity = "0.4";
    var MyTimer = setInterval(this.changeScene.bind(this), 3000);
    
    }
    
    
    changeScene(){
    
      if(this.dot===5){
          this.dotClassDots[4].style.backgroundColor = "rgba(104, 98, 124, 0.3)";
          this.dot = 0;
          this.carouselSliderPW.style.transition = 'none';
          this.counter = this.carouselSliderPWImages.length - this.counter;
          this.carouselSliderPW.style.transform = "translateX("+(-this.Size*this.counter) +"px)";    
          this.dotClassDots[this.dot].style.backgroundColor = "rgba(104, 98, 124, 0.9)";
          this.carouselSliderPWImages[this.counter+1].style.opacity = "0.4";
      } else{
        
        console.log(this.carouselSliderPWImages[1]);
        this.dotClassDots[this.dot].style.backgroundColor = "rgba(104, 98, 124, 0.3)";
        this.carouselSliderPWImages[this.counter+1].style.opacity = "1";
        this.dot++;
        this.carouselSliderPW.style.transition = "transform 0.5s ease-in-out";
       
        this.counter++;
        this.carouselSliderPWImages[this.counter+1].style.opacity = "0.4";

        this.carouselSliderPW.style.transform = "translateX("+(-this.Size*this.counter) +"px)";
        
        if(this.dot !== 5){
          this.dotClassDots[this.dot].style.backgroundColor = "rgba(104, 98, 124, 0.9)";

        }
      

      }
      
      
    }

}

export default PWSlider;

