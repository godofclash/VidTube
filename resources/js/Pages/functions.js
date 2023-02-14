export function getTime(time) {
    time = new Date(Date.now() - new Date(time).getTime());
        
        let number; 
        let string;

        if (time.getUTCFullYear() > 1970) {
            number = time.getUTCFullYear() - 1970
            string = " years"
        }
        else if(time.getMonth() > 0) {
            number = time.getUTCMonth();
            string = " months"
        }
        else if(time.getUTCDate() > 6) {
            number = Math.floor(time.getUTCDate() / 7);
            string = " weeks";
        }
        else if(time.getUTCDate() > 1) {
            number = time.getUTCDate() - 1; 
            string = ' days';
        }
        else if(time.getUTCHours() > 0) {
            number = time.getUTCHours();
            string = ' hours';
        }
        else if (time.getUTCMinutes() > 0) {
            number = time.getUTCMinutes()
            string = " minutes"
        }
        else {
            return "less than a minute"
        }

        if (number === 1) {
            string = string.slice(0, string.length - 1)
        }

        return number + string
}