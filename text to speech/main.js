document.getElementById('speakButton').addEventListener('click', function() {
  let text = document.getElementById('textArea').value;

  if (text === '') {
    alert('Please enter some text.');
    return;
  }

  let speech = new SpeechSynthesisUtterance();
  speech.text = text;
  window.speechSynthesis.speak(speech);
});
