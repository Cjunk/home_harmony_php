<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style2.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script defer src="script.js"></script>
    <title>Document2</title>
  </head>
  <body>
    <div id="header" class = "header-bar">
      <ul class="menu-list">
        <li><a href="#section1">menu 1</a></li>
        <li><a href="#section1">menu 2</a></li>
        <li><a href="#section1">menu 3</a></li>
      </ul>

    </div>
    <div>
      <section class="sections section1">
        <div><p>Section 1</p>
          <div class="container mt-5">
            <h2>Make an Enquiry</h2>
            <form action="submit_form.php" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required />
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

        </div>
      </section>
      <div class="scroll-container">
        <section id="section1"class="sections section2">
          <div>
            <p>Section 2</p>
            <div class="container mt-5">
              <h2>Make an Enquiry</h2>
              <form action="submit_form.php" method="POST">
                <div class="mb-3">
                  <label for="name" class="form-label">Name:</label>
                  <input type="text" class="form-control" id="name" name="name" required />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" required />
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">Message:</label>
                  <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </section>
        <section class="sections section3">
          <div><p>Section 3</p></div>
        </section>
      </div>
    </div>
    <div class="footer">
      <div class=" footer-items left-footer">
        <h1><a href="http://www.jerichosharman.com.au" target="_blank">FOOTER</a></h1>
      </div>
      <div class=" footer-items mid-footer">
        <h1>something</h1>
      </div>
      <div class=" footer-items right-footer">
        <h1>socials</h1>
      </div>
    </div>
    <!-- Scrollable Container for Section 2 and Section 3 -->
  </body>
</html>
