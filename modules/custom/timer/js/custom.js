class Timer {

    constructor(){
        // this.places = [
        //     "America/Costa_Rica",
        //     "America/New_York",
        //     "Europe/Belgrade"
        // ];
    }

    setTimes (){
        
        this.setDate("#td_sj");
        this.setDate("#td_ny");
        this.setDate("#td_blg");
    }

    setDate( element_id ){

        let datetime = $( element_id ).text()

        let dt = new Date(datetime);
        dt.setSeconds( dt.getSeconds() + 1 );

        $( element_id ).text( dt.toLocaleString('en'));
    }

    init (){

        let self = this;

        setInterval(function(){ 
            self.setTimes();
        }
        ,1000);

        
    }

}

let timer = new Timer();

timer.init();
