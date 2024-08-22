document.getElementById('scrollArrow').addEventListener('click', function () {
  document.getElementById('target').scrollIntoView({
    behavior: 'smooth'
  });
});
