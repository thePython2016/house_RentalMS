<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>jQuery Accordion Example</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="accordion">
  <div class="accordion-item">
    <div class="accordion-header">Section 1</div>
    <div class="accordion-content">
      <p>This is the content of section 1.</p>
    </div>
  </div>
  <div class="accordion-item">
    <div class="accordion-header">Section 2</div>
    <div class="accordion-content">
      <p>This is the content of section 2.</p>
    </div>
  </div>
  <div class="accordion-item">
    <div class="accordion-header">Section 3</div>
    <div class="accordion-content">
      <p>This is the content of section 3.</p>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script>

$(document).ready(function() {
  $('.accordion-header').click(function() {
    // Toggle the clicked section's content
    $(this).next('.accordion-content').slideToggle();
    
    // Hide other sections' content
    $('.accordion-content').not($(this).next()).slideUp();
  });
});
</script>
<style>

.accordion {
  width: 100%;
  max-width: 600px;
  margin: auto;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.accordion-item {
  border-top: 1px solid #ddd;
}

.accordion-header {
  padding: 15px;
  cursor: pointer;
  font-weight: bold;
  background-color: #f2f2f2;
}

.accordion-content {
  display: none;
  padding: 15px;
  background-color: #fff;
}

</style>
</body>
</html>
