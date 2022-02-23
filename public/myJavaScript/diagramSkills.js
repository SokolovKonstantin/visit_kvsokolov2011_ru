window.onload = function() {
  let width = document.getElementById('diagramCanvas').clientWidth;
  let height = document.getElementById('diagramCanvas').clientHeight;
  let proba = new BarChart(width, height,'diagramCanvas', skills);
  proba.createDiagramAnimation();
 };

window.onresize = function() {
  let width = document.getElementById('diagramCanvas').clientWidth;
  let height = document.getElementById('diagramCanvas').clientHeight;
  let proba = new BarChart(width, height,'diagramCanvas', skills);
  proba.createDiagramAnimation();
};
