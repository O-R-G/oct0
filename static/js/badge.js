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
        var column, 
            row;
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

        this.column = 0;
        this.row = 0;
        this.step = 2.0 * Math.PI / this.frames;
        this.delay = 10; 
        this.direction = 1;
        this.animate();
        // this.animate_center();
    }

    animate(self) {
        if(!self)
            self = this;
        self.context.clearRect(0, 0, self.canvas.width, self.canvas.height);
        self.sx = self.sprite_width * (self.column % self.sprite_sheet_columns);
        if (self.sx == 0)
            self.row++;
        self.sy = self.sprite_height * (self.row % self.sprite_sheet_rows);
        self.context.drawImage( self.sprite_sheet, 
                                self.sx,
                                self.sy,
                                self.sprite_width, 
                                self.sprite_height, 
                                self.sprite_X, 
                                self.sprite_Y, 
                                self.sprite_computed_width, 
                                self.sprite_computed_height);
        self.column++;
        self.t = setTimeout(()=>self.animate(self), self.delay);
    }
    animate_center(self) {
        if(!self)
            self = this;
        self.context.clearRect(0, 0, self.canvas.width, self.canvas.height);
        self.sx = self.sprite_width * (self.column % self.sprite_sheet_columns);
        if (self.sx == 0)
            self.row++;
        self.sy = self.sprite_height * (self.row % self.sprite_sheet_rows);
        self.context.drawImage( self.sprite_sheet, 
                                self.sx - self.sprite_width / 4,
                                self.sy,
                                self.sprite_width, 
                                self.sprite_height, 
                                self.sprite_X, 
                                self.sprite_Y, 
                                self.sprite_computed_width, 
                                self.sprite_computed_height);
        self.column++;
        self.t = setTimeout(()=>self.animate_center(self), self.delay);
    }

    start_stop() {
        if (this.t) {
            clearTimeout(this.t);
            this.t = null;
        } else {
            // this.t = setTimeout(this.animate(), this.delay);
            this.t = setTimeout(this.animate(), this.delay);
        }
    }
}        

var badge = new Badge;
