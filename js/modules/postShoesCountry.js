class PostShoesCountry{

    constructor(){
        
        this.events();
    }

    events(){

        if(window.location.href ==  'https://www.haveyouseenmyshoes.com/wp-login.php?checkemail=registered'){
        // if(window.location.href ==  'http://localhost:3000/wp-login.php?checkemail=registered'){
        // this.results = this.obtainJSONFile();
        document.querySelector('#countrylist').addEventListener('keyup', (e) =>{
            // clearing the list before populating again
            const clearList = document.getElementById('countrylist1');
            console.log(clearList);
            while(clearList.firstChild){
                clearList.removeChild(clearList.firstChild);
            }

            // Getting value of input and then checking it against JSON file
            let searchBox = e.target.value;
            // console.log(searchBox);

            this.obtainJSONFile(searchBox);

        })
    } else{
        // console.log('not there yet');
        // console.log(window.location.href);
    }
      

    }

    obtainJSONFile(searchBox){

        const xhrCountry = new XMLHttpRequest();
        xhrCountry.open('GET', "../wp-content/themes/have-you-seen-my-shoes2/json/country.json");
        xhrCountry.onload = function(){

            var countries = JSON.parse(xhrCountry.responseText);
            let selectID = document.getElementById('countrylist1');
            let fits = countries.filter(country =>{

                // if(searchBox.toLowerCase().indexOf(country) != -1){
                //     console.log('match');
                // } else{
                //     console.log('no match');
                // }
                // // console.log(country.name);

                let regex = new RegExp(`^${searchBox.toLowerCase()}`);

                // let regex = searchBox.toLowerCase();
                let countryName = country.name.toLowerCase();
        

                // console.log(regex);

                // if(countryName.match(regex) || countryCode.match(regex)){
                if(countryName.match(regex)){
                    var option = document.createElement('option');
                    option.setAttribute('value', countryName);
                    option.appendChild(document.createTextNode(countryName));
                    selectID.appendChild(option);  
       
                }
               

            });

            // if(searchBox.length === 0){
            //     fits = [];
            //     // countryList.innerHTML = '';

            // }
            // self.outputHTML(fits);

 
 
        };

        xhrCountry.send();
    }

    outputHTML(fits){

        console.log(fits);
    }


}

export default PostShoesCountry;  