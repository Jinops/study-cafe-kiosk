window.onload = function(){
  const step1 = document.getElementById('step1');
  const step2 = document.getElementById('step2');
  const progressBar = document.getElementById('progress_bar');
  let percentage = 0;
  progress = setInterval(function(){
    percentage = parseInt(progressBar.style.width.slice(0,-1));
    progressBar.style.width = percentage+20+'%';
    if (percentage >= 100){
      clearInterval(progress);
      step1.style.display = "none";
      step2.style.display = "block";
      setTimeout(function(){
        window.location.href="./index.html";
      },2000);
    }
  },500);
}