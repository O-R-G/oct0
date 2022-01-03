class Loop {
	constructor(element, isRandom = false)
	{
		if(isRandom)
			this.interval = Math.round( (0.15 * Math.random() + 0.1) * 1000 );
		else
			this.interval = 100;
		this.idx = 0;
		this.element = element;
	}
	begin(){
		let self = this;
		this.looper = setInterval(function(){
			if( parseInt(self.idx / 7) % 2 == 0){
                self.element.style.fontFamily = 'mtdbt2f4d-'+(self.idx % 7)+', Helvetica, Arial, sans-serif'; 
                self.element.style.border = 1 + self.idx % 7 + 'px solid #00f';
			}
            else{
                self.element.style.fontFamily = 'mtdbt2f4d-'+(7 - self.idx % 7)+', Helvetica, Arial, sans-serif'; 
                self.element.style.border = 7 - self.idx % 7 + 'px solid #00f';
            }
            self.idx++;
		}, self.interval);
	}
	pause(){
		clearInterval(this.looper);
		this.looper = null;
	}
}