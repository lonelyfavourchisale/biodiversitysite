<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <!-- ✅ Load Bootstrap CSS  -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <!-- 👇️ Example carousel  -->
    <div
      id="carouselExampleControls"
      class="carousel slide"
      data-ride="carousel"
    >

      <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="img/binocular.jpg" alt="Los Angeles"  id="image1" style="width: 100vw;height:80vh">
        </div>

        <div class="carousel-item">
          <img src="img/books.jpg" alt="Los Angeles"  id="image1" style="width: 100vw;height:80vh">
        </div>
        
        <div class="carousel-item">
          <img src="img/download.jpg" alt="Los Angeles"  id="image1" style="width: 100vw;height:80vh">
        </div>
      </div>
      
    </div>

    <!-- ✅ load jQuery ✅ -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ✅ load Bootstrap JS ✅ -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>

    <!-- ✅ Load your JS file ✅ -->
    <script src="index.js"></script>
  </body>
</html>