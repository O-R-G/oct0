/* 
    badge.js
    
    generic, should be replaced per site
    to draw and update the badge
*/

class Badge {

    constructor (){
        var canvas,
            context,
            step,
            steps,
            frames,
            delay,
            t;
        var centerX,
            centerY,
            radius,
            direction;
        var counter;
        var sprite_sheet,
            sprite_width,
            sprite_height,
            sprite_computed_width,
            sprite_computed_height,
            sprite_sheet_columns,
            sprite_sheet_rows,
            sprite_X,
            sprite_Y;
    }

    init() {
        var badge = document.getElementById("badge");
        this.canvas = badge.getElementsByTagName("canvas")[0];
        this.context = this.canvas.getContext("2d");
        var computed_width = window.getComputedStyle(badge, null).getPropertyValue('width');
        var computed_width = parseFloat(computed_width, 10)
        var computed_height = window.getComputedStyle(badge, null).getPropertyValue('height');
        var computed_height = parseFloat(computed_height, 10)
        var min_ = Math.min(computed_width, computed_height);
        this.context.canvas.width = min_;
        this.context.canvas.height = min_;
        this.centerX = this.canvas.width / 2;
        this.centerY = this.canvas.height / 2;
        this.context.fillStyle = "#FFFFFF";
        this.context.lineWidth = 8;
        this.context.strokeStyle = '#00F';

        // load sprite sheet
        this.sprite_sheet = new Image();
        this.sprite_sheet.src = '/media/png/sprite-sheet.png';
        this.sprite_height = 204;                               // right now only showing column of sprite sheet
                                                                // change to = 244 to verify
        this.sprite_width = 408;
        this.sprite_computed_width = this.context.canvas.width;

                                                                // not sure what is correct here
        // this.sprite_computed_height = (this.sprite_computed_width * 500) / 500;
        this.sprite_computed_height = (this.sprite_computed_width * this.sprite_height) / this.sprite_width;

        this.sprite_X = (this.context.canvas.width - this.sprite_computed_width) / 2;;
        this.sprite_Y = (this.context.canvas.height - this.sprite_computed_height) / 2;
        this.sprite_sheet_columns = 14;
        this.sprite_sheet_rows = 36;
        this.frames = this.sprite_sheet_columns * this.sprite_sheet_rows;    // frames in sprite_sheet

        this.counter = 0;
        this.step = 2.0 * Math.PI / this.frames;
        this.delay = 100; 
        this.direction = 1;
        this.animate();
    }

    animate(self) {
        if(!self)
            self = this;
        self.context.clearRect(0, 0, self.canvas.width, self.canvas.height);

        // context.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
        // context.drawImage(sprite_sheet, sprite_width * (counter % frames), 0, 480, 253, topX, topY, 480, 253);
        // context.drawImage(sprite_sheet, sprite_width * (counter % frames), 0, sprite_width, sprite_height, sprite_X, sprite_Y, sprite_computed_width, sprite_computed_height);
        self.context.drawImage(self.sprite_sheet, self.sprite_width * (self.counter % self.sprite_sheet_columns), self.sprite_height * (self.counter % self.sprite_sheet_rows), self.sprite_width, self.sprite_height, self.sprite_X, self.sprite_Y, self.sprite_computed_width, self.sprite_computed_height);

        self.counter++;
        // var thisStep = (self.counter % self.frames) * self.step * self.direction;
        self.t = setTimeout(()=>self.animate(self), self.delay);
    }

    start_stop() {
        if (this.t) {
            clearTimeout(this.t);
            this.t = null;
        } else {
            setTimeout(this.animate(), this.delay);
        }
    }
}        

var badge = new Badge;
