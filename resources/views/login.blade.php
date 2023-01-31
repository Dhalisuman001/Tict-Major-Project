<!DOCTYPE html>
<html>

  <head>
    <title>Login</title>
    <link
    href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap"
    rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}" />
      <script src="dist/js/swwetalert.min.js"></script>
  </head>
  <body>
    <div class="main">
      <input type="checkbox" id="chk" aria-hidden="true" />

      <div class="signup">
        <form method="post" action="register">
                @csrf
        <?php
          if($message == "")
          {

          }
          else
          {
            echo '<script type="text/javascript">';
            echo 'swal({
              title: "Error",
              text: '.$message.',
              icon: "error",
              button: "Try Again",
            });';  //not showing an alert box.
            echo '</script>';
          }
          ?>
          <label for="chk" aria-hidden="true">Sign up</label>
          <input type="text" name="username" placeholder="User name" required="" />
          <input type="email" name="email" placeholder="Email" required="" />
          <input
            type="password"
            name="password"
            placeholder="Password"
            required=""
          />
          <button type="submit" name="SubmitButton">Sign up</button>
        </form>
      </div>

      <div class="login">

        <form action="/login" method="post">
            @csrf
        <?php
          if($message == "")
          {

          }
          else
          {
            echo '<script type="text/javascript">';
            echo 'swal({
              title: "Error",
              text: '.$message.',
              icon: "error",
              button: "Try Again",
            });';  //not showing an alert box.
            echo '</script>';
          }
          ?>
          <label for="chk" aria-hidden="true">Login</label>
          <input type="email" name="email" placeholder="Email" required="" />
          <input
            type="password"
            name="password"
            placeholder="Password"
            required=""
          />
          <button type="submit" name="SubmitButton">Login</button>
        </form>
      </div>
    </div>
  </body>
</html>
