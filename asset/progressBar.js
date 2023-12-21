const spans = document.querySelectorAll(".progressBarBeta span");

spans.forEach((span) => {
  span.style.width = span.dataset.width;
  span.innerHTML.widht = span.dataset.width;
});
