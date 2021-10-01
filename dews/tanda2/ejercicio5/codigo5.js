

function start() {
    startTime = new Date();
  };
  
  function end() {
    endTime = new Date();
    var timeDiff = endTime - startTime; //in ms
    // strip the ms
    timeDiff /= 1000;
  
    // get seconds 
    var seconds = Math.round(timeDiff);
    return seconds;
  }
    start();
    prompt("Introduce tu nombre");
    html=`
    <p>${end()} segundos</p>
    `;
    let app = document.querySelector('#mensaje');
        app.innerHTML = html;
    
  