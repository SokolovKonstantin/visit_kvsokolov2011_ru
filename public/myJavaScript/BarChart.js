/*
        EXAMPLE OF USING THE ANIMATED CHART.

JS:
let levelSkillProba = [
  {'nameSkill':'HTML','levelSkill':10},
  {'nameSkill':'React','levelSkill':18},
  {'nameSkill':'CSS','levelSkill':35},
  {'nameSkill':'HTML','levelSkill':66},
  {'nameSkill':'React','levelSkill':82},
  {'nameSkill':'CSS','levelSkill':100},
];
let width = 600;
let height = 300;

let proba = new BarChart(width, height,'diagramCanvas', levelSkillProba);
proba.createDiagramAnimation();

HTML:
<canvas id="diagramCanvas"></canvas>
*/

class BarChart
{
  #width;
  #height
  #myCanvas;
  #ctx;
  #skillsArray;

  constructor(width, height, idDiagramDOM, skillsArray){
    this.#width = width;
    this.#height = height;
    this.#myCanvas = document.getElementById(idDiagramDOM);
    this.#myCanvas.width = this.#width;
    this.#myCanvas.height = this.#height;
    this.#ctx = this.#myCanvas.getContext("2d");
    this.#skillsArray = skillsArray;
  }

  //animated chart output
  createDiagramAnimation(){
    let grow = 0;
    let animation = () => {
        let skillsAnimationArray = [];
        for (let j=0; j<this.#skillsArray.length; j++){
          skillsAnimationArray.push({
            'nameSkill':this.#skillsArray[j]['nameSkill'],
            'levelSkill':this.#skillsArray[j]['levelSkill']*grow
          });
        }
        grow += 0.01;//step growing
        this.sleep(10);//delay

      if (grow < 1) {
        this.createDiagram(skillsAnimationArray);
        window.requestAnimationFrame(animation);
      }
    }
    window.requestAnimationFrame(animation);
  }

  //delay method
  sleep(milliseconds) {
    const date = Date.now();
    let currentDate = null;
    do {
      currentDate = Date.now();
    } while (currentDate - date < milliseconds);
  }

  //creating a static chart
  createDiagram(skillsArray){
    let arrayColor = ['#f00','#ff0','#0f0'];
    this.#ctx.clearRect(0, 0, this.#width, this.#height);
    for (let i=0; i<skillsArray.length;i++){
      //console.log('for');
      let color = arrayColor[
        Math.floor(skillsArray[i]['levelSkill']*2.999/100)]// 2,999 because 1*3=3

      if (this.#width < 20) {
        this.drawLine(0,0, 0,this.#height, '#000');
        this.drawOneSkillVertical(
          i,
          skillsArray.length,
          skillsArray[i]['levelSkill'],
          skillsArray[i]['nameSkill'], color)
      } else {
        this.drawLine(0,this.#height, this.#width,this.#height, '#000');
        this.drawOneSkillHorizontal(i,
          skillsArray.length,
          skillsArray[i]['levelSkill'],
          skillsArray[i]['nameSkill'], color)
      }
    }
  }

  //numberOfPlace 0..N
  drawOneSkillVertical(numberOfPlace, TotalPlace, levelSkill, nameSkill, color){
    this.#ctx.save();
    let heightPlace = this.#height/TotalPlace;
    let pointsPerPercentage = this.#width/100;
    let widthLevelSkill = levelSkill*pointsPerPercentage;

    let startY = Math.floor(numberOfPlace*heightPlace+heightPlace*4/100);
    let startX = 0;
    let height = Math.floor(heightPlace*92/100);
    let width = Math.floor(widthLevelSkill);
    this.#ctx.save();
    this.drawRestangle(startX, startY, width, height, color);
    this.#ctx.restore();
    //Caption
    let sizeFont = heightPlace*50/100;
    this.#ctx.translate(
      this.#width*2/100,
      numberOfPlace*heightPlace+heightPlace/2+sizeFont/2);
    this.#ctx.font = sizeFont+"px"+" "+"Times new roman";
    this.#ctx.fillText(nameSkill, 0,0);
    this.#ctx.restore();
  }

  drawOneSkillHorizontal(numberOfPlace, TotalPlace, levelSkill, nameSkill, color){
    this.#ctx.save();
    let widthPlace = this.#width/TotalPlace;
    let pointsPerPercentage = this.#height/100;
    let heightLevelSkill = levelSkill*pointsPerPercentage;

    let startX = Math.floor(numberOfPlace*widthPlace+widthPlace*4/100);
    let startY = Math.floor(this.#height-heightLevelSkill);
    let width = Math.floor(widthPlace*92/100);
    let height = Math.floor(heightLevelSkill);
    this.#ctx.save();
    this.drawRestangle(startX, startY, width, height, color);
    this.#ctx.restore();
    //Caption
    let sizeFont = widthPlace*50/100;
    this.#ctx.translate(
      numberOfPlace*widthPlace+widthPlace/2+sizeFont/2,
      this.#height-this.#height*2/100);
    this.#ctx.font = sizeFont+"px"+" "+"Times new roman";
    this.#ctx.rotate(-90 * Math.PI / 180);
    this.#ctx.fillText(nameSkill, 0,0);
    this.#ctx.restore();
  }

  drawLine(startX, startY, endX, endY, color){
    this.#ctx.beginPath();
    this.#ctx.moveTo(startX,startY);
    this.#ctx.lineTo(endX,endY);
    this.#ctx.strokeStyle = color;
    this.#ctx.stroke();
    this.#ctx.closePath();
  }

  drawRestangle(startX, startY, width, height, color) {
    this.#ctx.beginPath();
    this.#ctx.fillStyle = color;
    this.#ctx.fillRect(startX, startY, width, height);
  }
}
