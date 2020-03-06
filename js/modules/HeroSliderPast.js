import $ from 'jquery';

class HeroSliderPast {
  constructor() {
    this.els = $(".carousel-slide"); 
    this.initSliderPast();

  }

  initSliderPast() {

    console.log("seems to be stuck all the time");
    
    this.els.slick({
      autoplay: true,
      arrows: false,
      dots: true,
      variableWidth: true,
      adaptiveHeight: false
    });  }


}

export default HeroSliderPast;

