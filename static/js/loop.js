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
			if( parseInt(self.idx / 8) % 2 == 0){
                self.element.setAttribute('font', 'm-' + self.idx % 8);
                // border width: 1 to 9
                self.element.style.border = 1 + self.idx % 8 + 'px solid';
                // console.log('m-' + self.idx % 8, 1 + self.idx % 8 + 'px');
			}
            else{
                self.element.setAttribute('font', 'm-' + (8 - self.idx % 8));
                self.element.style.border = 9 - self.idx % 8 + 'px solid';
                // console.log('m-' + (8 - self.idx % 8), 9 - self.idx % 8 + 'px');
            }
            self.idx++;
		}, self.interval);
	}
	pause(){
		clearInterval(this.looper);
		this.looper = null;
	}
}